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

	$sql2 = "UPDATE setting
				SET setting_fb = '$_POST[urlfb]',
					setting_twitter = '$_POST[urltwitter]',
					setting_url = '$_POST[urlsetting]',
					setting_emailadmin = '$_POST[emailadmin]',
					setting_emailsendreceive = '$_POST[emailsendreceive]'
				WHERE setting_id = '1'";	
					
	if(mysqli_query($con, $sql2)) {
		echo "Setting changed! <br><br>
			<a href='view_product.php'>View setting</a>";
	}
	else {
		echo "Changing setting details failed.<br><br>";
	}	

	// Close the mysql connection
	header ('location: setting.php');
    $con->close(); 
	
?>


   
   </body>
</html>
