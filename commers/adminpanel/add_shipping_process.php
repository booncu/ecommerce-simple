<?php
	  ob_start();
	  include "php/connectdb.php";
	  include "php/sessionstart.php";
?>

<!doctype html>
<html>
<head>
<title>ReadBoy Administrator</title>
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

if (isset($_POST['submit'])) {
	
	if (($_POST["city"] != "") && ($_POST["district"] != "")) {
		
		$shipping_city = $_POST[city];
		$shipping_district = $_POST[district];
		$shipping_reg = $_POST[reg];
		$shipping_ex = $_POST[ex];
		
		$sql = "INSERT INTO `shipping` (`shipping_city`, `shipping_district`, `shipping_reg`, `shipping_ex`)
                VALUES ('$shipping_city', '$shipping_district', '$shipping_reg', '$shipping_ex')";
					
		if(mysqli_query($con, $sql)) {
         	echo "New shipping details added! <br><br>
			<a href='view_shipping.php'>View shipping list</a>";
		}
		else {
             echo "Adding bank failed.<br><br>";
		}			
	}	
	else 
		echo "Please fill in all required fields.";
		
}
else
	die("Wrong submission");
		
// Close the mysql connection
header ('location: view_shipping.php');
$con->close(); 
?>

   </body>
</html>
