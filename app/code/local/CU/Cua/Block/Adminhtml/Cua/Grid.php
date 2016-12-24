<?php

class CU_Cua_Block_Adminhtml_Cua_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('cucua/cua')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $helper = Mage::helper('cucua');

        $this->addColumn('appeal_id', array(
            'header' => $helper->__('Appeal ID'),
            'index' => 'appeal_id'
        ));

        $this->addColumn('Name', array(
            'header' => $helper->__('Name'),
            'index' => 'name',
            'type' => 'text',
        ));

        $this->addColumn('email', array(
            'header' => $helper->__('Email'),
            'index' => 'email',
            'type' => 'text',
        ));

        $this->addColumn('telephone', array(
            'header' => $helper->__('Telephone'),
            'index' => 'telephone',
            'type' => 'text',
        ));

        $this->addColumn('status', array(
            'header' => $helper->__('Status'),
            'index' => 'status',
            'width'     => '1',
            'type'      => 'options',
            'options'   => array('Off', 'On')
        ));

        return parent::_prepareColumns();
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('appeal_id');
        $this->getMassactionBlock()->setFormFieldName('appeals');

        $this->getMassactionBlock()->addItem('delete', array(
            'label' => $this->__('Delete'),
            'url' => $this->getUrl('*/*/massDelete'),
        ));
        return $this;
    }

    public function getRowUrl($model)
    {
        return $this->getUrl('*/*/edit', array(
            'id' => $model->getId(),
        ));
    }
}