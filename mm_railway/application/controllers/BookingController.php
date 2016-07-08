<?php

	class BookingController extends Zend_Controller_Action {
		public function indexAction()
		{
			$select = new Model_BookingService();
			$arrBookingList = $select->inquireAllDb();
			$this->view->bookingList = $arrBookingList ;
			// Zend_Debug::dump($arrBookingList);
		}
////////////////////////////////////////////////new///////////////////////////////////////////////////////////////////
	public function newAction()
		{
			$_SESSION['cusId'] = 1;
			if ( $this->getRequest()->isPost() ) {
				$cusId = $this->getRequest()->getPost ('cusId');
				$cusName = $this -> getRequest () -> getPost ('cusName');
				$cusPhone = $this -> getRequest () -> getPost ('cusPhone');
				$address = $this -> getRequest () -> getPost ('address');
				$numOfTicket = $this -> getRequest () -> getPost ('numOfTicket');
				$scheduleId = $this -> getRequest () -> getPost ('scheduleId');
				
				$insert = new Model_BookingService();
				$insert->insert( $cusId, $numOfTicket, $scheduleId);
				
				$this -> redirect('booking/index');
			} else {
				$cusId = $_SESSION['cusId'];
				// $cusId = "1";
				$scheduleId = $this->getRequest()->getParam('id');
				$customerService = new Model_CustomerService();
				$customer = $customerService->findbyId($cusId);
				
				$cusId = $customer['customer_id'];
				$cusName = $customer['name'];
				$cusPhone = $customer['phone'];
				$address = $customer['address'];
				
				$this->view->cusId = $cusId;
				$this->view->cusName = $cusName;
				$this->view->cusPhone = $cusPhone;
				$this->view->address = $address;
				$this->view->scheduleId = $scheduleId ;	
			}
		}
////////////////////////////////////////////////choose//////////////////////////////////////////////////////
		public function chooseAction()
		{
			$select = new Model_ScheduleService();
			$arrScheduleList = $select->inquireAll();
			//Zend_Debug::dump($arrScheduleList);
			$this->view->scheduleList = $arrScheduleList ;
		}
		public function generateAction()
		{
			$id = $this->getRequest()->getParam('id');
			$select = new Model_BookingService();
			$arrId = $select->findbyId($id);
			$quantity = $arrId['quantity'];
			$bookingId = $arrId['booking_id'];
			$customerId = $arrId['customer_id'];
			$price = $arrId['price'];
			
			$ticketService = new Model_TicketService();
			for ( $i=1; $i <= $quantity ; $i++ ){
				$ticketService->insert($bookingId, $price, $customerId);
			}
			
			$bookingService = new Model_BookingService();
			$bookingService->updatestatus($bookingId);
			$this -> redirect('booking/index');
			
			// $this->view->scheduleList = $arrScheduleList ;
		}
		
	}//class
?>
