<?php

class Arvtour_Tour_Model_Tour extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('tour/tour');
    }
}