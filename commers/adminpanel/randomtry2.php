<?php
	include "youtube/get_id.php";
	include "youtube/get_det.php";
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php

$ytURL = "http://www.youtube.com/watch?v=Hzgzim5m7oU";

$urlData = parse_url($ytURL);
if($urlData["host"] == 'www.youtube.com') 
{
 // Move ahead 
 echo "true youtube<br>";
}
else
{
 return 0;
} 

echo $ytURL . "<br>";

$yt_id = getID($ytURL);
echo $yt_id . "<br><br>";

$yt_det = getDet($yt_id);
echo "Title: " . $yt_det->title . "<br>";
echo "Thumbnail: <img src='" . $yt_det->thumbnailURL . "' /><br>";
echo "Watch Video: <a href='" . $yt_det->watchURL . "'>Watch here</a><br>";
echo "Description: " . $yt_det->description . "<br>";
echo "Watched: " . $yt_det->viewCount . "<br>";
echo "Length (in seconds): " . $yt_det->length . "<br>";
echo "Rating: " . $yt_det->rating . "<br>";

?>
</body>
</html>
