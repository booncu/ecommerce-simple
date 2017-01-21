<?php
	include("config/session-start.php");
	include("includes/class-captcha.php");
	$captcha1 = new mathcaptcha();
	$captcha1->generatekode();	
	include ("config/koneksi.php");
	include ("config/fungsi_rupiah.php");
	include ("config/fungsi_indotgl.php");
	include ("config/setting.php");
	include ("includes/class_paging.php");	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<!-- Meta for Ios & handheld -->
		   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes"/>
	           <meta name="HandheldFriendly" content="true" />
	           <meta name="apple-mobile-web-app-capable" content="YES" />
		<!-- //Meta for Ios & handheld -->
		
		<title>ecommercs</title>
		<!-- Favicon -->
		<link rel="shortcut icon" href="/assets/images/favicon.ico" type="image/x-icon">
		
		<!-- CSS here -->
		<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap-responsive.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
		<link href="assets/css/skitter.styles.css" type="text/css" media="all" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="assets/css/calendar.css" />
		
		<link rel="stylesheet" type="text/css" href="assets/css/media/css/scrollable-horizontal.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/media/css/scrollable-buttons.css" />
		<link rel="stylesheet" href="assets/css/nivo-slider.css" type="text/css" media="screen" />
		
		<!--<link rel="stylesheet" type="text/css" href="assets/fancybox/jquery.fancybox-1.3.4.css" media="screen" />-->
		<!--<script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
		<script type="text/javascript" src="assets/js/gmap3.js"></script> 
		
		
		<!--<script type="text/javascript" src="assets/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
		<!--<script type="text/javascript" src="assets/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
			
		<!-- JwPlayer -->
		<script src="http://jwpsrv.com/library/lpzv9KWtEeOr_yIACi0I_Q.js"></script>
		<script type="text/javascript">jwplayer.key="yEUZ+EFG2NN8T8b8HnmypggWJAgpeKQF24yfOw==";</script>
		<script type="text/javascript" src="assets/js/calendar.js"></script>		
		
		<!-- include the Tools -->
		<script type="text/javascript"  src="assets/js/jquery.tools.min.js"></script>
		<script src="assets/js/jquery.ui.totop.min.js" type="text/javascript"></script> <!-- scroll to top -->
		<script type="text/javascript" src="assets/js/hoverIntent.js"></script> 
		
		<script>
			function functionDraft() {
				return confirm("Add to Cart");
			}
			
			function functionDraftlog() {
				return confirm("Please Login First");
			}
			
			function functionDraftdelete() {
				return confirm("Delete item");
			}
		</script>
		
	</head>
	<?php
	// flush the buffer
	flush();
	?>
	<body>
		<header>
			<div id="header">
				
				<div class="head-menutop">
					<div class="container clearfix">
				   <div class="row-fluid inner-top">
						<div class="span12">
							<div class="span8 search-top">
									<form method="post" action="search.php" class="form-search">
										<input type="text" name ="cari" class="input-xlarge" placeholder="Cari...">
											<!--<button type="submit" class="btn btn-danger"><i class="icon-search icon-white"></i> Cari</button>-->
									</form>
							</div>
							<div class="span4 topr">
								<ul>
										<li><a href="confirm.php">Konfirmasi</a></li>
										<li>|</li>
										<!--*Seleksi user active ** -->
										<?php if (!isset($_SESSION['user'])) { ?>
										<li><a href='daftar.php'>Daftar</a></li>
										<li>|</li>
										<li><a href='login.php'>Login</a></li>
										<?php } else { ?>
											 <?php
											 $select_user = mysql_fetch_array(mysql_query("select * from user where user_id = '$userid' "));$isi_title = htmlentities(strip_tags($select_user['user_fullname'])); 
											 $isi = substr($isi_title,0,2); // ambil sebanyak 18 karakter
											 echo "<li>Hi,  $isi.. | <a href='logout.php'>Log Out</a></li>";
											?>
										<?php } ?>
										
										<!--  cart -->
										<?php
											$sid = session_id();
											$sql = mysql_query("SELECT count(ordertmp_id) as totaljumlah FROM ordertmp, product 
															WHERE user_id = '".$_SESSION['user']."' AND ordertmp_session='$sid' AND ordertmp.product_id=product.prod_id");
												$r=mysql_fetch_array($sql);
												if ($r['totaljumlah'] != ""){
												$total_rp    = format_rupiah($r[total]);	
												echo "<li><a href='shopping.php'><img src='assets/images/icon-cart.png'></a></li>
												<li><span>$r[totaljumlah]</span></li>";
												}
												else
												{
												echo "<li><a href='shopping.php'><img src='assets/images/icon-cart.png'></a></li>
												<li><span>0</span></li>	";	}
										  ?>						  
								</ul>
							</div>
						</div>	
					</div>
					</div>
				</div>
				<div class="head-cont">
				   <div class="container clearfix">
					<div class="row-fluid">
							<div class="navbar navbar-inverse">
							  <div class="navbar-inner">
								<div class="container">
								  <!--  =========================================  -->
								  <!--  = Used for showing navigation on mobile =  -->
								  <!--  =========================================  -->
								  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								  </a>
								  
								  <!--  ==============================  -->
								  <!--  = Place for logo and tagline =  -->
								  <!--  ==============================  -->
									<a class="brand" href="index.php">
									<img src="assets/images/logo.png" alt="Readboy" title="Readboy" />
									</a>
								  
								  <!--  =============================================  -->
								  <!--  = Main top navigation with drop-drown menus =  -->
								  <!--  =============================================  -->
								  <div class="nav-collapse collapse">
									<ul class="nav pull-right">
										<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'tentang-kami.php'){echo 'active'; }else { echo ''; } ?>"><a href="tentang-kami.php">Tentang Kami</a></li>
										<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'product.php'){echo 'active'; }else { echo ''; } ?>"><a href="product.php">Produk</a></li>
										<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'video.php'){echo 'active'; }else { echo ''; } ?>"><a href="video.php">Video</a></li>
										<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'news-event.php'){echo 'active'; }else { echo ''; } ?>"><a href="news-event.php">News &amp; Event</a></li>
										<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'lokasi-toko-maps.php'){echo 'active'; }else { echo ''; } ?>"><a href="lokasi-toko-maps.php">Lokasi Toko</a></li>
										<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'contact.php'){echo 'active'; }else { echo ''; } ?>"><a href="contact">Kontak Kami</a></li>
									</ul>
								</div>
							  </div>
							</div>
							<!--
						<div class="span3 logo">
						 
							<a href="index.php">
								<img src="assets/images/logo.png" alt="Readboy" title="Readboy" />
							</a>
							
						</div>
						<!--<div class="span8 search">
							<div class="scontent">
								<form method="post" action="" class="form-search">
									<input type="text" class="input-xlarge">
									<button type="submit" class="btn btn-danger"><i class="icon-search icon-white"></i> Cari</button>
								</form>
							</div>
						</div>-->
						<!--<div class="clearfix"></div>
						
					<div class="span9 head-menu">
					
						<ul class="nav">
							<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'tentang-kami.php'){echo 'active'; }else { echo ''; } ?>"><a href="tentang-kami.php">Tentang Kami</a></li>
							<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'product.php'){echo 'active'; }else { echo ''; } ?>"><a href="product.php">Produk</a></li>
							<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'video.php'){echo 'active'; }else { echo ''; } ?>"><a href="video.php">Video</a></li>
							<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'news-event.php'){echo 'active'; }else { echo ''; } ?>"><a href="news-event.php">News &amp; Event</a></li>
							<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'lokasi-toko-maps.php'){echo 'active'; }else { echo ''; } ?>"><a href="lokasi-toko-maps.php">Lokasi Toko</a></li>
							<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'contact.php'){echo 'active'; }else { echo ''; } ?>"><a href="contact">Kontak Kami</a></li>
						</ul>
						
					<div class="clearfix"></div>
					</div>-->
					</div>
					</div>
				</div>
				
			</div> <!-- End of section header -->
		</header>