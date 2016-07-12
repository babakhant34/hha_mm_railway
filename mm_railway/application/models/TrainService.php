<?php
include('connection.php');
class Model_TrainService{
private $select="";
private $insert="";
private $update="";
private $delete="";
private $findbyId="";

public function select(){
	$select = "SELECT * FROM train";
	$ret = mysql_query($select);
	$arr = array();
	while ($row = mysql_fetch_array($ret)) {
		$arr[] = $row;
	}
	return $arr;
}

public function insert( $class, $num_of_trolley, $train_number){
	$insert = "INSERT into train ( class, num_of_trolley, train_number )
	values( '$class', '$num_of_trolley', '$train_number' )";
	mysql_query($insert);
}

public function update($train_id, $class, $num_of_trolley, $train_number){
	$update = "update train set class= '$class', num_of_trolley= '$num_of_trolley', train_number='$train_number' 
	where train_id = '$train_id' ";
	mysql_query($update);
}
public function delete($train_id){
	$delete = "delete from train where train_id= '$train_id' ";
	mysql_query($delete);
}
public function findbyId($train_id){
	$select = "select * from train where train_id= '$train_id' ";
	$ret = mysql_query($select);
	$res = mysql_fetch_assoc($ret);
	return $res;
}
}
?>
 