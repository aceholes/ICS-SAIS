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
		<form name="admin_request_approval"/>
			<!-- top right po	-->
			<a href ="admin_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="admin_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="admin_messages.php">Messages</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a>
			
			<h3>REGISTRATION REQUESTS HERE</h3>
			
			<?php
				if($_SESSION["approved"]==1){
					echo "User request successfully approved.";
					$_SESSION["approved"]=0;
				}

				if($_SESSION["disapproved"]==1){
					echo "User request successfully disapproved.";
					$_SESSION["disapproved"]=0;
				}

				if($_SESSION["request_approval_error"]==1){
					echo "Invalid action.";
					$_SESSION["request_approval_error"]=0;
				}
			?>

			<h4>STUDENTS</h4>
			<?php
				$i=1;
				$name="";
				$flag=0;
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

				if($conn){
					$result = odbc_exec($conn, "select slname, sfname, sno from student where sappr='Pending'");

					while($row = odbc_fetch_array($result)) {
						$flag++;
					}

					if($flag != 0){
						$result2 = odbc_exec($conn, "select slname, sfname, sno from student where sappr='Pending'");
						echo "<table>";
						while($row2 = odbc_fetch_array($result2)) {
						echo "<tr>";
							echo "<td>".$i++.". </td>";
							$name=$row2["SLNAME"].", ".$row2["SFNAME"];
							echo "<td><a name='stdnum' href='admin_request_approval_info.php?stdnum=".$row2["SNO"]."'>$name</a></td>";
							echo "</tr>";
						}
						echo "</table><br/>";	
					}else{
						echo "Nothing to display";
					}
					
					odbc_close($conn);
				}else{
					die('could not connect');
				}
			?>

			<h4>INSTRUCTORS</h4>
			<?php
				$flag2=0;
				$i2=1;
				$name2="";
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

				if($conn){
					$result3 = odbc_exec($conn, "select ilname, ifname, ino from instructor where iappr='Pending'");

					while($row3 = odbc_fetch_array($result3)) {
						$flag2++;
					}

					if($flag2 != 0){
						$result4 = odbc_exec($conn, "select ilname, ifname, ino from instructor where iappr='Pending'");
						echo "<table>";
						while($row4 = odbc_fetch_array($result4)) {
							echo "<tr>";
								echo "<td>".$i2++.". </td>";
								$name2=$row4["ILNAME"].", ".$row4["IFNAME"];
								echo "<td><a name='insnum' href='admin_request_approval_info.php?insnum=".$row4["INO"]."'>$name</a></td>";
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

			<!-- sidebar po ito :) -->
			<a href ="admin_view_users.php">View Users</a><br/>
			<a href ="admin_add_user.php">Add User</a><br/>
			<a href ="admin_request_approval.php">Requests Approval</a><br/>
			<a href ="admin_account_activation.php">Account Activation</a><br/>
			<a href ="admin_log_files.php">Log Files</a><br/>
		</form>
	</body>
</html>