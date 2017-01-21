<?php

// Connect to the database
$con = mysqli_connect("localhost","root","","commers");
			
// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>