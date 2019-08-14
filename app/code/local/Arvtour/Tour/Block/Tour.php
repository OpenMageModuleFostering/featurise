<?php
class Arvtour_Tour_Block_Tour extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getTour()     
     { 
        if (!$this->hasData('tour')) {
            $this->setData('tour', Mage::registry('tour'));
        }
        return $this->getData('tour');
    }

	public function getTours()
	{
		$read = Mage::getSingleton('core/resource')->getConnection('core_read');
		$sql  = "SELECT * FROM `tour`";
		$result = $read->query($sql);
		return $result->fetchAll();
	}

	public function getConfig($key)
	{
		return Mage::getStoreConfig('tourconfig/tour_group/'.$key);
	}
}