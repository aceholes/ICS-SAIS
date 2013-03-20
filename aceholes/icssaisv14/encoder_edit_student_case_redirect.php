<!DOCTYPE HTML>
<?php
	session_start();
	
	if (isset($_POST["encoder_edit_student_case_submit"])){
		$cno=$_POST["encoder_edit_student_case_no"];
		$creason=$_POST["encoder_edit_student_case_reason"];
		$cpenalty=$_POST["encoder_edit_student_case_penalty"];
		$month=$_POST["encoder_edit_student_case_month"];
		$day=$_POST["encoder_edit_student_case_day"];
		$year=$_POST["encoder_edit_student_case_year"];

		$date=$month." ".$day.", ".$year;

		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			odbc_autocommit($conn, TRUE);
			odbc_exec($conn, "update case set cno = '".($cno)."' where cno = '".($_SESSION["cno"])."'");

			odbc_autocommit($conn, TRUE);
			odbc_exec($conn, "update case set creason = '".($creason)."' where cno = '".($_SESSION["cno"])."'");
			
			odbc_autocommit($conn, TRUE);
			odbc_exec($conn, "update case set cpenalty = '".($cpenalty)."' where cno = '".($_SESSION["cno"])."'");

			odbc_autocommit($conn, TRUE);
			odbc_exec($conn, "update case set cdate = '".($date)."' where cno = '".($_SESSION["cno"])."'");

			odbc_close($conn);
			$_SESSION["case_edit_success"]=1;
			header("Location: encoder_view_student_case.php");
			exit;
	
		}else{
			die('could not connect');
		}	
	}
?>