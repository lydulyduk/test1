<?php

class CU_Cua_Block_Adminhtml_Cua_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

    public function __construct()
    {
        $helper = Mage::helper('cucua');

        parent::__construct();
        $this->setId('appeal_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle($helper->__('Appeal Information'));
    }

    protected function _prepareLayout()
    {
        $helper = Mage::helper('cucua');

        $this->addTab('general_section', array(
            'label' => $helper->__('General Information'),
            'title' => $helper->__('General Information'),
            'content' => $this->getLayout()->createBlock('cucua/adminhtml_cua_edit_tabs_general')->toHtml(),
        ));
        $this->addTab('custom_section', array(
            'label' => $helper->__('Status'),
            'title' => $helper->__('Status'),
            'content' => $this->getLayout()->createBlock('cucua/adminhtml_cua_edit_tabs_custom')->toHtml(),
        ));
        return parent::_prepareLayout();
    }

}