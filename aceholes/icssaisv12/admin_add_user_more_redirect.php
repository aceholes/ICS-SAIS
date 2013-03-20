<!DOCTYPE HTML>
<?php
	
	session_start();
	
	if (isset($_POST["admin_add_user_skip"])){
		$_SESSION["added"]=1;
		header("Location: admin_add_user.php");
		exit;
	}else if(isset($_POST["admin_add_user_submit"])){
		$haddr=$_POST["admin_add_user_homeaddress"];
		$caddr=$_POST["admin_add_user_collegeaddress"];
		$hcontact=$_POST["admin_add_user_homecontact"];
		$ccontact=$_POST["admin_add_user_collegecontact"];
		$mobile=$_POST["admin_add_user_mobile"];
		
		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			if($_SESSION["user"]=="student"){
				if($haddr!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update student set shaddr = '".htmlspecialchars($haddr)."' where sfname = '".htmlspecialchars($_SESSION['add_fname'])."' and slname = '".htmlspecialchars($_SESSION['add_lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update student set shaddr = NULL where sfname = '".htmlspecialchars($_SESSION['add_fname'])."' and slname = '".htmlspecialchars($_SESSION['add_lname'])."'");
				}

				if($caddr!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update student set scaddr = '".htmlspecialchars($caddr)."' where sfname = '".htmlspecialchars($_SESSION['add_fname'])."' and slname = '".htmlspecialchars($_SESSION['add_lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update student set scaddr = NULL where sfname = '".htmlspecialchars($_SESSION['add_fname'])."' and slname = '".htmlspecialchars($_SESSION['add_lname'])."'");
				}
				
				
				if($hcontact!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update student set shcontact = '".htmlspecialchars($hcontact)."' where sfname = '".htmlspecialchars($_SESSION['add_fname'])."' and slname = '".htmlspecialchars($_SESSION['add_lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update student set shcontact = NULL where sfname = '".htmlspecialchars($_SESSION['add_fname'])."' and slname = '".htmlspecialchars($_SESSION['add_lname'])."'");
				}
				
				if($ccontact!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update student set sccontact = '".htmlspecialchars($ccontact)."' where sfname = '".htmlspecialchars($_SESSION['add_fname'])."' and slname = '".htmlspecialchars($_SESSION['add_lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update student set sccontact = NULL where sfname = '".htmlspecialchars($_SESSION['add_fname'])."' and slname = '".htmlspecialchars($_SESSION['add_lname'])."'");
				}
				
				if($mobile!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update student set smobile = '".htmlspecialchars($mobile)."' where sfname = '".htmlspecialchars($_SESSION['add_fname'])."' and slname = '".htmlspecialchars($_SESSION['add_lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update student set smobile = NULL where sfname = '".htmlspecialchars($_SESSION['add_fname'])."' and slname = '".htmlspecialchars($_SESSION['add_lname'])."'");
				}
				
				odbc_close($conn);
			}else if($_SESSION["user"]=="instructor"){
				if($haddr!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update instructor set ihaddr = '".htmlspecialchars($haddr)."' where ifname = '".htmlspecialchars($_SESSION['add_fname'])."' and ilname = '".htmlspecialchars($_SESSION['add_lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set ihaddr = NULL where ifname = '".htmlspecialchars($_SESSION['add_fname'])."' and ilname = '".htmlspecialchars($_SESSION['add_lname'])."'");
				}

				if($caddr!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set icaddr = '".htmlspecialchars($caddr)."' where ifname = '".htmlspecialchars($_SESSION['add_fname'])."' and ilname = '".htmlspecialchars($_SESSION['add_lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set icaddr = NULL where ifname = '".htmlspecialchars($_SESSION['add_fname'])."' and ilname = '".htmlspecialchars($_SESSION['add_lname'])."'");
				}
				
				
				if($hcontact!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set ihcontact = '".htmlspecialchars($hcontact)."' where ifname = '".htmlspecialchars($_SESSION['add_fname'])."' and ilname = '".htmlspecialchars($_SESSION['add_lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set ihcontact = NULL where ifname = '".htmlspecialchars($_SESSION['add_fname'])."' and ilname = '".htmlspecialchars($_SESSION['add_lname'])."'");
				}
				
				
				if($ccontact!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set iccontact = '".htmlspecialchars($ccontact)."' where ifname = '".htmlspecialchars($_SESSION['add_fname'])."' and ilname = '".htmlspecialchars($_SESSION['add_lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set iccontact = NULL where ifname = '".htmlspecialchars($_SESSION['add_fname'])."' and ilname = '".htmlspecialchars($_SESSION['add_lname'])."'");
				}
				
				if($mobile!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set imobile = '".htmlspecialchars($mobile)."' where ifname = '".htmlspecialchars($_SESSION['add_fname'])."' and ilname = '".htmlspecialchars($_SESSION['add_lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set imobile = NULL where ifname = '".htmlspecialchars($_SESSION['add_fname'])."' and ilname = '".htmlspecialchars($_SESSION['add_lname'])."'");
				}
				
				odbc_close($conn);
				
			}else if($_SESSION["user"]=="encoder"){
				if($haddr!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update encoder set ehaddr = '".htmlspecialchars($haddr)."' where efname = '".htmlspecialchars($_SESSION['add_fname'])."' and elname = '".htmlspecialchars($_SESSION['add_lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update encoder set ehaddr = NULL where efname = '".htmlspecialchars($_SESSION['add_fname'])."' and elname = '".htmlspecialchars($_SESSION['add_lname'])."'");
				}

				if($caddr!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update encoder set ecaddr = '".htmlspecialchars($caddr)."' where efname = '".htmlspecialchars($_SESSION['add_fname'])."' and elname = '".htmlspecialchars($_SESSION['add_lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update encoder set ecaddr = NULL where efname = '".htmlspecialchars($_SESSION['add_fname'])."' and elname = '".htmlspecialchars($_SESSION['add_lname'])."'");
				}
				
				
				if($hcontact!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update encoder set ehcontact = '".htmlspecialchars($hcontact)."' where efname = '".htmlspecialchars($_SESSION['add_fname'])."' and elname = '".htmlspecialchars($_SESSION['add_lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update encoder set ehcontact = NULL where efname = '".htmlspecialchars($_SESSION['add_fname'])."' and elname = '".htmlspecialchars($_SESSION['add_lname'])."'");
				}
				
				
				if($ccontact!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update encoder set eccontact = '".htmlspecialchars($ccontact)."' where efname = '".htmlspecialchars($_SESSION['add_fname'])."' and elname = '".htmlspecialchars($_SESSION['add_lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update encoder set eccontact = NULL where efname = '".htmlspecialchars($_SESSION['add_fname'])."' and elname = '".htmlspecialchars($_SESSION['add_lname'])."'");
				}
				
				if($mobile!=""){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update encoder set emobile = '".htmlspecialchars($mobile)."' where efname = '".htmlspecialchars($_SESSION['add_fname'])."' and elname = '".htmlspecialchars($_SESSION['add_lname'])."'");
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update encoder set emobile = NULL where efname = '".htmlspecialchars($_SESSION['add_fname'])."' and elname = '".htmlspecialchars($_SESSION['add_lname'])."'");
				}
				
				odbc_close($conn);
				
			}

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