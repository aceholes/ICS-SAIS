<!DOCTYPE HTML>
<?php
	session_start();
	
	if (isset($_POST["login_submit"])){
		$username=$_POST["login_username"];
		$password=$_POST["login_password"];
		
		if(($username=="") || ($password=="")){
			$_SESSION['errorlogin']=1;
			header('Location: home_login_error.php');
			exit;
		}else if(($username=="jonathanmaranan") && ($password=="studentpassword")){
			$_SESSION['username']=$username;
			$_SESSION['password']=$password;
			$_SESSION['login']=1;
			$_SESSION['user']="student";
			header('Location: studenthome.php');
			exit;
		}else if(($username=="rncrecario@gmail.com") && ($password=="reginaldrecario")){
			$_SESSION['username']=$username;
			$_SESSION['password']=$password;
			$_SESSION['login']=1;
			$_SESSION['user']="instructor";
			header('Location: instructorhome.php');
			exit;
		}else if(($username=="admin@gmail.com") && ($password=="admin")){
			$_SESSION['username']=$username;
			$_SESSION['password']=$password;
			$_SESSION['login']=1;
			$_SESSION['user']="admin";
			header('Location: adminhome.php');
			exit;
		}
	}else if(isset($_POST["signup_submit"])){
		$firstname=$_POST["signup_firstname"];
		$lastname=$_POST["signup_lastname"];
		$gender=$_POST["signup_gender"];
		$username=$_POST["signup_username"];
		$homeaddress=$_POST["signup_homeaddress"];
		$collegeaddress=$_POST["signup_collegeaddress"];
		$homecontact=$_POST["signup_homecontact"];
		$collegecontact=$_POST["signup_collegecontact"];
		$password=$_POST["signup_password"];
		$retype_password=$_POST["signup_retype_password"];
		
		
	}
	
	if($_SESSION['login']!=1 && $_SESSION['user']==""){
		header('Location: home.php');
		exit;
	}else if($_SESSION['login']==1 && $_SESSION['user']=="student"){
		header('Location: studenthome.php');
		exit;
	}else if($_SESSION['login']==1 && $_SESSION['user']=="instructor"){
		header('Location: instructorhome.php');
		exit;
	}else if($_SESSION['login']==1 && $_SESSION['user']=="encoder"){
		header('Location: encoderhome.php');
		exit;
	}else if($_SESSION['login']==1 && $_SESSION['user']=="admin"){
		header('Location: adminhome.php');
		exit;
	}
	
	
	
?>