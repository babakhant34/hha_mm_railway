<?php
include('connection.php');
class Model_BookingService{
private $insert="";
private $update="";
private $delete="";
private $findbyId="";

public function insert($customer_id,$quantity,$schedule_id){
	$insert = "INSERT into booking(customer_id,quantity,schedule_id,status) values('$customer_id','$quantity','$schedule_id','unprocess')";
	mysql_query($insert);
	
}
public function update($booking_id,$quantity,$status){
	$update = "update booking set quantity='$quantity',status='$status' where booking_id='$booking_id'";
	mysql_query($update);
}

public function delete($booking_id){
	$delete = "delete FROM booking where booking_id='$booking_id'";
	mysql_query($delete);
}
public function findbyId($booking_id){
	$select = "SELECT * FROM booking as b JOIN train as t JOIN customer as c 
	JOIN schedule as s WHERE b.customer_id = c.customer_id AND b.schedule_id = s.schedule_id AND 
	s.train_id = t.train_id AND b.booking_id = '$booking_id' ";
	$ret = mysql_query($select);
	$res = mysql_fetch_array($ret);
	return $res;
}
public function inquireAll(){
		$inquireAll = "SELECT * FROM booking";
		$ret = mysql_query($inquireAll);
		$numRow = mysql_num_rows($ret);
		$res = array();
		for($i=0;$i<=$numRow;$i++){
			$res[] = mysql_fetch_array($ret);
		}
		//$res = mysql_fetch_array($ret);
		return $res;
	}
public function inquireBySchedule($id){
	$select="select * from booking where schedule_id=$id";
	$ret = mysql_query($select);
		$numRow = mysql_num_rows($ret);
		$res = array();
		for($i=0;$i<$numRow;$i++){
			$res[] = mysql_fetch_array($ret);
		}
		//$res = mysql_fetch_array($ret);
		return $res;
}


public function inquireAllDb(){
	$allDb = "SELECT * FROM booking as b JOIN train as t JOIN customer as c 
	JOIN schedule as s WHERE b.customer_id = c.customer_id AND b.schedule_id = s.schedule_id AND 
	s.train_id = t.train_id";
	$ret = mysql_query($allDb);
		$numRow = mysql_num_rows($ret);
		$res = array();
		for($i = 0; $i<$numRow; $i++){
			$res[] = mysql_fetch_array($ret);
		}
		return $res;
}

public function confirmStatus($booking_id){
	$updatestatus = "update booking set status='confirm' where booking_id='$booking_id'";
	mysql_query($updatestatus);
		
}

public function rejectStatus($booking_id){
	$updatestatus = "update booking set status='reject' where booking_id='$booking_id'";
	mysql_query($updatestatus);
		
}

public function inquireConfirm($id){
	$inquireconfirm = "SELECT * FROM booking as b JOIN train as t JOIN customer as c 
	JOIN schedule as s WHERE b.customer_id = c.customer_id AND b.schedule_id = s.schedule_id AND 
	s.train_id = t.train_id AND b.status = 'confirm' AND s.schedule_id = $id ";
	$ret = mysql_query($inquireconfirm);
		$numRow = mysql_num_rows($ret);
		$res = array();
		for($i = 0; $i<$numRow; $i++){
			$res[] = mysql_fetch_array($ret);
		}
		return $res;
}

}
?>
 