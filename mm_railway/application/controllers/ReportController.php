<?php

class ReportController extends Zend_Controller_Action {
	
	public function indexAction(){

		$scheduleService = new Model_ScheduleService();
		$arrSchedule = $scheduleService->inquireAll();
		$this->view->scheduleList = $arrSchedule ;
	}

	public function showAction(){

		$id = $this->getRequest()->getParam('id');


		$bookingService = new Model_BookingService();
		$arrReport = $bookingService->inquireConfirm($id);
		$this->view->bookingList = $arrReport ;


	}
}

?>