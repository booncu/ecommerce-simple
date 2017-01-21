<?php
	include("includes/header.php");
	
	// ** listing Thum video **//
	$select_list_vid = mysql_query("SELECT 
							vid_id,
							vid_url,
							vid_title, 
							vid_count,
							vid_thumb FROM video ORDER BY vid_id DESC LIMIT 0,5");
	/**/						
	$select_vid_show = mysql_query("SELECT * FROM video WHERE vid_id = '1' ");
	$result_vid_show = mysql_fetch_array ($select_vid_show);
		
    	// ** for sale product random **//
	   
							
	//* partner slide *//
	$select_partner = mysql_query("SELECT * FROM partner ORDER BY partner_id DESC LIMIT 4");
	
	// Show one video
	$vid = mysql_fetch_array(mysql_query("select vid_url, vid_id, vid_title from video order by rand() desc limit 1"));
      	
?>
			
			
			   
				<section id='slideshow'> <!--block slideshow-->
				<div class="container-fluid">
				<div class="row-fluid">
				<div class="span12">			
					<div class="slider-wrapper theme-default">
							<div id="slider" class="nivoSlider">
								<?php 
								$select_slide_home = mysql_query("SELECT * FROM pic");
								   
									while($r=mysql_fetch_array($select_slide_home)){
											echo"<img src='timthumb.php?src=$uri/adminpanel/pic/$r[pic_tmp]&q=100&h=334&w=1010' alt='' data-transition='fade'/>
										";
								}?>
							</div>
					</div>
				</div>
				</div> 
				</div>
				<!-- End of sliderhome -->
				<div class='clearfix'></div>
				<!--<div align=center>
					<ul id='pagination' class='pagination'>
						<li onclick='ss.pos(0)'>&nbsp;</li>
						<li onclick='ss.pos(1)'>&nbsp;</li>
					</ul>
				</div>-->
				</section> <!--End block slideshow-->
				
			<section id="content">
			
				<div class="brands-home"> <!--block brands-->
					<div class="container">
					<h1>Our Brand</h1>
						<div class="jcarousel-wrapper">
						<div class="jcarousel">
							<ul>
							<?php //produk kami
							$select_sliderbrands = mysql_query("SELECT * FROM brand ORDER BY brand_id ASC");
							while($i=mysql_fetch_array($select_sliderbrands)){
								echo"<li><img src='timthumb.php?src=$uri/adminpanel/pic/brand/$i[brand_img]&amp;w=173s&amp;h=63' alt=''></li>";
								}?>
							</ul>
						</div>

						<a href="#" class="jcarousel-control-prev"></a>
						<a href="#" class="jcarousel-control-next"></a>
						</div>		  
					</div>
					<div class="clearfix"></div>
					</div>
					</div> <!--End block brands-->
				</div> <!-- End of our-brands -->
				
				<div class="unggulan-home">	<!-- block unggulan -->
				<div class="container">
					<h1>Produk Unggulan</h1>
					<div class="jcarousel-wrapper">
						<div class="jcarousel_pu">
							<ul>
							<?php 
							//produk unggulan 
							$select_product_unggulan =  mysql_query("SELECT * FROM product WHERE prod_unggulan ='unggulan' AND prod_status = 'published' ORDER BY prod_id ASC");
							while($br=mysql_fetch_array($select_product_unggulan)){
								echo"<li>";
								$isi_title = htmlentities(strip_tags($br['prod_name'])); 
								$isi = substr($isi_title,0,24); // ambil sebanyak 18 karakter

								
								echo "
								
								<div class='li-img'>
									<div class='li-text'><a  href='product-detail.php?prod_detail=$br[prod_id]'>$isi..</a></div>
									<img src='timthumb.php?src=$uri/adminpanel/product/pic/$br[prod_img]&amp;w=303s&amp;h=329' alt=''>
									
									</div>";
								echo"</li>";
								}?>
							</ul>
						</div>

						<a href="#" class="jcarousel-control-prev-pu"></a>
						<a href="#" class="jcarousel-control-next-pu"></a>
						</div>			  
					
					</div> <!-- End block unggulan -->
				</div> <!-- End of product-unggulan -->
				
				<div class="sale-home"> <!--- block sale -->
					<div class="container">
					<h1>Sale</h1>
					<div class="sh-content">
					  <div class="row-fluid">
					<?php $select_listproduct = mysql_query("SELECT * FROM product WHERE prod_status ='published' ORDER BY rand()  desc LIMIT 4"); 					
								while ($sh = mysql_fetch_array($select_listproduct)) {
									$pcm = $sh[prod_id];
								     $harga = format_rupiah($sh[prod_price]);
									 $discount = format_rupiah($sh[prod_pricedisc]);
										echo " <div class='shc-items'>";
									
								
									echo "<div class='hc-itemsimages'>";
									echo "	<a href='product-detail.php?prod_detail=$sh[prod_id]'><img src='timthumb.php?src=$uri/adminpanel/product/pic/$sh[prod_img]&amp;w=178&amp;h=223' alt=' ' title=' ' /></a>";
									echo " </div> ";
									echo "<div class='shc-itemstitle'>";
									echo "	<a href='product-detail.php?prod_detail=$sh[prod_id]'>$sh[prod_name]</a> ";
									echo "</div> ";
									echo"
									<div class='metadata_hm'>
										<ul id='rt'>";
							
										$idpg=$sh[prod_id];
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
										";
									//echo "<div class='shc-itemsrating'><img src='assets/images/rating.png' alt=' ' title=' ' /></div>";
									if (!isset($_SESSION['user'])) { 
										echo "<a href='login.php' onClick='return functionDraftlog()'><span class='pi-cart'>Add to cart <i class='icon-play-circle icon-white'></i></span></a>";
										 } else { 
											 
										echo "<a href='act.php?module=keranjang&act=tambah&id=$sh[prod_id]' onClick='return functionDraft()'><span class='pi-cart'>Add to cart <i class='icon-play-circle icon-white'></i></span></a>";		
										 } 
									if(empty($discount)){
									echo "
									<div class='shc-itemssale'></div>
									<div class='shc-itemsprice'>Rp.$harga,-</div>";
									} elseif(empty($harga)) {
									echo "
									<div class='shc-itemssale'></div>
									<div class='shc-itemsprice'>Rp.$discount,-</div>";
									
									} else{
									echo "
									<div class='shc-itemssale'>Rp&nbsp;$harga,-</div>
									<div class='shc-itemsprice'>Rp&nbsp;$discount,-</div>
									";
									
									}
								echo "</div>";
							
					
					}?>
				<div class='clearfix'></div>
				</div>
				</div>
				</div> 
				</div> <!-- End of sale-home --><!-- End block sale -->
				
				<div class="video-home"><!-- block video -->
				  <div class="container">
					<h1>Video</h1>
					<hr>
					<div class="vh-content">
						<div class="row-fluid">
							<div class="span7 videoshow">
											<div id="vids">
											
											<div id='playerZILPpOMZFUeQ'></div>
											<script type='text/javascript'>
													jwplayer('playerZILPpOMZFUeQ').setup({
													file: '<?php echo $vid['vid_url']; ?>',
													title: '<?php echo $vid['vid_title']; ?>',
													width: '100%',
													aspectratio: '16:9',
													autoplay: false
														});
											</script>											
											</div>
											</div>
											<div class="span5 videoitems">
												<div class="vi-content">
													<?php 
													   while ($t = mysql_fetch_array($select_list_vid)) {									
															echo "<div class='vic-items'>";
															echo "	<div class='row-fluid'>";
															echo "	<div class='span4 vic-thumbnail'>";
															echo "			<img src='$t[vid_thumb]' />";
															echo "		</div>";
															echo "		<div class='span8 vic-info'>";
															echo "			<a class='vid' id='$t[vid_id]' style='cursor:pointer;'>$t[vid_title]</a><br/>";
															echo "			<span>";
															echo "				by <b>Administrator</b> &bull; 5 months ago &bull; $t[vid_count] views";
															echo "			</span>";
															echo "		</div>";
															echo "		<div class='clearfix'></div>";
															echo "	</div>";
															echo "</div>";
														}
														?>
												</div>
											</div>
											<div class="clearfix"></div>
						</div>
					</div>
				</div> <!-- End of video-home -->
				</div><!-- block video -->
				
				<div class="partner-home"> <!--block partner-->
				  <div class="container">
					<h1>Our Partner</h1>
					<hr>
					<div class="ph-content">
						
							<div class="list-ip">
								
									<!---  partner ---->
									
									<?php while($ip=mysql_fetch_array($select_partner)){
									
									echo "<img src='adminpanel/pic/partner/$ip[partner_img]' alt=' ' title=' ' />";
									
									}?>
									
									
								   
								
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				 <!-- End of partner-home -->
				</div> <!-- block partner -->
				
			</section> <!-- End of section content -->
<?php
	include("includes/footer.php");
?>			