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
	
	if (($_POST["name"] != "") && ($_POST["account"] != "")) {
		
		$bank_name = $_POST[name];
		
		$bank_account = $_POST[account];
		
		$sql = "INSERT INTO `bank` (`bank_name`, `bank_account`)
                VALUES ('$bank_name', '$bank_account')";
					
		if(mysqli_query($con, $sql)) {
         	echo "A new bank account added! <br><br>
			<a href='view_bank.php'>View bank</a>";
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
header ('location: view_bank.php');
$con->close(); 
?>

   </body>
</html>
