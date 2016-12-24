<?php

require_once "Mage/Contacts/controllers/IndexController.php";

class CU_Cua_IndexController extends Mage_Contacts_IndexController
{
    public function indexAction()
    {
        echo 1;
        $this->loadLayout();
        $this->getLayout()->getBlock('contactForm')
            ->setFormAction( Mage::getUrl('*/*/post', array('_secure' => $this->getRequest()->isSecure())) );

        $this->_initLayoutMessages('customer/session');
        $this->_initLayoutMessages('catalog/session');
        $this->renderLayout();
    }
}