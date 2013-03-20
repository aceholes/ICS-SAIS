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
				odbc_exec($conn, "update encoder set ehaddr = '".htmlspecialchars($ehaddr)."' where efname = '".htmlspecialchars($_SESSION['fname'])."' and elname = '".htmlspecialchars($_SESSION['lname'])."'");
			}
			if($ecaddr!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update encoder set ecaddr = '".htmlspecialchars($ecaddr)."' where efname = '".htmlspecialchars($_SESSION['fname'])."' and elname = '".htmlspecialchars($_SESSION['lname'])."'");
			}
			if($ehcontact!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update encoder set ehcontact = '".htmlspecialchars($ehcontact)."' where efname = '".htmlspecialchars($_SESSION['fname'])."' and elname = '".htmlspecialchars($_SESSION['lname'])."'");
			}
			if($eccontact!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update encoder set eccontact = '".htmlspecialchars($eccontact)."' where efname = '".htmlspecialchars($_SESSION['fname'])."' and elname = '".htmlspecialchars($_SESSION['lname'])."'");
			}
			if($emobile!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update encoder set emobile = '".htmlspecialchars($emobile)."' where efname = '".htmlspecialchars($_SESSION['fname'])."' and elname = '".htmlspecialchars($_SESSION['lname'])."'");
			}
			if($eemail!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update encoder set eemail = '".htmlspecialchars($eemail)."' where efname = '".htmlspecialchars($_SESSION['fname'])."' and elname = '".htmlspecialchars($_SESSION['lname'])."'");
			}
			odbc_close($conn);
		}else{
			die('could not connect');
		}
		header("Location: encoder_home.php");
	}

?>
