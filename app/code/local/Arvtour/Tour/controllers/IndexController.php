<?php
class Arvtour_Tour_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/tour?id=15 
    	 *  or
    	 * http://site.com/tour/id/15 	
    	 */
    	/* 
		$tour_id = $this->getRequest()->getParam('id');

  		if($tour_id != null && $tour_id != '')	{
			$tour = Mage::getModel('tour/tour')->load($tour_id)->getData();
		} else {
			$tour = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($tour == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$tourTable = $resource->getTableName('tour');
			
			$select = $read->select()
			   ->from($tourTable,array('tour_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$tour = $read->fetchRow($select);
		}
		Mage::register('tour', $tour);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}