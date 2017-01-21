<?php
	  ob_start();
	  include "php/connectdb.php";
	  include "php/sessionstart.php";
	  include "php/left.php";
	  include "php/footer.php";
?>

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

	//  if (!isset($_POST['submit']))
    //  	die("Wrong submission");
	  
	if($_POST["name"] && $_POST["password"] && $_POST["status"] ) {
	  
      		if (!isset($_POST['submit']))
            	die("Wrong submission");
			  
			$sql = "INSERT INTO `admin` (`admin_name`, `admin_pw`, `admin_fullname`, `admin_email`, `admin_phone`, `admin_status`)
                VALUES ('$_POST[name]', '$_POST[password]', '$_POST[fullname]', '$_POST[email]', '$_POST[phone]', '$_POST[status]')";
					
			if(mysqli_query($con, $sql)) {
         		echo "A new admin added! <br><br>
				<a href='view_admin.php'>View list of admin</a>";
			}
			else {
             	echo "Adding a new admin failed.<br><br>";
			}
				
			// Close the mysql connection
			header ('location: view_admin.php');
    		$con->close(); 
	}
		
	else 
		echo "Please fill all required fields.";
		
?>
            
</body>
</html>