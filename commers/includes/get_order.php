<?php
 include("../config/session-start.php");
 include "../config/koneksi.php";
 include ("../config/fungsi_rupiah.php");
 include ("../config/fungsi_indotgl.php");
 
 $kode = $_GET['kode'];
 $pot2 = explode("-", $kode);
 $ship = mysql_fetch_array(mysql_query("select * from shipping where shipping_id = '".mysql_real_escape_string($pot2[0])."'"));
 if($pot2[1] == "Reguler") {
	$pship = $ship['shipping_reg'];
} else {
	$pship = $ship['shipping_ex'];
} 

?>
						<?php $sid = session_id();
			$sql = mysql_query("SELECT * FROM ordertmp, product
									WHERE user_id = '".$_SESSION['user']."' AND ordertmp.product_id=product.prod_id ");
			  $ketemu=mysql_num_rows($sql);
			  if($ketemu < 1){
				echo "<script>window.alert('Keranjang Belanjanya masih kosong. Silahkan Anda berbelanja terlebih dahulu');
					window.location=('product.php')</script>";
				}
			  else{  
			  
		
		echo "<table class='table table-striped' style='font-size:15px;' >
		<thead style='background-color:#ccc;'>
			<tr>
				<th>No.</th>
				<th collspan='2'>Products</th>
				<th>Total</th>
				
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


						$subtotalberat = $r[prod_weight] * $r[ordertmp_sum]; // total berat per item produk 

						$totalberat  = $totalberat + $subtotalberat; // grand total berat all produk yang dibeli
		echo"<tr>
		<td>$no</td>
		<td>$r[prod_name]&nbsp;&nbsp;x <span style='color:red;'>&nbsp;$r[ordertmp_sum]&nbsp;Qty</span></td>
		<td>$subtotal_rp</td>
		</tr>"; 
		$no++;}
		echo "</tbody>
		</table>";
		
								$tweight = $totalberat/ 1000;

								//$pot = explode(".", $tweight);

								//$rumus = ceil($tweight);

								$pweight = $tweight * $pship;

								
								$pweight_rp =number_format(($pweight),0,",",".");

								

								$totals = $r[prod_price] * $r[ordertmp_sum];

								$grand = $total + $pweight;

								$grand_rp = format_rupiah($grand);
		
		}?>
		
		
	<div class="cost_order">
	<div class="cost_total">
		<div class="ct_text span9"><span style="font-size:15px;font-weight: bold;">Total</span></div>
			<div class="ct_price span3" ><span style="font-size:15px;font-weight: bold;height:30px;">Rp. <?php echo "$total_rp";?></span></div>
				<div class="clear"></div>													
	</div> <!-- End of cost_left -->
			<div class="cost_ship">
			<div class="ct_text span9"><span style="font-size:15px;font-weight: bold;">Shipping rate to <?php echo "$ship[shipping_city]"; ?></span></div>
			<div class="ct_price span3"><span style="font-size:15px;font-weight: bold;">Rp. <?php echo $pweight_rp; ?></span></div>
			<div class="clear"></div>
			</div> <!-- End of cost_left -->
			<div class="cost_grandtotal">
			<div class="ct_textgrand span9"><span style="font-size:15px;font-weight: bold;">GRAND TOTAL</span></div>
			<div class="ct_price span3"><span style="font-size:15px;font-weight: bold;">Rp. <?php echo $grand_rp; ?></span></div>
			<div class="clear"></div>
			</div> <!-- End of cost_right -->
			<div class="clear"></div>
	</div> <!-- End of cost -->