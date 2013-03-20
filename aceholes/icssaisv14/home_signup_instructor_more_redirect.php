<!DOCTYPE HTML>
<?php
	
	session_start();
	
	if(isset($_POST["signup_submit"])){
		$haddr=$_POST["signup_homeaddress"];
		$caddr=$_POST["signup_collegeaddress"];
		$hcontact=$_POST["signup_homecontact"];
		$ccontact=$_POST["signup_collegecontact"];
		$mobile=$_POST["signup_mobile"];
		$designation=$_POST["signup_designation"];
		$rank=$_POST["signup_rank"];
		$room=$_POST["signup_room"];

		if($designation=="---" || $room=="---"){
			if($designation=="---") $_SESSION["designation_error"]=1;
			if($room=="---") $_SESSION["room_error"]=1;
			
			header("Location: home_signup_instructor_more.php");
			exit;
			
		}else{
			$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

			if($conn){
				if($haddr!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set ihaddr = '".($haddr)."' where ifname = '".($_SESSION['fname'])."' and ilname = '".($_SESSION['lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set ihaddr = NULL where ifname = '".($_SESSION['fname'])."' and ilname = '".($_SESSION['lname'])."'");
				}
				
				if($caddr!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set icaddr = '".($caddr)."' where ifname = '".($_SESSION['fname'])."' and ilname = '".($_SESSION['lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set icaddr = NULL where ifname = '".($_SESSION['fname'])."' and ilname = '".($_SESSION['lname'])."'");
				}
					
				if($hcontact!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set ihcontact = '".($hcontact)."' where ifname = '".($_SESSION['fname'])."' and ilname = '".($_SESSION['lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set ihcontact = NULL where ifname = '".($_SESSION['fname'])."' and ilname = '".($_SESSION['lname'])."'");
				}
					
				if($ccontact!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set iccontact = '".($ccontact)."' where ifname = '".($_SESSION['fname'])."' and ilname = '".($_SESSION['lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set iccontact = NULL where ifname = '".($_SESSION['fname'])."' and ilname = '".($_SESSION['lname'])."'");
				}
				
				if($mobile!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set imobile = '".($mobile)."' where ifname = '".($_SESSION['fname'])."' and ilname = '".($_SESSION['lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set imobile = NULL where ifname = '".($_SESSION['fname'])."' and ilname = '".($_SESSION['lname'])."'");
				}

				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update instructor set idesig = '".($designation)."' where ifname = '".($_SESSION['fname'])."' and ilname = '".($_SESSION['lname'])."'");
				
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update instructor set irank = '".($rank)."' where ifname = '".($_SESSION['fname'])."' and ilname = '".($_SESSION['lname'])."'");

				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update instructor set iroom = '".($room)."' where ifname = '".($_SESSION['fname'])."' and ilname = '".($_SESSION['lname'])."'");

				odbc_close($conn);
				$_SESSION["wait"]=1;
				header("Location: home_login_error.php");
				exit;
			}else{
				die('could not connect');
			}
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