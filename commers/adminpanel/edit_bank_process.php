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
		
	$bank_name = $_POST[newname];
	$bank_account = $_POST[newaccount];

	if($_POST['submit']) {

		$sql2 = "UPDATE bank
				SET bank_name = '$bank_name',
					bank_account = '$bank_account'
				WHERE bank_id = $id";	
					
		if(mysqli_query($con, $sql2)) {
         	echo "Bank account details changed! <br><br>
				<a href='view_bank.php'>View bank</a>";
		}
		else {
             echo "Changing bank account details failed.<br><br>";
		}	
	}
}
	// Close the mysql connection
	header ('location: view_bank.php');
    $con->close(); 
	
?>


   
   </body>
</html>
