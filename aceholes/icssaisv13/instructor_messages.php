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
		<form name="instructor_messages">
			<a href ="instructor_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="instructor_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="instructor_messages.php">Messages</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a>
			
			<h3>MESSAGES HERE</h3>

			<?php
				if($_SESSION["message_success"]==1){
					echo "Message successfully sent.<br/>";
					$_SESSION["message_success"]=0;
				}
			?>
			
			<a href ="instructor_send_message.php">Compose Message</a>&nbsp;&nbsp;&nbsp;	
			<b>Inbox</b> &nbsp;&nbsp;&nbsp;
			<a href="instructor_messages_sentbox.php">Sentbox</a><br/>

			<?php
				$flag=0;
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

				if($conn){

					$result = odbc_exec($conn, "select iidate, iisubject, iibody from instructor_inbox where ino='".$_SESSION["no"]."'");

					while($row = odbc_fetch_array($result)) {
						$flag++;
					}

					if($flag != 0){
						$result2 = odbc_exec($conn, "select iidate, iisubject, iibody from instructor_inbox where ino='".$_SESSION["no"]."'");
						echo "<table border='1'>";
						echo "<tr>";
							echo "<td><b>DATE</b></td>";
							echo "<td><b>SUBJECT</b></td>";
							echo "<td><b>BODY</b></td>";
						echo "</tr>";	
						
						while($row2 = odbc_fetch_array($result2)) {
							echo "<tr>";
								echo "<td>".$row2["IIDATE"]."</td>";
								echo "<td>".$row2["IISUBJECT"]."</td>";
								echo "<td>".$row2["IIBODY"]."</td>";
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
			
			<a href ="instructor_view_previous_students.php">Previous Students</a><br/>
			<a href ="instructor_view_previous_reg_advisees.php">Previous Registration Advisees</a><br/>
			<a href ="instructor_view_previous_sp_advisees.php">Previous SP Advisees</a><br/>
			<a href ="instructor_view_current_reg_advisees.php">Current Registration Advisees</a><br/>
			<a href ="instructor_view_current_sp_advisees.php">Current SP Advisees</a><br/>
			<a href ="instructor_view_grad_sp_advisees.php">Graduated SP Advisees</a><br/>
		</form>
	</body>
</html>