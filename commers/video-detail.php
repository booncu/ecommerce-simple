<?php
	//include("includes/header.php");	
	include "config/koneksi.php";
	$id = $_GET[id];
	$slv =mysql_fetch_array(mysql_query("SELECT * FROM video WHERE vid_id ='$id' "));
	//$select_list_vid = mysql_query("select * from video order by vid_id limit 4");
?>

	<div class="container">
		<div class="video-page">
			    <div class="videoshow">
					<div id='playerZILPpOMZFUeQ'></div>
						<script type='text/javascript'>
								jwplayer('playerZILPpOMZFUeQ').setup({
								file: '<?php echo $slv['vid_url']; ?>',
								title: '<?php echo $slv['vid_title']; ?>',
								width: '100%',
								aspectratio: '16:9',
								autoplay: false
									});
						</script>
					</div>				
								
								
				
				
		</div>
	</div> <!-- End of -->

