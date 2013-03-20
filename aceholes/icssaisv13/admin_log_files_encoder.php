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
		<form name="admin_log_files_encoder"/>
			<!-- top right po	-->
			<a href ="admin_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="admin_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="admin_messages.php">Messages</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a>
			
			<h3>USER LOG FILES HERE</h3>
			
			
			<a href="admin_log_files.php">Student</a> &nbsp;&nbsp;&nbsp;
			<a href="admin_log_files_instructor.php">Instructor</a> &nbsp;&nbsp;&nbsp;
			<b>Encoder</b><br/><br/>
			<?php
				$flag=0;
				$i=1;
				$name="";
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

				if($conn){
					$result = odbc_exec($conn, "select eno, elactivity, eltime from encoder_log");

					while($row = odbc_fetch_array($result)) {
						$flag++;
					}

					if($flag != 0){
						$result2 = odbc_exec($conn, "select eno, elactivity, eltime from encoder_log");
						echo "<table border='1'>";
						echo "<tr>";
							echo "<td>ENCODER NO.</td>";
							echo "<td>ACTIVITY</td>";
							echo "<td>DATE/TIME</td>";
						echo "</tr>";
						while($row2 = odbc_fetch_array($result2)) {
							echo "<tr>";
								echo "<td>".$row2["ENO"]."</td>";
								echo "<td>".$row2["ELACTIVITY"]."</td>";
								echo "<td>".$row2["ELTIME"]."</td>";
							echo "</tr>";
						}
						echo "</table><br/><br/>";	
					}else{
						echo "Nothing to display<br/>";
					}
						
					
					odbc_close($conn);
				}else{
					die('could not connect');
				}
			?>



			<!-- sidebar po ito :) -->
			<a href ="admin_view_users.php">View Users</a><br/>
			<a href ="admin_add_user.php">Add User</a><br/>
			<a href ="admin_request_approval.php">Requests Approval</a><br/>
			<a href ="admin_account_activation.php">Account Activation</a><br/>
			<a href ="admin_log_files.php">Log Files</a><br/>
		</form>
	</body>
</html>