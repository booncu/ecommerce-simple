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
		
	$brand_name = $_POST[newname];

	$query = "SELECT brand_img
			  FROM brand
			  WHERE brand_id = $id";
	$result = mysqli_fetch_assoc(mysqli_query($con, $query));
	
	$file_name = $result[brand_img];
	echo $file_name."<br>";
	
	$file_type = $_FILES['newimage']['type'];
	if (($file_type == "image/gif")
		|| ($file_type == "image/jpeg")
		|| ($file_type == "image/jpg")
		|| ($file_type == "image/pjpeg")
		|| ($file_type == "image/x-png")
		|| ($file_type == "image/png"))
	{
		$filepath = "pic/brand/".$file_name;
		unlink($filepath);
		
		$file_name = rand(1,99999).$_FILES['newimage']['name'];
		$file_tmp = $_FILES['newimage']['tmp_name'];
		$move = move_uploaded_file($file_tmp, "pic/brand/" . $file_name);
	}
	
	if($_POST['submit']) {
		echo $brand_name."<br>";
		echo $file_name."<br>";

		$sql2 = "UPDATE `brand`
				SET brand_name = '$brand_name',
					brand_img = '$file_name'
				WHERE brand_id = '$id' ";	
					
		(mysqli_query($con, $sql2));
         	//echo "Brand details changed! <br><br>
				//<a href='view_brand.php'>View brand</a>";
		//}
		//else {
             //echo "Changing brand details failed.<br><br>";
		//}	
	}
}
	// Close the mysql connection
	header ('location: view_brand.php');
    $con->close(); 
	
?>


   
   </body>
</html>
