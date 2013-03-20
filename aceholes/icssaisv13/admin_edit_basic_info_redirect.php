<!DOCTYPE HTML>
<?php
	
	session_start();
	

	if (isset($_POST["admin_edit_submit"])){
		$ahaddr=$_POST["admin_edit_homeaddress"];
		$acaddr=$_POST["admin_edit_collegeaddress"];
		$ahcontact=$_POST["admin_edit_homecontact"];
		$accontact=$_POST["admin_edit_collegecontact"];
		$amobile=$_POST["admin_edit_mobile"];
		$aemail=$_POST["admin_edit_emailaddress"];

		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			if($ahaddr!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update administrator set ahaddr = '".($ahaddr)."' where afname = '".($_SESSION['fname'])."' and alname = '".($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update administrator set ahaddr = NULL where afname = '".($_SESSION['fname'])."' and alname = '".($_SESSION['lname'])."'");
			}

			if($acaddr!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update administrator set acaddr = '".($acaddr)."' where afname = '".($_SESSION['fname'])."' and alname = '".($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update administrator set acaddr = NULL where afname = '".($_SESSION['fname'])."' and alname = '".($_SESSION['lname'])."'");
			}

			if($ahcontact!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update administrator set ahcontact = '".($ahcontact)."' where afname = '".($_SESSION['fname'])."' and alname = '".($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update administrator set ahcontact = NULL where afname = '".($_SESSION['fname'])."' and alname = '".($_SESSION['lname'])."'");
			}

			if($accontact!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update administrator set accontact = '".($accontact)."' where afname = '".($_SESSION['fname'])."' and alname = '".($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update administrator set accontact = NULL where afname = '".($_SESSION['fname'])."' and alname = '".($_SESSION['lname'])."'");
			}
			
			if($amobile!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update administrator set amobile = '".($amobile)."' where afname = '".($_SESSION['fname'])."' and alname = '".($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update administrator set amobile = NULL where afname = '".($_SESSION['fname'])."' and alname = '".($_SESSION['lname'])."'");
			}
			
			if($aemail!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update administrator set aemail = '".($aemail)."' where afname = '".($_SESSION['fname'])."' and alname = '".($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update administrator set aemail = NULL where afname = '".($_SESSION['fname'])."' and alname = '".($_SESSION['lname'])."'");
			}

			$_SESSION["edit_basic_info_successful"]=1;
			odbc_close($conn);
		}else{
			die('could not connect');
		}
		header("Location: admin_profile.php");
		exit;
	}

?>
