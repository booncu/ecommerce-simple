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
	
	if($_POST["name"] != "") 
	{	
		$name = $_POST[name];
		
		$sql = "INSERT INTO `category` (`cat_name`)
                VALUES ('$name')";
					
		if(mysqli_query($con, $sql)) {
         	echo "New region saved! <br><br>
			<a href='add_product.php'>View list of region</a>";
		}
		else {
             echo "Saving region failed.<br><br>";
		}				
	}	
	else 
		echo "Please fill all required fields.";
		
}
else
	die("Wrong submission");
		
// Close the mysql connection
header ('location: add_product.php');
$con->close(); 
?>

   </body>
</html>
