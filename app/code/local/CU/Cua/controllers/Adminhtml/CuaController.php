<?php

class CU_Cua_Adminhtml_CuaController extends Mage_Adminhtml_Controller_Action
{

    public function indexAction()
    {
        $this->loadLayout()->_setActiveMenu('cucua');

        $this->_addContent($this->getLayout()->createBlock('cucua/adminhtml_cua'));
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        $id = (int) $this->getRequest()->getParam('id');
        $model = Mage::getModel('cucua/cua');

        if($data = Mage::getSingleton('adminhtml/session')->getFormData()){
            $model->setData($data)->setId($id);
        } else {
            $model->load($id);
        }
        Mage::register('current_appeal', $model);

        $this->loadLayout()->_setActiveMenu('dsnews');
        $this->_addLeft($this->getLayout()->createBlock('cucua/adminhtml_cua_edit_tabs'));
        $this->_addContent($this->getLayout()->createBlock('cucua/adminhtml_cua_edit'));
        $this->renderLayout();
    }

    public function saveAction()
    {
        if ($data = $this->getRequest()->getPost()) {
            try {
                $model = Mage::getModel('cucua/cua');
                $model->setData($data)->setId($this->getRequest()->getParam('id'));
                
                $model->save();

                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Appeal was saved successfully'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array(
                    'id' => $this->getRequest()->getParam('id')
                ));
            }
            return;
        }
        Mage::getSingleton('adminhtml/session')->addError($this->__('Unable to find item to save'));
        $this->_redirect('*/*/');
    }

    public function deleteAction()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                Mage::getModel('cucua/cua')->setId($id)->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Appeal was deleted successfully'));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $id));
            }
        }
        $this->_redirect('*/*/');
    }

    public function massDeleteAction()
    {
        $appeals = $this->getRequest()->getParam('appeals', null);

        if (is_array($appeals) && sizeof($appeals) > 0) {
            try {
                foreach ($appeals as $id) {
                    Mage::getModel('cucua/cua')->setId($id)->delete();
                }
                $this->_getSession()->addSuccess($this->__('Total of %d appeals have been deleted', sizeof($appeals)));
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
        } else {
            $this->_getSession()->addError($this->__('Please select appeals'));
        }
        $this->_redirect('*/*');
    }

}