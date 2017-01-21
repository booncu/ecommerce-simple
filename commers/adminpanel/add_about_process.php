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
	
	if (isset($_POST["atype"])) {
		
		$about_title = $_POST[title];
		
		$about_text = $_POST[text];
		
		$about_type = $_POST[atype];
		
		$sql = "INSERT INTO `about` (`about_type`, `about_title`, `about_text`)
                VALUES ('$about_type', '$about_title', '$about_text')";
					
		if(mysqli_query($con, $sql)) {
         	echo "Content saved! <br><br>
			<a href='view_about.php'>View content</a>";
		}
		else {
             echo "Saving content failed.<br><br>";
		}			
	}	
	else 
		echo "Please choose page type.";
		
}
else
	die("Wrong submission");
		
// Close the mysql connection
header ('location: view_about.php');
$con->close(); 
?>

   </body>
</html>
