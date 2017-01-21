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
	return confirm("Add new shipping details?");
}

</script>

</head>

<body>
<?php
$left = printleft();

?>
		<div class="cc_right">

				<div class="cn_head">Add Shipping</div>
				<div class="cn_cont">
                
					<p>
						<form action="add_shipping_process.php" method="POST" enctype="multipart/form-data">
        					<fieldset class='fieldset'>
								<legend>Add Shipping</legend>
								<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">City *</div>
									<input type="text" class="medium" name="city" />
								</p>
                                <p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">District *</div>
									<input type="text" class="medium" name="district" />
								</p> 
                                <p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Regular</div>
									<input type="text" class="medium" name="reg" />
								</p>
                                <p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Express</div>
									<input type="text" class="medium" name="ex" />
								</p>
								</fieldset>
                            
    						<input type="submit" value="Submit" name="submit" onClick="return functionDraft()" />
						</form>
					</p>
				<p>* required fields</p>
            </div>
             
			</div> <!-- End of cc_right -->
            
<?php
$footer = printfooter();

?>
</body>
</html>