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

		$id = $_GET['id'];
		$st = $_GET['st'];
		$sql1= "SELECT * FROM comment WHERE `id_com`='$id' ";
		
		switch ($st){
		case "N":
			$sql2 = "UPDATE `comment`
				SET `status` = 'Y'
				WHERE `id_com` = $id";	
		mysqli_query($con, $sql2);
		break;
		case"Y":
			$sql2 = "UPDATE `comment`
				SET `status` = 'N'
				WHERE `id_com` = $id";	
		mysqli_query($con, $sql2);
		break;
}
	// Close the mysql connection
	header ("location: view_comments.php");
    $con->close(); 
	
?>


   
   </body>
</html>
