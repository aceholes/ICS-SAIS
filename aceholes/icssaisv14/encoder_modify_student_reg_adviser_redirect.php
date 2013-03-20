<!DOCTYPE HTML>
<?php
	session_start();
	
	if (isset($_POST["encoder_add_reg_adviser_submit"])){
		$ino=$_POST["encoder_add_reg_adviser_ino"];
		$flag=0;

		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

			if($conn){
			odbc_autocommit($conn, TRUE);
			odbc_exec($conn, "insert into curr_reg_advisees values ('".($ino)."','".($_SESSION["sno"])."',sysdate, NULL)");
			
			$result = odbc_exec($conn, "select ino, sno from curr_sp_advisees where sno = '".$_SESSION["sno"]."'");

			while($row = odbc_fetch_array($result)){
				$flag++;
			}

			if($flag == 0){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "insert into curr_sp_advisees values ('".($ino)."','".($_SESSION["sno"])."',sysdate, NULL)");	
			}

			odbc_close($conn);
			$_SESSION["adviser_add_success"]=1;
			header("Location: encoder_view_student_reg_adviser.php");
			exit;

		}else{
			die('could not connect');
		}	
		
	}else if (isset($_POST["encoder_change_reg_adviser_submit"])){
		$ino=$_POST["encoder_change_reg_adviser_ino"];
		$flag=0;

		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			odbc_autocommit($conn, TRUE);
			odbc_exec($conn, "delete from curr_reg_advisees where ino = '".($_SESSION["r_ino"])."' and sno = '".($_SESSION["sno"])."' ");
			
			odbc_autocommit($conn, TRUE);
			odbc_exec($conn, "insert into curr_reg_advisees values ('".($ino)."','".($_SESSION["sno"])."',sysdate, NULL)");
		
			odbc_autocommit($conn, TRUE);
			odbc_exec($conn, "insert into prev_reg_advisees values ('".($_SESSION["r_ino"])."','".($_SESSION["sno"])."',sysdate, NULL)");				

			odbc_close($conn);
			$_SESSION["adviser_change_success"]=1;
			header("Location: encoder_view_student_reg_adviser.php");
			exit;

		}else{
			die('could not connect');
		}	
		
	}
?>