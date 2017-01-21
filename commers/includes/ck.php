<?php
	include("../config/session-start.php");
	include("../config/koneksi.php");
	
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
	
	
	
	
	// Pesan Customer
	$pesancustomer = "   
		<div>
			<div align=center><img src='http://domainname.com/assets/images/logo.png' alt='logo' title='logo' /></div>
			<div class='thanks_name'>Thank You $_gEtName, *This is auto reply email. Please do not reply this email*</div>
			<div class='thanks_desc'>
				Your order has been received, <br>
				Please kindly make the payment transfer<br><br>
							
				<b>Order Information</b><br>
				<table cellpadding=0 cellspacing=5>
					<tr>
						<td width=150px>Invoice No</td>
						<td>: IMT-$id_orders</td>
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
							
				<table cellpadding=0 cellspacing=0><tr>
				</tr>
				</table><br>
				<a href='http://domainname.com/confirm.php' target='_blank'>Please confirm to us after making payment transactions</a><br/><br/>
			</div>
			<div class='thanks_label'>
				have a nice day,
				<br/><br/>
				domainname.com
			</div>
		</div>";


	//$set = mysql_fetch_array(mysql_query("SELECT setting_emailadmin,setting_emailsendreceive FROM setting"));
	$dari = "From:ymaulanapc@gmail.com\r\n";
	$dari .= "MIME-Version: 1.0 \r\n";
	$dari .= "Content-type: text/html; charset=iso-8859-1 \r\n";
	// Kirim email ke kustomer
	//mail($_POST['email'],$subjek,$pesancustomer,$dari);
					
	// Kirim email ke pengelola toko online
	//mail("$set[setting_emailsendreceive]",$subjekadmin,$pesanadmin,$dari);
	
	//$to = ".$set[setting_emailadmin].";
	$subject = "domainname.com Order Confirmation";
	$message = "Ini adalah email Contoh dari ecommercs... ";
	$header = "From: <ymaulanapc@gmail.com>";
	// kemudian untuk mengirim email 


	mail($_POST[email],$subject, $pesancustomer, $dari);
	
?>