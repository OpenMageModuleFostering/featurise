<?php

class Arvtour_Tour_Block_Adminhtml_Tour_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('tour_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('tour')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('tour')->__('Item Information'),
          'title'     => Mage::helper('tour')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('tour/adminhtml_tour_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}