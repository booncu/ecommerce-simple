<?php
	include("includes/header.php");	
	$select_about = mysql_query("SELECT * FROM about WHERE about_type = '4' ");
	$result_about = mysql_fetch_array($select_about);
?>
<section id="content">
  <div class="container">
	<div class="contact-us">
		<div class="row-fluid">
			<div class="box cu-form">
			
				<form method="POST" action="includes/send_contact.php">
					<div class="controls">
						<label>Name <span>*</span></label>
						<input type="text" name="name" class="input-xlarge cf"/>
					</div>
					<div class="controls">
						<label>Alamat <span>*</span></label>
						<input type="text" name="alamat_name" class="input-xlarge cf"/>
					</div>
					
					<div class="controls">
						<div class="row-fluid">
							<div class="span6">
								<label>No. Handphone / Telpon <span>*</span></label>
								<input type="text" name="hp" class="input-medium mf"/>
							</div>
							<div class="span6">
								<label>Email <span>*</span></label>
								<input type="text" name="email" class="input-medium mf" />
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="controls" style="padding:7px 0 0 0;">
						<div class="row-fluid">
							<div class="span2">
								<label>Topik <span>*</span></label>
							</div>
							<div class="span10">
								<select name="topik" class="input-large">
									<option value="Produk servis">Produk &amp; Servis</option>
									<option value="Teknis Support">Teknis Support</option>
									<option value="Kritik dan Saran">Kritik dan Saran</option>
									<option value="Karier">Karier</option>
									<option value="Lainnya">Lainnya</option>
								</select>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="controls">
						<label>Pesan <span>*</span></label>
						<textarea name="message" placeholder="Type your message here..." rows="8" class="input-xlarge tf"></textarea>
					</div>
					<div class="controls">
						<div class="row-fluid">
							<div class="span8">
								<div class="row-fluid">
									<div class="span4">
										<label>Kode Sekuriti <span>*</span></label>
									</div>
									<div class="span4">
										<input type="text" name="_cOde" class="input-small" />
									</div>
									<div class="span4">
										<input type="text" name="_cAptcha" class="input-small" value="<?php echo $captcha1->showcaptcha(); ?> ?" disabled="disabled"/>
										
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="span4 submit-position">
								<input type="submit" name="submit" value="Daftar" class="btn btn-inverse btnnya"/>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="cu-text">
				
				<div class="cut-info" style="margin-top:30px;">
				<?php echo "$result_about[about_text]"; ?>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div> <!-- End of contact-us -->
	</div>
</section>
<?php
	include("includes/footer.php");
?>