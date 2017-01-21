<?php
	ob_start();
	include("../config/session-start.php");
	include ("../config/koneksi.php");
	include ("../config/fungsi_rupiah.php");
	
	function isi_keranjang(){
		$isikeranjang = array();
		$sid = session_id();
		$sql = mysql_query("SELECT * FROM ordertmp WHERE ordertmp_session='$sid'AND user_id = '".$_SESSION[user]."' ");
						
		while ($r=mysql_fetch_array($sql)) {
			$isikeranjang[] = $r;
		}
		return $isikeranjang;
	}
				
	$_gEtName = stripslashes(strip_tags(ltrim($_POST['name'])));
	$_gEtEmail = stripslashes(strip_tags(ltrim($_POST['email'])));
	$_gEtPhone = stripslashes(strip_tags(ltrim($_POST['hp'])));
	$_gEtAddress = stripslashes(strip_tags(ltrim($_POST['address'])));
	$_gEtCity = stripslashes(strip_tags(ltrim($_POST['kota'])));
	$_gEtMethod = stripslashes(strip_tags(ltrim($_POST['method'])));
	$date = date("Y-m-d");
	$time = date("H:i:s");
	$isikeranjang = isi_keranjang();
	$jml          = count($isikeranjang);
	$sid = session_id();
	
	mysql_query("INSERT INTO `order`(order_shipdate, order_time, fullname, address, city, method, email, phone, user_id, order_total) VALUES('$date','$time','$_gEtName','$_gEtAddress','$_gEtCity','$_gEtMethod','$_gEtEmail','$_gEtPhone', '".$_SESSION[user]."', '$grand_rp')");
	
	$id_orders=mysql_insert_id();
			
	$isikeranjang = isi_keranjang();
	$jml          = count($isikeranjang); 
	$sid2 = session_id();
	$date = date("Y-m-d");
	$sql2 = mysql_query("SELECT * FROM ordertmp WHERE user_id = '".mysql_real_escape_string(abs((int) $_SESSION['user']))."' AND ordertmp_session = '$sid2'");
	while($row2 = mysql_fetch_array($sql2)) {
	mysql_query("INSERT INTO orderdetails(orderdetails_id, user_id, product_id, orderdetails_sum ) 
			VALUES('$id_orders', '$row2[user_id]', '$row2[product_id]', '$row2[ordertmp_sum]')");	
	}
	
	for ($i = 0; $i < $jml; $i++) {
	  mysql_query("DELETE FROM ordertmp
				 WHERE ordertmp_id = {$isikeranjang[$i]['ordertmp_id']}");
	}
	
	$set = mysql_fetch_array(mysql_query("SELECT setting_emailadmin,setting_emailsendreceive FROM setting"));
	$uri = $set['setting_url'];
	$pot2 = explode("-", $_gEtMethod);
	 $ship = mysql_fetch_array(mysql_query("SELECT * FROM shipping WHERE shipping_id = '".mysql_real_escape_string($pot2[0])."'"));
	 if($pot2[1] == "Reguler") {
		$pship = $ship['shipping_reg'];
	} else {
		$pship = $ship['shipping_ex'];
	}
	
	$dp=mysql_query("SELECT * FROM orderdetails,product 
                                 WHERE orderdetails.product_id=product.prod_id 
                                 AND orderdetails_id='$id_orders'");
$no=1;
while ($d=mysql_fetch_array($dp)){
   //$disc        = ($d[diskon]/100)*$d[harga];
   //$hargadisc   = number_format(($d[harga]-$disc),0,",","."); 
   $hargadisc   = number_format(($d[prod_pricedisc]),0,",",".");
						
						if ((($hargadisc) =='') OR (($hargadisc) =='0')){
						$subtotal    = $d[prod_price] * $d[orderdetails_sum];
						} else {
						$subtotal    = $d[prod_pricedisc] * $d[orderdetails_sum];
						}
						
						if((($hargadisc) =='') OR (($hargadisc) =='0')){
						$total = $total + $subtotal;
						}else{
						$total = $total + $subtotal;
						}

						$subtotal_rp = format_rupiah($subtotal);

						$total_rp    = format_rupiah($total);


						$subtotalberat = $d[prod_weight] * $d[orderdetails_sum]; // total berat per item produk 

						$totalberat  = $totalberat + $subtotalberat; // grand total berat all produk yang dibeli
   $no++;
}
	$tweight = $totalberat/ 1000;

								//$pot = explode(".", $tweight);

								//$rumus = ceil($tweight);

								$pweight = $tweight * $pship;

								
								$pweight_rp =number_format(($pweight),0,",",".");

								$grand = $total + $pweight;

								$grand_rp = format_rupiah($grand);
	
//Pesan Customer
	$pesancustomer = "   
		<div>
			<div align=left><img src='http://www.domainname.com.id/demo/assets/images/logo.png' alt='logo' title='logo' /></div>
			<div class='thanks_name'>Thank You $_gEtName, *This is auto reply email. Please do not reply this email*</div>
			<div class='thanks_desc'>
				Your order has been received, <br>
				Please kindly make the payment transfer<br><br>
							
				<b>Order Information</b><br>
				<table cellpadding=0 cellspacing=5>
					<tr>
						<td width=150px>Invoice No</td>
						<td>: RDB-$id_orders</td>
					</tr>
					<tr>
						<td>Name</td>
						<td>: $_gEtName</td>
					</tr>
					<tr>
						<td>Phone</td>
						<td>: $_gEtPhone</td>
					</tr>
					<tr>
						<td>Shipping Address</td>
						<td>: $_gEtAddress $ship[shipping_city] </td>
					</tr>
					<tr>
						<td>Total Payment</td>
						<td>: Rp. $grand_rp</td>
					</tr>
								
				</table><br>
				<b>Transfer Information</b><br>
							
				<table cellpadding=0 cellspacing=0>
				
				</table><br>
				<a href='http://www.domainname.com/demo/confirm.php' target='_blank'>Please confirm to us after making payment transactions</a><br/><br/>
			</div>
			<div class='thanks_label'>
				have a nice day,
				<br/><br/>
				domainname.com
			</div>
		</div>";

$dari = "From: ".$set[setting_emailadmin]." \r\n";
$dari .= "MIME-Version: 1.0 \r\n";
$dari .= "Content-type: text/html; charset=iso-8859-1 \r\n";

$subject = "domainname.com.id Order Confirmation";

// kemudian untuk mengirim email 


$send= mail($_POST[email],$subject, $pesancustomer, $dari);
if ($send){
header("location: ../thankyou.php");} 
else {
echo"email not sent";
}

?>