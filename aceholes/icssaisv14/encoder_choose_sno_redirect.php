<!DOCTYPE HTML>
<?php
	session_start();

	if(isset($_POST["encoder_choose_sno_course_submit"])){
		$sno=$_POST["encoder_choose_sno"];
	
		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			$result = odbc_exec($conn, "select sno from student where sno = '".$sno."'");
		
			while($row = odbc_fetch_array($result)){
				$_SESSION["sno"] = $row["SNO"];
			}

			header("Location: encoder_view_student_allowed_ge_ah.php");
			exit;
		}else{
			die('could not connect');
		}
	}else if(isset($_POST["encoder_choose_sno_adviser_submit"])){
		$sno=$_POST["encoder_choose_sno"];
	
		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			$result = odbc_exec($conn, "select sno from student where sno = '".$sno."'");
		
			while($row = odbc_fetch_array($result)){
				$_SESSION["sno"] = $row["SNO"];
			}

			header("Location: encoder_view_student_reg_adviser.php");
			exit;
		}else{
			die('could not connect');
		}
	}else if(isset($_POST["encoder_choose_sno_case_submit"])){
		$sno=$_POST["encoder_choose_sno"];
	
		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			$result = odbc_exec($conn, "select sno from student where sno = '".$sno."'");
		
			while($row = odbc_fetch_array($result)){
				$_SESSION["sno"] = $row["SNO"];
			}

			header("Location: encoder_view_student_case.php");
			exit;
		}else{
			die('could not connect');
		}
	}

?>