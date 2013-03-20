<!DOCTYPE HTML>
<?php
	session_start();
	
	if (isset($_POST["encoder_change_sp_adviser_submit"])){
		$ino=$_POST["encoder_change_sp_adviser_ino"];

		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			odbc_autocommit($conn, TRUE);
			odbc_exec($conn, "delete from curr_sp_advisees where ino = '".($_SESSION["s_ino"])."' and sno = '".($_SESSION["sno"])."' ");
			
			odbc_autocommit($conn, TRUE);
			odbc_exec($conn, "insert into curr_sp_advisees values ('".($ino)."','".($_SESSION["sno"])."',sysdate, NULL)");
	
			odbc_autocommit($conn, TRUE);
			odbc_exec($conn, "insert into prev_sp_advisees values ('".($_SESSION["s_ino"])."','".($_SESSION["sno"])."',sysdate, NULL)");
		
			odbc_close($conn);
			$_SESSION["adviser_change_success"]=1;
			header("Location: encoder_view_student_sp_adviser.php");
			exit;
	
		}else{
			die('could not connect');
		}	
	}
?>