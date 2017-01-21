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

		$title = $_POST[title];
		$tmp = strtolower(str_replace(" ","-",$title));
		$text = $_POST[text];
		$news_status = $_POST[news_status];
	
		if (($file_type == "image/gif")
				|| ($file_type == "image/jpeg")
				|| ($file_type == "image/jpg")
				|| ($file_type == "image/pjpeg")
				|| ($file_type == "image/x-png")
				|| ($file_type == "image/png"))
				{
		$file_name = rand(1,99999).$_FILES['image']['name'];
		$file_tmp = $_FILES['image']['tmp_name'];}
	
		$move = move_uploaded_file($file_tmp, "newspic/" . $file_name);
	  
		if($_POST["title"]) {
		
			if($_POST['submit']) {
			  
				$sql = "INSERT INTO `news` (`news_title`, `news_tmp`, `news_img`, `news_text`, `news_status`)
               	 	VALUES ('$title', '$tmp', '$file_name', '$text', '$news_status')";
					
				if(mysqli_query($con, $sql)) {
         			echo "News draft saved! <br><br>
					<a href='view_news.php'>View list of admin</a>";
				}
				else {
             		echo "Saving draft failed.<br><br>";
				}		
			}
		}
		
		else 
			echo "Please fill all required fields.";
		
	}
	else
		die("Wrong submission");
		
	// Close the mysql connection
	header ('location: view_news.php');
    $con->close(); 
?>

   </body>
</html>
