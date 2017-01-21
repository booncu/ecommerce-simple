
<?php

function getID($ytURL) 
{
 $ytvIDlen = 11; // This is the length of YouTube's video IDs
 
 // The ID string starts after "v=", which is usually right after 
 // "youtube.com/watch?" in the URL
 $idStarts = strpos($ytURL, "?v=");
 
 // In case the "v=" is NOT right after the "?" (not likely, but I like to keep my 
 // bases covered), it will be after an "&":
 if($idStarts === FALSE)
  $idStarts = strpos($ytURL, "&v=");
 // If still FALSE, URL doesn't have a vid ID
 if($idStarts === FALSE)
  die("YouTube video ID not found. Please double-check your URL.");
 
 // Offset the start location to match the beginning of the ID string
 $idStarts +=3;
 
 // Get the ID string and return it
 $ytvID = substr($ytURL, $idStarts, $ytvIDlen);
 
 return $ytvID;
 
} 

?>