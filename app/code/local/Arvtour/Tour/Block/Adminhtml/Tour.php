<?php
class Arvtour_Tour_Block_Adminhtml_Tour extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_tour';
    $this->_blockGroup = 'tour';
    $this->_headerText = Mage::helper('tour')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('tour')->__('Add Item');
    parent::__construct();
  }

	public function getTours()
	{
		$read = Mage::getSingleton('core/resource')->getConnection('core_read');
		$sql  = "SELECT * FROM `tour`";
		$result = $read->query($sql);
		return $result->fetchAll();
	}
}