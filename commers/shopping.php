<?php
	include("includes/header.php");
	//$addid = $_GET[cart];
?>
<section id="content">
 <div class="container">
<?php
			$sid = session_id();
			$sql = mysql_query("SELECT * FROM ordertmp, product
									WHERE user_id = '".$_SESSION['user']."' AND ordertmp.product_id=product.prod_id ");
			  $ketemu=mysql_num_rows($sql);
			  if($ketemu < 1){
				echo "<script>window.alert('Keranjang Belanjanya masih kosong. Silahkan Anda berbelanja terlebih dahulu');
					window.location=('product.php')</script>";
				}
			  else{  
			  echo "<form method=post action=act.php?module=keranjang&act=update>";
			  
			    
	echo" <div class='shopping'>
	
		<div class='shopping-table'>
				
			<table class='table table-striped'>
				<caption><a href='product.php'>Lanjutkan Belanja</a></caption>
				<thead>
					<tr>
						<th>No.</th>
						<th>Pesanan</th>
						<th>Harga</th>
						<th>Berat</th>
						<th width='20'>Kuantitas</th>
						<th>Subtotal</th>
						<th></th>
					</tr>
				</thead>
				<tbody>";
					
					
					  $no=1;
					  while($r=mysql_fetch_array($sql)){
						$hargadisc   = number_format(($r[prod_pricedisc]),0,",",".");
						
						if ((($hargadisc) =='') OR (($hargadisc) =='0')){
						$subtotal    = $r[prod_price] * $r[ordertmp_sum];
						} else {
						$subtotal    = $r[prod_pricedisc] * $r[ordertmp_sum];
						}
						
						if((($hargadisc) =='') OR (($hargadisc) =='0')){
						$total = $total + $subtotal;
						}else{
						$total = $total + $subtotal;
						}
						
						$subtotal_rp = format_rupiah($subtotal);
						$total_rp    = format_rupiah($total);

						$harga       = format_rupiah($r[harga]);
						$berat       = $r[prod_weight]/1000;
						
				echo"	<tr>
						<td>$no</td><input type=hidden name=ids[$no] value=$r[ordertmp_id]>
						<td>
							<div class='row-fluid'>
								<div class='span3'>
									<img src='timthumb.php?src=$uri/adminpanel/product/pic/$r[prod_img]&amp;w=50&amp;h=50' alt='' title='' />
								</div>
								<div class='span9'>
									<h1>$r[prod_name]</h1>
								</div>
								<div class='clearfix'></div>
							</div>
						</td>";
						if ((($hargadisc) =='') OR (($hargadisc) =='0')){
						echo"
						<td>Rp.".format_rupiah($r[prod_price]).",-</td>";
						}else{
						echo"
						<td>Rp.".format_rupiah($r[prod_pricedisc]).",-</td>";
						}
						echo"
						
						<td>$berat&nbsp;Kg</td>
						<td class='centerCell'><select name='jml[$no]' value=$r[ordertmp_sum] onChange='this.form.submit()'>";
						for ($j=1;$j <= 15;$j++){
							  if($j == $r[ordertmp_sum]){
							   echo "<option selected>$j</option>";
							  }else{
							   echo "<option>$j</option>";
							  }
						  }
						
					
						echo"</select>
						
						</td>
						<td>Rp. $subtotal_rp,-</td>
						<td align=center><a href='act.php?module=keranjang&act=hapus&idd=$r[ordertmp_id]' onClick='return functionDraftdelete()'><i class='icon-remove'></i></a></td>
					</tr>";
					
					 $no++; } 
					
		echo"		</tbody>";
		echo"	</table> ";  
			
		echo"</div>"; 
		
		
		echo"<div class='shopping-payment'>
			<div class='row-fluid'>
				<div class='span8 method-payment'>
					<h3>Metode Pembayaran</h3>
					<div class='row-fluid'>
						<div class='span4 cc'>
							<img src='assets/images/icon-mastercard.png' alt='' title='' />
							<img src='assets/images/icon-visa.png' alt='' title='' />
						</div>
						<div class='span2 text'>
							atau Transfer<br/>Via Bank :
						</div>
						<div class='span6 bank'>
							<img src='assets/images/icon-bank.png' alt='' title='' />
						</div>
						<div class='clearfix'></div>
					</div>
				</div>
				<div class='span4 info-diskon'>
					<h3>Diskon Kupon</h3>
					<div class='id-form'>
						<form method='post' action=''>
							<label>Masukkan no Kode Voucher</label>
							<input type='text' name='_cOdeVoucher' class='input-small' />
							<button type='submit' name='_sUbmit' class='btn btn-danger vouchercode' />Gunakan</button>
						</form>
					</div>
				</div>
				<div class='clearfix'></div>
			</div>
		</div>
		
		<div class='shopping-info'>
			<div class='row-fluid'>
				<div class='span4 offset8 si-count'>
					<h3>Total</h3>
					<div class='sic-total'>
						Rp. $total_rp ,-
					</div>
				</div>
			</div>
		</div>
		
		<div class='shopping-button'>	
			<a href='checkouts.php' class='btn btn-large btn-danger'>Selesai Belanja</a>
		 </div> 
		</form>
		";
		
	}?>
	</div> <!-- End of shopping -->
  </div>
</section>
<?php
	include("includes/footer.php");
?>