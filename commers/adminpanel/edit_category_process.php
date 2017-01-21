<?php
	  ob_start();
	  include "php/connectdb.php";
	  include "php/sessionstart.php";
	  include "php/left.php";
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

// Make sure an ID was passed
if(isset($_GET['id'])) {
		$id = $_GET['id'];

	if($_POST['submit']) {
		$name = $_POST[newname];

		$sql2 = "UPDATE category
				SET cat_name = '$name'
				WHERE cat_id = $id";	
					
		if(mysqli_query($con, $sql2)) {
         	echo "Region details changed! <br><br>
				<a href='view_category.php'>View region</a>";
		}
		else {
             echo "Changing region details failed.<br><br>";
		}	
	}
}
	// Close the mysql connection
	header ('location: view_category.php');
    $con->close(); 
	
?>


   
   </body>
</html>
