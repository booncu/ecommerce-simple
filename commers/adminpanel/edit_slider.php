<?php
	include "php/connectdb.php";
	include "php/sessionstart.php";
	include "php/left.php";
	include "php/footer.php";
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

<script>
function functionEdit() {
	return confirm("Change file details?");
}
</script>

</head>

<body>
<?php
$left = printleft();

echo '
		<div class="cc_right">
		
<div class="cn_head">
	<div style="float:left; width:100px;">Edit Slider Content</div>
	<div style="float:right; width:40px; padding-right:20px;">
		<table style="font-size:12px; font-weight:bold;">
			<tr><td><img src="images/195.png" height="16px" /></td>
			<td><span style="padding-top:1px;"><a href="form.php">Add</a></span></td>
			</tr>
		</table>
	</div>
	<div style="clear:both;"></div>
</div>
<div class="cn_cont">

';
   
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
				FROM pic
				WHERE pic_id = '$id'
				";
            $result = mysqli_query($con, $query);
     
            if($result) {
                // Make sure the result is valid
                if($result->num_rows == 1) {
                // Get the row
                    $row = mysqli_fetch_assoc($result);
     
                    // Print data
					echo '
					<p>
						<form action="edit_slider_process.php?id='.$row[pic_id].'" method="POST" enctype="multipart/form-data">
        					<fieldset>
                            	<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Picture Name:</div>
									<input type="text" class="medium" name="newname" value="'.$row[pic_name].'" />
								</p>
								<p>
            						<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Change File:</div>
									<img src="pic/'.$row["pic_tmp"].'" width="100" />
	    							<input type="file" name="newpic" />
            					</p>
            				</fieldset>
    						<input type="submit" value="Save" name="submit" onclick="return functionEdit()" />
						</form>
					</p>';
				}
			
     
                // Free the mysqli resources
                @mysqli_free_result($result);
            }
            else {
                echo "Error! Query failed: <pre>{$con->error}</pre>";
            }
            mysqli_close($con);
        }
    }
    else {
        echo 'Error! No ID was passed.';
    }
	
echo '
</div>
</div> <!-- End of cc_right -->
		<div class="clear"></div>
	</div> <!-- End of container_cont -->
</div> <!-- End of container -->
<div class="clear"></div>
<div id="footer">
	<div class="footer_content">
		Copyright &copy; www.l-cq.com 2013. All Rights Reserved
	</div>
</div>
</div> <!-- End of Container flower -->

';
?>

   
   </body>
</html>
