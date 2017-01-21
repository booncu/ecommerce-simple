<?PHP
	ob_start();
	session_start();
	session_destroy();

	
	header ('location: index.php');
?>

<html>
<head>
	<title>Logout Page</title>
</head>

<body>
    
   
</body>
</html>
