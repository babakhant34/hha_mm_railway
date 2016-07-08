<?php

// include ('opt/lampp/htdocs/hha_l5_project/mm_railway/application/models/connection.php');
// include	('opt/lampp/htdocs/hha_l5_project/mm_railway/application/models/TrainService.php');

class TrainController extends Zend_Controller_Action {
	
public function indexAction()
		{
				$select = new Model_TrainService();
				$arrTrainList = $select->select();
				$this->view->trainList = $arrTrainList ;
				//Zend_Debug::dump($arrTrainList);
		}
/////////////////////////////////////////new/////////////////////////////////////////////////////////////////////////
public function newAction()
		{
			if ( $this->getRequest()->isPost() ) {
				$class = $this->getRequest()->getPost ('class');
				$numOfTrolley = $this -> getRequest () -> getPost ('numOfTrolley');
				$trainNumber = $this -> getRequest () -> getPost ('trainNumber');					
				$insert = new Model_TrainService();
				$insert->insert( $class, $numOfTrolley, $trainNumber );
					
				$this -> redirect('train/index');				
			} else {
				//code;	
			}
		}
///////////////////////////////////////////edit///////////////////////////////////////////////////////////////		
		public function editAction()
		{
			if ( $this->getRequest()->isPost() ) {
				$trainId = $this->getRequest () -> getPost ('trainId');
				$class = $this -> getRequest () -> getPost ('class');
				$numOfTrolley = $this->getRequest () -> getPost ('numOfTrolley');
				$trainNumber = $this->getRequest () -> getPost ('trainNumber');
				$update = new Model_TrainService();
				$update-> update( $trainId, $class, $numOfTrolley, $trainNumber );
				
				$this -> redirect ('train/index');
							
			} else {
				$trainId = $this -> getRequest() -> getParam('id');	
				$findbyId = new Model_TrainService();
				$result = $findbyId->findbyId($trainId);
				 
				$this->view->train = $result ;
			}
		}
		}//class
?>
