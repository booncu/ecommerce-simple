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
	return confirm("Send newsletter?");
}

</script>

</head>

<body>
<?php
$left = printleft();

?>
		<div class="cc_right">

				<div class="cn_head">Send Newsletter</div>
				<div class="cn_cont">
                
					<p>
						<form action="add_newsletter_process.php" method="POST" enctype="multipart/form-data">
        					<fieldset class='fieldset'>
								<legend>Send Newsletter</legend>
								<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; float:left; width:100px; font-size:13px;">Title *</div>
									<input type="text" class="medium" name="title" />
								</p>
								<p>
									<div style="padding-left:10px; padding-right:10px; padding-top:5px; padding-bottom:5px; width:100px; font-size:13px;">Content</div>
									<textarea cols="70" rows="10" name="text" id="editor1" ></textarea>
									<script>CKEDITOR.replace( 'editor1',{uiColor:'#666',height:'360px'});</script>
								</p>
								
								</fieldset>
                            
    						<input type="submit" value="Send newsletter" name="submit" onClick="return functionDraft()" />
						</form>
					</p>
				
            </div>
             
			</div> <!-- End of cc_right -->

<?php
$footer = printfooter();

?></body>
</html>