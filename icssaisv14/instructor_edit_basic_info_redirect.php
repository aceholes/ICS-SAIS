<!DOCTYPE HTML>
<?php
	
	session_start();
	

	if (isset($_POST["instructor_edit_submit"])){
		$ihaddr=$_POST["instructor_edit_homeaddress"];
		$icaddr=$_POST["instructor_edit_collegeaddress"];
		$ihcontact=$_POST["instructor_edit_homecontact"];
		$iccontact=$_POST["instructor_edit_collegecontact"];
		$imobile=$_POST["instructor_edit_mobile"];
		$iemail=$_POST["instructor_edit_emailaddress"];

		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			if($ihaddr!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update instructor set ihaddr = '".($ihaddr)."' where ifname = '".($_SESSION['fname'])."' and ilname = '".($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update instructor set ihaddr = NULL where ifname = '".($_SESSION['fname'])."' and ilname = '".($_SESSION['lname'])."'");
			}

			if($icaddr!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update instructor set icaddr = '".($icaddr)."' where ifname = '".($_SESSION['fname'])."' and ilname = '".($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update instructor set icaddr = NULL where ifname = '".($_SESSION['fname'])."' and ilname = '".($_SESSION['lname'])."'");
			}

			if($ihcontact!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update instructor set ihcontact = '".($ihcontact)."' where ifname = '".($_SESSION['fname'])."' and ilname = '".($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update instructor set ihcontact = NULL where ifname = '".($_SESSION['fname'])."' and ilname = '".($_SESSION['lname'])."'");
			}

			if($iccontact!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update instructor set iccontact = '".($iccontact)."' where ifname = '".($_SESSION['fname'])."' and ilname = '".($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update instructor set iccontact = NULL where ifname = '".($_SESSION['fname'])."' and ilname = '".($_SESSION['lname'])."'");
			}
			
			if($imobile!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update instructor set imobile = '".($imobile)."' where ifname = '".($_SESSION['fname'])."' and ilname = '".($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update instructor set imobile = NULL where ifname = '".($_SESSION['fname'])."' and ilname = '".($_SESSION['lname'])."'");
			}
			
			if($iemail!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update instructor set iemail = '".($iemail)."' where ifname = '".($_SESSION['fname'])."' and ilname = '".($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update instructor set iemail = NULL where ifname = '".($_SESSION['fname'])."' and ilname = '".($_SESSION['lname'])."'");
			}

			$_SESSION["edit_basic_info_successful"]=1;
			odbc_close($conn);
		}else{
			die('could not connect');
		}
		header("Location: instructor_profile.php");
		exit;
	}

?>
