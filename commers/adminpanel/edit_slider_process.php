<?php
	  ob_start();
	  include "php/connectdb.php";
	  include "php/sessionstart.php";
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

if(isset($_GET['id'])) {
		$id = $_GET['id'];
		
	$pic_name = $_POST[newname];

	$query = "SELECT pic_tmp
			  FROM pic
			  WHERE pic_id = $id";
	$result = mysqli_fetch_assoc(mysqli_query($con, $query));
	
	$file_name = $result[pic_tmp];
	echo $file_name."<br>";
	
	$file_type = $_FILES['newpic']['type'];
	if (($file_type == "image/gif")
		|| ($file_type == "image/jpeg")
		|| ($file_type == "image/jpg")
		|| ($file_type == "image/pjpeg")
		|| ($file_type == "image/x-png")
		|| ($file_type == "image/png"))
	{
		$filepath = "pic/".$file_name;
		unlink($filepath);
		
		$file_name = rand(1,99999).$_FILES['newpic']['name'];
		$file_tmp = $_FILES['newpic']['tmp_name'];
		$move = move_uploaded_file($file_tmp, "pic/" . $file_name);
	}
	
	if($_POST['submit']) {

		$sql2 = "UPDATE pic
				SET pic_name = '$pic_name',
					pic_tmp = '$file_name',
					pic_type = '$file_type'
				WHERE pic_id = $id";	
					
		if(mysqli_query($con, $sql2)) {
         	echo "Details changed! <br><br>
				<a href='view_banner.php'>View banner</a>";
		}
		else {
             echo "Changing details failed.<br><br>";
		}	
	}
}
		
	header ('location: view_slider.php');
    mysqli_close($con);
	
?>


   
   </body>
</html>
