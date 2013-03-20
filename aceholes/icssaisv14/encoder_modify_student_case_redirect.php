<!DOCTYPE HTML>
<?php
	session_start();
	
	if (isset($_GET["delete"])){
		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			odbc_autocommit($conn, TRUE);
			odbc_exec($conn, "delete from case where cno = '".($_GET["delete"])."'");
			
			odbc_close($conn);
			$_SESSION["case_delete_success"]=1;
			header("Location: encoder_view_student_case.php");
			exit;
	
		}else{
			die('could not connect');
		}	
	}else if (isset($_GET["edit"])){
		$_SESSION["cno"]=$_GET["edit"];
		header("Location: encoder_edit_student_case.php");
		exit;
	}
?>