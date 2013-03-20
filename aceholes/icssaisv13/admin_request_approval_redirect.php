<!DOCTYPE>

<?php
	session_start();

	if(isset($_POST["admin_request_approval_submit"])){
		$action=$_POST["approval"];
		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			if($_SESSION["role"]=="student"){
				if($action=="---"){
					$_SESSION["request_approval_error"]=1;
					header("Location: admin_request_approval.php");
					exit;
				}else if($action=="approve"){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update student set sappr='Approved' where sno = '".$_SESSION["request_approval_number"]."'" );	
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update student set sact='Activated' where sno = '".$_SESSION["request_approval_number"]."'" );	
					$_SESSION["approved"]=1;
					header("Location: admin_request_approval.php");
					exit;
				}else if($action=="disapprove"){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update student set sappr='Disapproved' where sno = '".$_SESSION["request_approval_number"]."'" );	
					$_SESSION["disapproved"]=1;
					header("Location: admin_request_approval.php");
					exit;
				}
			}else if($_SESSION["role"]=="instructor"){
				if($action=="---"){
					$_SESSION["request_approval_error"]=1;
					header("Location: admin_request_approval.php");
					exit;
				}else if($action=="approve"){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set iappr='Approved' where ino = '".$_SESSION["request_approval_number"]."'" );	
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set iact='Activated' where ino = '".$_SESSION["request_approval_number"]."'" );	
					$_SESSION["approved"]=1;
					header("Location: admin_request_approval.php");
					exit;
				}else if($action=="disapprove"){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update instructor set iappr='Disapproved' where ino = '".$_SESSION["request_approval_number"]."'" );	
					$_SESSION["disapproved"]=1;
					header("Location: admin_request_approval.php");
					exit;
				}
			}	
			
		}else{
			die('could not connect');
		}	

	}

?>