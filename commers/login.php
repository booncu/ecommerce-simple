<?php
	include("includes/header.php");	
?>
<section id="content">
  <div class="container">
	<div class="login-page" style="padding: 100px 0;">
		   <h2>Login</h2>
			<div class="login-form">
			
				<form method="POST" action="includes/send_val.php">
					<div class="controls">
						<label>Email <span>*</span></label>
						<input type="text" name="email" class="input-xlarge cf"/>
					</div>
										
					<div class="controls">
								<label>Password<span>*</span></label>
								<input type="password" name="password" class="input-xlarge cf" />
							<div class="clearfix"></div>
					</div>
					
					<div class="controls">
						<div class="row-fluid">
							<div class="span4 submit-position">
								<input type="submit" name="submit" value="Login" class="btn btn-inverse btnnya"/>
								<!--<input type="hidden" name="prod_id" value="<?php echo $_GET['cart'] ; ?>" />-->
							</div>
							
							<div class="span5">
								<a href="forgot-password.php">Lupa password ?</a><br>
								<a href="daftar.php">Daftar akun baru</a>
							</div>
						</div>
					</div>
				</form>
			</div>
			
		</div>
    
		
	</div> <!-- End of login -->
</section>
<?php
	include("includes/footer.php");
?>