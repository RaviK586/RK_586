<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "rk_bank";

	$connection = mysqli_connect($servername, $username, $password, $dbname);

	if(!$connection){
		die("Could not connect to the database due to the following error --> ".mysqli_connect_error());
	}

?>