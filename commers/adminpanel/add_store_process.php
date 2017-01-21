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
	
	$prod_name = $prod_tmp = $file_name = $file_type = $prod_text = $prod_price = $prod_pricedisc = $vid_type = $vid_name = "";
	
	$region_id = $_POST[region];
	$store_city = $_POST[city];
	$store_tmp = strtolower(str_replace(" ","-",$store_city));
	$store_address = $_POST[address];
	$store_map = $_POST[map];
	
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
		$move = move_uploaded_file($file_tmp, "pic/store/" . $file_name);
	}
	
	if(($_POST["region"] != "") && ($_POST["city"] != "")) 
	{	
		$sql = "INSERT INTO `store` (`store_city`, `store_address`, `store_img`, `store_map`, `region_id`)
                VALUES ('$store_city', '$store_address', '$file_name', '$store_map', '$region_id')";
					
		if(mysqli_query($con, $sql)) {
         	echo "Product saved! <br><br>
			<a href='view_store.php'>View list of products</a>";
		}
		else {
       		echo "Saving product failed.<br><br>";
		}	
	}
		
	else 
		echo "Please fill all required fields.";
		
}
else
	die("Wrong submission");
		
// Close the mysql connection
header ('location: view_store.php');
$con->close(); 
?>

   </body>
</html>
