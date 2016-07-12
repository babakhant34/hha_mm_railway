<?php
include 'connection.php';
class Model_CustomerService{
private $select="";
private $insert="";
private $update="";
private $delete="";
private $findbyId="";

public function select(){
	$select = "SELECT * FROM customer";
	$ret = mysql_query($select);
	$arr = array();
	while ($row = mysql_fetch_assoc($ret)) {
		// $row['ak'] = "hello";
		$arr[] = $row;
	}
	return $arr;	
}

public function insert($name,$phone,$email,$password,$address){
	// Zend_Debug::dump($email);
	$insert = "INSERT into customer (name, phone, email, password, address)
	 values('$name', '$phone', '$email', '$password', '$address' )";
	mysql_query($insert);
}

public function update($customer_id,$name,$phone,$email,$address){
	$update = "update customer set name='$name', phone='$phone', email='$email', address='$address'
	 where customer_id = '$customer_id' ";
	mysql_query($update);
}
public function delete($customer_id){
	$delete = "delete from customer where customer_id='$customer_id'";
	mysql_query($delete);
}
public function findbyId($customer_id){
	$select = "select * from customer where customer_id='$customer_id'";
	$ret = mysql_query($select);
	$res = mysql_fetch_assoc($ret);
	return $res;
}

public function findbyEmail($email){
	$select = "select * from customer where email LIKE '$email%'";
	$ret = mysql_query($select);
	$res = array();
	while ($row = mysql_fetch_assoc($ret) ) {
		$res[] = $row;
	}
	return $res;
}

public function checkEmail($email){
	$select = "select email from customer where email='$email'";
	$ret = mysql_query($select);
	$row = mysql_num_rows($ret);
	return $row;
}

}
?>
 