<!DOCTYPE HTML>
<?php
	session_start();
	
	if (isset($_POST["encoder_add_reg_adviser_submit"])){
		$ino=$_POST["encoder_add_reg_adviser_ino"];

		if($name == "---"){
			$_SESSION["adviser_invalid"]=1;
			header("Location: encoder_view_reg_adviser.php");
			exit;
		}else{
			$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

			if($conn){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "insert into curr_reg_advisees values ('".($ino)."','".($_SESSION["sno"])."',sysdate, NULL)");
				
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "insert into curr_sp_advisees values ('".($ino)."','".($_SESSION["sno"])."',sysdate, NULL)");

				odbc_close($conn);
				$_SESSION["adviser_add_success"]=1;
				header("Location: encoder_view_reg_adviser.php");
				exit;

			}else{
				die('could not connect');
			}	
		}
	}
?>