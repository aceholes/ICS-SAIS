<!DOCTYPE HTML>
<?php
	session_start();
	
	if (isset($_POST["encoder_add_student_case_submit"])){
		$cno=$_POST["encoder_add_student_case_no"];
		$creason=$_POST["encoder_add_student_case_reason"];
		$cpenalty=$_POST["encoder_add_student_case_penalty"];
		$month=$_POST["encoder_add_student_case_month"];
		$day=$_POST["encoder_add_student_case_day"];
		$year=$_POST["encoder_add_student_case_year"];

		$date=$month." ".$day.", ".$year;

		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			odbc_autocommit($conn, TRUE);
			odbc_exec($conn, "insert into case values ('".($_SESSION["sno"])."', '".($cno)."', '".($creason)."', '".($cpenalty)."', '".($date)."')");
			
			odbc_close($conn);
			$_SESSION["case_add_success"]=1;
			header("Location: encoder_view_student_case.php");
			exit;
	
		}else{
			die('could not connect');
		}	
	}
?>