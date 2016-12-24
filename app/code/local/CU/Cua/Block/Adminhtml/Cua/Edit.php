<?php

class CU_Cua_Block_Adminhtml_Cua_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

    protected function _construct()
    {
        $this->_blockGroup = 'cucua';
        $this->_controller = 'adminhtml_cua';
    }

    public function getHeaderText()
    {
        $helper = Mage::helper('cucua');
        $model = Mage::registry('current_appeal');

        if ($model->getId()) {
            return $helper->__("Edit Appeals item '%s'", $this->escapeHtml($model->getName()));
        } else {
            return $helper->__("Add Appeals item");
        }
    }

}