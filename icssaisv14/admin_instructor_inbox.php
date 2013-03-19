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
		<form name="admin_instructor_inbox"/>
			<!-- top right po	-->
			<a href ="admin_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="admin_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="admin_messages.php">Messages</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a>
			
			<h3>MESSAGES HERE</h3>
			
			<a href ="admin_send_message.php">Compose Message</a>&nbsp;&nbsp;&nbsp;	
			<b>Inbox</b> &nbsp;&nbsp;&nbsp;
			<a href="admin_student_sentbox.php">Sentbox</a><br/>

			<a href="admin_messages.php">Student</a>&nbsp;&nbsp;&nbsp;
			<b>Instructor</b> <br/>

			<?php
				$flag=0;
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

				if($conn){

					$result = odbc_exec($conn, "select a.aiidate, a.aiisubject, a.aiibody, b.ifname, b.ilname, b.iemail 
												from admin_instructor_inbox a, instructor b
												where b.ifname = (select ifname from instructor where ino=a.ino) and
												b.ilname = (select ilname from instructor where ino=a.ino)
												and b.ino=a.ino");

					while($row = odbc_fetch_array($result)) {
						$flag++;
					}

					if($flag != 0){
						$result2 = odbc_exec($conn, "select a.aiidate, a.aiisubject, a.aiibody, b.ifname, b.ilname, b.iemail 
												from admin_instructor_inbox a, instructor b
												where b.ifname = (select ifname from instructor where ino=a.ino) and
												b.ilname = (select ilname from instructor where ino=a.ino)
												and b.ino=a.ino");
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
								echo "<td>".$row2["AIIDATE"]."</td>";
								echo "<td>".$row2["IFNAME"]." ".$row2["ILNAME"]."</td>";
								echo "<td>".$row2["IEMAIL"]."</td>";
								echo "<td>".$row2["AIISUBJECT"]."</td>";
								echo "<td>".$row2["AIIBODY"]."</td>";
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