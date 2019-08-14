<?php

class Arvtour_Tour_Adminhtml_TourController extends Mage_Adminhtml_Controller_action
{
	public function indexAction()
    {
        $this->loadLayout()->renderLayout();
    }

    public function postAction()
    {
        $post = $this->getRequest()->getPost();
        try {
            if (empty($post)) {
                Mage::throwException($this->__('Invalid form data.'));
            }
            
            /* here's your form processing */
			$selectors = $post['selector'];
			$positions = $post['position'];
			$contents = $post['content'];
			$delays = $post['delay'];
			$exposes = $post['expose'];

			array_walk($selectors, array('Arvtour_Tour_Adminhtml_TourController', 'purify'));
			array_walk($positions, array('Arvtour_Tour_Adminhtml_TourController', 'purify'));
			array_walk($contents, array('Arvtour_Tour_Adminhtml_TourController', 'purify'));
			array_walk($delays, array('Arvtour_Tour_Adminhtml_TourController', 'purify'));
			array_walk($exposes, array('Arvtour_Tour_Adminhtml_TourController', 'purify'));
			
            if (empty($selectors) || !is_array($selectors)) {
                Mage::throwException($this->__('Invalid form data.'));
            }

			$write = Mage::getSingleton('core/resource')->getConnection('core_write');
			$write->query("TRUNCATE TABLE `tour`");

			foreach ($selectors as $key=>$selector) {
				if (empty($selector)) {
					Mage::throwException($this->__('Invalid form data.'));
				}

				$expose = ($exposes[$key] == 'y')?1:0;
				
				$sql  = "INSERT INTO `tour` (`selector`, `position`, `content`, `delay`, `expose`)
						values
						(?, ?, ?, ?, ?)
						";
				$write->query($sql, array(
									$selector,
									$positions[$key],
									$contents[$key],
									$delays[$key],
									$expose
									));
			}

            $message = $this->__('Feature tour has been saved.');
            Mage::getSingleton('adminhtml/session')->addSuccess($message);
        } catch (Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
        }
        $this->_redirect('*/*');
    }

	function purify(&$item)
	{
		$item = trim($item);
		//remove javascript
		$item = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $item);
	}
	
}