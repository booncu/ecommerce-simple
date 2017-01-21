			<section id="footer">
				<div class="container">
				<div class="footer-socmed">
				
								
					<ul> 
						<li><a href="<?php echo $fb; ?>" target="_blank"><img src="assets/images/facebook.png" /></a></li>
						<li><a href="<?php echo $tw; ?>" target="_blank"><img src="assets/images/twitter.png" /></a></li> 
					</ul>
				
				</div>
				
				<div class="footer-cont">
					<div class="row-fluid">
					<div class="span12">
					<div class="footer-menu">
						<ul>
							<li><a href="tentang-kami.php">Tentang Kami</a></li>
							<li><a href="product.php">Produk</a></li>
							<li><a href="video.php">Video</a></li>
							<li><a href="news-event.php">News &amp; Event</a></li>
							<li><a href="lokasi-toko-maps.php">Lokasi Toko</a></li>
							<li class="last"><a href="contact">Kontak Kami</a></li>
						</ul>
					<div class="clearfix"></div>
					<div class="omenu">
							<ul>
								<li><a href="#">Privacy Policy</a></li>
								<li>|</li>
								<li><a href="#">Partners</a></li>
							</ul>
						</div>
						
						<div class="copyright">
							&copy; 2014 All Right Reserved
						</div>
						
						
						<div class="clearfix"></div>
					</div>
					</div>
					
				</div>
				</div> <!-- End of footer-cont -->
				</div>
				
			</section> <!-- End of section footer -->
		 <!-- End of container -->
		
		<!-- Load jQuery -->
		<script src="assets/js/jquery-1.9.0.min.js"></script>
		<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script><!-- Js Framework Bootstrap -->
		<script src="assets/js/modernizr.custom.js" type="text/javascript"></script>
		<!-- include the Tools -->
		<script type="text/javascript"  language="javascript"  src="assets/js/jquery.tools.min.js"></script>
		
		<script type="text/javascript" language="javascript" src="assets/js/jquery.easing.1.3.js"></script>
		<!--script type="text/javascript" language="javascript" src="assets/js/jquery.skitter.min.js"></script>
		<!--<script type="text/javascript" src="assets/js/jquery.sticky.js"></script><!--sticky menus-->
		<script type="text/javascript" src="assets/js/jquery.nivo.slider.js"></script>
		<script type="text/javascript" src="assets/js/jquery.jcarousel.min.js"></script>

                <script type="text/javascript" src="assets/js/jcarousel.responsive.js"></script>	
	
		<script type="text/javascript">
		$(window).load(function() {
			$('#slider').nivoSlider();
		});
		</script>
		<script src="assets/js/jquery.elevatezoom.js" type="text/javascript"></script>
		<script>
			$('#zoom_01').elevateZoom({
			zoomWindowFadeIn: 50,
			zoomWindowFadeOut: 50 ,
			lensFadeIn: 50,
			lensFadeOut: 50
		   }); 
		</script>
		
		<!-- jCarouserllite 
		<script type="text/javascript" src="assets/js/jcarousellite_1.0.1.min.js"></script>-->
		<script type="text/javascript">
			$(function() {
			
			$('.jcarousel').jcarousel();
			$('.jcarousel').jcarouselAutoscroll({
				interval: 3000
			});
			
			$('jcarousel_pu').jcarousel();
			$('.jcarousel_pu').jcarouselAutoscroll({
				interval: 3000
			});
			
			$('jcarousel_lk').jcarousel();
			$('.jcarousel_lk').jcarouselAutoscroll({
				interval: 3000
			});
			

				
				/***  ***/
				$('.li-text').hover(
					function () {
						$(this).animate({opacity:'1'});
					},
					function () {
						$(this).animate({opacity:'0'});
					}
				);
				
				$('.addcart').hover(
					function () {
						$(this).animate({opacity:'1'});
					},
					function () {
						$(this).animate({opacity:'0'});
					}
				);
				
	
			});
			
		</script>
		
		
		<!--<script type="text/javascript">
					// <![CDATA[	
					$(document).ready(function(){	
						$('.regid').click(function(){
							$('#view').fadeOut();
							var a = $(this).attr('id');
							$.post("store.php?id="+a, {
							}, function(response){
								//$('#container').html(unescape(response));
								///$('#container').fadeIn();
								setTimeout("finishAjax('view', '"+escape(response)+"')", 200);
							});
						});	
					});	
					function finishAjax(id, response){
					  $('#'+id).html(unescape(response));
					  $('#'+id).fadeIn();
					} 
					// ]]>
		</script>-->
		
		<script type="text/javascript">
					// <![CDATA[	
					$(document).ready(function(){	
						$('.vid').click(function(){
							$('#vids').fadeOut();
							var a = $(this).attr('id');
							$.post("video-detail.php?id="+a, {
							}, function(response){
								//$('#container').html(unescape(response));
								///$('#container').fadeIn();
								setTimeout("finishAjax('vids', '"+escape(response)+"')", 200);
							});
						});	
					});	
					function finishAjax(id, response){
					  $('#'+id).html(unescape(response));
					  $('#'+id).fadeIn();
					} 
					// ]]>
		</script>
		
		<script type="text/javascript">
					$(document).ready(function(){
						load_options('','city');
					});

					function load_options(id,index){
						$("#loading").show();
						if(index=="state"){
							$("#method").html('<option value="">Select method</option>');
						}
						$.ajax({
							url: "includes/ajax.php?index="+index+"&id="+id,
							complete: function(){$("#loading").show();},
							success: function(data) {
								$("#"+index).html(data);
							}
						})
					}
				</script>
				<script type="text/javascript">
					function createRequestObject() {
						var ro;
						var browser = navigator.appName;
						if(browser == "Microsoft Internet Explorer"){
							ro = new ActiveXObject("Microsoft.XMLHTTP");
						}else{
							ro = new XMLHttpRequest();
						}
						return ro;
					}

					var xmlhttp = createRequestObject();

					function rubah(combobox)
					{
						var kode = combobox.value;
						if (!kode) return;
						xmlhttp.open('get', 'includes/get_order.php?kode='+kode, true);
						xmlhttp.onreadystatechange = function() {
							if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200))
							document.getElementById("divkedua").innerHTML = xmlhttp.responseText;
							return false;
						}
						xmlhttp.send(null); 
					}
				</script>
		
	</body>
</html>