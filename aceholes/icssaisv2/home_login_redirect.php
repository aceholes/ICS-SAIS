<!DOCTYPE HTML>
<?php
	session_start();

	if (isset($_POST["login_submit"])){
		$email=$_POST["login_emailaddress"];
		$password=$_POST["login_password"];
		
		if(($email=="") || ($password=="")){
			$_SESSION['errorlogin']=1;
			header('Location: home.php');
			exit;
		}else if(($email=="akosiothan@gmail.com") && ($password=="jonathanmaranan")){
			$_SESSION['emailaddress']=$email;
			$_SESSION['password']=$password;
			$_SESSION['login']=1;
			$_SESSION['user']="student";
			header('Location: studenthome.php');
			exit;
		}else if(($email=="rncrecario@gmail.com") && ($password=="reginaldrecario")){
			$_SESSION['emailaddress']=$email;
			$_SESSION['password']=$password;
			$_SESSION['login']=1;
			$_SESSION['user']="instructor";
			header('Location: instructorhome.php');
			exit;
		}else if(($email=="admin@gmail.com") && ($password=="admin")){
			$_SESSION['emailaddress']=$email;
			$_SESSION['password']=$password;
			$_SESSION['login']=1;
			$_SESSION['user']="admin";
			header('Location: adminhome.php');
			exit;
		}
	}
	
?>
