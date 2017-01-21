<?php
	  include "php/connectdb.php";
	  include "php/sessionstart.php";
	  include "php/left.php";
	  include "php/footer.php";
?>

<html>
<head>
<title>Administrator</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/home.css" />
<link rel="shortcut icon" href="images/favicon.png">
<!-- accordion styling -->	
	<link rel="stylesheet" type="text/css" href="css/tabs-accordion.css"/> 
<script type="text/javascript" src="js/jquery.tools.min.js"></script>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="js/jwplayer/jwplayer.js"></script>
<script type="text/javascript">jwplayer.key="BejWJLx1E+lZwDQ9+oYpcTrdeGastP1tN8w5pg==";</script>
<script type="text/javascript" src="js/altrow.js"></script>
<link rel="stylesheet" type="text/css" href="css/th.css" />
<link rel="stylesheet" type="text/css" href="css/fortable.css" />

<script>
function functionDel() {
	return confirm('Delete the file?');
}
</script>

</head>

<body>
<?php
$left = printleft();

$sql = "SELECT admin_name
		FROM admin where admin_id ='$admin'";
$row = mysqli_fetch_assoc(mysqli_query($con, $sql));

echo '
<div class="cc_right">
		
<div class="cn_head">
	<div style="float:left; width:100px;">Home</div>
	<div style="float:right; width:40px; padding-right:20px;">
		<table style="font-size:12px; font-weight:bold;">
			<tr><td></td>
			<td><span style="padding-top:1px;"><a href="add_about.php"><img src="images/195.png" height="16px"/>&nbsp;Add</a></span></td>
			</tr>
		</table>
	</div>
	<div style="clear:both;"></div>
</div>
<div class="cn_cont">

	
	<p>
		Welcome, '.$row[admin_name].'!
	</p>
	
</div>
</div> <!-- End of cc_right -->
';

$footer = printfooter();
?>

</body>
</html>