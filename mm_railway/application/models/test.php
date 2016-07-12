<?php
	// include('Model_BookingService.php');
	include	('CustomerService.php');
	// include('Model_ScheduleService.php');
	// include('Model_TicketService.php');
	// include('Model_TrainService.php');
	// $bookingService = new Model_BookingService();
	//$bookingService->insert('2','3','4','5');
	//$bookingService->update('1',1);
	//$bookingService->delete('1');
	//$res=$bookingService->findbyId('1');
	//$res = mysql_fetch_array($res);
	//echo $res['booking_id'].">>>>>>>>>>>>>>";
	// foreach($res as $arr) {
		// echo $arr['booking_id'];	
	// }
	
	$CustomerService = new Model_CustomerService();
	$CustomerService -> insert('781','111',"phone",'email','password','address');
	//$CustomerService -> update('1','3','4','5','6');
	//$CustomerService -> delete('1');
	$res=$CustomerService -> findbyId('781');
	echo $res['email']."<<<<<<<<<<<<<<<";
	
	// $ScheduleService = new Model_ScheduleService();
	//$ScheduleService -> insert('1','2','3','4','5');
	//$ScheduleService -> update('1','3','4','5','6');
	//$ScheduleService -> delete('1');
	//$res=$ScheduleService -> findbyId('1');
	//echo $res['schedule_id']."<<<<<<<<<<<<<<<";
	
	// $TicketService = new Model_TicketService();
	//$TicketService -> insert('1','2','3','4');
	//$TicketService -> update('1','0');
	//$TicketService -> delete('1');
	//$res=$TicketService -> findbyId('1');
	//echo $res['ticket_id']."<<<<<<<<<<<<<<<";
	
	// $TrainService = new Model_TrainService();
	//$TrainService -> insert('1','2','3','4');
	//$TrainService -> update('1','3','4','5');
	//$TrainService -> delete('1');
	//$res=$TrainService -> findbyId('1');
	//echo $res['train_id']."<<<<<<<<<<<<<<<";
?>