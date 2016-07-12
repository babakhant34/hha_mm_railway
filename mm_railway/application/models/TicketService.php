<?php
include('connection.php');
class Model_TicketService{
private $insert="";
private $update="";
private $delete="";
private $findbyId="";
public function insert($booking_id, $amount, $customer_id){
	$insert = "INSERT into ticket(booking_id,amount,customer_id) values('$booking_id',$amount,'$customer_id')";
	mysql_query($insert);
}
public function update($ticket_id,$amount){
	$update = "update ticket set amount='$amount' where ticket_id='$ticket_id'";
	mysql_query($update);
}
public function delete($ticket_id){
	$delete = "delete from ticket where ticket_id='$ticket_id'";
	mysql_query($delete);
}
public function findbyId($ticket_id){
	$select = "select * from ticket where ticket_id='$ticket_id'";
	$ret = mysql_query($select);
	$res = mysql_fetch_array($ret);
	return $res;
}

	public function inquireAll(){
		$inquireAll = "SELECT * FROM ticket";
		$ret = mysql_query($inquireAll);
		$numRow = mysql_num_rows($ret);
		$res = array();
		for($i=0;$i<=$numRow;$i++){
			$res[] = mysql_fetch_array($ret);
		}
		//$res = mysql_fetch_array($ret);
		return $res;
	}
	public function inquireTicketByBookingId($id){
		$select="select * from ticket where booking_id='$id'";
		$ret = mysql_query($select);
		$numRow = mysql_num_rows($ret);
		$res = array();
		for($i=0;$i<=$numRow;$i++){
			$res[] = mysql_fetch_array($ret);
		}
		//$res = mysql_fetch_array($ret);
		return $res;
		
	}
}
?>
 