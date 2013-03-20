<!DOCTYPE HTML>
<?php
	session_start();

	if(isset($_POST["admin_change_password_submit"])){
		$old=$_POST["admin_password_old"];
		$new=$_POST["admin_password_new"];
		$new2=$_POST["admin_password_new_retype"];
		$flag=0;
		$temp="";

		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			$result=odbc_exec($conn, "select apword from administrator where ano = '".($_SESSION['no'])."'");

			while($row = odbc_fetch_array($result)) {
				$temp=$row["APWORD"];
			}
			if($temp!=$old){
				$_SESSION["password_not_found"]=1;
			}else{
				$_SESSION["password_not_found"]=0;
			}
		
			
			if($new=="" || $new2=="" || $old=="" || $_SESSION["password_not_found"]==1){
				header('Location: admin_change_password.php');
				exit;	
			}
				
			if($new!="" && $new2!="" && $_SESSION["password_not_found"]==0){
				if($new!=$new2){
					$_SESSION["password_match_error"]=1;
					header('Location: admin_change_password.php');
					exit;		
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update administrator set apword = '".($new)."' where ano = '".($_SESSION['no'])."'");
					$_SESSION["change_password_successful"]=1;
					odbc_close($conn);
					header("Location: admin_profile.php");
					exit;
				}
			}
		}else{
			die('could not connect');
		}
	}
?>
