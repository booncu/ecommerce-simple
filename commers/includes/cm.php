<?php 

include "../config/koneksi.php";
include "../includes/class-captcha.php";
$captcha1 = new mathcaptcha();
$date = date("Y-m-d");	
$time = date("H:i:s");
$id_pg = $_POST['idpg'];
	
		if(empty ($_POST['name']) AND empty($_POST['email']) AND empty($_POST['comment']) AND empty($_POST['_cOde']) AND empty($_POST['rating']) ){
		 header("Location: ../index.php");
		 
		}
		else {
			if ($captcha1->resultcaptcha() == $_POST['_cOde']) {
			mysql_query("INSERT INTO comment(name_com, email, isi_com, tgl, time, status, id_pg, count_com) 
			VALUES('$_POST[name]', '$_POST[email]', '$_POST[comment]', '$date','$time', 'N', '$id_pg', '$_POST[rating]')");
			
			header ("Location: ../product.php");
			mysql_close();
			} else {
			header("Location:../product-detail.php?prod_detail=$id_pg");
			
			}
		}
			
	

?>