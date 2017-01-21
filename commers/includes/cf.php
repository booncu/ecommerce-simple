<?php 
	include "../config/koneksi.php";
	
	$date=$_POST[''];
	
	if ($_SERVER["REQUEST_METHOD"] =="POST")
	{
			if (empty($_POST['no_order'])) {
                        header("Location: ../confirm.php");
			echo "error";
                        
			}
			else {
			
			mysql_query("INSERT INTO confirm(no_or, bank_t, bank_a, rek_an, nom_t, tgl_t) 
			VALUES('$_POST[no_order]','$_POST[_to_bank_t]','$_POST[_to_bank_a]','$_POST[no_rek]','$_POST[no_tr]','$_POST[date1] ')");
			
			header ("Location: ../index.php");
			mysql_close();
			}
	}
?>