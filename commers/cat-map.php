<?php
	include("includes/header.php");
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
					<div class="span12 post-lk">
						<div class="post-inner-lk">	
							
							
							<div class="head-title-lk">
										<h3>Lokasi Toko</h3>
									</div>
							<div class="box-desc">
								<div class="row-fluid">
									
									<div class="row-fluid">
									<div class="span12 inner-box-lk">
										<div class="span4 list">
											<div class="nav-list-lk">
											<ul>
											<?php $select_region = mysql_query("select * from region order by region_id");
											while ($region = mysql_fetch_array($select_region)){
											echo "<li><a href='cat-map.php?id=$region[region_id]' style='cursor:pointer;'>$region[region_name]</a></li>";
											}
											?>
											</ul>
											</div>	
										
										</div>
										
										<div class="span8 desc-ls">
											<div class="sh-ls">
											<div class="post-inner-ls">
											<div id="view">
											<?php 
											$select_store = mysql_query("select * from store where region_id = '".$_GET[id]."' ");
											$no = 1;
											while ($s = mysql_fetch_array($select_store)){
											$title_reg = mysql_fetch_array(mysql_query("select region_name from region where region_id = '$s[region_id]' "));
											echo"<div class='header-title-desc-ls'>";
											echo"<h3>$title_reg[region_name]</h3>";
											echo"</div>";
											echo"	<div class='row-fluid entry-post-ls'>
															<div class='span4 post-thumb-ls'>
																<img src='adminpanel/pic/store/$s[store_img]' alt='' title='' />
															</div>
																<div class='span8 post-content'>
																$s[store_city]<br>
																$s[store_address]
																<script src='http://maps.googleapis.com/maps/api/js?sensor=false' type='text/javascript'></script>
																<script>
																	function initialize() {
																	  var myLatlng = new google.maps.LatLng($s[store_map]);
																	  var mapOptions = {
																		zoom: 14,
																		center: myLatlng,
																		
																		mapTypeControl: true,
																		mapTypeControlOptions: {
																		  style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
																		},
																		zoomControl: false,
																		zoomControlOptions: {
																		  style: google.maps.ZoomControlStyle.SMALL
																		}
																	  }
																	  var map = new google.maps.Map(document.getElementById('map-canvas-$s[store_id]'), mapOptions);

																	  var marker = new google.maps.Marker({
																		  position: myLatlng,
																		  map: map,
																		  
																	  });
																	}

																	google.maps.event.addDomListener(window, 'load', initialize);

																</script>
																	
																</div>
																<div class='clearfix'></div>
																<div class='accordion-group'>
																<div class='accordion-heading'>
																	<a class='accordion-toggle' data-toggle='collapse' data-parent='#leftMenu' href='#collapse$no'>
																	open map
																	</a>
																</div>
																<div id='collapse$no' class='accordion-body collapse'>
																<div class='accordion-inner'>
																	<div id='map-canvas-$s[store_id]' class='span8' style='height:400px;width:500px'></div>
																</div>
																	
																</div>
																</div>";
																$no++;
																echo"<div class='clearfix'></div>
													</div>";
											}?>
											</div> 										
											</div>
											</div>
											</div> <!-- end of -->
											</div>
										</div>
									</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>
			</div>	
			</div>
			</section>
<?php
	include("includes/footer.php");
?>