<?php 
include 'db_connect.php';
extract($_GET);
$get = $conn->query("SELECT * FROM user where id=$id ")->fetch_array();
$qry = $conn->query("DELETE FROM user where id = $id ");
if($qry)
	echo true;
?>