<!DOCTYPE HTML>
<?php
	session_start();
	
	
	
	if (isset($_POST["studentchangepassword_submit"])){
		$old=$_POST['studentpassword_old'];
		$new=$_POST['studentpassword_new'];
		$newretype=$_POST['studentpassword_new_retype'];
		
		if($old=="" || $new=="" || $newretype==""){
			if($old=="") $_SESSION['password_old_error']=1;
			if($new=="") $_SESSION['password_new_error']=1;
			if($newretype=="") $_SESSION['password_new_retype_error']=1;
			header('Location: studentchangepassword.php');
			exit;
		}else if($old!="" && $new!="" && $newretype!=""){
			if($new!=$newretype){
				$_SESSION['password_match_error']=1;
				header('Location: studentchangepassword.php');
				exit;
			}
		}
	}else if (isset($_POST["instructorchangepassword_submit"])){
		$old=$_POST['instructorpassword_old'];
		$new=$_POST['instructorpassword_new'];
		$newretype=$_POST['instructorpassword_new_retype'];
		
		if($old=="" || $new=="" || $newretype==""){
			if($old=="") $_SESSION['password_old_error']=1;
			if($new=="") $_SESSION['password_new_error']=1;
			if($newretype=="") $_SESSION['password_new_retype_error']=1;
			header('Location: instructorchangepassword.php');
			exit;
		}else if($old!="" && $new!="" && $newretype!=""){
			if($new!=$newretype){
				$_SESSION['password_match_error']=1;
				header('Location: instructorchangepassword.php');
				exit;
			}
		}
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