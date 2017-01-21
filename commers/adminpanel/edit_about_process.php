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
		
		if($_POST['newatype']) {
			$newtitle = $_POST[newtitle];
			$newtext = $_POST[newtext];
			$newatype = $_POST[newatype];
			
			if($_POST['submit']) {

				$sql2 = "UPDATE about SET
						about_title = '$newtitle',
						about_text = '$newtext'
					WHERE  about_type = '$id' ";	
					
				if(mysqli_query($con, $sql2)) {
         			echo "Content changed! <br><br>
					<a href='view_about.php'>View about</a>";
				}
				else {
             		echo "Changing contents failed.<br><br>";
				}
				
			}
		}
		
		
	}
	
	// Close the mysql connection
	header ('location: view_about.php');
    $con->close(); 
	
?>


   
   </body>
</html>
