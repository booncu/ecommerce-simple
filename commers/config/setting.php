<?php 


	// Get setting
	$select_set = mysql_fetch_array(mysql_query("select * from setting"));
	$uri = $select_set[setting_url];
	$fb = $select_set[setting_fb];
	$tw = $select_set[setting_twitter];
	$email_admin = $select_set[setting_emailadmin];
	$email_sendreceive = $select_set[setting_emailsendreceive];
	
	///end of settings


  

?>