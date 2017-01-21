<?php
	include("includes/header.php");
	
	$pid = $_GET[prod_detail];
	
	$select_prod_details = mysql_query("SELECT  *  FROM product WHERE prod_id ='$pid'  ");	
	
	//product terkait						
		$dt= mysql_fetch_array($select_prod_details);
		$hargas = format_rupiah($dt[prod_price]);
		$hargas_disc = format_rupiah($dt[prod_pricedisc]);
		$select_detail= mysql_query("SELECT * FROM product WHERE prod_category = '$dt[prod_category]' ");
		$result_details = mysql_fetch_array($select_detail);
		$param_terkait = $dt[prod_category];

		//** seleksi related product **//
		$select_related = mysql_query("SELECT * FROM product WHERE prod_category = '$param_terkait' AND prod_id != '$pid' AND prod_status ='published' ORDER BY RAND() LIMIT 10	");  
	
	//product spesial
	$sp = mysql_fetch_array(mysql_query("select prod_id, prod_unggulan, prod_name, prod_img, prod_price, prod_pricedisc from product where prod_unggulan ='unggulan' and prod_status = 'published' order by rand() desc limit 1 "));
	$harga = format_rupiah($sp[prod_price]);
	$discount = format_rupiah($sp[prod_pricedisc]);
	
	
		
