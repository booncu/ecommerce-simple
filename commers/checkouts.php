<?php
	include("includes/header.php");
	
?>
<section id="content">
	<div class="container">
		<div class="row-fluid">
		<?php $sid = session_id();
			  $sql = mysql_query("SELECT * FROM ordertmp, product
									WHERE user_id = '".$_SESSION['user']."' AND ordertmp.product_id=product.prod_id ");
			  $usr = mysql_fetch_array(mysql_query("SELECT * FROM user WHERE user_id = '".$_SESSION['user']."' "));							
			  $ketemu=mysql_num_rows($sql);
			  if($ketemu < 1){
			   echo"<script> alert('Keranjang belanja masih kosong');window.location='index.php'</script>\n";
				 exit(0);
				}	else{ ?>
		<div class="span5 box ch-form">
				<h3> Billing Details</h3>
				<form method="POST" action="includes/si.php">
					<div class="controls">
						<label><strong>Name <span>*</span></strong></label>
						<input type="text" name="name" class="input-xlarge cf" value="<?php echo "$usr[user_fullname]";?>"/>
					</div>
					<div class="controls">
						<label><strong>Address<span>*</span></strong></label>
						<input type="text" name="address" class="input-xlarge cf" value="<?php echo "$usr[user_address]";?>"/>
					</div>
					
					<div class="controls">
						<div class="row-fluid">
							<div class="span6">
								<label><strong>No.Handphone / Phone <span>*</span></strong></label>
								<input type="text" name="hp" class="input-medium mf" value="<?php echo "$usr[user_phone]";?>"/>
							</div>
							<div class="span6">
								<label><strong>Email <span>*</span></strong></label>
								<input type="text" name="email1" class="input-medium mf" value="<?php echo "$usr[user_email]";?>" disabled="disabled"/>
								<input type="hidden" name="email" value="<?php echo "$usr[user_email]";?>"/>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="controls" style="padding:7px 0 0 0;">
						<div class="row-fluid">
							
							<div class="span">
								<strong>City:</strong><sup class="surely">*</sup><br/>
								<select id="city" name="kota" onchange="load_options(this.value,'method')">
									<option value="">Select city</option>
									
								</select><br/>
								
							</div><!-- .password -->
							<br/>
							<div>
								<strong>Shipping Method:</strong><sup class="surely">*</sup><br/>
								<select name="method" id="method" onchange='javascript:rubah(this)'>
									<option value="">Select method</option>
												
								</select>
							</div><!-- .password -->
							
							<div class="clearfix"></div>
							
							<label class="radio">
							<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1"> <strong>Bank Transfer</strong>
							</label>
							
							<label class="radio">
							<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"> <strong>Mandiri Clickpay</strong>
							</label>
						</div>
					</div>
					<div class="controls">
						<label><strong>Notes<span>*</span></strong></label>
						<textarea name="message" placeholder="Type your message here..." rows="3" class="input-xlarge tf"></textarea>
					</div>
					<div class="controls">
						<div class="row-fluid">
							<div class="span8">
								<div class="row-fluid">
									<div class="span4">
										<label><strong>Kode Sekuriti <span>*</span></strong></label>
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
								<input type="submit" name="submit" value="Kirim" class="btn btn-inverse btnnya"/>
							</div>
						</div>
					</div>
				</form>
		</div>
		<?php }?>
		<?php ?>
		
		<div class="span7 box ch-form">
		<h3> Your Order </h3>
		<div id="divkedua">
		</div>		
		</div>
		
		</div>
	</div>
</section>
<?php
	include("includes/footer.php");
?>