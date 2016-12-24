<?php

class CU_Cua_Model_Resource_Cua_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{

    public function _construct()
    {
        parent::_construct();
        $this->_init('cucua/cua');
    }

}
