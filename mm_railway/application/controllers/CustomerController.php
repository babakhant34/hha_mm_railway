<?php
	// include ('opt/lampp/htdocs/hha_l5_project/mm_railway/application/models/connection.php');
	// include	('opt/lampp/htdocs/hha_l5_project/mm_railway/application/models/CustomerService.php');

	class CustomerController extends Zend_Controller_Action {
		public function indexAction()
		{
			if ($this->getRequest()->isPost()) {
				$email = $this->getRequest()->getPost('txtSearch');
				$findbyEmail = new Model_CustomerService();
				$search = $findbyEmail->findbyEmail($email);
				
				if($search){
				$this->view->indexcustomer = array($search) ;
				} else {
				$str = "There is no result" ;
				$this->view->noresult = $str;
				}
				
			} else {
				$select = new Model_CustomerService();
				$arrView = $select->select();
				$this->view->indexcustomer = $arrView ;
			}
		}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
		public function newAction()
		{
			if ( $this->getRequest()->isPost() ) {
				$email = $this->getRequest()->getPost ('txtemail');
				$password = $this -> getRequest () -> getPost ('password');
				$reenterpassword = $this -> getRequest () -> getPost ('reenterpassword');
				
				$checkEmail = new Model_CustomerService();
				$check = $checkEmail->checkEmail ($email);
				Zend_Debug::dump ($check);
				if ($check < 1 ) {
					if ($password == $reenterpassword) {
					
				$name = $this -> getRequest () -> getPost ('txtname');
				$phone = $this -> getRequest () -> getPost ('txtphone');
				$email = $this -> getRequest () -> getPost ('txtemail');
				$password = $this -> getRequest () -> getPost ('password');
				$address = $this -> getRequest () -> getPost ('address');
					
					$insert = new Model_CustomerService();
					$insert->insert( $name, $phone, $email, $password, $address );
					
					$this -> redirect('customer/index');	
					} else {
					$this->view->errors = array("Password pair does not match") ;
				} } else {
					$this->view->errors = array("Your email has already registered!!") ;
				}						
			} else {
				//code	
			}
		}
/////////////////////////////////////////////////edit///////////////////////////////////////////////////////////////		
		public function editAction()
		{
			if ( $this->getRequest()->isPost() ) {
				$email = $this -> getRequest () -> getPost ('txtemail');
				$editemail = $this->getRequest () -> getPost ('txteditemail');
				if ( $email == $editemail ) {
						$customer_id = $this->getRequest() -> getPost ('txtid');
						$name = $this -> getRequest () -> getPost ('txtname');
						$phone = $this -> getRequest () -> getPost ('txtphone');
						$address = $this -> getRequest () -> getPost ('address');
				
						$update = new Model_CustomerService();
						$update-> update($customer_id, $name, $phone, $editemail, $address );
				
						$this -> redirect ('customer/index');
				} else {
					$checkEmail = new Model_CustomerService();
					$check = $checkEmail->checkEmail ($editemail);
					if($check < 1){
						$customer_id = $this->getRequest() -> getPost ('txtid');
						$name = $this -> getRequest () -> getPost ('txtname');
						$phone = $this -> getRequest () -> getPost ('txtphone');
						$address = $this -> getRequest () -> getPost ('address');
				
						$update = new Model_CustomerService();
						$update-> update($customer_id, $name, $phone, $editemail, $address );
				
						$this -> redirect ('customer/index');
					} else {
						$str = "This email has already registered!" ; 
						$this->view->error = $str ;
						$customer_id = $this -> getRequest() -> getParam('customer_id');	
						$findbyId = new Model_CustomerService();
						$result = $findbyId->findbyId($customer_id);
						$this->view->editcustomer = $result ;			
					}
				}				
			} else {
				$customer_id = $this -> getRequest() -> getParam('customer_id');	
				$findbyId = new Model_CustomerService();
				$result = $findbyId->findbyId($customer_id);
				$this->view->editcustomer = $result ;
			}
		}

/////////////////////////////////////////////////delete///////////////////////////////////////////////////////////////
		
		public function deleteAction()
		{
			$yes = $this->getRequest()->getParam('button');
			
			if ($yes == "yes") {
				$customer_id = $this->getRequest()->getParam('customer_id');
				$delete = new Model_CustomerService();
				$delete->delete($customer_id);
				$this -> redirect ('customer/index');
			} else {
				$customer_id = $this -> getRequest() -> getParam('customer_id');	
				$findbyId = new Model_CustomerService();
				$result = $findbyId->findbyId($customer_id);
				$this->view->editcustomer = $result ;
			}
		}
	}
?>
