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
	
	$prod_name = $prod_tmp = $file_name = $file_type = $prod_text = $prod_price = $prod_pricedisc = $vid_type = $vid_name = $prod_desc = $prod_ic = "";

	$prod_name = $_POST[title];
	$prod_tmp = strtolower(str_replace(" ","-",$prod_name));
	$prod_category = $_POST[category];
	$prod_text = $_POST[text];
	$prod_desc = $_POST[desc];
	$prod_price = $_POST[price];
	$prod_pricedisc = $_POST[pricedisc];
	$prod_weight = $_POST[weight];
	$status_unggulan = $_POST[stat_unggulan];
	$prod_special = $_POST[special];
	$prod_status = $_POST[prod_status];
	$prod_ic = $_POST[ic];
	
	$brand = $_POST['brand'];
  	if(empty($brand)) 
 	{
    	$prod_brand = "";
  	} 
  	else
  	{
    	$N = count($brand);
		echo $N."<br>";
 		
    	for($i=0; $i < $N; $i++)
    	{
			if ($prod_brand != "") {
				$prod_brand = $prod_brand.",".$brand["$i"];
			}
			else
				$prod_brand = $brand["$i"];
    	}
		echo $prod_brand."<br>";
  	}
	
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
		$move = move_uploaded_file($file_tmp, "product/pic/" . $file_name);
	}
	
	$vid_type = $_FILES['video']['type'];
	if (($vid_type == "video/mp4")
		|| ($vid_type == "video/x-flv"))
	{
		$vid = $_FILES['video']['name'];
		$vid_name = rand(1,99999).$vid;
		$vid_tmp = $_FILES['video']['tmp_name'];
		$move2 = move_uploaded_file($vid_tmp, "product/vid/" . $vid_name);
	}
	  
	if($_POST["title"]) {
		
		if($_POST['submit']) {
			echo $prod_name;
			  
			$sql = "INSERT INTO `product` (`prod_name`, `prod_tmp`, `prod_category`, `prod_brand`, `prod_img`, `prod_text`, `prod_price`, `prod_pricedisc`, `prod_weight`, `prod_vid`, `prod_vidtmp`, `prod_status`, `prod_special`, `prod_unggulan`,`prod_desc`,`prod_cil`)
                VALUES ('$prod_name', '$prod_tmp', '$prod_category', '$prod_brand', '$file_name', '$prod_text', '$prod_price', '$prod_pricedisc', '$prod_weight', '$vid', '$vid_name', '$prod_status', '$prod_special', '$status_unggulan','$prod_desc','$prod_ic')";
				
			if(mysqli_query($con, $sql)) {
         		echo "Product saved! <br><br>
				<a href='view_product.php'>View list of products</a>";
			}
			else {
             	echo "Saving product failed.<br><br>";
			}	
		}
	}
		
	else 
		echo "Please fill all required fields.";
		
	}
	else
		die("Wrong submission");
		
	
	// Close the mysql connection
	header ('location: view_product.php');
    $con->close(); 
?>

   </body>
</html>