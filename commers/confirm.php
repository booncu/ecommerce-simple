<?php
	include("includes/header.php");
?>

<section id="content">
	<div class="confirm-payment">
		<form method="post" action="includes/cf.php" class="form-horizontal">
			<div class="control-group">
				<label class="control-label" for="inputEmail">No. Order</label>
				<div class="controls">
				<input type="text" name="no_order" id="inputEmail" placeholder="masukan no order..">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword">Bank Tujuan</label>
				<div class="controls">
					<select name="_to_bank_t">
						<option value="bca">BCA</option>
						<option value="bri">BRI</option>
						<option value="mandiri">Mandiri</option>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword">Bank Anda</label>
				<div class="controls">
					<select name="_to_bank_a">
						<option value="bca">BCA</option>
						<option value="bri">BRI</option>
						<option value="mandiri">Mandiri</option>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputEmail">Rekening atas nama</label>
				<div class="controls">
				<input type="text" name="no_rek" id="inputEmail" placeholder="masukan no rek & nama anda..">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputEmail">Nominal Transfer</label>
				<div class="controls">
				<input type="text" name="no_tr" id="inputEmail" placeholder="masukan nominal transfer anda..">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputEmail">Tanggal Transfer</label>
				<div class="controls">
					<?php
						include("lib/tc_calendar.php");
						$cd = explode("-", date('Y-m-d'));
						$myCalendar = new tc_calendar("date1", true);
						$myCalendar->setIcon("assets/images/iconCalendar.gif");
						$myCalendar->setDate($cd[2], $cd[1], $cd[0]);
						$myCalendar->setPath("./");
						$myCalendar->setYearInterval(2014, 2050);
						$myCalendar->dateAllow('$cd[2]-$cd[1]-$cd[0]', '2020-03-01');
								  //$myCalendar->setHeight(350);	  
								  //$myCalendar->autoSubmit(true, "form1");
								  //$myCalendar->disabledDay("Sat");
								  //$myCalendar->disabledDay("sun");
						$myCalendar->writeScript();
					?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputEmail">Kode Sekuriti</label>
				<div class="controls">
					<div class="row-fluid">
						
							<div class="row-fluid">
								
								<div class="span3">
									<input type="text" name="_cOde" class="input-mini" />
								</div>
								<div class="span3">
									<input type="text" name="_cAptcha" class="input-mini" value="<?php echo $captcha1->showcaptcha(); ?> ?" disabled="disabled"/>
									
								</div>
								<div class="span6 sp">
									<input type="submit" name="submit" value="Bayar" class="btn btn-danger btnconfirm"/>
								</div>
								<div class="clearfix"></div>
							</div>
						
					</div>
				</div>
			</div>
		</form>
	</div> <!-- End of confirm-payment -->
</section>

<?php
	include("includes/footer.php");
?>