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
		<form name="admin_send_message" action="admin_send_message_redirect.php" method="post"/>
			<!-- top right po	-->
			<a href ="admin_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="admin_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="admin_messages.php">Messages</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a>
			
			<h3>MESSAGES HERE</h3>

			<b>Compose Message</b>&nbsp;&nbsp;&nbsp;	
			<a href="admin_messages.php">Inbox</a> &nbsp;&nbsp;&nbsp;
			<a href="admin_student_sentbox.php">Sentbox</a><br/>
			Recipient: <br/>
			<select name="admin_send_message_recipient">
				<option value="---">---</option>
				<?php
					$flag=0;
					$flag2=0;
					$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

					if($conn){
						$result = odbc_exec($conn, "select semail from student");

						while($row = odbc_fetch_array($result)) {
							$flag++;
						}

						if($flag != 0){
							$result2 = odbc_exec($conn, "select sfname, slname, semail from student");
							echo "<table>";
							while($row2 = odbc_fetch_array($result2)) {
								$email = $row2["SEMAIL"];
								$name = $row2["SFNAME"]." ".$row2["SLNAME"];
								echo "<option value='".$email."'>$name";
								echo "  (".$email.")</option>";	
							}
						}else{
							echo "Nothing to display";
						}

						$result3 = odbc_exec($conn, "select iemail from instructor");

						while($row3 = odbc_fetch_array($result3)) {
							$flag2++;
						}

						if($flag2 != 0){
							$result4 = odbc_exec($conn, "select ifname, ilname, iemail from instructor");
							echo "<table>";
							while($row4 = odbc_fetch_array($result4)) {
								$email = $row4["IEMAIL"];
								$name = $row4["IFNAME"]." ".$row4["ILNAME"];
								echo "<option value='".$email."'>$name";
								echo "  (".$email.")</option>";	
							}
						}else{
							echo "Nothing to display";
						}	
						
						odbc_close($conn);
					}else{
						die('could not connect');
					}
				?>

			</select>

			<?php
				if($_SESSION["recipient_invalid"]==1){
					echo "Invalid recipient";
					$_SESSION["recipient_invalid"]=0;
				}
			?>
			<br/>
			Subject: <br/>
			<input type="text" name="admin_send_message_subject" size="65" autofocus="autofocus" autocomplete="on" required="required"/><br/><br/>
			Message: <br/>
			<textarea name="admin_send_message_body" cols="50" rows="20" wrap="hard" autocomplete="on" required="required"></textarea><br/><br/>
			<input type="submit" name="admin_send_message_submit" value="Send"/><br/><br/>

			<a href ="admin_view_users.php">View Users</a><br/>
			<a href ="admin_add_user.php">Add User</a><br/>
			<a href ="admin_request_approval.php">Requests Approval</a><br/>
			<a href ="admin_account_activation.php">Account Activation</a><br/>
			<a href ="admin_log_files.php">Log Files</a><br/>
		</form>
	</body>
</html>