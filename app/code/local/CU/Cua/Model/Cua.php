<?php

class CU_Cua_Model_Cua extends Mage_Core_Model_Abstract
{

    public function _construct()
    {
        parent::_construct();
        $this->_init('cucua/cua');
    }

}