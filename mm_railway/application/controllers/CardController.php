<?php
class CardController extends Zend_Controller_Action{

	public function indexAction(){
		$allCards = array('a','b','c','d');
		$this->view->allCards = $allCards;
	}	

	public function newAction(){
		if($this->getRequest->isPost()){

		}else{
			
		}
			 $page = $this->getRequest()->getParam('page');
			 Zend_Debug::dump($page);

	}
} 

?>