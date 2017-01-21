<?php
	include("includes/header.php");

	//product like
	$select_pl = mysql_query("SELECT * FROM product WHERE prod_status ='published' ORDER BY prod_id DESC limit 9 "); 	
	
?>
<section id="content">
  <div class="container">
	<div class="product">
		<div class="row-fluid">	
			<div class="span12 product-right">
			<div class="row-fluid">
				<div class="pr-content">
					<h3>Filter Produk</h3>
					<?php 
					
						// Jika semua select kosong
						if(empty($_POST['choice']) AND empty($_POST['cat']) AND empty($_GET['hrg']) AND empty($_POST['lang'])) {
						  $sel_all = mysql_query("select * from product where prod_status = 'published' order by prod_id asc");
						  while($sa = mysql_fetch_array($sel_all)){						 
							$harga = format_rupiah($sa[prod_price]);
							$discount = format_rupiah($sa[prod_pricedisc]);
							echo "<div class='span4 product-items'>";						
							echo "<div class='pi-images'>
							<div class='addcart'>";
							 if (!isset($_SESSION['user'])) { 
										echo "<a href='product-detail.php?prod_detail=$sa[prod_id]' ><span class='pi-cart'>Add to cart <i class='icon-play-circle icon-white'></i></span></a>";
										 } else { 
											 
										echo "<a href='act.php?module=keranjang&act=tambah&id=$sa[prod_id]' onClick='return functionDraft()'><span class='pi-cart'>Add to cart <i class='icon-play-circle icon-white'></i></span></a>";		
										 } 
							
							echo "</div>";
							echo "<a href=''><img src='timthumb.php?src=$uri/adminpanel/product/pic/$sa[prod_img]&amp;w=178&amp;h=208' alt=' ' title=' ' /></a></div>";
							echo "  <div class='pi-inner'>";
							echo "	<div class='pi-title'><a href='product-detail.php?prod_detail=$sa[prod_id]'>$sa[prod_name]</a></div>";
							echo "	<div class='pi-rating'>
							<div class='metadata_tk'>
										<ul id='rt'>";
							
										$idpg=$sa[prod_id];
										$select_com = mysql_fetch_array(mysql_query("SELECT ((sum(count_com))/(count(id_pg)))as jmlcm FROM comment WHERE id_pg = '$idpg' ORDER by id_com LIMIT 2"));
										$jml = ceil($select_com[jmlcm]);
										
										//$jml_rt = ceil($jml_pg);
										if (($jml) == ''){
												
												for ($x=0; $x<=4; $x++) {
												echo"<li id='star'></li>	";								
												
												} 	
										
										}
										elseif(($jml) =='1'){
										echo"<li id='stars'></li>";
												
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										
										} 
										elseif(($jml) =='2'){
										echo"<li id='stars'></li>
										<li id='stars'></li>";
												 
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										
										}
										elseif(($jml) =='3'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>";
												 
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										 
										} 
										elseif(($jml) =='4'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='star'></li>";
										
										}
										elseif(($jml) =='5'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>";
										
										}
										
										
								
										echo"</ul>				
										
										
									</div>
									<div class='clearfix'></div><!---end rating-->
							</div>";
							if (empty($discount)) {
									echo "
									<div class='pli-sale'></div>
									<div class='pli-price'>Rp&nbsp;$harga,-</div>
									";
									} elseif (empty($harga)){
									echo "
									<div class='pli-sale'></div>
									<div class='pli-price'>Rp&nbsp;$discount,-</div>";
									} else {
									echo"<div class='pli-sale'>Rp&nbsp;$harga,-</div>
											<div class='pli-price'>Rp&nbsp;$discount,-</div>";
									
									}
							
							echo "</div>";
							echo "</div>";
							$n++;
							}
						  
						  }
						  
						  // Jika semua select isi
						if(!empty($_POST['choice']) AND !empty($_POST['cat']) AND !empty($_GET['hrg']) AND !empty($_POST['lang'])) {
						  $sel_all = mysql_query("select * from product where prod_status = 'published' order by prod_id ");
						  while($sa = mysql_fetch_array($sel_all)){						 
							$harga = format_rupiah($sa[prod_price]);
							$discount = format_rupiah($sa[prod_pricedisc]);
							echo "<div class='span4 product-items'>";						
							echo "<div class='pi-images'>
							<div class='addcart'>";
							 if (!isset($_SESSION['user'])) { 
										echo "<a href='product-detail.php?prod_detail=$sa[prod_id]' ><span class='pi-cart'>Add to cart <i class='icon-play-circle icon-white'></i></span></a>";
										 } else { 
											 
										echo "<a href='act.php?module=keranjang&act=tambah&id=$sa[prod_id]' onClick='return functionDraft()'><span class='pi-cart'>Add to cart <i class='icon-play-circle icon-white'></i></span></a>";		
										 } 
							
							echo "</div>";
							echo "<a href=''><img src='timthumb.php?src=$uri/adminpanel/product/pic/$sa[prod_img]&amp;w=178&amp;h=208' alt=' ' title=' ' /></a></div>";
							echo "  <div class='pi-inner'>";
							echo "	<div class='pi-title'><a href='product-detail.php?prod_detail=$sa[prod_id]'>$sa[prod_name]</a></div>";
							echo "	<div class='pi-rating'>
							<div class='metadata_tk'>
										<ul id='rt'>";
							
										$idpg=$sa[prod_id];
										$select_com = mysql_fetch_array(mysql_query("SELECT ((sum(count_com))/(count(id_pg)))as jmlcm FROM comment WHERE id_pg = '$idpg' ORDER by id_com LIMIT 2"));
										$jml = ceil($select_com[jmlcm]);
										
										//$jml_rt = ceil($jml_pg);
										if (($jml) == ''){
												
												for ($x=0; $x<=4; $x++) {
												echo"<li id='star'></li>	";								
												
												} 	
										
										}
										elseif(($jml) =='1'){
										echo"<li id='stars'></li>";
												
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										
										} 
										elseif(($jml) =='2'){
										echo"<li id='stars'></li>
										<li id='stars'></li>";
												 
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										
										}
										elseif(($jml) =='3'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>";
												 
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										 
										} 
										elseif(($jml) =='4'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='star'></li>";
										
										}
										elseif(($jml) =='5'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>";
										
										}
										
										
								
										echo"</ul>				
										
										
									</div>
									<div class='clearfix'></div><!---end rating-->
							
							</div>";
							
							if (empty($discount)) {
									echo "
									<div class='pli-sale'></div>
									<div class='pli-price'>Rp&nbsp;$harga,-</div>
									";
									} elseif (empty($harga)){
									echo "
									<div class='pli-sale'></div>
									<div class='pli-price'>Rp&nbsp;$discount,-</div>";
									} else {
									echo"<div class='pli-sale'>Rp&nbsp;$harga,-</div>
											<div class='pli-price'>Rp&nbsp;$discount,-</div>";
									
									}
							echo "</div>";
							echo "</div>";
							$n++;
							}
						  
						  }
						
						
						// Jika pilihan tidak kosong dan yang lainnya kosong
						if(!empty($_POST['choice']) AND empty($_POST['cat']) AND empty($_GET['hrg']) AND empty($_POST['lang'])) {
						  $sel_all = mysql_query("select * from product where prod_id = '".$_POST['choice']."' and prod_status = 'published' ");
						  while($sa = mysql_fetch_array($sel_all)){
							$harga = format_rupiah($sa[prod_price]);
							$discount = format_rupiah($sa[prod_pricedisc]);
							echo "<div class='span4 product-items'>";						
							echo "<div class='pi-images'>
							<div class='addcart'>";
							 if (!isset($_SESSION['user'])) { 
										echo "<a href='product-detail.php?prod_detail=$sa[prod_id]' ><span class='pi-cart'>Add to cart <i class='icon-play-circle icon-white'></i></span></a>";
										 } else { 
											 
										echo "<a href='act.php?module=keranjang&act=tambah&id=$sa[prod_id]' onClick='return functionDraft()'><span class='pi-cart'>Add to cart <i class='icon-play-circle icon-white'></i></span></a>";		
										 } 
							
							echo "</div>";
							echo "<a href=''><img src='timthumb.php?src=$uri/adminpanel/product/pic/$sa[prod_img]&amp;w=178&amp;h=208' alt=' ' title=' ' /></a></div>";
							echo "  <div class='pi-inner'>";
							echo "	<div class='pi-title'><a href='product-detail.php?prod_detail=$sa[prod_id]'>$sa[prod_name]</a></div>";
							echo "	<div class='pi-rating'>
							<div class='metadata_tk'>
										<ul id='rt'>";
							
										$idpg=$sa[prod_id];
										$select_com = mysql_fetch_array(mysql_query("SELECT ((sum(count_com))/(count(id_pg)))as jmlcm FROM comment WHERE id_pg = '$idpg' ORDER by id_com LIMIT 2"));
										$jml = ceil($select_com[jmlcm]);
										
										//$jml_rt = ceil($jml_pg);
										if (($jml) == ''){
												
												for ($x=0; $x<=4; $x++) {
												echo"<li id='star'></li>	";								
												
												} 	
										
										}
										elseif(($jml) =='1'){
										echo"<li id='stars'></li>";
												
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										
										} 
										elseif(($jml) =='2'){
										echo"<li id='stars'></li>
										<li id='stars'></li>";
												 
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										
										}
										elseif(($jml) =='3'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>";
												 
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										 
										} 
										elseif(($jml) =='4'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='star'></li>";
										
										}
										elseif(($jml) =='5'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>";
										
										}
										
										
								
										echo"</ul>				
										
										
									</div>
									<div class='clearfix'></div><!---end rating-->
							</div>";
							
							if (empty($discount)) {
									echo "
									<div class='pli-sale'></div>
									<div class='pli-price'>Rp&nbsp;$harga,-</div>
									";
									} elseif (empty($harga)){
									echo "
									<div class='pli-sale'></div>
									<div class='pli-price'>Rp&nbsp;$discount,-</div>";
									} else {
									echo"<div class='pli-sale'>Rp&nbsp;$harga,-</div>
											<div class='pli-price'>Rp&nbsp;$discount,-</div>";
									
									}
							echo "</div>";
							echo "</div>";
							$n++;
						  }
						}
						
						// Jika category  tidak kosong dan yang lainnya kosong
						if(empty($_POST['choice']) AND !empty($_POST['cat']) AND empty($_GET['hrg']) AND empty($_POST['lang'])) {
						  $sel_all = mysql_query("select * from product where prod_category = '".$_POST['cat']."' and prod_status = 'published' ");
						  while($sa = mysql_fetch_array($sel_all)){
							$harga = format_rupiah($sa[prod_price]);
							$discount = format_rupiah($sa[prod_pricedisc]);
							echo "<div class='span4 product-items'>";						
							echo "<div class='pi-images'>
							<div class='addcart'>";
							 if (!isset($_SESSION['user'])) { 
										echo "<a href='product-detail.php?prod_detail=$sa[prod_id]' ><span class='pi-cart'>Add to cart <i class='icon-play-circle icon-white'></i></span></a>";
										 } else { 
											 
										echo "<a href='act.php?module=keranjang&act=tambah&id=$sa[prod_id]' onClick='return functionDraft()'><span class='pi-cart'>Add to cart <i class='icon-play-circle icon-white'></i></span></a>";		
										 } 
							
							echo "</div>";
							echo "<a href=''><img src='timthumb.php?src=$uri/adminpanel/product/pic/$sa[prod_img]&amp;w=178&amp;h=208' alt=' ' title=' ' /></a></div>";
							echo "  <div class='pi-inner'>";
							echo "	<div class='pi-title'><a href='product-detail.php?prod_detail=$sa[prod_id]'>$sa[prod_name]</a></div>";
							echo "	<div class='pi-rating'>
							<div class='metadata_tk'>
										<ul id='rt'>";
							
										$idpg=$sa[prod_id];
										$select_com = mysql_fetch_array(mysql_query("SELECT ((sum(count_com))/(count(id_pg)))as jmlcm FROM comment WHERE id_pg = '$idpg' ORDER by id_com LIMIT 2"));
										$jml = ceil($select_com[jmlcm]);
										
										//$jml_rt = ceil($jml_pg);
										if (($jml) == ''){
												
												for ($x=0; $x<=4; $x++) {
												echo"<li id='star'></li>	";								
												
												} 	
										
										}
										elseif(($jml) =='1'){
										echo"<li id='stars'></li>";
												
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										
										} 
										elseif(($jml) =='2'){
										echo"<li id='stars'></li>
										<li id='stars'></li>";
												 
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										
										}
										elseif(($jml) =='3'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>";
												 
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										 
										} 
										elseif(($jml) =='4'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='star'></li>";
										
										}
										elseif(($jml) =='5'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>";
										
										}
										
										
								
										echo"</ul>				
										
										
									</div>
									<div class='clearfix'></div><!---end rating-->
							</div>";
							
							if (empty($discount)) {
									echo "
									<div class='pli-sale'></div>
									<div class='pli-price'>Rp&nbsp;$harga,-</div>
									";
									} elseif (empty($harga)){
									echo "
									<div class='pli-sale'></div>
									<div class='pli-price'>Rp&nbsp;$discount,-</div>";
									} else {
									echo"<div class='pli-sale'>Rp&nbsp;$harga,-</div>
											<div class='pli-price'>Rp&nbsp;$discount,-</div>";
									
									}
							echo "</div>";
							echo "</div>";
							$n++;
						  }
						}
						
						// Jika harga  tidak kosong dan yang lainnya kosong
						if(empty($_POST['choice']) AND empty($_POST['cat']) AND !empty($_GET['hrg']) AND empty($_POST['lang'])) {
						  $sel_all = mysql_query("select * from product where prod_id = '".$_POST['hrg']."' and prod_status = 'published' ");
						  while($sa = mysql_fetch_array($sel_all)){
							$harga = format_rupiah($sa[prod_price]);
							$discount = format_rupiah($sa[prod_pricedisc]);
							echo "<div class='span4 product-items'>";						
							echo "<div class='pi-images'>
							<div class='addcart'>";
							 if (!isset($_SESSION['user'])) { 
										echo "<a href='product-detail.php?prod_detail=$sa[prod_id]' ><span class='pi-cart'>Add to cart <i class='icon-play-circle icon-white'></i></span></a>";
										 } else { 
											 
										echo "<a href='act.php?module=keranjang&act=tambah&id=$sa[prod_id]' onClick='return functionDraft()'><span class='pi-cart'>Add to cart <i class='icon-play-circle icon-white'></i></span></a>";		
										 } 
							
							echo "</div>";
							echo "<a href=''><img src='timthumb.php?src=$uri/adminpanel/product/pic/$sa[prod_img]&amp;w=178&amp;h=208' alt=' ' title=' ' /></a></div>";
							echo "  <div class='pi-inner'>";
							echo "	<div class='pi-title'><a href='product-detail.php?prod_detail=$sa[prod_id]'>$sa[prod_name]</a></div>";
							echo "	<div class='pi-rating'>
							<div class='metadata_tk'>
										<ul id='rt'>";
							
										$idpg=$sa[prod_id];
										$select_com = mysql_fetch_array(mysql_query("SELECT ((sum(count_com))/(count(id_pg)))as jmlcm FROM comment WHERE id_pg = '$idpg' ORDER by id_com LIMIT 2"));
										$jml = ceil($select_com[jmlcm]);
										
										//$jml_rt = ceil($jml_pg);
										if (($jml) == ''){
												
												for ($x=0; $x<=4; $x++) {
												echo"<li id='star'></li>	";								
												
												} 	
										
										}
										elseif(($jml) =='1'){
										echo"<li id='stars'></li>";
												
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										
										} 
										elseif(($jml) =='2'){
										echo"<li id='stars'></li>
										<li id='stars'></li>";
												 
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										
										}
										elseif(($jml) =='3'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>";
												 
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										 
										} 
										elseif(($jml) =='4'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='star'></li>";
										
										}
										elseif(($jml) =='5'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>";
										
										}
										
										
								
										echo"</ul>				
										
										
									</div>
									<div class='clearfix'></div><!---end rating-->
							</div>";
							
							if (empty($discount)) {
									echo "
									<div class='pli-sale'></div>
									<div class='pli-price'>Rp&nbsp;$harga,-</div>
									";
									} elseif (empty($harga)){
									echo "
									<div class='pli-sale'></div>
									<div class='pli-price'>Rp&nbsp;$discount,-</div>";
									} else {
									echo"<div class='pli-sale'>Rp&nbsp;$harga,-</div>
											<div class='pli-price'>Rp&nbsp;$discount,-</div>";
									
									}
							echo "</div>";
							echo "</div>";
							$n++;
						  }
						}
						
						// Jika language  tidak kosong dan yang lainnya kosong
						if(empty($_POST['choice']) AND empty($_POST['cat']) AND empty($_GET['hrg']) AND !empty($_POST['lang'])) {
						  $sel_all = mysql_query("select * from product where prod_lang = '".$_POST['lang']."'  and prod_status = 'published' ");
						  while($sa = mysql_fetch_array($sel_all)){
						  $harga = format_rupiah($sa[prod_price]);
							$discount = format_rupiah($sa[prod_pricedisc]);
							echo "<div class='span4 product-items'>";						
							echo "<div class='pi-images'>
							<div class='addcart'>";
							 if (!isset($_SESSION['user'])) { 
										echo "<a href='product-detail.php?prod_detail=$sa[prod_id]' ><span class='pi-cart'>Add to cart <i class='icon-play-circle icon-white'></i></span></a>";
										 } else { 
											 
										echo "<a href='act.php?module=keranjang&act=tambah&id=$sa[prod_id]' onClick='return functionDraft()'><span class='pi-cart'>Add to cart <i class='icon-play-circle icon-white'></i></span></a>";		
										 } 
							
							echo "</div>";
							echo "<a href=''><img src='timthumb.php?src=$uri/adminpanel/product/pic/$sa[prod_img]&amp;w=178&amp;h=208' alt=' ' title=' ' /></a></div>";
							echo "  <div class='pi-inner'>";
							echo "	<div class='pi-title'><a href='product-detail.php?prod_detail=$sa[prod_id]'>$sa[prod_name]</a></div>";
							echo "	<div class='pi-rating'>
							<div class='metadata_tk'>
										<ul id='rt'>";
							
										$idpg=$sa[prod_id];
										$select_com = mysql_fetch_array(mysql_query("SELECT ((sum(count_com))/(count(id_pg)))as jmlcm FROM comment WHERE id_pg = '$idpg' ORDER by id_com LIMIT 2"));
										$jml = ceil($select_com[jmlcm]);
										
										//$jml_rt = ceil($jml_pg);
										if (($jml) == ''){
												
												for ($x=0; $x<=4; $x++) {
												echo"<li id='star'></li>	";								
												
												} 	
										
										}
										elseif(($jml) =='1'){
										echo"<li id='stars'></li>";
												
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										
										} 
										elseif(($jml) =='2'){
										echo"<li id='stars'></li>
										<li id='stars'></li>";
												 
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										
										}
										elseif(($jml) =='3'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>";
												 
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										 
										} 
										elseif(($jml) =='4'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='star'></li>";
										
										}
										elseif(($jml) =='5'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>";
										
										}
										
										
								
										echo"</ul>				
										
										
									</div>
									<div class='clearfix'></div><!---end rating-->
									</div>";
							
							if (empty($discount)) {
									echo "
									<div class='pli-sale'></div>
									<div class='pli-price'>Rp&nbsp;$harga,-</div>
									";
									} elseif (empty($harga)){
									echo "
									<div class='pli-sale'></div>
									<div class='pli-price'>Rp&nbsp;$discount,-</div>";
									} else {
									echo"<div class='pli-sale'>Rp&nbsp;$harga,-</div>
											<div class='pli-price'>Rp&nbsp;$discount,-</div>";
									
									}
							echo "</div>";
							echo "</div>";
							$n++;
						  } 
						}
						
						// Jika pilihan dan category tidak kosong dan yang lainnya kosong
						if(!empty($_POST['choice']) AND !empty($_POST['cat']) AND empty($_GET['hrg']) AND empty($_POST['lang'])) {
						  $sel_all = mysql_query("select * from product where prod_id = '".$_POST['choice']."' AND prod_category = '".$_POST['cat']."' and prod_status ='published' ");
						  while($sa = mysql_fetch_array($sel_all)){
						  $harga = format_rupiah($sa[prod_price]);
							$discount = format_rupiah($sa[prod_pricedisc]);
							echo "<div class='span4 product-items'>";						
							echo "<div class='pi-images'>
							<div class='addcart'>";
							 if (!isset($_SESSION['user'])) { 
										echo "<a href='product-detail.php?prod_detail=$sa[prod_id]' ><span class='pi-cart'>Add to cart <i class='icon-play-circle icon-white'></i></span></a>";
										 } else { 
											 
										echo "<a href='act.php?module=keranjang&act=tambah&id=$sa[prod_id]' onClick='return functionDraft()'><span class='pi-cart'>Add to cart <i class='icon-play-circle icon-white'></i></span></a>";		
										 } 
							
							echo "</div>";
							echo "<a href=''><img src='timthumb.php?src=$uri/adminpanel/product/pic/$sa[prod_img]&amp;w=178&amp;h=208' alt=' ' title=' ' /></a></div>";
							echo "  <div class='pi-inner'>";
							echo "	<div class='pi-title'><a href='product-detail.php?prod_detail=$sa[prod_id]'>$sa[prod_name]</a></div>";
							echo "	<div class='pi-rating'>
							<div class='metadata_tk'>
										<ul id='rt'>";
							
										$idpg=$sa[prod_id];
										$select_com = mysql_fetch_array(mysql_query("SELECT ((sum(count_com))/(count(id_pg)))as jmlcm FROM comment WHERE id_pg = '$idpg' ORDER by id_com LIMIT 2"));
										$jml = ceil($select_com[jmlcm]);
										
										//$jml_rt = ceil($jml_pg);
										if (($jml) == ''){
												
												for ($x=0; $x<=4; $x++) {
												echo"<li id='star'></li>	";								
												
												} 	
										
										}
										elseif(($jml) =='1'){
										echo"<li id='stars'></li>";
												
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										
										} 
										elseif(($jml) =='2'){
										echo"<li id='stars'></li>
										<li id='stars'></li>";
												 
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										
										}
										elseif(($jml) =='3'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>";
												 
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										 
										} 
										elseif(($jml) =='4'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='star'></li>";
										
										}
										elseif(($jml) =='5'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>";
										
										}
										
										
								
										echo"</ul>				
										
										
									</div>
									<div class='clearfix'></div><!---end rating-->
							</div>";
							
							if (empty($discount)) {
									echo "
									<div class='pli-sale'></div>
									<div class='pli-price'>Rp&nbsp;$harga,-</div>
									";
									} elseif (empty($harga)){
									echo "
									<div class='pli-sale'></div>
									<div class='pli-price'>Rp&nbsp;$discount,-</div>";
									} else {
									echo"<div class='pli-sale'>Rp&nbsp;$harga,-</div>
											<div class='pli-price'>Rp&nbsp;$discount,-</div>";
									
									}
							echo "</div>";
							echo "</div>";
							$n++;
						  }
						}
						
						// Jika harga dan bahasa tidak kosong dan yang lainnya kosong
						if(empty($_POST['choice']) AND empty($_POST['cat']) AND !empty($_GET['hrg']) AND !empty($_POST['lang'])) {
						  $sel_all = mysql_query("select * from product where prod_id = '".$_POST['hrg']."' AND prod_lang = '".$_POST['lang']."' and prod_status = 'published' ");
						  while($sa = mysql_fetch_array($sel_all)){
						  $harga = format_rupiah($sa[prod_price]);
							$discount = format_rupiah($sa[prod_pricedisc]);
							echo "<div class='span4 product-items'>";						
							echo "<div class='pi-images'>
							<div class='addcart'>";
							 if (!isset($_SESSION['user'])) { 
										echo "<a href='product-detail.php?prod_detail=$sa[prod_id]' ><span class='pi-cart'>Add to cart <i class='icon-play-circle icon-white'></i></span></a>";
										 } else { 
											 
										echo "<a href='act.php?module=keranjang&act=tambah&id=$sa[prod_id]' onClick='return functionDraft()'><span class='pi-cart'>Add to cart <i class='icon-play-circle icon-white'></i></span></a>";		
										 } 
							
							echo "</div>";
							echo "<a href=''><img src='timthumb.php?src=$uri/adminpanel/product/pic/$sa[prod_img]&amp;w=178&amp;h=208' alt=' ' title=' ' /></a></div>";
							echo "  <div class='pi-inner'>";
							echo "	<div class='pi-title'><a href='product-detail.php?prod_detail=$sa[prod_id]'>$sa[prod_name]</a></div>";
							echo "	<div class='pi-rating'>
							<div class='metadata_tk'>
										<ul id='rt'>";
							
										$idpg=$sa[prod_id];
										$select_com = mysql_fetch_array(mysql_query("SELECT ((sum(count_com))/(count(id_pg)))as jmlcm FROM comment WHERE id_pg = '$idpg' ORDER by id_com LIMIT 2"));
										$jml = ceil($select_com[jmlcm]);
										
										//$jml_rt = ceil($jml_pg);
										if (($jml) == ''){
												
												for ($x=0; $x<=4; $x++) {
												echo"<li id='star'></li>	";								
												
												} 	
										
										}
										elseif(($jml) =='1'){
										echo"<li id='stars'></li>";
												
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										
										} 
										elseif(($jml) =='2'){
										echo"<li id='stars'></li>
										<li id='stars'></li>";
												 
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										
										}
										elseif(($jml) =='3'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>";
												 
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										 
										} 
										elseif(($jml) =='4'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='star'></li>";
										
										}
										elseif(($jml) =='5'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>";
										
										}
										
										
								
										echo"</ul>				
										
										
									</div>
									<div class='clearfix'></div><!---end rating-->
							</div>";
							
							if (empty($discount)) {
									echo "
									<div class='pli-sale'></div>
									<div class='pli-price'>Rp&nbsp;$harga,-</div>
									";
									} elseif (empty($harga)){
									echo "
									<div class='pli-sale'></div>
									<div class='pli-price'>Rp&nbsp;$discount,-</div>";
									} else {
									echo"<div class='pli-sale'>Rp&nbsp;$harga,-</div>
											<div class='pli-price'>Rp&nbsp;$discount,-</div>";
									
									}
							echo "</div>";
							echo "</div>";
							$n++;
						  }
						}
						
						// Jika pilihan dan harga tidak kosong dan yang lainnya kosong
						if(!empty($_POST['choice']) AND empty($_POST['cat']) AND !empty($_GET['hrg']) AND empty($_POST['lang'])) {
						  $sel_all = mysql_query("select * from product where prod_id = '".$_POST['hrg']."' AND prod_id = '".$_POST['choice']."' and prod_status = 'published' ");
						  while($sa = mysql_fetch_array($sel_all)){
						  $harga = format_rupiah($sa[prod_price]);
							$discount = format_rupiah($sa[prod_pricedisc]);
							echo "<div class='span4 product-items'>";						
							echo "<div class='pi-images'>
							<div class='addcart'>";
							 if (!isset($_SESSION['user'])) { 
										echo "<a href='product-detail.php?prod_detail=$sa[prod_id]' ><span class='pi-cart'>Add to cart <i class='icon-play-circle icon-white'></i></span></a>";
										 } else { 
											 
										echo "<a href='act.php?module=keranjang&act=tambah&id=$sa[prod_id]' onClick='return functionDraft()'><span class='pi-cart'>Add to cart <i class='icon-play-circle icon-white'></i></span></a>";		
										 } 
							
							echo "</div>";
							echo "<a href=''><img src='timthumb.php?src=$uri/adminpanel/product/pic/$sa[prod_img]&amp;w=178&amp;h=208' alt=' ' title=' ' /></a></div>";
							echo "  <div class='pi-inner'>";
							echo "	<div class='pi-title'><a href='product-detail.php?prod_detail=$sa[prod_id]'>$sa[prod_name]</a></div>";
							echo "	<div class='pi-rating'>
							<div class='metadata_tk'>
										<ul id='rt'>";
							
										$idpg=$sa[prod_id];
										$select_com = mysql_fetch_array(mysql_query("SELECT ((sum(count_com))/(count(id_pg)))as jmlcm FROM comment WHERE id_pg = '$idpg' ORDER by id_com LIMIT 2"));
										$jml = ceil($select_com[jmlcm]);
										
										//$jml_rt = ceil($jml_pg);
										if (($jml) == ''){
												
												for ($x=0; $x<=4; $x++) {
												echo"<li id='star'></li>	";								
												
												} 	
										
										}
										elseif(($jml) =='1'){
										echo"<li id='stars'></li>";
												
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										
										} 
										elseif(($jml) =='2'){
										echo"<li id='stars'></li>
										<li id='stars'></li>";
												 
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										
										}
										elseif(($jml) =='3'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>";
												 
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										 
										} 
										elseif(($jml) =='4'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='star'></li>";
										
										}
										elseif(($jml) =='5'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>";
										
										}
										
										
								
										echo"</ul>				
										
										
									</div>
									<div class='clearfix'></div><!---end rating-->
							</div>";
							
							if (empty($discount)) {
									echo "
									<div class='pli-sale'></div>
									<div class='pli-price'>Rp&nbsp;$harga,-</div>
									";
									} elseif (empty($harga)){
									echo "
									<div class='pli-sale'></div>
									<div class='pli-price'>Rp&nbsp;$discount,-</div>";
									} else {
									echo"<div class='pli-sale'>Rp&nbsp;$harga,-</div>
											<div class='pli-price'>Rp&nbsp;$discount,-</div>";
									
									}
							echo "</div>";
							echo "</div>";
							$n++;
						  }
						}
						
						// Jika category dan language tidak kosong dan yang lainnya kosong
						if(empty($_POST['choice']) AND !empty($_POST['cat']) AND empty($_GET['hrg']) AND !empty($_POST['lang'])) {
						  $sel_all = mysql_query("select * from product where prod_category = '".$_POST['cat']."' AND prod_lang = '".$_POST['lang']."' and prod_status = 'published' ");
						  while($sa = mysql_fetch_array($sel_all)){
						  $harga = format_rupiah($sa[prod_price]);
							$discount = format_rupiah($sa[prod_pricedisc]);
							echo "<div class='span4 product-items'>";						
							echo "<div class='pi-images'>
							<div class='addcart'>";
							 if (!isset($_SESSION['user'])) { 
										echo "<a href='product-detail.php?prod_detail=$sa[prod_id]' ><span class='pi-cart'>Add to cart <i class='icon-play-circle icon-white'></i></span></a>";
										 } else { 
											 
										echo "<a href='act.php?module=keranjang&act=tambah&id=$sa[prod_id]' onClick='return functionDraft()'><span class='pi-cart'>Add to cart <i class='icon-play-circle icon-white'></i></span></a>";		
										 } 
							
							echo "</div>";
							echo "<a href=''><img src='timthumb.php?src=$uri/adminpanel/product/pic/$sa[prod_img]&amp;w=178&amp;h=208' alt=' ' title=' ' /></a></div>";
							echo "  <div class='pi-inner'>";
							echo "	<div class='pi-title'><a href='product-detail.php?prod_detail=$sa[prod_id]'>$sa[prod_name]</a></div>";
							echo "	<div class='pi-rating'>
							<div class='metadata_tk'>
										<ul id='rt'>";
							
										$idpg=$sa[prod_id];
										$select_com = mysql_fetch_array(mysql_query("SELECT ((sum(count_com))/(count(id_pg)))as jmlcm FROM comment WHERE id_pg = '$idpg' ORDER by id_com LIMIT 2"));
										$jml = ceil($select_com[jmlcm]);
										
										//$jml_rt = ceil($jml_pg);
										if (($jml) == ''){
												
												for ($x=0; $x<=4; $x++) {
												echo"<li id='star'></li>	";								
												
												} 	
										
										}
										elseif(($jml) =='1'){
										echo"<li id='stars'></li>";
												
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										
										} 
										elseif(($jml) =='2'){
										echo"<li id='stars'></li>
										<li id='stars'></li>";
												 
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										
										}
										elseif(($jml) =='3'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>";
												 
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										 
										} 
										elseif(($jml) =='4'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='star'></li>";
										
										}
										elseif(($jml) =='5'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>";
										
										}
										
										
								
										echo"</ul>				
										
										
									</div>
									<div class='clearfix'></div><!---end rating-->
							</div>";
							
							if (empty($discount)) {
									echo "
									<div class='pli-sale'></div>
									<div class='pli-price'>Rp&nbsp;$harga,-</div>
									";
									} elseif (empty($harga)){
									echo "
									<div class='pli-sale'></div>
									<div class='pli-price'>Rp&nbsp;$discount,-</div>";
									} else {
									echo"<div class='pli-sale'>Rp&nbsp;$harga,-</div>
											<div class='pli-price'>Rp&nbsp;$discount,-</div>";
									
									}
							echo "</div>";
							echo "</div>";
							$n++;
						  }
						}
					
					?>
					
					
					
				</div>
				
		</div>
		
		
	</div>
	<div class"row-fluid">
	<div class="span12 product-like">
			<h3>Anda juga Menyukainya</h3>
			<div class="plike-content">
				<div class="jcarousel-wrapper">
						<div class="arrow-caro">
						
						<a href="#" class="jcarousel-control-prev-lk">&lsaquo;</a>
						<a href="#" class="jcarousel-control-next-lk">&rsaquo;</a>
						</div>
						<div class="jcarousel_lk">
							<ul>
								<?php 
									//product like
									$select_pl = mysql_query("SELECT * FROM product WHERE prod_status ='published' ORDER BY prod_id DESC limit 9 "); 	
									while ($pl = mysql_fetch_array($select_pl)) {
									$pli_disc = format_rupiah($pl[prod_price]);
									 $pli_price= format_rupiah($pl[prod_pricedisc]);
									echo "<li>";
									echo "<div class='pl-items'>";						
									echo "<div class='pli-images'><a href='product-detail.php?prod_detail=$pl[prod_id]'><img src='timthumb.php?src=$uri/adminpanel/product/pic/$pl[prod_img]&amp;w=178&amp;h=208' alt=' ' title=' ' /></a></div>
											<div class='pli-title'><a href='product-detail.php?prod_detail=$pl[prod_id]'>$pl[prod_name]</a></div>
											<div class='pli-rating'>
											<div class='metadata_tk'>
										<ul id='rt'>";
							
										$idpg=$pl[prod_id];
										$select_com = mysql_fetch_array(mysql_query("SELECT ((sum(count_com))/(count(id_pg)))as jmlcm FROM comment WHERE id_pg = '$idpg' ORDER by id_com LIMIT 2"));
										$jml = ceil($select_com[jmlcm]);
										
										//$jml_rt = ceil($jml_pg);
										if (($jml) == ''){
												
												for ($x=0; $x<=4; $x++) {
												echo"<li id='star'></li>	";								
												
												} 	
										
										}
										elseif(($jml) =='1'){
										echo"<li id='stars'></li>";
												
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										
										} 
										elseif(($jml) =='2'){
										echo"<li id='stars'></li>
										<li id='stars'></li>";
												 
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										
										}
										elseif(($jml) =='3'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>";
												 
												for ($x=$jml; $x<=4; $x++) {
												echo"<li id='star'></li>";									
												
												} 	
										 
										} 
										elseif(($jml) =='4'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='star'></li>";
										
										}
										elseif(($jml) =='5'){
										echo"<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>
										<li id='stars'></li>";
										
										}
										
										
								
										echo"</ul>				
										
										
									</div>
									<div class='clearfix'></div><!---end rating-->
											</div>";
											if (!isset($_SESSION['user'])) { 
											echo "<a href='login.php' onClick='return functionDraftlog()'><span class='pi-cart'>Add to cart <i class='icon-play-circle icon-white'></i></span></a>";
											 } else { 
												 
											echo "<a href='act.php?module=keranjang&act=tambah&id=$li_pro[prod_id]' onClick='return functionDraft()'><span class='pi-cart'>Add to cart <i class='icon-play-circle icon-white'></i></span></a>";		
											 } 
									if (empty($pli_disc)) {
									echo "
									<div class='pli-sale'></div>
									<div class='pli-price'>Rp&nbsp;$pli_price,-</div>
									";
									} elseif (empty($pli_price)){
									echo "
									<div class='pli-sale'></div>
									<div class='pli-price'>Rp&nbsp;$pli_disc,-</div>";
									} else {
									echo"<div class='pli-sale'>Rp&nbsp;$pli_disc,-</div>
											<div class='pli-price'>Rp&nbsp;$pli_price,-</div>";
									
									}
									echo "</div>";
									echo"</li>";
									}
									?>
								
								</ul>
							</div>
							
						</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	</div>
	</div>
</section>
<?php
	include("includes/footer.php");
?>