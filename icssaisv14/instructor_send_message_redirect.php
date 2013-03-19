<!DOCTYPE HTML>
<?php
	session_start();
	
	if (isset($_POST["instructor_send_message_submit"])){
		$subject=$_POST["instructor_send_message_subject"];
		$body=$_POST["instructor_send_message_body"];

		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			odbc_autocommit($conn, TRUE);
			$result=odbc_exec($conn, "insert into instructor_sentbox values ('".($_SESSION['no'])."',sysdate,'".($subject)."','".($body)."')");
			
			odbc_autocommit($conn, TRUE);
			$result=odbc_exec($conn, "insert into admin_instructor_inbox values ('".($_SESSION['no'])."',sysdate,'".($subject)."','".($body)."')");

			odbc_close($conn);
			$_SESSION["message_success"]=1;
			header("Location: instructor_messages.php");
			exit;

		}else{
			die('could not connect');
		}
	}
?>