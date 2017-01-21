<?php 
  include "../config/koneksi.php";
  
  $date = date('m-d-y G.i:s');
  if ($_SERVER["REQUEST_METHOD"] =="POST")
	{
	  if (empty($_POST['email'])) {
			echo "error";
			}
			else {
			
			mysql_query("INSERT INTO user(user_fullname,user_email,user_address,user_phone,user_newsletter,user_reg, user_pw) 
			VALUES('$_POST[fullname]','$_POST[email]','$_POST[address]','$_POST[phone]','$_POST[topik]','$date','$_POST[pass]')");
			
			header ("Location: ../index.php");
			mysql_close();
			}


	}
?>