?>
<section id="content">
  <div class="container">
	<div class="product-detail">
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
				<div class="product-info">
					<form method="post" action="act.php">
					<input type="hidden" name="dt" value="<?php echo $dt[prod_id]?>">
					<div class="row-fluid">
					
						<div class="span5">
							<img id="zoom_01" src="timthumb.php?src=<?php echo $uri?>/adminpanel/product/pic/<?php echo $dt[prod_img] ?>&amp;w=303&amp;h=329" data-zoom-image="<?php echo $uri?>/adminpanel/product/pic/<?php echo $dt[prod_img]?>" alt="<?php echo $dt[prod_name] ?>" title="<?php echo $dt[prod_name] ?>" />
						</div>
						
						
						<div class="span7">
							<h1><?php echo $dt[prod_name] ?></h1>
							<div class="metadata">
							<ul id="rt">
							<?php $result_procm = mysql_query("SELECT * FROM product WHERE prod_id = '$pid' ");
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
							<div class="pinfo-sinopsis">
								<?php echo $dt[prod_text] ?>
							</div>
							<div class="pinfo-price">
							<?php 
							if(empty($hargas_disc)){?>
								Rp. <?php echo $hargas ?>
								
								<?php 
								} else {?>
								<div class="pli-sale-dt">Rp&nbsp;<?php echo $hargas ?>,-</div>
								<div class="pli-price-dt">Rp&nbsp;<?php echo $hargas_disc ?>,-</div>
								<?php
								}?>
								
							</div>
							<div class="pinfo-cicilan">
								<div class="row-fluid">
									<div class="span2">
										Cicilan  :
									</div>
									<div class="span10">
										<?php echo $dt[prod_cil] ?>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							
							<div class="pinfo-others">
								<div class="row-fluid">
									<div class="span8">
										<div class="qty">
											Qty : &nbsp;
											<select name="qty" class="input-small">
												<?php for($i=1; $i<=10; $i++) { ?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="socmed">
											<div class="soc" align="left">
												<script type="text/javascript">
													
													function share() {
														var title = "<?php echo $dt[prod_name] ?>";
														var summary = "";
														
														var url = "";
														var image = "<?php echo $uri?>/adminpanel/product/pic/<?php echo $dt[prod_img] ?>";

														var fb = window.open('http://www.facebook.com/sharer.php?s=100&p[title]='+encodeURIComponent(title)+'&p[summary]='+encodeURIComponent(summary)+'&p[url]='+encodeURIComponent(url)+'&p[images][0]='+encodeURIComponent(image), 'sharer', 'width=626,height=436');
														//fb.focus();
													}
													
													
													function openwindow()
													{
														window.open("http://twitter.com/share?text=<?php echo $dt[prod_name]?>&url=&via=readboy","mywindow","menubar=1,resizable=1,width=600,height=450");
													}
												
												</script>
												Share :
												<a href="javascript: share()" class="facebook"></a>
												<a href="javascript: openwindow()" class="twitter"></a>
												
											</div><!-- .soc -->
										</div>
									</div>
									<div class="span4">
									
										<!--<input type="submit" name="submit" value="Add to Cart" /> <br/>-->
										<?php if (!isset($_SESSION['user'])) { 
										echo "<a class='btn btn-danger' href='login.php' onClick='return functionDraftlog()'>Add to Cart</a>";
										 } else { 
											 
										echo "<input type='submit' name='submit' value='Add to Cart' />";		
										 } 
										?>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					</form>
				</div> <!-- End of product-info -->
				
				<div class="product-tab">
					<div class="tabbable"> <!-- Only required for left/right tabs -->
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab1" data-toggle="tab">Deskripsi</a></li>
							<li><a href="#tab2" data-toggle="tab">Review</a></li>
							<li><a href="#tab3" data-toggle="tab">Video</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab1">
								<div class="tc-desc">
									<p><?php echo $dt[prod_desc]?></p>
								</div>
							</div>
							<div class="tab-pane" id="tab2">
							
								<?php $select_CM = mysql_fetch_array(mysql_query("SELECT * FROM comment WHERE status='Y' AND id_pg ='$pid' "));
							  if ($select_CM['status']=='Y'){
							$rc= mysql_query("SELECT * FROM comment WHERE status='Y' AND id_pg='$pid' ");
							while($rs=mysql_fetch_array($rc)){
							$tgll=$rs[tgl];
							$tglb=date("d-m-Y", strtotime($tgll));
							echo'
								<div class="row-fluid"> 
								<div class="span12">
								<div class="in-com">
								<div class="meta-data">
								<span style="font-size:14px;font-weight: bold;">'.$rs[name_com].'</span><span style="margin-left:10px;">'.$tglb.'|'.$rs[time].'</span>
								</div>
								<div class="comments-com">
								'.$rs[isi_com].'
								</div>
								</div>
								</div>
								</div>';}
								} else {
								echo'
								<div class="row-fluid"></div>';
								}
								?>
								
								<?php if (!isset($_SESSION['user'])){ ?>
									
									<form method="post" action="includes/cm.php">
									<input type="hidden" name="idpg" value="<?php echo $dt[prod_id] ?>">
										<div class="row-fluid">
										<div class="p">Kami ingin mengetahui opini Anda  terhadap produk ini!</div>
										<div class="p">Berikan rating sesuai penilaian Anda * 
										<div class="rating">
											<input type="radio" name="rating" value="0" checked /><span id="hide"></span>
											<input type="radio" name="rating" value="1" /><span></span>
											<input type="radio" name="rating" value="2" /><span></span>
											<input type="radio" name="rating" value="3" /><span></span>
											<input type="radio" name="rating" value="4" /><span></span>
											<input type="radio" name="rating" value="5" /><span></span>
										</div>
										</div>
										<div class="p">
											<div class="span5">
												<div class="controls">
													<label>Nama *</label>
													<input type="text" name="name" class="input-large" />
												</div>
												<div class="controls">
													<label>Email *</label>
													<input type="text" name="email" class="input-large"  />
												</div>
											</div>
											<div class="span7">
												<div class="comment">
													<div class="controls">
														<label>Komentar *</label>
														<textarea name="comment" cols="50" rows="6"></textarea>
													</div>
												</div>
											</div>
											<div class="clearfix"></div>
											
											<div class="row-fluid">
											<div class="controls">
											
											<label style="font-size:">Kode Sekuriti <span>*</span></label>
											
											<div class="span2" style="margin-left:-0.1px;">
											<input type="text" name="_cOde" class="input-small" />
											</div>
											<div class="span2" style="margin-left:-20px;">
												<input type="text" name="_cAptcha" class="input-small" value="<?php echo $captcha1->showcaptcha(); ?> ?" disabled="disabled"/>
												
											</div>
											<div class="p-submit">
											<input type="submit" name="submit" value="Kirim" onClick="return functionCm()"/>
											</div>
											<div class="clearfix"></div>
											</div>
											</div>
										</div>
										
										
									</form>
									<?php } else { ?>
									<?php  $du =mysql_fetch_array(mysql_query("SELECT * FROM user WHERE user_id ='".$_SESSION['user']."' "));
									
									?>
									<form method="post" action="includes/cm.php">
									<input type="hidden" name="idpg" value="<?php echo $dt[prod_id] ?>">
										<div class="row-fluid">
											<div class="span5">
												<div class="controls">
													<label>Nama *</label>
													<input type="text" name="name" class="input-large" value="<?php echo "$du[user_name]";?>" />
												</div>
												<div class="controls">
													<label>Email *</label>
													<input type="text" name="email1" class="input-large" value="<?php echo "$du[user_email]";?>" disabled="disabled"/>
													<input type="hidden" name="email" class="input-large" value="<?php echo "$du[user_email]";?>" />
												</div>
											</div>
											<div class="span7">
												<div class="comment">
													<div class="controls">
														<label>Komentar *</label>
														<textarea name="comment" cols="50" rows="6"></textarea>
													</div>
												</div>
											</div>
											<div class="clearfix"></div>
											
											<div class="row-fluid">
											<div class="controls">
											
											<label style="font-size:">Kode Sekuriti <span>*</span></label>
											
											<div class="span2" style="margin-left:-0.1px;">
											<input type="text" name="_cOde" class="input-small" />
											</div>
											<div class="span2" style="margin-left:-20px;">
												<input type="text" name="_cAptcha" class="input-small" value="<?php echo $captcha1->showcaptcha(); ?> ?" disabled="disabled"/>
												
											</div>
											<div class="p-submit">
											<input type="submit" name="submit" value="Kirim" onClick="return functionCm()"/>
											</div>
											<div class="clearfix"></div>
											</div>
											</div>
										</div>
										
										
									</form>
									<?php } ?>
								</div>
							</div>
							<div class="tab-pane" id="tab3">
								<div class="row-fluid">
									<div class="span8">
									<?php //video product
	$select_vid = mysql_fetch_array(mysql_query("select prod_id, prod_vid, prod_name, prod_text from product where prod_id ='$pid' order by prod_vid desc limit 1")); ?>
										<div id='playerZILPpOMZFUeQ'></div>
										<script type='text/javascript'>
											jwplayer('playerZILPpOMZFUeQ').setup({
												file: '<?php echo $uri?>/adminpanel/product/vid/<?php echo $select_vid['prod_vid'];?>',
												title: '<?php echo $select_vid['prod_name'];?>',
												width: '100%',
												aspectratio: '16:9',
												autoplay: false
											});
										</script>
									</div>
									<div class="span4">
										<h3><?php echo $select_vid['prod_name'];?></h3>
										<div><?php echo $select_vid['prod_text'];?></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- End of product-tab -->
				
				<div class="pr-terkait">
					<h3>Produk Terkait</h3>
					<div class="jcarousel-wrapper">
						<div class="arrow-caro">
						
						<a href="#" class="jcarousel-control-prev-tk">&lsaquo;</a>
						<a href="#" class="jcarousel-control-next-tk">&rsaquo;</a>
						</div>
						<div class="jcarousel_tk">
							<ul>
								
								<?php while ($pk = mysql_fetch_array($select_related)){
								$isi_title = htmlentities(strip_tags($pk['prod_name'])); 
								$isi = substr($isi_title,0,24); // ambil sebanyak 18 karakter
								$pti_disc = format_rupiah($pk[prod_pricedisc]);
								$pti_price = format_rupiah($pk[prod_price]);
								echo "<li>";
								echo "	<div class='pt-items'>";								
								echo " <div class='pti-images'><a href='product-detail.php?prod_detail=$pk[prod_id]'><img src='timthumb.php?src=$uri/adminpanel/product/pic/$pk[prod_img]' alt=' ' title=' ' /></a></div>
										<div class='pti-title'>$isi..</div>
										<div class='pti-rating'>
										<div class='metadata_ptk'>
										<ul id='rt'>";
							
										$idpg=$pk[prod_id];
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
												 
											echo "<a href='act.php?module=keranjang&act=tambah&id=$pk[prod_id]' onClick='return functionDraft()'><span class='pi-cart'>Add to cart <i class='icon-play-circle icon-white'></i></span></a>";		
											 } 
										echo"
										<div class='pti-sale'>Rp&nbsp;$pti_disc,-</div>
										<div class='pti-price'>Rp&nbsp;$pti_price,-</div>";
								echo"</div>";
								echo "</li>";
							}
							?>
							</ul>
						</div>
					</div>
					<div class="clearfix"></div>
				</div> <!-- End of pr-terkait -->
			</div> <!-- End of product-right -->
			<div class="clearfix"></div>
		</div>
		
		<div class="row-fluid">
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
									$pli_disc = format_rupiah($pl[prod_pricedisc]);
									$pli_price = format_rupiah($pl[prod_price]);
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
									echo "<div class='clearfix'></div></div>";
									echo"</li>";
									}
									}
									?>
								
								</ul>
								
							</div>
							
						</div>
						<div class="clearfix"></div>
					</div>
			</div>
		</div><!-- End of product-like -->
	</div> <!-- End of product-detail -->
	</div> <!-- End of product-detail -->
	
</div>
</section> <!-- End of section content -->
<?php
	include("includes/footer.php");
?>