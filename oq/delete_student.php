<?php 
include 'db_connect.php';
extract($_GET);
$get = $conn->query("SELECT * FROM course where course_id=$id ")->fetch_array();
$qry = $conn->query("DELETE FROM course where course_id = $id ");
if($qry)
	echo true;
?>