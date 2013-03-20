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
				odbc_exec($conn, "update administrator set ahaddr = '".htmlspecialchars($ahaddr)."' where afname = '".htmlspecialchars($_SESSION['fname'])."' and alname = '".htmlspecialchars($_SESSION['lname'])."'");
			}
			if($acaddr!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update administrator set acaddr = '".htmlspecialchars($acaddr)."' where afname = '".htmlspecialchars($_SESSION['fname'])."' and alname = '".htmlspecialchars($_SESSION['lname'])."'");
			}
			if($ahcontact!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update administrator set ahcontact = '".htmlspecialchars($ahcontact)."' where afname = '".htmlspecialchars($_SESSION['fname'])."' and alname = '".htmlspecialchars($_SESSION['lname'])."'");
			}
			if($accontact!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update administrator set accontact = '".htmlspecialchars($accontact)."' where afname = '".htmlspecialchars($_SESSION['fname'])."' and alname = '".htmlspecialchars($_SESSION['lname'])."'");
			}
			if($amobile!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update administrator set amobile = '".htmlspecialchars($amobile)."' where afname = '".htmlspecialchars($_SESSION['fname'])."' and alname = '".htmlspecialchars($_SESSION['lname'])."'");
			}
			if($aemail!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update administrator set aemail = '".htmlspecialchars($aemail)."' where afname = '".htmlspecialchars($_SESSION['fname'])."' and alname = '".htmlspecialchars($_SESSION['lname'])."'");
			}
			odbc_close($conn);
		}else{
			die('could not connect');
		}
		header("Location: admin_home.php");
	}

?>
