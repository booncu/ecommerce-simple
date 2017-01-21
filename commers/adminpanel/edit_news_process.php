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
		
	$news_title = $_POST[newtitle];
	$news_text = $_POST[newtext];
	$news_status = $_POST[news_status];

	$query = "SELECT news_img
			  FROM news
			  WHERE news_id = $id";
	$result = mysqli_fetch_assoc(mysqli_query($con, $query));
	
	$file_all = $result[news_img];
	$n = $_POST['n'];
	echo $file_all."<br>";
	
	if ($n>0) {
		$file_all = "";
		
		echo 'TO DELETE';
		$image = explode(", ", $result[news_img]);
		$jum = count($image);
		for ($j=0; $j<$jum; $j++) {
			$filepath = "newspic/".$image["$j"];
			echo $filepath."<br>";
			unlink($filepath);
		}
		
		for ($i=0; $i<=$n-1; $i++) {
			$file_type = $_FILES['image'.$i]['type'];
			
			if (($file_type == "image/gif")
				|| ($file_type == "image/jpeg")
				|| ($file_type == "image/jpg")
				|| ($file_type == "image/pjpeg")
				|| ($file_type == "image/x-png")
				|| ($file_type == "image/png"))
				{
					
					$file_name = rand(1,99999).$_FILES['image'.$i]['name'];
					echo $file_name;
					$file_tmp = $_FILES['image'.$i]['tmp_name'];
					
					
				}
	
			$move = move_uploaded_file($file_tmp, "newspic/" . $file_name);
			if ($file_all == "")
			{
				$file_all = $file_name;
			}
			else
			{
				$file_all = $file_all.", ".$file_name;
			}
		}
	}
	
	if($_POST['submit']) {
		//echo $brand_name."<br>";
		echo $file_name."<br>";

		$sql2 = "UPDATE news
				SET news_title = '$news_title',
					news_text = '$news_text',
					news_img = '$file_all',
					news_status = '$news_status'
				WHERE news_id = $id";	
					
		if(mysqli_query($con, $sql2)) {
         	echo "News details changed! <br><br>
				<a href='view_news.php'>View news</a>";
		}
		else {
             echo "Changing news details failed.<br><br>";
		}	
	}
}

// Close the mysql connection
header ('location: view_news.php');
$con->close(); 
	
?>
   
   </body>
</html>
