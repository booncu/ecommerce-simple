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
	
	if($_POST["name"] != "") 
	{	
		$name = $_POST[name];
		
		$file_type = $_FILES['image']['type'];
		
		if (($file_type == "image/gif")
			|| ($file_type == "image/jpeg")
			|| ($file_type == "image/jpg")
			|| ($file_type == "image/pjpeg")
			|| ($file_type == "image/x-png")
			|| ($file_type == "image/png"))
		{
			$file_name = rand(1,99999).$_FILES['image']['name'];
			$file_tmp = $_FILES['image']['tmp_name'];
			$move = move_uploaded_file($file_tmp, "pic/category/" . $file_name);
		}
		
		$sql = "INSERT INTO `category` (`cat_name`, `cat_img`)
                VALUES ('$name', '$file_name')";
					
		if(mysqli_query($con, $sql)) {
         	echo "New region saved! <br><br>
			<a href='view_category.php'>View list of region</a>";
		}
		else {
             echo "Saving region failed.<br><br>";
		}				
	}	
	else 
		echo "Please fill all required fields.";
		
}
else
	die("Wrong submission");
		
// Close the mysql connection
header ('location: view_category.php');
$con->close(); 
?>

   </body>
</html>
