<?php
	$connect = mysqli_connect("localhost", "root", "", "db2");
	mysqli_set_charset($connect, 'UTF8');

	if($connect === false){
	    die("ERROR: Could not connect. " . $connect->connect_error);
	}
?> 

