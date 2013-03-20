<!DOCTYPE>

<?php
	session_start();

	if(isset($_POST["admin_account_activation_submit"])){
		$action=$_POST["activation"];
		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			if($_SESSION["role"]=="student"){
				if($action=="---"){
					$_SESSION["account_activation_error"]=1;
					header("Location: admin_account_activation.php");
					exit;
				}else if($action=="activate"){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update student set sact='Activated' where sno = '".$_SESSION["account_activation_number"]."'" );	
					$_SESSION["activated"]=1;
					header("Location: admin_account_activation.php");
					exit;
				}else if($action=="deactivate"){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update student set sact='Deactivated' where sno = '".$_SESSION["account_activation_number"]."'" );	
					$_SESSION["deactivated"]=1;
					header("Location: admin_account_activation.php");
					exit;
				}
			}else if($_SESSION["role"]=="instructor"){
				if($action=="---"){
					$_SESSION["account_activation_error"]=1;
					header("Location: admin_account_activation.php");
					exit;
				}else if($action=="activate"){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set iact='Activated' where ino = '".$_SESSION["account_activation_number"]."'" );	
					$_SESSION["activated"]=1;
					header("Location: admin_account_activation.php");
					exit;
				}else if($action=="deactivate"){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set iact='Deactivated' where ino = '".$_SESSION["account_activation_number"]."'" );	
					$_SESSION["deactivated"]=1;
					header("Location: admin_account_activation.php");
					exit;
				}
			}	
			
		}else{
			die('could not connect');
		}	

	}

?>