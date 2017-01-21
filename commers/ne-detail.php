<?php
	include("includes/header.php");	
	$id = $_GET['news_id'];
	$select_list_news_details = mysql_fetch_array(mysql_query("SELECT  news_id, news_title, news_text, news_date, news_img FROM news WHERE news_id ='$id'  "));
	$tgl = tgl_indo($select_list_news_details[news_date]);									
?>
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
							<div class="row-fluid entry-gallery-ne">
								<div class="box-img-gallery">
								<!-- wrapper element for the large image -->
									<div id="image_wrap">
									<!-- Initially the image is a simple 1x1 pixel transparent GIF -->
									<img src="/media/img/blank.gif" width="453" height="311" />
									</div>
									<!-- HTML structures -->
									<div style="margin:0 auto; width: 634px; height:120px;">
									<!-- "previous page" action -->
									<a class="prev browse left"></a>
									<!-- root element for scrollable -->
											<div class="scrollable" id="scrollable">
											<!-- root element for the items -->
													<div class="items">
															<!-- 1-5 -->
															<?php $select_img = mysql_fetch_array(mysql_query("select * from news where news_id ='$id' "));
															//while ($img = mysql_fetch_array($select_img)){
															echo "<div>";
																$image = explode(", ", $select_img[news_img]);
																for($i=0; $i<10; $i++) {
																if ($image["$i"]!="") {
																	echo '
																	<img src="timthumb.php?src='.$uri.'/adminpanel/newspic/'.$image["$i"].'&amp;w=553&amp;h=381 " />
																	';
																}
																}
			
															echo"</div>";
														
															?>
															
													</div>
											</div>
											<!-- "next page" action -->
									<a class="next browse right"></a>
									</div>
								</div>
									<script type="text/javascript" language="javascript">
									$(function() {
									$(".scrollable").scrollable();
									$(".items img").click(function() {
									// see if same thumb is being clicked
									if ($(this).hasClass("active")) { return; }
									// calclulate large image's URL based on the thumbnail URL (flickr specific)
									var url = $(this).attr("src").replace("_c", "");
									// get handle to element that wraps the image and make it semi-transparent
									var wrap = $("#image_wrap").fadeTo("medium", 0.5);
									// the large image from www.flickr.com
									var img = new Image();
									// call this function after it's loaded
									img.onload = function() {
									// make wrapper fully visible
									wrap.fadeTo("fast", 1);
									// change the image
									wrap.find("img").attr("src", url);
									};
									// begin loading the image from www.flickr.com
									img.src = url;
									// activate item
									$(".items img").removeClass("active");
									$(this).addClass("active");
									// when page loads simulate a "click" on the first image
									}).filter(":first").click();
									});
									</script>
							</div>
							<div class="row-fluid entry-post-ne">
								
								<div class="span8 post-content">
								
									<div class='hd-group'>
									
									<div class='header-post-ne'>
										<h3><?php echo $select_list_news_details[news_title];?></h3>
									</div>
									<div class='date'>
									<span><?php echo $tgl;?></span>
									</div>
									</div>
									<p><?php echo $select_list_news_details[news_text];?></p>									
								</div>
							
								<div class="clearfix"></div>
								
							</div>	
						
						</div>
					</div>
				</div>
			</div>	
			</div>
			</section> <!-- End of section content -->
<?php
	include("includes/footer.php");
?>