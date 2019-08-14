<?php

class Arvtour_Tour_Block_Adminhtml_Tour_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('tour_form', array('legend'=>Mage::helper('tour')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('tour')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('tour')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('tour')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('tour')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('tour')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('tour')->__('Content'),
          'title'     => Mage::helper('tour')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getTourData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getTourData());
          Mage::getSingleton('adminhtml/session')->setTourData(null);
      } elseif ( Mage::registry('tour_data') ) {
          $form->setValues(Mage::registry('tour_data')->getData());
      }
      return parent::_prepareForm();
  }
}