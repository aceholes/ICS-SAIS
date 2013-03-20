<!DOCTYPE HTML>
<?php
	
	session_start();
	
	if(isset($_POST["signup_submit"])){
		$haddr=$_POST["signup_homeaddress"];
		$caddr=$_POST["signup_collegeaddress"];
		$hcontact=$_POST["signup_homecontact"];
		$ccontact=$_POST["signup_collegecontact"];
		$mobile=$_POST["signup_mobile"];
		
		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			if($haddr!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set shaddr = '".($haddr)."' where sfname = '".($_SESSION['fname'])."' and slname = '".($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set shaddr = NULL where sfname = '".($_SESSION['fname'])."' and slname = '".($_SESSION['lname'])."'");
			}
			if($caddr!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set scaddr = '".($caddr)."' where sfname = '".($_SESSION['fname'])."' and slname = '".($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set scaddr = NULL where sfname = '".($_SESSION['fname'])."' and slname = '".($_SESSION['lname'])."'");
			}
			
			
			if($hcontact!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set shcontact = '".($hcontact)."' where sfname = '".($_SESSION['fname'])."' and slname = '".($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set shcontact = NULL where sfname = '".($_SESSION['fname'])."' and slname = '".($_SESSION['lname'])."'");
			}
			
			if($ccontact!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set sccontact = '".($ccontact)."' where sfname = '".($_SESSION['fname'])."' and slname = '".($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set sccontact = NULL where sfname = '".($_SESSION['fname'])."' and slname = '".($_SESSION['lname'])."'");
			}
			
			if($mobile!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set smobile = '".($mobile)."' where sfname = '".($_SESSION['fname'])."' and slname = '".($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set smobile = NULL where sfname = '".($_SESSION['fname'])."' and slname = '".($_SESSION['lname'])."'");
			}
			
			odbc_close($conn);
			$_SESSION["wait"]=1;
			header("Location: home_login_error.php");
			exit;
		}else{
			die('could not connect');
		}
	}

	if($_SESSION['login']==1 && $_SESSION['user']=="student"){
		header('Location: student_home.php');
		exit;
	}else if($_SESSION['login']==1 && $_SESSION['user']=="instructor"){
		header('Location: instructor_home.php');
		exit;
	}else if($_SESSION['login']==1 && $_SESSION['user']=="encoder"){
		header('Location: encoder_home.php');
		exit;
	}else if($_SESSION['login']==1 && $_SESSION['user']=="admin"){
		header('Location: admin_home.php');
		exit;
	}
	
?>