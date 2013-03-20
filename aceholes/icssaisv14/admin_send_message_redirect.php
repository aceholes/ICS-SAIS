<!DOCTYPE HTML>
<?php
	session_start();
	
	if (isset($_POST["admin_send_message_submit"])){
		$email=$_POST["admin_send_message_recipient"];
		$subject=$_POST["admin_send_message_subject"];
		$body=$_POST["admin_send_message_body"];
		$flag=0;
		$flag2=0;
		$no=0;

		if($email == "---"){
			$_SESSION["recipient_invalid"]=1;
			header("Location: admin_send_message.php");
			exit;
		}else{
			$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

			if($conn){
				$result=odbc_exec($conn, "select semail from student where semail = '".($email)."'");
				while($row = odbc_fetch_array($result)) {
					$flag++;
				}

				$result2=odbc_exec($conn, "select iemail from instructor where iemail = '".($email)."'");
				while($row2 = odbc_fetch_array($result2)) {
					$flag2++;
				}

				if($flag != 0){
					$result3=odbc_exec($conn, "select sno from student where semail = '".($email)."'");
					while($row3 = odbc_fetch_array($result3)) {
						$no=$row3["SNO"];
					}
					
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "insert into student_inbox values ('".($no)."',sysdate,'".($subject)."','".($body)."')");
				
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "insert into admin_student_sentbox values ('".($no)."',sysdate,'".($subject)."','".($body)."')");

				}

				if($flag2 != 0){
					$result6=odbc_exec($conn, "select ino from instructor where iemail = '".($email)."'");
					while($row6 = odbc_fetch_array($result6)) {
						$no=$row6["INO"];
					}
					
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "insert into instructor_inbox values ('".($no)."',sysdate,'".($subject)."','".($body)."')");
				
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "insert into admin_instructor_sentbox values ('".($no)."',sysdate,'".($subject)."','".($body)."')");

					
				}

				odbc_close($conn);
				$_SESSION["message_success"]=1;
				header("Location: admin_messages.php");
				exit;

			}else{
				die('could not connect');
			}
		}

		
	}
?>