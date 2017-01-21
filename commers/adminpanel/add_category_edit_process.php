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

//Make sure an Id was passed
if(isset($_GET['id'])) {
	
	//Get the ID
	$id = $_GET['id'];
	echo $id;
	
	//Make sure the ID is a valid ID
	if($id <= 0) {
		die('The ID is invalid!');
	}
	else {

		if (isset($_POST['submit'])) {

			$name = $_POST[name];
	  	
			if($_POST["name"]) {

					$sql = "INSERT INTO `category` (`cat_name`)
               	 			VALUES ('$name')";
					
					if(mysqli_query($con, $sql)) {
         				echo "News draft saved! <br><br>
						<a href='edit_prop.php?id=$id'>Back</a>";
					}
					else {
             			echo "Saving draft failed.<br><br>";
					}	
			}
			else 
				echo "Please fill all required fields.";
		
		}
		else
			die("Wrong submission");
	}
}
		
// Close the mysql connection
header ("location: edit_product.php?id=$id");
$con->close(); 
?>

   </body>
</html>
