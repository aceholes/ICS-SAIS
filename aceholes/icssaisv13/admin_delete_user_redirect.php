<!DOCTYPE>

<?php
	session_start();

	if(isset($_POST["admin_delete_user"])){
		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			if($_SESSION["role"]=='student'){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "delete from student where sno = '".$_SESSION["delete_number"]."'" );	
			}else if($_SESSION["role"]=='instructor'){
				odbc_autocommit($conn, TRUE);
				odbc_exec($conn, "delete from instructor where ino = '".$_SESSION["delete_number"]."'" );	
			}
			$_SESSION["delete_user_successful"]=1;
			odbc_close($conn);
			header('Location: admin_view_users.php');
			exit;
		}else{
			die('could not connect');
		}	

	}

?>