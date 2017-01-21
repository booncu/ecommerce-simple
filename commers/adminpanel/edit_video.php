<?php
	  include "php/connectdb.php";
	  include "php/sessionstart.php";
	  include "php/left.php";
	  include "php/footer.php";
?>

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

<script>
function functionDraft() {
	return confirm("Change video?");
}
</script>

</head>

<body>
<?php

$left = printleft();


 // Make sure an ID was passed
    if(isset($_GET['id'])) {
			  
    	// Get the ID
        $id = $_GET['id'];
     
        // Make sure the ID is in fact a valid ID
        if($id <= 0) {
            die('The ID is invalid!');
        }
        else {
            // Fetch the file information
            $query = "
                SELECT *
                FROM `video`
                WHERE `vid_id` = '$id'";
            $result = mysqli_query($con, $query);
     
            if($result) {
                // Make sure the result is valid
                if($result->num_rows == 1) {
                // Get the row
                    $row = mysqli_fetch_assoc($result);
					
					$status = $row[vid_status];
     
                    // Print data
					echo '
						<div class="cc_right">

				<div class="cn_head">Edit Video</div>
				<div class="cn_cont">
					<p>
						<form action="edit_video_process.php?id='.$row[vid_id].'" method="POST" enctype="multipart/form-data">
        					<fieldset>
                            	<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Video URL</div>
									<input type="text" class="medium" name="newurl" value="'.$row[vid_url].'" />
								</p>
        						<p>
									<b>Video Title:</b> '.$row[vid_title] .'<br>
									<b>Length:</b> '.$row[vid_length] .'<br>
									<b>View Count:</b> '.$row[vid_count] .'<br>
									<div id="myElement">Loading the player...</div>
										<script type="text/javascript">
    										jwplayer("myElement").setup({
												height: 180,
           										width: 300,
												autostart: false,
        										file: "'.$row[vid_url].'"
    										});
										</script>
								</p>
            				</fieldset>
                            
    						<input type="submit" value="Submit" name="submit" onclick="return functionDraft()" />                        
						</form>
					</p>
                    
                    
				</div>
					';
				
                // Free the mysqli resources
                mysqli_free_result($result);
            }
            else {
                echo "Error! Query failed: <pre>{$con->error}</pre>";
            }
            mysqli_close($con);
        }
    
    else 
        echo 'Error! No ID was passed.';
	
		}
	}

$footer = printfooter();
?>

   
   </body>
</html>
