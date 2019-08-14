<?php

class Arvtour_Tour_Model_Mysql4_Tour extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the tour_id refers to the key field in your database table.
        $this->_init('tour/tour', 'tour_id');
    }
}