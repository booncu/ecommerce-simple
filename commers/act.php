<?php
session_start();
error_reporting(0);
include "config/session-start.php";
include "config/koneksi.php";
include "config/library.php";

$module=$_GET[module];
$act=$_GET[act];
$pid =$_GET[id];
$u =$_SESSION['user'];
$idd =$_GET[idd];


if ($module=='keranjang' AND $act=='tambah'){
	$sid = session_id();
	$date = date("Y-m-d");
	$time = date("H:i:s");
	$sql = mysql_query("SELECT product_id, ordertmp_session, user_id FROM ordertmp
			WHERE ordertmp_session ='$sid'  AND user_id = '$u' AND product_id ='$pid' ");
	$ketemu=mysql_num_rows($sql);
	if ($ketemu==0){
		// put the product in cart table
		mysql_query("INSERT INTO ordertmp ( user_id, ordertmp_session, product_id, ordertmp_sum, date, time)
				VALUES ( '$u', '$sid', '$pid' , '1', '$date', '$time')");
	} else {
	// update product quantity in cart table
		mysql_query("UPDATE ordertmp 
		        SET ordertmp_sum = ordertmp_sum + 1
				WHERE  product_id ='$pid' AND ordertmp_session ='$sid' AND user_id ='$u' ");	
	}	
	
	deleteAbandonedCart();
	header('Location:shopping.php');
			
}



elseif ($module=='keranjang' AND $act=='hapus'){
	mysql_query("DELETE FROM ordertmp WHERE ordertmp_id='$idd'");
	header('Location:shopping.php');				
}

elseif ($module=='keranjang' AND $act=='update'){
  $id       = $_POST[ids];
  $jml_data = count($id);
  $jumlah   = $_POST[jml]; // quantity
  for ($i=1; $i <= $jml_data; $i++){
  $sql2 = mysql_query("SELECT ordertmp_sum FROM ordertmp WHERE ordertmp_id='".$id[$i]."'");
	while($rr=mysql_fetch_array($sql2)){
    
    if($jumlah[$i] == 0){
        echo "<script>window.alert('Anda tidak boleh menginputkan angka 0 atau mengkosongkannya!');
        window.location=('keranjang-belanja.html')</script>";
    }
    else{
	
      mysql_query("UPDATE ordertmp SET ordertmp_sum = '".$jumlah[$i]."'
                                      WHERE ordertmp_id = '".$id[$i]."'");
      header('Location:shopping.php');
    }
  }
  }
  }
  
// update product quantity in cart table from detail product
elseif ($_SERVER["REQUEST_METHOD"] =="POST")
	{
	$sid = session_id();
	$qty=$_POST[qty];
	$iddt=$_POST[dt];
	$u =$_SESSION['user'];
	$sql = mysql_query("SELECT product_id, ordertmp_session, user_id FROM ordertmp
			WHERE ordertmp_session ='$sid'  AND user_id = '$u' AND product_id ='$iddt' ");
	$ketemu=mysql_num_rows($sql);
	if ($ketemu==0){
		// put the product in cart table
		mysql_query("INSERT INTO ordertmp ( user_id, ordertmp_session, product_id, ordertmp_sum)
				VALUES ( '$u', '$sid', '$iddt' , '$qty')");
	} else {
		mysql_query("UPDATE ordertmp 
		        SET ordertmp_sum = ordertmp_sum + '$qty'
				WHERE  user_id ='$u' AND product_id ='$iddt' AND ordertmp_session ='$sid' ");	
		//header('Location:shopping.php');
	}	
	header('Location:shopping.php');
}

/*
	Delete all cart entries older than one day
*/
function deleteAbandonedCart(){
	$kemarin = date('Y-m-d', mktime(0,0,0, date('m'), date('d') - 1, date('Y')));
	mysql_query("DELETE FROM orders_temp 
WHERE tgl_order_temp < '$kemarin'");
}


?>