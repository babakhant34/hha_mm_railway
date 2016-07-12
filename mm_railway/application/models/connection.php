<?php
$host="localhost";
$user="root";
$pass="";
$db="mm_railway";
$con=mysql_connect($host,$user,$pass)or die("Couldn't connect database");
mysql_select_db($db);
?>