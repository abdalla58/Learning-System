<?php
include 'db_connect.php';
	
	$qry = $conn->query("SELECT `id`,`name`,`email` FROM `user` ");
	if($qry){
		echo json_encode($qry->fetch_array());
	}
?>