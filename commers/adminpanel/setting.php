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

	// Fetch information from table
	$query = "SELECT *
           	FROM `setting`
           	WHERE `setting_id` = '1'";
		   
	$result = mysqli_query($con, $query); 
   	$row = mysqli_fetch_assoc($result);
					
	// Print data
	echo '
		<div class="cc_right">

		<div class="cn_head">Setting URL</div>
		<div class="cn_cont">
			<p>
				<form action="setting_process.php" method="POST" enctype="multipart/form-data">
        			<fieldset>
                  		<p>
							<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:130px; font-size:13px;">Facebook URL</div>
							<input type="text" class="medium" name="urlfb" value="'.$row[setting_fb].'" />
						</p>
        				<p>
							<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:130px; font-size:13px;">Twitter URL</div>
							<input type="text" class="medium" name="urltwitter" value="'.$row[setting_twitter].'" />
						</p>
						<p>
							<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:130px; font-size:13px;">Setting URL</div>
							<input type="text" class="medium" name="urlsetting" value="'.$row[setting_url].'" />
						</p>
						<p>
							<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:130px; font-size:13px;">Email Admin</div>
							<input type="text" class="medium" name="emailadmin" value="'.$row[setting_emailadmin].'" />
						</p>
						<p>
							<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:130px; font-size:13px;">Email Send/Receive</div>
							<input type="text" class="medium" name="emailsendreceive" value="'.$row[setting_emailsendreceive].'" />
						</p>
            			</fieldset>
                        <p>    
    						<input type="submit" value="Save" name="submit" onclick="return functionDraft()" />
						</p>
				</form>
			</p>
        </div>
		</div>
		</div> <!-- End of cc_right -->
	';


mysqli_free_result($result);
mysqli_close($con);

$footer = printfooter();
?>

   
   </body>
</html>
