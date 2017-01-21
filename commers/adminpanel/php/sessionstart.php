<?php
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: login.php");  
}

$admin = $_SESSION['admin'];
//echo $userid;

?>