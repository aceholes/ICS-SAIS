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
		<form name="admin_messages"/>
			<!-- top right po	-->
			<a href ="admin_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="admin_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="admin_messages.php">Messages</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a>
			
			<h3>MESSAGES HERE</h3>
			
			<a href ="admin_send_message.php">Compose Message</a>&nbsp;&nbsp;&nbsp;	
			<b>Inbox</b> &nbsp;&nbsp;&nbsp;
			<a href="admin_student_sentbox.php">Sentbox</a><br/>

			<b>Student</b> &nbsp;&nbsp;&nbsp;
			<a href="admin_instructor_inbox.php">Instructors</a>

			<?php
				$flag=0;
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

				if($conn){

					$result = odbc_exec($conn, "select a.asidate, a.asisubject, a.asibody, b.sfname, b.slname, b.semail 
												from admin_student_inbox a, student b
												where b.sfname = (select sfname from student where sno=a.sno) and
												b.slname = (select slname from student where sno=a.sno)
												and b.sno=a.sno");

					while($row = odbc_fetch_array($result)) {
						$flag++;
					}

					if($flag != 0){
						$result2 = odbc_exec($conn, "select a.asidate, a.asisubject, a.asibody, b.sfname, b.slname, b.semail 
													from admin_student_inbox a, student b
													where b.sfname = (select sfname from student where sno=a.sno) and
													b.slname = (select slname from student where sno=a.sno)
													and b.sno=a.sno");
						echo "<table border='1'>";
						echo "<tr>";
							echo "<td><b>DATE</b></td>";
							echo "<td><b>SENDER NAME</b></td>";
							echo "<td><b>SENDER EMAIL ADDRESS</b></td>";
							echo "<td><b>SUBJECT</b></td>";
							echo "<td><b>BODY</b></td>";
						echo "</tr>";	
						
						while($row2 = odbc_fetch_array($result2)) {
							echo "<tr>";
								echo "<td>".$row2["ASIDATE"]."</td>";
								echo "<td>".$row2["SFNAME"]." ".$row2["SLNAME"]."</td>";
								echo "<td>".$row2["SEMAIL"]."</td>";
								echo "<td>".$row2["ASISUBJECT"]."</td>";
								echo "<td>".$row2["ASIBODY"]."</td>";
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

			<a href ="admin_view_users.php">View Users</a><br/>
			<a href ="admin_add_user.php">Add User</a><br/>
			<a href ="admin_request_approval.php">Requests Approval</a><br/>
			<a href ="admin_account_activation.php">Account Activation</a><br/>
			<a href ="admin_log_files.php">Log Files</a><br/>
		</form>
	</body>
</html>