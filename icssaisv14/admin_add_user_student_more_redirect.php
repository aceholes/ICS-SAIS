<!DOCTYPE HTML>
<?php
	
	session_start();
	
	if(isset($_POST["admin_add_user_submit"])){
		$haddr=$_POST["admin_add_user_homeaddress"];
		$caddr=$_POST["admin_add_user_collegeaddress"];
		$hcontact=$_POST["admin_add_user_homecontact"];
		$ccontact=$_POST["admin_add_user_collegecontact"];
		$mobile=$_POST["admin_add_user_mobile"];
		
		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){

			if($haddr!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set shaddr = '".($haddr)."' where sfname = '".($_SESSION['add_fname'])."' and slname = '".($_SESSION['add_lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set shaddr = NULL where sfname = '".($_SESSION['add_fname'])."' and slname = '".($_SESSION['add_lname'])."'");
			}

			if($caddr!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set scaddr = '".($caddr)."' where sfname = '".($_SESSION['add_fname'])."' and slname = '".($_SESSION['add_lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set scaddr = NULL where sfname = '".($_SESSION['add_fname'])."' and slname = '".($_SESSION['add_lname'])."'");
			}
			
			if($hcontact!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set shcontact = '".($hcontact)."' where sfname = '".($_SESSION['add_fname'])."' and slname = '".($_SESSION['add_lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set shcontact = NULL where sfname = '".($_SESSION['add_fname'])."' and slname = '".($_SESSION['add_lname'])."'");
			}
			
			if($ccontact!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set sccontact = '".($ccontact)."' where sfname = '".($_SESSION['add_fname'])."' and slname = '".($_SESSION['add_lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set sccontact = NULL where sfname = '".($_SESSION['add_fname'])."' and slname = '".($_SESSION['add_lname'])."'");
			}
					
			if($mobile!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set smobile = '".($mobile)."' where sfname = '".($_SESSION['add_fname'])."' and slname = '".($_SESSION['add_lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set smobile = NULL where sfname = '".($_SESSION['add_fname'])."' and slname = '".($_SESSION['add_lname'])."'");
			}
					
			odbc_close($conn);
			
			$_SESSION["added"]=1;
			header("Location: admin_add_user.php");
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