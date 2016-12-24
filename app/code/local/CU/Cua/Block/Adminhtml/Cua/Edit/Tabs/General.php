<?php

class CU_Cua_Block_Adminhtml_Cua_Edit_Tabs_General extends Mage_Adminhtml_Block_Widget_Form
{

    protected function _prepareForm()
    {

        $helper = Mage::helper('cucua');
        $model = Mage::registry('current_appeal');


        $form = new Varien_Data_Form();
        $fieldset = $form->addFieldset('general_form', array(
            'legend' => $helper->__('General Information')
        ));

        $fieldset->addField('name', 'text', array(
            'label' => $helper->__('Name'),
            'required' => true,
            'name' => 'name',
            'disabled' => true,
        ));

        $fieldset->addField('text', 'editor', array(
            'label' => $helper->__('Text'),
            'required' => true,
            'name' => 'text',
            'disabled' => true,
        ));

        $fieldset->addField('email', 'text', array(
            'label' => $helper->__('Email'),
            'required' => true,
            'name' => 'email',
            'disabled' => true,
        ));

        $fieldset->addField('telephone', 'text', array(
            'label' => $helper->__('Telephone'),
            'required' => false,
            'name' => 'telephone',
            'disabled' => true,
        ));

        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }

}