<!DOCTYPE HTML>
<?php
	session_start();
	
	if(isset($_POST["signup_submit"])){
		$firstname=$_POST["signup_firstname"];
		$lastname=$_POST["signup_lastname"];
		$gender=$_POST["signup_gender"];
		$emailaddress=$_POST["signup_emailaddress"];
		$homeaddress=$_POST["signup_homeaddress"];
		$collegeaddress=$_POST["signup_collegeaddress"];
		$homecontact=$_POST["signup_homecontact"];
		$collegecontact=$_POST["signup_collegecontact"];
		$password=$_POST["signup_password"];
		$retype_password=$_POST["signup_retype_password"];
		
		
		
	}else{
		header('Location: home.php');
		exit;
	}

?>