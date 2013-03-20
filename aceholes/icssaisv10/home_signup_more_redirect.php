<!DOCTYPE HTML>
<?php
	
	session_start();
	
	if (isset($_POST["signup_skip"])){
		$_SESSION["wait"]=1;
		header("Location: home_login_error.php");
		exit;
	}else if(isset($_POST["signup_submit"])){
		$haddr=$_POST["signup_homeaddress"];
		$caddr=$_POST["signup_collegeaddress"];
		$hcontact=$_POST["signup_homecontact"];
		$ccontact=$_POST["signup_collegecontact"];
		$mobile=$_POST["signup_mobile"];
		
		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			if($_SESSION["user"]=="student"){
				if($haddr!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update student set shaddr = '".htmlspecialchars($haddr)."' where sfname = '".htmlspecialchars($_SESSION['fname'])."' and slname = '".htmlspecialchars($_SESSION['lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update student set shaddr = NULL where sfname = '".htmlspecialchars($_SESSION['fname'])."' and slname = '".htmlspecialchars($_SESSION['lname'])."'");
				}

				if($caddr!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update student set scaddr = '".htmlspecialchars($caddr)."' where sfname = '".htmlspecialchars($_SESSION['fname'])."' and slname = '".htmlspecialchars($_SESSION['lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update student set scaddr = NULL where sfname = '".htmlspecialchars($_SESSION['fname'])."' and slname = '".htmlspecialchars($_SESSION['lname'])."'");
				}
				
				
				if($hcontact!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update student set shcontact = '".htmlspecialchars($hcontact)."' where sfname = '".htmlspecialchars($_SESSION['fname'])."' and slname = '".htmlspecialchars($_SESSION['lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update student set shcontact = NULL where sfname = '".htmlspecialchars($_SESSION['fname'])."' and slname = '".htmlspecialchars($_SESSION['lname'])."'");
				}
				
				if($ccontact!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update student set sccontact = '".htmlspecialchars($ccontact)."' where sfname = '".htmlspecialchars($_SESSION['fname'])."' and slname = '".htmlspecialchars($_SESSION['lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update student set sccontact = NULL where sfname = '".htmlspecialchars($_SESSION['fname'])."' and slname = '".htmlspecialchars($_SESSION['lname'])."'");
				}
				
				if($mobile!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update student set smobile = '".htmlspecialchars($mobile)."' where sfname = '".htmlspecialchars($_SESSION['fname'])."' and slname = '".htmlspecialchars($_SESSION['lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update student set smobile = NULL where sfname = '".htmlspecialchars($_SESSION['fname'])."' and slname = '".htmlspecialchars($_SESSION['lname'])."'");
				}
				
				odbc_close($conn);
			}else if($_SESSION["user"]=="instructor"){
				if($haddr!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update instructor set ihaddr = '".htmlspecialchars($haddr)."' where ifname = '".htmlspecialchars($_SESSION['fname'])."' and ilname = '".htmlspecialchars($_SESSION['lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set ihaddr = NULL where ifname = '".htmlspecialchars($_SESSION['fname'])."' and ilname = '".htmlspecialchars($_SESSION['lname'])."'");
				}

				if($caddr!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set icaddr = '".htmlspecialchars($caddr)."' where ifname = '".htmlspecialchars($_SESSION['fname'])."' and ilname = '".htmlspecialchars($_SESSION['lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set icaddr = NULL where ifname = '".htmlspecialchars($_SESSION['fname'])."' and ilname = '".htmlspecialchars($_SESSION['lname'])."'");
				}
				
				
				if($hcontact!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set ihcontact = '".htmlspecialchars($hcontact)."' where ifname = '".htmlspecialchars($_SESSION['fname'])."' and ilname = '".htmlspecialchars($_SESSION['lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set ihcontact = NULL where ifname = '".htmlspecialchars($_SESSION['fname'])."' and ilname = '".htmlspecialchars($_SESSION['lname'])."'");
				}
				
				
				if($ccontact!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set iccontact = '".htmlspecialchars($ccontact)."' where ifname = '".htmlspecialchars($_SESSION['fname'])."' and ilname = '".htmlspecialchars($_SESSION['lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set iccontact = NULL where ifname = '".htmlspecialchars($_SESSION['fname'])."' and ilname = '".htmlspecialchars($_SESSION['lname'])."'");
				}
				
				if($mobile!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set imobile = '".htmlspecialchars($mobile)."' where ifname = '".htmlspecialchars($_SESSION['fname'])."' and ilname = '".htmlspecialchars($_SESSION['lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set imobile = NULL where ifname = '".htmlspecialchars($_SESSION['fname'])."' and ilname = '".htmlspecialchars($_SESSION['lname'])."'");
				}
				
				odbc_close($conn);
				
			}

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