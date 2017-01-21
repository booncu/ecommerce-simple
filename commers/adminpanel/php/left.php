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
<link rel="stylesheet" type="text/css" href="css/th.css" />

</head>

<body>
<?php

function printleft() {

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
		<div class="cl-left"><img src="../assets/images/logo.png" /></div>
		<div class="cl-right">
			&nbsp;
		</div> <!-- End of cl-right -->
		<div style="clear:both;"></div>
	</div> <!-- End of cl -->
	<div class="container_cont">
		<div class="cc_left">
			<div style="padding-left:15px; padding-bottom:20px;">
				<b>Logged in : 
				</b>
				<p>
					<a href="../index.php" target="_blank">view website</a> |
					<a href="home.php">home</a> |
					<a href="logout.php">logout</a>
				</p>
			</div>
			<div id="accordion">
				<h2>Manage Product</h2>
				<div class="pane">
					<a href="add_product.php">&#187; Add Product</a><br>
					<a href="view_product.php">&#187; View Products</a><br>
					<a href="add_category.php">&#187; Add Category</a><br>
					<a href="view_category.php">&#187; View Category</a><br>
				</div>
				<h2>Manage Order</h2>
				<div class="pane">
					<a href="view_order.php">&#187; View Orders</a><br>
					<a href="add_shipping.php">&#187; Add New Shipping Rates</a><br>
					<a href="view_shipping.php">&#187; Shipping Rates</a><br>
				</div>
				<h2>Manage Confirmation</h2>
				<div class="pane">
					<a href="view_confirm.php">&#187; View Confirmation</a><br>
				</div>
				<h2>Manage Bank and Transfer</h2>
				<div class="pane">
					<!--<a href="view_transfer.php">&#187; View Payment Transfers</a><br>-->
					<a href="view_bank.php">&#187; View Available Bank Accounts</a><br>
					<a href="add_bank.php">&#187; Add a New Bank Account</a><br>
				</div>
				<h2>Manage News and Event</h2>
				<div class="pane">
					<a href="add_newsmulti.php">&#187; Add News</a><br>
					<a href="view_news.php">&#187; View Available News</a><br>
				</div>
				<h2>Manage Users and Newsletter</h2>
				<div class="pane">
					<a href="view_user.php">&#187; View Users</a><br>
					<a href="view_newsletter.php">&#187; View Newsletter</a><br>
					<a href="add_newsletter.php">&#187; Send Newsletter</a><br>
				</div>
				<h2>Manage Stores and Regions</h2>
				<div class="pane">
					<a href="add_region.php">&#187; Add Region</a><br>
					<a href="view_region.php">&#187; View List of Regions</a><br>
					<a href="add_store.php">&#187; Add Store</a><br>
					<a href="view_store.php">&#187; View List of Stores</a><br>
				</div>
				<h2>Manage Contact and Feedback</h2>
				<div class="pane">
					<a href="view_contact.php">&#187; View Contact Inbox</a><br>
				</div>
				<h2>Manage Comments</h2>
				<div class="pane">
					<a href="view_comments.php">&#187; View Comment Inbox</a>
				</div>	
				<h2>Manage Slider Content</h2>
				<div class="pane">
					<a href="add_slider.php">&#187; Add Slider Content</a><br>
					<a href="view_slider.php">&#187; View Slider Content</a><br>
				</div>
				<h2>Manage Video</h2>
				<div class="pane">
					<a href="add_video.php">&#187; Add Video</a><br>
					<a href="view_video.php">&#187; View Available Videos</a><br>
				</div>
				<h2>Manage Brand</h2>
				<div class="pane">
					<a href="add_brand.php">&#187; Add Brand</a><br>
					<a href="view_brand.php">&#187; View All Available Brands</a><br>
				</div>
				<h2>Manage Banner</h2>
				<div class="pane">
					<a href="add_banner.php">&#187; Add Banner</a><br>
					<a href="view_banner.php">&#187; View All Available Banners</a><br>
				</div>
				<h2>Manage Partner</h2>
				<div class="pane">
					<a href="add_partner.php">&#187; Add Partner</a><br>
					<a href="view_partner.php">&#187; View All Partners</a><br>
				</div>
				<h2>Manage About and Setting</h2>
				<div class="pane">
					<a href="add_about.php">&#187; Add About</a><br>
					<a href="view_about.php">&#187; View About Content</a><br>
					<a href="setting.php">&#187; Setting</a><br>
				</div>
				<h2>Manage Administrator</h2>
				<div class="pane">
					<a href="add_admin.php">&#187; Add Administrator</a><br>
					<a href="view_admin.php">&#187; View All Administratior</a><br>
				</div>
			</div>
			<!-- activate tabs with JavaScript -->
			<script>
				$(function() { 
					$("#accordion").tabs("#accordion div.pane", {tabs: "h2", effect: "slide", initialIndex: null});
				});
			</script>
		</div> <!-- End of cc_left -->
		
';
}
?>

</body>
</html>