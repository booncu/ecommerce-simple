<?php
	ob_start();
	include "php/connectdb.php";
	include "php/sessionstart.php";
?>

<!doctype html>
<html>
<head>
<title>Bursa Moge Administrator</title>
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
function functionDel() {
	alert("Your file is deleted.");
}
</script>

</head>

<body>
<?php

echo '

<div id="container_flower">
<div id="header">
	<div class="header_content">
		<div class="header_content_left">
			Hello Administrator
		</div>
		<div class="header_content_right">
			<table cellpadding=1 cellpadding=1 border=0 style="font-size:12px;">
				<tr>
					<!--<td><img src="images/wrench_plus.png" height="16px"/></td>
					<td><a href="dashboard.php?mod=setting_record">Setting SEO</a></td>-->
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td><img src="images/on-off.png" height="16px"/></td>
					<td><a href="logout.php">Logout</a></td>
				</tr>
			</table>
			
		</div>
		<div style="clear:both;"></div>
	</div>
</div>
<div id="container">
	<div class="container_logo">
		<div class="cl-left"><img src="images/logo-black.png" /></div>
		<div class="cl-right">
			&nbsp;
		</div> <!-- End of cl-right -->
		<div style="clear:both;"></div>
	</div> <!-- End of cl -->
	<div class="container_cont">
		<div class="cc_left">
			<div style="padding-left:5px; padding-bottom:20px;">
				<b>Logged in : 
				</b>
				<p>
					<a href="../" target="_blank">view website</a> |
					<a href="home.php">home</a> |
					<a href="logout.php">logout</a>
				</p>
			</div>
			<div id="accordion">
				<h2>Manage Product</h2>
				<div class="pane">
					<a href="">&#187; Add Product</a><br>
					<a href="">&#187; View Product</a><br>
				</div>
				<h2>Manage Administratior</h2>
				<div class="pane">
					<a href="">&#187; Add Administrator</a><br>
					<a href="">&#187; View All Administratior</a><br>
				</div>
			</div>
			<!-- activate tabs with JavaScript -->
			<script>
				$(function() { 
					$("#accordion").tabs("#accordion div.pane", {tabs: "h2", effect: "slide", initialIndex: null});
				});
			</script>
		</div> <!-- End of cc_left -->
		<div class="cc_right">
		
<div class="cn_head">
	<div style="float:left; width:100px;">Delete</div>
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
				DELETE 
				FROM admin
				WHERE admin_id = '$id'
				";
            $result = mysqli_query($con, $query);
     
            if($result) {
                echo "File is deleted<br>
						<a href='tableshow.php'>Back</a><br><br><br>";
     
                // Free the mysqli resources
                @mysqli_free_result($result);
            }
            else {
                echo "Error! Query failed: <pre>{$con->error}</pre>";
            }
			
			header ('location: view_admin.php');
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
