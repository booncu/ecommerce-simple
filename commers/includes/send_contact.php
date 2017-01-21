<?php 
	include "../config/koneksi.php";
	
	if ($_SERVER["REQUEST_METHOD"] =="POST")
	{
			if (empty($_POST['email'])) {
			echo "error";
			}
			else {
			
			mysql_query("INSERT INTO contact(contact_name,contact_address,contact_email,contact_num,contact_topic,contact_text) 
			VALUES('$_POST[name]','$_POST[alamat_name]','$_POST[email]','$_POST[hp]','$_POST[topik]','$_POST[message]')");
			
			header ("Location: ../index.php");
			mysql_close();
			}
	}
?>