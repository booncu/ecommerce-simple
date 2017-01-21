<?php
	include("includes/header.php");
	
	// ** listing Thum video **//
	$select_list_vid = mysql_query("SELECT 
							vid_id,
							vid_url,
							vid_title, 
							vid_count,
							vid_thumb FROM video ORDER BY vid_id DESC LIMIT 5");
	/**/						
	$vid_show = mysql_fetch_array(mysql_query("SELECT vid_id, vid_url, vid_title FROM video order by vid_id desc limit 1"));
	// Show one video
	$vid = mysql_fetch_array(mysql_query("select vid_url, vid_id, vid_title from video order by rand() desc limit 1"));	
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
					<div class="span12 post-vd">
						<div class="post-inner-vd">
							<div class="header-title">
								<h1>Video Kami</h1>
							</div>
						<div class="vd-content">
						<div class="row-fluid">
							<div class="video-home"><!-- block video -->
								<div class="container">
									
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
							<div class="clearfix"></div>
						</div>
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