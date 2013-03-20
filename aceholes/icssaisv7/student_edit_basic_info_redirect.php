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
				odbc_exec($conn, "update student set shaddr = '".htmlspecialchars($shaddr)."' where sfname = '".htmlspecialchars($_SESSION['fname'])."' and slname = '".htmlspecialchars($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set shaddr = NULL where sfname = '".htmlspecialchars($_SESSION['fname'])."' and slname = '".htmlspecialchars($_SESSION['lname'])."'");
			}

			if($scaddr!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set scaddr = '".htmlspecialchars($scaddr)."' where sfname = '".htmlspecialchars($_SESSION['fname'])."' and slname = '".htmlspecialchars($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set scaddr = NULL where sfname = '".htmlspecialchars($_SESSION['fname'])."' and slname = '".htmlspecialchars($_SESSION['lname'])."'");
			}
			
			
			if($shcontact!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set shcontact = '".htmlspecialchars($shcontact)."' where sfname = '".htmlspecialchars($_SESSION['fname'])."' and slname = '".htmlspecialchars($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set shcontact = NULL where sfname = '".htmlspecialchars($_SESSION['fname'])."' and slname = '".htmlspecialchars($_SESSION['lname'])."'");
			}
			
			
			if($sccontact!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set sccontact = '".htmlspecialchars($sccontact)."' where sfname = '".htmlspecialchars($_SESSION['fname'])."' and slname = '".htmlspecialchars($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set sccontact = NULL where sfname = '".htmlspecialchars($_SESSION['fname'])."' and slname = '".htmlspecialchars($_SESSION['lname'])."'");
			}
			
			if($smobile!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set smobile = '".htmlspecialchars($smobile)."' where sfname = '".htmlspecialchars($_SESSION['fname'])."' and slname = '".htmlspecialchars($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set smobile = NULL where sfname = '".htmlspecialchars($_SESSION['fname'])."' and slname = '".htmlspecialchars($_SESSION['lname'])."'");
			}
			
			if($semail!=""){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set semail = '".htmlspecialchars($semail)."' where sfname = '".htmlspecialchars($_SESSION['fname'])."' and slname = '".htmlspecialchars($_SESSION['lname'])."'");
			}else{
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "update student set semail = NULL where sfname = '".htmlspecialchars($_SESSION['fname'])."' and slname = '".htmlspecialchars($_SESSION['lname'])."'");
			}

			$_SESSION["edit_basic_info_successful"]=1;
			odbc_close($conn);
		}else{
			die('could not connect');
		}
		header("Location: student_home.php");
	}

?>
