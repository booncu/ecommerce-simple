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
	
	
	if (isset($_POST['submit'])){
	
	if(($_POST['optionsRadios'])=="option2"){
	header ("Location:mandiri/index.php?nm=$_gEtName");
	//echo "option2";
	}else{
	header ("Location:si.php");
	}
	
	}
	

?>