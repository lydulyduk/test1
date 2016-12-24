<?php

class CU_Cua_CuaController extends Mage_Core_Controller_Front_Action
{

    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function viewAction()
    {
        $appealId = Mage::app()->getRequest()->getParam('id', 0);
        $appeal = Mage::getModel('cucua/cua')->load($appealId);

        if ($appeal->getId() > 0) {
            $this->loadLayout();
            $this->getLayout()->getBlock('appeal.content')->assign(array(
                "appealsItem" => $appeal,
            ));
            $this->renderLayout();
        } else {
            $this->_forward('noRoute');
        }
    }

}