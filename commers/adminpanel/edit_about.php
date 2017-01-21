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
	return confirm("Save changes?");
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
                FROM `about`
                WHERE `about_type` = '$id'";
            $result = mysqli_query($con, $query);
     
            if($result) {
                // Make sure the result is valid
                if($result->num_rows == 1) {
                // Get the row
                    $row = mysqli_fetch_assoc($result);
					
					$status = $row[news_status];
     
                    // Print data
					echo '
						<div class="cc_right">

				<div class="cn_head">Edit About</div>
				<div class="cn_cont">
					<p>
						<form action="edit_about_process.php?id='.$row[about_type].'" method="POST" enctype="multipart/form-data">
        					<fieldset>
                            	<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Title</div>
									<input type="text" class="medium" name="newtitle" value="'.$row[about_title].'" />
								</p>
                                <p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; width:100px; font-size:13px;">Content</div>
									<textarea cols="70" rows="10" name="newtext" id="editor1">'.$row[about_text].'</textarea>
									<script>CKEDITOR.replace( "editor1",{uiColor:"#666",height:"360px"});</script>
								</p>
								<p>
            						<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Page Type</div>
                                    <select name="newatype">
                                    	<option value="" disabled selected>--select your option--</option>
                                    	<option value="1">Tentang Kami</option>
										<option value="2">Privacy Policy</option>
										<option value="3">Penghargaan</option>
										<option value="4">Kontak Kami</option>
                                    </select>
								</p>  
            				</fieldset>
                            <p>
    						<input type="submit" value="Save changes" name="submit" onclick="return functionDraft()" /> 
							</p>
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

echo '
</div>
</div> <!-- End of cc_right -->
';

$footer = printfooter();
?>

   
   </body>
</html>
