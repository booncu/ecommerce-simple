<?php
	include("includes/header.php");	
	

							
							
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
						$mm = $_GET['arsip'];
						$yy = $_GET['thn'];
						//** listing news **//
						$select_list_m = mysql_query("SELECT 
						news_id,
						news_title,
						news_img,
						news_text,
						date_format(news_date, '%M')
						FROM news WHERE date_format(news_date, '%M') = '$mm' AND date_format(news_date, '%Y') = '$yy' order by news_id desc");
								while ($ls = mysql_fetch_array($select_list_m)) {
								
								echo "<div class='row-fluid entry-post-ne'>";
								echo "	<div class='span4 post-thumb-ne'>";$image = explode(", ", $ls[news_img]);
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
								echo "		<p>$ls[news_text]<a href='ne-detail.php?news_id=$ls[news_id]'><span class='rm'>Selengkapya</span></a></p>";
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