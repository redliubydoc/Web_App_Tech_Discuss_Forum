<?php
	$database_serverName = "";
	$database_userName = "";
	$database_password = "";
	$database = "idiscuss";
 
	$conn = mysqli_connect($database_serverName, $database_userName, $database_password, $database);

	if(!$conn)
	    die("failed to connect database");	
?>