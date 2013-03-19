<!DOCTYPE HTML>
<?php
	session_start();
?>
<html>
	<head>
		<title>
			
		</title>
	</head>
	<body>
		<form name="student_messages">
			<a href ="student_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="student_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="student_messages.php">Messages</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a>
			
			<h3>MESSAGES HERE</h3>

			<?php
				if($_SESSION["message_success"]==1){
					echo "Message successfully sent.<br/>";
					$_SESSION["message_success"]=0;
				}
			?>

			<a href ="student_send_message.php">Compose Message</a>&nbsp;&nbsp;&nbsp;
			<b>Inbox</b> &nbsp;&nbsp;&nbsp;
			<a href="student_messages_sentbox.php">Sentbox</a><br/>

			<?php
				$flag=0;
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

				if($conn){

					$result = odbc_exec($conn, "select sidate, sisubject, sibody from student_inbox where sno='".$_SESSION["no"]."'");

					while($row = odbc_fetch_array($result)) {
						$flag++;
					}

					if($flag != 0){
						$result2 = odbc_exec($conn, "select sidate, sisubject, sibody from student_inbox where sno='".$_SESSION["no"]."'");
						echo "<table border='1'>";
						echo "<tr>";
							echo "<td><b>DATE</b></td>";
							echo "<td><b>SUBJECT</b></td>";
							echo "<td><b>BODY</b></td>";
						echo "</tr>";	
						
						while($row2 = odbc_fetch_array($result2)) {
							echo "<tr>";
								echo "<td>".$row2["SIDATE"]."</td>";
								echo "<td>".$row2["SISUBJECT"]."</td>";
								echo "<td>".$row2["SIBODY"]."</td>";
							echo "</tr>";
						}
						echo "</table><br/>";
					}else{
						echo "Nothing to display<br/>";
					}

					
					odbc_close($conn);
				}else{
					die('could not connect');
				}
			?>
			
			<a href = "student_view_courses.php">Courses</a><br/>
			<a href = "student_view_adviser.php">Adviser</a><br/>
			<a href = "student_view_cases.php">Cases</a><br/>
			<a href = "student_view_academic_history.php">History</a><br/>
		</form>
	</body>
</html>