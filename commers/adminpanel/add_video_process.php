<?php
	  ob_start();
	  include "php/connectdb.php";
	  include "php/sessionstart.php";
	  include "youtube/get_id.php";
	  include "youtube/get_det.php";
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

if (isset($_POST['submit'])) 
{
	$vid_url = $_POST[vidurl];
	
	$urlData = parse_url($vid_url);
	if($urlData["host"] == 'www.youtube.com') 
	{
		// Move ahead 
 		echo "true youtube<br>";
	}
	else
	{
		 return 0;
	} 
	
	echo $vid_url . "<br>";
	
	$yt_id = getID($vid_url);
	echo $yt_id . "<br><br>";
	
	$yt_det = getDet($yt_id);
	
	$vid_title = $yt_det->title;
	$vid_thumb = $yt_det->thumbnailURL;
	$vid_length = $yt_det->length;
	$vid_count = $yt_det->viewCount;
	$vid_rating = $yt_det->rating;
	
	echo "Title: " . $vid_title . "<br>";
	echo "Thumbnail: <img src='" . $vid_thumb . "' /><br>";
	echo "Watch Video: <a href='" . $yt_det->watchURL . "'>Watch here</a><br>";
	echo "Description: " . $yt_det->description . "<br>";
	echo "Watched: " . $vid_count . "<br>";
	echo "Length (in seconds): " . $vid_length . "<br>";
	echo "Rating: " . $vid_rating . "<br>";

	  
	if($_POST[vidurl]) {
		
		if($_POST['submit']) {
			
			
			  
			$sql = "INSERT INTO video (vid_url, vid_title, vid_thumb, vid_length, vid_count, vid_rating, vid_admin)
                VALUES ('$vid_url', '$vid_title', '$vid_thumb', '$vid_length', '$vid_count', '$vid_rating', '$admin')";
			echo $vid_url."<br>";
			echo $sql . "<br>";
			
			$result = mysqli_query($con, $sql);
			echo $result;
			
			if($result) {
         		echo "Video saved! <br><br>
				<a href='view_video.php'>View list of videos</a>";
			}
			else {
             	echo "Saving video failed.<br><br>";
			}
			
			// Free the mysqli resource
			//mysqli_free_result($result);
				
		}
	}
		
	else 
		echo "Please insert a valid URL.";
		
}
else
	die("Wrong submission");

// Close the mysql connection	
header ('location: view_video.php');	
$con->close(); 

?>

   </body>
</html>
