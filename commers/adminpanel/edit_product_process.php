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
		
	$prod_name = $_POST[newtitle];
	$prod_tmp = strtolower(str_replace(" ","-",$prod_name));
	$prod_category = $_POST[newcategory];
	$prod_text = $_POST[newtext];
	$prod_desc = $_POST[newdesc];
	$prod_price = $_POST[newprice];
	$prod_pricedisc = $_POST[newpricedisc];
	$prod_weight = $_POST[newweight];
	$prod_status = $_POST[prod_status];
	$prod_special = $_POST[special];
	$stat_unggulan = $_POST[stat_unggulan];
	$prod_ic = $_POST[newic];
	
	$brand = $_POST['newbrand'];
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
	
	$query = "SELECT prod_img, prod_vid, prod_vidtmp
			  FROM product
			  WHERE prod_id = $id";
	$result = mysqli_fetch_assoc(mysqli_query($con, $query));
	
	$file_name = $result[prod_img];
	$vid = $result[prod_vid];
	$vid_name = $result[prod_vidtmp];
	
	$file_type = $_FILES['newimage']['type'];
	if (($file_type == "image/gif")
		|| ($file_type == "image/jpeg")
		|| ($file_type == "image/jpg")
		|| ($file_type == "image/pjpeg")
		|| ($file_type == "image/x-png")
		|| ($file_type == "image/png"))
	{
		$filepath = "product/pic/".$file_name;
		unlink($filepath);
		
		$file_name = rand(1,99999).$_FILES['newimage']['name'];
		$file_tmp = $_FILES['newimage']['tmp_name'];
		$move = move_uploaded_file($file_tmp, "product/pic/" . $file_name);
	}
	 
	$vid_type = $_FILES['newvid']['type'];
	if (($vid_type == "video/mp4")
		|| ($vid_type == "video/x-flv"))
	{
		$filepath2 = "product/vid/".$vid_name;
		unlink($filepath2);
		
		$vid = $_FILES['newvid']['name'];
		$vid_name = rand(1,99999).$vid;
		$vid_tmp = $_FILES['newvid']['tmp_name'];
		$move2 = move_uploaded_file($vid_tmp, "product/vid/" . $vid_name);
	}
	
	
	if($_POST['submit']) {
		echo $prod_name."<br>";
		echo $prod_tmp."<br>";
		echo $file_name."<br>";
		echo $prod_text."<br>";
		echo $prod_desc."<br>";
		echo $prod_price."<br>";
		echo $prod_pricedisc."<br>";
		echo $vid."<br>";
		echo $vid_tmp."<br>";
		
		$sql2 = "UPDATE product
				SET prod_name = '$prod_name',
					prod_tmp = '$prod_tmp',
					prod_category = '$prod_category',
					prod_brand = '$prod_brand',
					prod_img = '$file_name',
					prod_text = '$prod_text',
					prod_price = '$prod_price',
					prod_pricedisc = '$prod_pricedisc',
					prod_weight = '$prod_weight',
					prod_vid = '$vid',
					prod_vidtmp =  '$vid_name',
					prod_status = '$prod_status',
					prod_special = '$prod_special',
					prod_unggulan = '$stat_unggulan',
					prod_desc = '$prod_desc',
					prod_cil = '$prod_ic'
				WHERE prod_id = '$id' ";	
					
		if(mysqli_query($con, $sql2)) {
         	echo "Product details changed! <br><br>
				<a href='view_product.php'>View products</a>";
		}
		else {
             echo "Changing product details failed.<br><br>";
		}	
	}
	
}
	// Close the mysql connection
	header ('location: view_product.php');
    $con->close(); 
	
?>


   
   </body>
</html>