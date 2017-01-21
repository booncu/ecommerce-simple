<?php
  include ("includes/header.php");
?>

<section id="content">
	<div class="container">
		<div class="row-fluid">
		<div class="span12">
		<div style="text-align:center;height:550px;">
		<p><h3>Terimakasih telah melakukan pemesanan online di toko online kami</h3> <br /><br /></p>
		<!--<?php
		echo "<table class='table table-striped' style='font-size:15px;' >
		<thead style='background-color:#ccc;'>
			<tr>
				<th>No.</th>
				<th collspan='2'>Products</th>
				<th>Total</th>
				
			</tr>
		</thead>
		<tbody>";
		  
		// mendapatkan nomor orders
		$id_orders=mysql_insert_id();
		$dp=mysql_query("SELECT * FROM orderdetails,product 
                                 WHERE orderdetails.product_id=product.prod_id 
                                 AND orderdetails_id='$id_orders'");
			$no=1;
			while ($d=mysql_fetch_array($dp)){
			   //$disc        = ($d[diskon]/100)*$d[harga];
			   //$hargadisc   = number_format(($d[harga]-$disc),0,",","."); 
			   $subtotal    = ($d[prod_price] * $d[orderdetails_sum]);
			
			   $subtotalberat = $d[prod_weight] * $d[orderdetails_sum]; // total berat per item produk 
			   $totalberat  = $totalberat + $subtotalberat; // grand total berat all produk yang dibeli
			
			   $total       = $total + $subtotal;
			   $subtotal_rp = format_rupiah($subtotal);    
			   $total_rp    = format_rupiah($total);    
			   $harga       = format_rupiah($d[harga]);
			   

				

		echo"<tr>
		<td>$no</td>
		<td>$d[prod_name]&nbsp;&nbsp;x <span style='color:red;'>&nbsp;$d[orderdetails_sum]&nbsp;Qty</span></td>
		<td>$subtotal_rp</td>
		</tr>"; 
		$no++;}
		echo "</tbody>
		</table>";
		
			$tweight = $totalberat/ 1000;
			
			$pweight = $tweight * $pship;
			$pweight_rp = format_rupiah($pweight);
										
			//$totals = $d[prod_price] * $d[ordertmp_sum];
			$grand = $total + $pweight;
			$grand_rp = format_rupiah($grand);
		
		?>-->
	
	
	
		
		</div>
		</div>
		</div>
	</div>
</section>

<script language=javascript>
setTimeout("location.href='index.php' ", 10000);
</script>
<?php 
  include ("includes/footer.php");
?>