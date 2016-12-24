<?php

class CU_Cua_Block_Adminhtml_Cua_Edit_Tabs_Custom extends Mage_Adminhtml_Block_Widget_Form
{

    protected function _prepareForm()
    {

        $helper = Mage::helper('cucua');
        $model = Mage::registry('current_appeal');


        $form = new Varien_Data_Form();
        $fieldset = $form->addFieldset('custom_form', array(
            'legend' => $helper->__('Status Information')
        ));

        $fieldset->addField('status', 'select', array(
            'label' => $helper->__('Status'),
            'required' => true,
            'name' => 'status',
            'value'  => '1',
            'values' => array('0' => 'Off','1' => 'On')
        ));

        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }

}