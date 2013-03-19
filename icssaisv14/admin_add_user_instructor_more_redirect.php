<!DOCTYPE HTML>
<?php
	
	session_start();
	
	if(isset($_POST["admin_add_user_submit"])){
		$haddr=$_POST["admin_add_user_homeaddress"];
		$caddr=$_POST["admin_add_user_collegeaddress"];
		$hcontact=$_POST["admin_add_user_homecontact"];
		$ccontact=$_POST["admin_add_user_collegecontact"];
		$mobile=$_POST["admin_add_user_mobile"];
		$designation=$_POST["admin_add_user_designation"];
		$rank=$_POST["admin_add_user_rank"];
		$room=$_POST["admin_add_user_room"];

		if($designation=="---" || $room=="---"){
			if($designation=="---") $_SESSION["designation_error"]=1;
			if($room=="---") $_SESSION["room_error"]=1;
			
			header("Location: admin_add_user_instructor_more.php");
			exit;
			
		}else{
		
			$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

			if($conn){

				if($haddr!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set ihaddr = '".($haddr)."' where ifname = '".($_SESSION['add_fname'])."' and ilname = '".($_SESSION['add_lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set ihaddr = NULL where ifname = '".($_SESSION['add_fname'])."' and ilname = '".($_SESSION['add_lname'])."'");
				}
	
				if($caddr!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set icaddr = '".($caddr)."' where ifname = '".($_SESSION['add_fname'])."' and ilname = '".($_SESSION['add_lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set icaddr = NULL where ifname = '".($_SESSION['add_fname'])."' and ilname = '".($_SESSION['add_lname'])."'");
				}
							
				if($hcontact!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set ihcontact = '".($hcontact)."' where ifname = '".($_SESSION['add_fname'])."' and ilname = '".($_SESSION['add_lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set ihcontact = NULL where ifname = '".($_SESSION['add_fname'])."' and ilname = '".($_SESSION['add_lname'])."'");
				}
				
				
				if($ccontact!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set iccontact = '".($ccontact)."' where ifname = '".($_SESSION['add_fname'])."' and ilname = '".($_SESSION['add_lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set iccontact = NULL where ifname = '".($_SESSION['add_fname'])."' and ilname = '".($_SESSION['add_lname'])."'");
				}
				
				if($mobile!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set imobile = '".($mobile)."' where ifname = '".($_SESSION['add_fname'])."' and ilname = '".($_SESSION['add_lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set imobile = NULL where ifname = '".($_SESSION['add_fname'])."' and ilname = '".($_SESSION['add_lname'])."'");
				}
				
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update instructor set idesig = '".($designation)."' where ifname = '".($_SESSION['fname'])."' and ilname = '".($_SESSION['lname'])."'");
				
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update instructor set irank = '".($rank)."' where ifname = '".($_SESSION['fname'])."' and ilname = '".($_SESSION['lname'])."'");

				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update instructor set iroom = '".($room)."' where ifname = '".($_SESSION['fname'])."' and ilname = '".($_SESSION['lname'])."'");
						
				odbc_close($conn);
				
				$_SESSION["added"]=1;
				header("Location: admin_add_user.php");
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