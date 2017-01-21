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
	return confirm("Edit newsletter?");
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
                FROM `contact`
                WHERE `contact_id` = '$id'";
            $result = mysqli_query($con, $query);
     
            if($result) {
                // Make sure the result is valid
                if($result->num_rows == 1) {
                // Get the row
                    $row = mysqli_fetch_assoc($result);
     
                    // Print data
					echo '
						<div class="cc_right">

				<div class="cn_head">View Email Content</div>
				<div class="cn_cont">
					<p>
        					<fieldset>
                            	<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;"><b>Name:</b></div>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; font-size:13px;">'.$row[contact_name].'</div>
								</p>
								<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;"><b>Address:</b></div>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; font-size:13px;">'.$row[contact_address].'</div>
								</p>
								<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;"><b>Phone Number:</b></div>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; font-size:13px;">'.$row[contact_num].'</div>
								</p>
								<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;"><b>Email:</b></div>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; font-size:13px;">'.$row[contact_email].'</div>
								</p>
								<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;"><b>Topic:</b></div>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; font-size:13px;">'.$row[contact_topic].'</div>
								</p>	
                                <p>
								<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;"><b>Content:</b></div>
								<fieldset>'.$row[contact_text].'</fieldset>	
								</p>  
            				</fieldset>
					</p>
                <a href="view_contact.php">Back to contact inbox</a>
                    
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
