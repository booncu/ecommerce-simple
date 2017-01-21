<?php
	  //ob_start();
	  include "php/connectdb.php";
	  include "php/sessionstart.php";
	  include "php/left.php";
	  include "php/footer.php";
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

$left = printleft();

echo '<div class="cc_right">

				<div class="cn_head">Send Newsletter</div>
				<div class="cn_cont">';

	if (isset($_POST['submit']) || isset($_POST['publish'])) {

		$title = $_POST[title];
		$tmp = strtolower(str_replace(" ","-",$title));
		$text = $_POST[text];
	  
	if($_POST["title"]) {
		
		if($_POST['submit']) {
			  
			$sql = "INSERT INTO `newsletter` (`nletter_title`, `nletter_tmp`, `nletter_text`)
                VALUES ('$title', '$tmp', '$text')";
					
			if(mysqli_query($con, $sql)) {

				$sql2 = "SELECT user_email
						FROM user";
						
				$result2 = mysqli_query($con, $sql2);
	
				$headers = 'From: admin@readboy.com' . "\r\n";
				
				while ($row2 = mysqli_fetch_assoc($result2)) {
					$to      = $row2[user_email];
					mail($to, $title, $text, $headers);
					
					echo "Newsletter sent to ".$to."! <br><br>
					<a href='view_newsletter.php'>View newsletter</a>";
				}
			}
			else {
             	echo "Sending newsletter failed.<br><br>";
			}
		}
	}
		
	else 
		echo "Please fill all required fields.";
		
	}
	else
		die("Wrong submission");
		
	// Close the mysql connection
	//header ('location: view_newsletter.php');
    $con->close(); 
	
$footer = printfooter();
?>

   </body>
</html>
