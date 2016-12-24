<?php

class CU_Cua_Block_Cua extends Mage_Core_Block_Template
{

    public function getAppealsCollection()
    {
        $appealsCollection = Mage::getModel('cucua/cua')->getCollection();
        return $appealsCollection;
    }

}