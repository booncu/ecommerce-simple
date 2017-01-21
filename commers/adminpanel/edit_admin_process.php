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

	if($_POST["name"] && $_POST["password"] && $_POST["status"] ) {
	  
      		if (!isset($_POST['submit']))
            	die("Wrong submission");
			  
			$sql = "UPDATE admin 
					SET admin_name = '$_POST[name]', 
						admin_pw = '$_POST[password]',
						admin_fullname = '$_POST[fullname]',
						admin_email = '$_POST[email]',
						admin_phone = '$_POST[phone]',
						admin_status = '$_POST[status]'
					WHERE admin_id = $id";	
			
			if(mysqli_query($con, $sql)) {
         		echo "Admin data edited! <br><br>
				<a href='view_admin.php'>View list of admin</a>";
			}
			else {
             	echo "Editing admin data failed.<br><br>";
			}
	}
		
	else 
		echo "Please fill all required fields.";
		
}
	// Close the mysql connection
	header ('location: view_admin.php');
    $con->close(); 
	
?>


   
   </body>
</html>
