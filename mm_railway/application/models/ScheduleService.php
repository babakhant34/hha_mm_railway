<?php
include('connection.php');
class Model_ScheduleService{
	private $insert="";
	private $update="";
	private $delete="";
	private $findbyId="";
	private $inquireAll;
	public function insert($destination_city, $price, $date, $time, $train_id){
		$insert = "INSERT into schedule ( destination_city, price, date, time, train_id )
		values('$destination_city', '$price', '$date','$time','$train_id')";
		mysql_query($insert);
	}
	public function update($schedule_id,$destination_city,$date,$time){
		$update = "update schedule set destination_city='$destination_city',date='$date',time='$time'  where schedule_id=$schedule_id";
		mysql_query($update);
	}
	public function delete($schedule_id){
		$delete = "delete from schedule where schedule_id='$schedule_id'";
		mysql_query($delete);
	}
	public function findbyId($schedule_id){
		$select = "select * from schedule where schedule_id='$schedule_id'";
		$ret = mysql_query($select);
		$res = mysql_fetch_array($ret);
		return $res;
	}
		public function inquireAll(){
		$inquireAll = "SELECT * FROM schedule";
		$ret = mysql_query($inquireAll);
		$numRow = mysql_num_rows($ret);
		$res = array();
		for($i=0;$i < $numRow;$i++){
			$tres= mysql_fetch_array($ret);
			$trainService = new Model_TrainService();
			$train = $trainService->findbyId($tres['train_id']);
			//$train = mysqli_fetch_array($train);

			$tres['train'] = $train['train_number'];
			$res[] = $tres;

		}
		//Zend_Debug::dump($res);
		return $res;
	}

	
}
?>
 