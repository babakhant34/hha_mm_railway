<?php
class ScheduleController extends Zend_Controller_Action {
	public function indexAction()
		{
				$select = new Model_ScheduleService();
				$arrScheduleList = $select->inquireAll();
				$this->view->scheduleList = $arrScheduleList ;
				// Zend_Debug::dump($arrScheduleList);
		}
////////////////////////////////////////////////new///////////////////////////////////////////////////////////////////
	public function newAction()
		{
			if ( $this->getRequest()->isPost() ) {
				$destinationCity = $this->getRequest()->getPost ('destinationCity');
				$price = $this -> getRequest () -> getPost ('price');
				$date = $this -> getRequest () -> getPost ('date');
				$time = $this -> getRequest () -> getPost ('time');
				$trainId = $this -> getRequest () -> getPost ('trainId');
				
				$insert = new Model_ScheduleService();
				$insert->insert( $destinationCity, $price, $date, $time, $trainId );
				
				$this -> redirect('schedule/index');
			} else {
				$select = new Model_TrainService();
				$trainList = $select -> select();
				$this->view->trainList = $trainList;
				// Zend_Debug::dump($trainList);	
			}
		}
/////////////////////////////////////////////////edit///////////////////////////////////////////////////////////////
}//class

?>
