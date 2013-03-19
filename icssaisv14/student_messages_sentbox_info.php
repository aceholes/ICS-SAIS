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
		<form name="student_messages_sentbox_info">
			<a href ="student_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="student_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="student_messages.php">Messages</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a>
			
			<h3>MESSAGES HERE</h3>
			
			<a href ="student_send_message.php">Compose Message</a>&nbsp;&nbsp;&nbsp;
			<a href="student_messages.php">Inbox</a> &nbsp;&nbsp;&nbsp;
			<b>Sentbox</b><br/>

			<?php
				
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

				if($conn){

					$result = odbc_exec($conn, "select ssdate, sssubject, ssbody from student_sentbox where sno='".$_SESSION["no"]."'");

					echo "<table border='1'>";
					echo "<tr>";
						echo "<td><b>DATE</b></td>";
						echo "<td><b>SUBJECT</b></td>";
						echo "<td><b>BODY</b></td>";
					echo "</tr>";	
					
					while($row = odbc_fetch_array($result)) {
						echo "<tr>";
							$date=$row["SSDATE"];
							echo "<td><a name='date' href='student_messages_sentbox_info.php?date=".$date."'>$date</a></td>";
							echo "<td>".$row["SSSUBJECT"]."</td>";
							echo "<td>".$row["SSBODY"]."</td>";
						echo "</tr>";
					}
					echo "</table><br/>";
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