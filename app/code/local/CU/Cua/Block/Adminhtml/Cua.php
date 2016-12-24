<?php

class CU_Cua_Block_Adminhtml_Cua extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    protected function _construct()
    {
        parent::_construct();

        $helper = Mage::helper('cucua');
        $this->_blockGroup = 'cucua';
        $this->_controller = 'adminhtml_cua';

        $this->_headerText = $helper->__('Appeals Management');
        $this->_addButtonLabel = $helper->__('Add Appeal');
    }

}