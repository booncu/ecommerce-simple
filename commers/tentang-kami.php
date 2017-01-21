<?php
	include("includes/header.php");
	
	$select_about = mysql_query("SELECT * FROM about WHERE about_type = '2' ");
	$result_about = mysql_fetch_array($select_about);										
	
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
					<div class="span3 sidebar">
						<div class="nav-sd">
							<ul>
								<li><a href="sejarah-kami.php">Sejarah Kami</a></li>
								<li><a href="tentang-kami.php">Tentang Kami</a></li>
								<li class="last"><a href="penghargaan.php">Penghargaan</a></li>
							</ul>
						</div>
					</div>
					<div class="span9 post">
						<div class="post-inner">
						
							<div class="row-fluid entry-post">
							         								 
									<?php echo "$result_about[about_text]"; ?>
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