<?php
	include("includes/header.php");	
	//** listing news **//
	$select_list_news = mysql_query("SELECT * FROM news ORDER BY news_id");
	
	$get_tahun = mysql_fetch_array(mysql_query("select news_date from news order by news_id"));
	$date = getTahun($get_tahun[news_date]);
	
	
							
							
?> 
<!-- End of section header -->
			<!--<section id="subcribe">
				<div class="span6 sb">
							<div class="sbcontent">
								<form method="post" action="" class="form-search">
									<input type="text" class="input-large" placeholder="Alamat Email Anda">
									<button type="submit" class="btn btn-danger">daftar</button>
								</form>
							</div>
				</div>
				<div class="clearfix"></div>
			</section>-->		
			<section id="content">
			<div class="container">
			<div class="wrap clearfix">
				<div class="row-fluid">
					<div class="span3 sidebar-ne">
						<div class="widget-arsip">
							<div class="head-title-arsip">
								<h3>Arsip</h3>
							</div>
							<div class="accordion" id="leftMenu">								
							<?php $select_archived = mysql_query("SELECT DISTINCT date_format(news_date, '%Y') as tahun FROM news where news_status='published'");
							 $no = 1;
							 while ($archive = mysql_fetch_array($select_archived)){
							 				 
							  echo "<div class='accordion-group'>";
							  echo "<div class='accordion-heading'>
									<a class='accordion-toggle' data-toggle='collapse' data-parent='#leftMenu' href='#collapse$no'>
											$archive[tahun]
										</a>
									</div>";
							  echo  "	<div id='collapse$no' class='accordion-body collapse' style='height: 0px; '>
										<div class='accordion-inner'>
											<ul>";
											$select_m = mysql_query("SELECT DISTINCT date_format(news_date, '%M') as bulan from news where date_format(news_date, '%Y') = '$archive[tahun]'");
											while ($m = mysql_fetch_array($select_m)){
											$jmlh = mysql_fetch_array(mysql_query("SELECT COUNT(news_id) as jml from news where date_format(news_date, '%M') = '$m[bulan]' AND date_format(news_date, '%Y') = '$archive[tahun]'"));
											echo"	<li><a href='ne-category.php?arsip=$m[bulan]&thn=$archive[tahun]'>$m[bulan][$jmlh[jml]]</a></li>";
												}
											echo "</ul>
			
										</div>
									</div>";
							  echo "</div>";
							  $no++;
							 }
							 ?>	
							</div>
						</div>
					</div>
					<div class="span9 post-ne">
						<div class="post-inner-ne">
						<?php 
								while ($ls = mysql_fetch_array($select_list_news)) {
								$tgl = tgl_indo($ls['news_date']);
								
								echo "<div class='row-fluid entry-post-ne'>";
								echo "	<div class='span4 post-thumb-ne'>";
										$image = explode(", ", $ls[news_img]);
										for($i=0;$i<1;$i++){
										if ($image["$i"]!="") {
										//echo "	<a href='ne-detail.php?news_id=$ls[news_id]'><img src='adminpanel/newspic/$ls[news_img]' alt=' ' title= ' ' /></a>";
										echo '<img src="adminpanel/newspic/'.$image["$i"].'" />';
																	
											}
										}
								echo "	</div>";
								echo "	<div class='span8 post-content'>";
								echo "		<div class='hd-group'>";
								echo "			<div class='header-post-ne'>";
								echo "				<h3><a href='ne-detail.php?news_id=$ls[news_id]'>$ls[news_title]</a></h3>";
								echo "			</div>";
								echo "			<div class='date'>";
								echo "				<span>$tgl</span>";
								echo "			</div>";
								echo "		</div> ";
								// Tampilkan hanya sebagian isi 
								$isi_news = htmlentities(strip_tags($ls['news_text'])); // membuat paragraf pada isi berita dan mengabaikan tag html
								$isi = substr($isi_news,0,180); // ambil sebanyak 180 karakter
								$isi = substr($isi_news,0,strrpos($isi," ")); // potong per spasi kalimat
								echo "		<p>$isi.. <a href='ne-detail.php?news_id=$ls[news_id]'><span class='rm'>Selengkapya</span></a></p>";
								echo "	</div>";
								echo "	<div class='clearfix'></div>";
								echo "</div>	";
							}?>
						</div>
					</div>
				</div>
			</div>	
			</div>
			</section> <!-- End of section content -->
<?php
	include("includes/footer.php");
?>