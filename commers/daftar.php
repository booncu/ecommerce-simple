<?php
	include("includes/header.php");	
?>
<section id="content">
  <div class="container">
	<div class="daftar">
	 <h2>Daftar</h2>
		<div class="df-box">
			
				<form method="POST" action="includes/send_daftar.php" enctype="multipart/form-data">
					<div class="controls">
						<label>Full Name<span>*</span></label>
						<input type="text" name="fullname" class="input-xlarge cf"/>
					</div>
					<div class="controls">
						<label>Email<span>*</span></label>
						<input type="text" name="email" class="input-xlarge cf"/>
					</div>
					<div class="controls">
						<label>Address<span>*</span></label>
						<input type="text" name="address" class="input-xlarge cf"/>
					</div>
					<div class="controls">
						<label>Phone<span>*</span></label>
						<input type="text" name="phone" class="input-xlarge cf"/>
					</div>
					<div class="controls">
						<label>Newsletter</label>
						<label class="checkbox">
							<input type="checkbox" value="no"> Saya setuju untuk menerima email newsletter.
						</label>
					</div>
					<div class="controls">
						<div class="row-fluid">
							<div class="span6">
								<label>Password <span>*</span></label>
								<input type="password" name="pass" class="input-xlarge cf"/>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="controls">
						<div class="row-fluid">
							<div class="span4 submit-position">
								<input type="submit" name="submit" value="Daftar" class="btn btn-inverse btnnya"/>
							</div>
						</div>
					</div>
				</form>
			</div>
	</div> <!-- End of  -->
	</div>
</section>
<?php
	include("includes/footer.php");
?>