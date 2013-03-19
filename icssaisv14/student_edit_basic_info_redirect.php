<!DOCTYPE HTML>
<?php
	
	session_start();
	

	if (isset($_POST["student_edit_submit"])){
		$shaddr=$_POST["student_edit_homeaddress"];
		$scaddr=$_POST["student_edit_collegeaddress"];
		$shcontact=$_POST["student_edit_homecontact"];
		$sccontact=$_POST["student_edit_collegecontact"];
		$smobile=$_POST["student_edit_mobile"];
		$semail=$_POST["student_edit_emailaddress"];
		
		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			if($shaddr!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set shaddr = '".($shaddr)."' where sfname = '".($_SESSION['fname'])."' and slname = '".($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set shaddr = NULL where sfname = '".($_SESSION['fname'])."' and slname = '".($_SESSION['lname'])."'");
			}

			if($scaddr!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set scaddr = '".($scaddr)."' where sfname = '".($_SESSION['fname'])."' and slname = '".($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set scaddr = NULL where sfname = '".($_SESSION['fname'])."' and slname = '".($_SESSION['lname'])."'");
			}
			
			
			if($shcontact!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set shcontact = '".($shcontact)."' where sfname = '".($_SESSION['fname'])."' and slname = '".($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set shcontact = NULL where sfname = '".($_SESSION['fname'])."' and slname = '".($_SESSION['lname'])."'");
			}
			
			
			if($sccontact!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set sccontact = '".($sccontact)."' where sfname = '".($_SESSION['fname'])."' and slname = '".($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set sccontact = NULL where sfname = '".($_SESSION['fname'])."' and slname = '".($_SESSION['lname'])."'");
			}
			
			if($smobile!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set smobile = '".($smobile)."' where sfname = '".($_SESSION['fname'])."' and slname = '".($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set smobile = NULL where sfname = '".($_SESSION['fname'])."' and slname = '".($_SESSION['lname'])."'");
			}
			
			if($semail!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set semail = '".($semail)."' where sfname = '".($_SESSION['fname'])."' and slname = '".($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set semail = NULL where sfname = '".($_SESSION['fname'])."' and slname = '".($_SESSION['lname'])."'");
			}

			$_SESSION["edit_basic_info_successful"]=1;
			odbc_close($conn);
			header("Location: student_profile.php");
			exit;
		}else{
			die('could not connect');
		}
		
	}

?>
