<?php

class CU_Cua_Model_Resource_Cua extends Mage_Core_Model_Mysql4_Abstract
{

    public function _construct()
    {
        $this->_init('cucua/table_appeals', 'appeal_id');
    }

}