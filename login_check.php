<?php
	session_start();
	if(!isset($_SESSION['email']) || empty($_SESSION['email'])) {
		header('Location: index.php?msg=Please+Login+To+Continue');
	}
	if(trim($type) != trim($_SESSION['type'])) {
		header('Location: logout.php');
	}
?>