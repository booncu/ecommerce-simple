<?php
	include("includes/header.php");
	$catid = $_GET[cat];
	$select_listproduct = mysql_query("SELECT * FROM product WHERE prod_category ='$catid' AND prod_status = 'published' ORDER BY prod_id DESC limit 9 "); 
	
	//product like
	$select_pl = mysql_query("SELECT * FROM product WHERE prod_status ='published' ORDER BY prod_id DESC limit 9 "); 	
	
	//product spesial
	$sp = mysql_fetch_array(mysql_query("select prod_id, prod_unggulan, prod_name, prod_img, prod_price, prod_pricedisc from product where prod_unggulan ='unggulan' and prod_status = 'published' order by rand() desc limit 1 "));
	$harga = format_rupiah($sp[prod_price]);
	$discount = format_rupiah($sp[prod_pricedisc]);
?>
<section id="content">
  <div class="container">
	<div class="product">
		<div class="row-fluid">
			<div class="span3 product-left">
				<h3>Kategori</h3>
				<div class="pl-category">
				<ul>
				<?php 
				// get category				
				$select_cat = mysql_query("select * from category order by cat_id");
				while ($result_cat = mysql_fetch_array($select_cat)) {
				$jml = mysql_fetch_array(mysql_query("select count(prod_category) as jmlh from product  where prod_category = '$result_cat[cat_id]' AND prod_status ='published' order by prod_category"));
				echo "<li><a href='category.php?cat=$result_cat[cat_id]' title=''>$result_cat[cat_name]($jml[jmlh])</a></li>";
				}
				?>
				</ul>
				</div> <!-- End of pl-category -->
				
				<h3>Filter Produk</h3>
				<div class="pl-form">
					<form method="POST" action="filter-products.php">
						<div class="controls">
							<label>Pilihan</label>
							<select name="choice">
							<option value="" selected="selected">-- select --</option>
							<option value="<?php echo $sale ;?>">Sale</option>";
						    <option value="<?php echo $new;?>">Terbaru</option>";
							</select>
						</div>
						
						<div class="controls">
							<label>Kategori</label>
							<select name="cat">
							<option value="" selected="selected">-- select --</option>
							<?php 
								$select_cat_si = mysql_query("select * from category order by cat_id");
								while ($cat_pil = mysql_fetch_array($select_cat_si)){
								echo "<option value ='$cat_pil[cat_id]'>$cat_pil[cat_name]</option>";
								}
								?>
							</select>
						</div>
						
						<div class="controls">
							<label>Harga</label>
							<select name="hrg">
								<option value="" selected="selected">-- select --</option>
								<option value="<?php echo $termahal;?>">Termahal</option>
								<option value="<?php echo $termurah;?>">Termurah</option>
							</select>
						</div>
						
						<div class="controls">
							<label>Bahasa</label>
							<select name="lang">
								<option value="" selected="selected">-- select --</option>
								<option value="Inggris">Inggris</option>
								<option value="Mandarin">Mandarin</option>
								<option value="Jepang">Jepang</option>
								<option value="Indonesia">Indonesia</option>
							</select>
						</div>
						
						<div class="controls">
							<button type="submit" value="Submit" name="submit" class="btn btn-danger"><i class="icon-search icon-white"></i> Cari</button>
						</div>
					</form>
				</div> <!-- End of pl-form -->
				
				<h3>Produk Spesial</h3>
				<div class="pl-special">
					<div class="pls-images">
						<a href="product-detail.php?prod_detail=<?php echo $sp[prod_id];?>"><img src="adminpanel/product/pic/<?php echo $sp[prod_img] ?>" alt="<?php echo $sp[prod_name];?>" title="<?php echo $sp[prod_name];?>" /></a>
					</div>
					<div class="pls-title">
						<a href="product-detail.php?prod_detail=<?php echo $sp[prod_id];?>"><?php echo $sp[prod_name];?></a>
					</div>
					<div class="pls-rating">
						<div class="metadata_ps">
							<ul id="rt">
							<?php $result_procm = mysql_query("SELECT * FROM product WHERE prod_id = '$sp[prod_id]' ");
							while($rcom=mysql_fetch_array($result_procm)){
							$idpg=$rcom[prod_id];
							?>
							<?php $select_com = mysql_fetch_array(mysql_query("SELECT ((sum(count_com))/(count(id_pg)))as jmlcm FROM comment WHERE id_pg = '$idpg' ORDER by id_com LIMIT 2"));
							$jml = ceil($select_com[jmlcm]);
							?>
							<?php
							
							if (($jml) == ''){?>
									<?php 
									for ($x=0; $x<=4; $x++) {?>
									<li id="star"></li>									
									<?php
									} ?>	
							<?php
							}
							elseif(($jml) =='1'){?>
							<li id="stars"></li>
									<?php 
									for ($x=$jml; $x<=4; $x++) {?>
									<li id="star"></li>									
									<?php
									} ?>	
							<?php 
							} 
							elseif(($jml) =='2'){?>
							<li id="stars"></li>
							<li id="stars"></li>
									<?php 
									for ($x=$jml; $x<=4; $x++) {?>
									<li id="star"></li>									
									<?php
									} ?>	
							<?php 
							}
							elseif(($jml) =='3'){?>
							<li id="stars"></li>
							<li id="stars"></li>
							<li id="stars"></li>
									<?php 
									for ($x=$jml; $x<=4; $x++) {?>
									<li id="star"></li>									
									<?php
									} ?>	
							<?php 
							} 
							elseif(($jml) =='4'){?>
							<li id="stars"></li>
							<li id="stars"></li>
							<li id="stars"></li>
							<li id="stars"></li>
							<li id="star"></li>
							<?php 
							}
							elseif(($jml) =='5'){?>
							<li id="stars"></li>
							<li id="stars"></li>
							<li id="stars"></li>
							<li id="stars"></li>
							<li id="stars"></li>
							<?php
							}?>
							<?php
							}?>
							</ul>				
							</div><!--end rating-->
							<div class="clearfix"></div>
					</div>
					<?php if (!isset($_SESSION['user'])) { ?>
								<a href="login.php" onClick="return functionDraftlog()"><span class="pi-cart">Add to cart <i class="icon-play-circle icon-white"></i></span></a>
								<?php } else { ?>
								     
								<a href="act.php?module=keranjang&act=tambah&id=<?php echo $sp[prod_id];?>" onClick="return functionDraft()"><span class="pi-cart">Add to cart <i class="icon-play-circle icon-white"></i></span></a>	
								<?php } ?>
					<div class="pls-price">
					<?php 
					if (empty($discount)){ ?>
					Rp.<?php echo $harga ;?>,-
					<?php } 
					else 
					{?>
					Rp. <?php echo $discount ;?>,-
					<?php } ?>
											
					</div>
					</div> <!-- End of pl-special -->
				
				<h3>Banners</h3>
				<div class="pl-banners"> 
				<?php $ban_cat = mysql_query("select * from banner order by rand() limit 1");
				while ($banrand = mysql_fetch_array($ban_cat)){
					echo "<a href='http://$banrand[banner_link]' target='_blank'><img src='timthumb.php?src=$uri/adminpanel/pic/banner/$banrand[banner_img]&amp;w=178&amp;h=320' alt='$banrand[banner_name]' title='$banrand[banner_name]' /></a>";
					}?>
				</div> <!-- End of pl-banners -->
			</div>
			
			<div class="span9 product-right">
			<div class="row-fluid">
				<div class="pr-banner">
				<?php $ban_ful = mysql_query("select * from category where cat_id = '$catid' limit 1");
				while($ban_fulco = mysql_fetch_array($ban_ful)){
					echo "<img src='timthumb.php?src=$uri/adminpanel/pic/category/$ban_fulco[cat_img]&amp;w=750&amp;h=263' alt=' ' title=' ' />";
					}?>
				</div>
				<div class="pr-content">
					
					<!--<div class="span4 product-itemslast">-->
					<!--<div class="pi-label"><img src="assets/images/new-label.png" alt="" title="" /></div>-->
					<?php 
					while ($li_pro = mysql_fetch_array($select_listproduct)){
					$harga = format_rupiah($li_pro[prod_price]);
					$discount = format_rupiah($li_pro[prod_pricedisc]);
					$uri = mysql_fetch_array(mysql_query("select setting_url from setting order by setting_id limit 1 "));
					echo "<div class='span4 product-items'>";						
					echo "<div class='pi-images'>
					<div class='addcart'>";
					if (!isset($_SESSION['user'])) { 
								echo "<a href='product-detail.php?prod_detail=$li_pro[prod_id]' '><span class='pi-cart'>Add to cart <i class='icon-play-circle icon-white'></i></span></a>";
								 } else { 
								     
								echo "<a href='act.php?module=keranjang&act=tambah&id=$li_pro[prod_id]' onClick='return functionDraft()'><span class='pi-cart'>Add to cart <i class='icon-play-circle icon-white'></i></span></a>";		
								 } 
					echo "</div>";
					echo "<a href='product-detail.php?prod_detail=$li_pro[prod_id]'><img src='timthumb.php?src=$uri[setting_url]/adminpanel/product/pic/$li_pro[prod_img]&amp;w=178&amp;h=208' alt=' ' title=' ' /></a></div>";
					echo "  <div class='pi-inner'>";
					echo "	<div class='pi-title'><a href='product-detail.php?prod_detail=$li_pro[prod_id]'>$li_pro[prod_name]</a></div>";
					echo "	<div class='pi-rating'>
					<div class='metadata_tk'>
										<ul id='rt'>";
							
										$idpg=$li_pro[prod_id];
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
					
					if (empty($discount)){
					echo"
					<div class='pi-sale'></div>
					<div class='pi-price'>Rp&nbsp;$harga,-</div>";
					} elseif (empty($harga)) {
					echo"
					<div class='pi-sale'></div>
					<div class='pi-price'>Rp&nbsp;$discount,-</div>";
					} else {
					echo "	<div class='pi-sale'>Rp&nbsp;$harga,-</div>";
					echo "	<div class='pi-price'>Rp&nbsp;$discount,-</div>";
					}
					echo "</div>";
					echo "</div>";
					$n++;
					}?>
					
					
					<!--<div class="product-pagination">
						1 2 3 4 5 > >>
					</div>-->
				</div>
				<!--<div class="pr-terkait">
					<h3>Produk Terkait</h3>
					<div class="carousel">
						<div class="next-pt"></div>
						<div class="prev-pt"></div>
						<div class="list-pt">
							<ul>
							<?php for($p=1; $p<=4; $p++) { ?>
								<li>
									<?php if($p % 4 == 0) { ?>
									<div class="pt-itemslast">
									<?php } else { ?>
									<div class="pt-items">
									<?php } ?>
									
										<div class="pti-images"><a href="#"><img src="assets/images/product5.png" alt="" title="" /></a></div>
										<div class="pti-title">FMTX audiology e-Pen</div>
										<div class="pti-rating"><img src="assets/images/rating.png" alt="" title="" /></div>
										<a href=""><span class="pli-cart">Add to cart <i class="icon-play-circle icon-white"></i></span></a>
										<div class="pti-sale">Rp.950.000,-</div>
										<div class="pti-price">Rp.800.000,-</div>
									</div>
								</li>
							<?php } ?>
							</ul>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>-->
			<div class="clearfix"></div>
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
							
							while ($pl = mysql_fetch_array($select_pl)) {
							$pli_price = format_rupiah($pl[prod_price]);
							$pli_disc = format_rupiah($pl[prod_pricedisc]);
							$uri = mysql_fetch_array(mysql_query("select setting_url from setting order by setting_id limit 1 "));
							echo "<li>";
							echo "<div class='pl-items'>";						
							echo "<div class='pli-images'><a href='product-detail.php?prod_detail=$pl[prod_id]'><img src='timthumb.php?src=$uri[setting_url]/adminpanel/product/pic/$pl[prod_img]&amp;w=178&amp;h=208' alt=' ' title=' ' /></a></div>
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
								     
								echo "<a href='act.php?module=keranjang&act=tambah&id=$pl[prod_id]' onClick='return functionDraft()'><span class='pi-cart'>Add to cart <i class='icon-play-circle icon-white'></i></span></a>";		
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