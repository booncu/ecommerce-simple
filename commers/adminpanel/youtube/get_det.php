
<?php

// function to parse a video <entry>
function getDet($youtubeVideoID) 
{      
 $obj= new stdClass;
      
 // set video data feed URL
     $feedURL = 'http://gdata.youtube.com/feeds/api/videos/' . $youtubeVideoID;

     // read feed into SimpleXML object
     $entry = simplexml_load_file($feedURL);
      
       // get nodes in media: namespace for media information
       $media = $entry->children('http://search.yahoo.com/mrss/');
       $obj->title = $media->group->title;
       $obj->description = $media->group->description;
      
       // get video player URL
       $attrs = $media->group->player->attributes();
       $obj->watchURL = $attrs['url']; 
      
       // get video thumbnail
       $attrs = $media->group->thumbnail[0]->attributes();
       $obj->thumbnailURL = $attrs['url']; 
            
       // get <yt:duration> node for video length
       $yt = $media->children('http://gdata.youtube.com/schemas/2007');
       $attrs = $yt->duration->attributes();
       $obj->length = $attrs['seconds']; 
      
       // get <yt:stats> node for viewer statistics
       $yt = $entry->children('http://gdata.youtube.com/schemas/2007');
       $attrs = $yt->statistics->attributes();
       $obj->viewCount = $attrs['viewCount']; 
      
       // get <gd:rating> node for video ratings
       $gd = $entry->children('http://schemas.google.com/g/2005'); 
       if ($gd->rating) 
 		{ 
         $attrs = $gd->rating->attributes();
         $obj->rating = $attrs['average']; 
       	} 
 		else 
 		{
        $obj->rating = 0;         
       	}
        
 // get <gd:comments> node for video comments
       $gd = $entry->children('http://schemas.google.com/g/2005');
       if ($gd->comments->feedLink) 
 { 
         $attrs = $gd->comments->feedLink->attributes();
         $obj->commentsURL = $attrs['href']; 
         $obj->commentsCount = $attrs['countHint']; 
       }

       return $obj;      
} 

?>
