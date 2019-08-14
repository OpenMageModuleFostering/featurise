<?php

class Arvtour_Tour_Block_Adminhtml_Tour_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'tour';
        $this->_controller = 'adminhtml_tour';
        
        $this->_updateButton('save', 'label', Mage::helper('tour')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('tour')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('tour_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'tour_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'tour_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('tour_data') && Mage::registry('tour_data')->getId() ) {
            return Mage::helper('tour')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('tour_data')->getTitle()));
        } else {
            return Mage::helper('tour')->__('Add Item');
        }
    }
}