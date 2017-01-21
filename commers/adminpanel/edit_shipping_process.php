<?php
	  ob_start();
	  include "php/connectdb.php";
	  include "php/sessionstart.php";
	  include "php/left.php";
?>

<!doctype html>
<html>
<head>
<title>Bursa Moge Administrator</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/home.css" />
<link rel="shortcut icon" href="images/favicon.png">
<!-- accordion styling -->	
	<link rel="stylesheet" type="text/css" href="css/tabs-accordion.css"/> 
<script type="text/javascript" src="js/jquery.tools.min.js"></script>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="js/jwplayer/jwplayer.js"></script>
<script type="text/javascript">jwplayer.key="BejWJLx1E+lZwDQ9+oYpcTrdeGastP1tN8w5pg==";</script>
<link rel="stylesheet" type="text/css" href="css/th.css" />

</head>

<body>       
<?php

// Make sure an ID was passed
if(isset($_GET['id'])) {
		$id = $_GET['id'];
		
	$shipping_city = $_POST[newcity];
	$shipping_district = $_POST[newdistrict];
	$shipping_reg = $_POST[newreg];
	$shipping_ex = $_POST[newex];

	if($_POST['submit']) {

		$sql2 = "UPDATE shipping
				SET shipping_city = '$shipping_city',
					shipping_district = '$shipping_district',
					shipping_reg = '$shipping_reg',
					shipping_ex = '$shipping_ex'
				WHERE shipping_id = $id";	
					
		if(mysqli_query($con, $sql2)) {
         	echo "Shipping details changed! <br><br>
				<a href='view_shipping.php'>View shipping</a>";
		}
		else {
             echo "Changing shipping details failed.<br><br>";
		}	
	}
}
	// Close the mysql connection
	header ('location: view_shipping.php');
    $con->close(); 
	
?>


   
   </body>
</html>
