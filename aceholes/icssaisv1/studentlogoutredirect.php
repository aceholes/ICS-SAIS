<!DOCTYPE HTML>
<?php
	session_start();
	session_unset();
	header('Location: home.php');
	exit;
?>