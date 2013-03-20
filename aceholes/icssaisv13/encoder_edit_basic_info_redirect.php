<!DOCTYPE HTML>
<?php
	
	session_start();
	

	if (isset($_POST["encoder_edit_submit"])){
		$ehaddr=$_POST["encoder_edit_homeaddress"];
		$ecaddr=$_POST["encoder_edit_collegeaddress"];
		$ehcontact=$_POST["encoder_edit_homecontact"];
		$eccontact=$_POST["encoder_edit_collegecontact"];
		$emobile=$_POST["encoder_edit_mobile"];
		$eemail=$_POST["encoder_edit_emailaddress"];

		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			if($ehaddr!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update encoder set ehaddr = '".($ehaddr)."' where efname = '".($_SESSION['fname'])."' and elname = '".($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update encoder set ehaddr = NULL where efname = '".($_SESSION['fname'])."' and elname = '".($_SESSION['lname'])."'");
			}

			if($ecaddr!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update encoder set ecaddr = '".($ecaddr)."' where efname = '".($_SESSION['fname'])."' and elname = '".($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update encoder set ecaddr = NULL where efname = '".($_SESSION['fname'])."' and elname = '".($_SESSION['lname'])."'");
			}

			if($ehcontact!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update encoder set ehcontact = '".($ehcontact)."' where efname = '".($_SESSION['fname'])."' and elname = '".($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update encoder set ehcontact = NULL where efname = '".($_SESSION['fname'])."' and elname = '".($_SESSION['lname'])."'");
			}

			if($eccontact!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update encoder set eccontact = '".($eccontact)."' where efname = '".($_SESSION['fname'])."' and elname = '".($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update encoder set eccontact = NULL where efname = '".($_SESSION['fname'])."' and elname = '".($_SESSION['lname'])."'");
			}
			
			if($emobile!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update encoder set emobile = '".($emobile)."' where efname = '".($_SESSION['fname'])."' and elname = '".($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update encoder set emobile = NULL where efname = '".($_SESSION['fname'])."' and elname = '".($_SESSION['lname'])."'");
			}
			
			if($eemail!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update encoder set eemail = '".($eemail)."' where efname = '".($_SESSION['fname'])."' and elname = '".($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update encoder set eemail = NULL where efname = '".($_SESSION['fname'])."' and elname = '".($_SESSION['lname'])."'");
			}

			odbc_autocommit($conn, TRUE);
			odbc_exec($conn, "insert into encoder_log values ('".($_SESSION["no"])."','".($_SESSION['fname'])." ".($_SESSION['lname'])." edits basic information."."',sysdate)");

			$_SESSION["edit_basic_info_successful"]=1;
			odbc_close($conn);
		}else{
			die('could not connect');
		}
		header("Location: encoder_profile.php");
		exit;
	}

?>
