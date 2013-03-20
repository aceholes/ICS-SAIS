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
		<form name="admin_account_activation"/>
			<!-- top right po	-->
			<a href ="admin_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="admin_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a>
			
			<h3>ACCOUNT ACTIVATION HERE</h3><br/><br/>
			
			<?php
				if($_SESSION["activated"]==1){
					echo "User account successfully activated.";
					$_SESSION["approved"]=0;
				}

				if($_SESSION["deactivated"]==1){
					echo "User account successfully deactivated.";
					$_SESSION["disapproved"]=0;
				}

				if($_SESSION["account_activation_error"]==1){
					echo "Invalid action.";
					$_SESSION["account_activation_error"]=0;
				}
			?>

			<h4>STUDENTS</h4>
			<?php
				$i=1;
				$name="";
				$num=0;
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

				if($conn){
					$result = odbc_exec($conn, "select slname, sfname, sno from student where sappr='Approved'");

					echo "<table>";
					while($row = odbc_fetch_array($result)) {
						echo "<tr>";
							echo "<td>".$i++.". </td>";
							$name=$row["SLNAME"].", ".$row["SFNAME"];
							$num=$row["SNO"];
							echo "<td><a name='stdnum' href='admin_account_activation_info.php?stdnum=".$num."'>$name</a></td>";
						echo "</tr>";
					}
					echo "</table><br/><br/>";	
						
					
					odbc_close($conn);
				}else{
					die('could not connect');
				}
			?>

			<h4>INSTRUCTORS</h4>
			<?php
				$i=1;
				$name="";
				$num=0;
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

				if($conn){
					$result = odbc_exec($conn, "select ilname, ifname, ino from instructor  where iappr='Approved'");

					echo "<table>";
					while($row = odbc_fetch_array($result)) {
						echo "<tr>";
							echo "<td>".$i++.". </td>";
							$name=$row["ILNAME"].", ".$row["IFNAME"];
							$num=$row["INO"];
							echo "<td><a name='insnum' href='admin_account_activation_info.php?insnum=".$num."'>$name</a></td>";
						echo "</tr>";
					}
					echo "</table><br/><br/>";	
						
					
					odbc_close($conn);
				}else{
					die('could not connect');
				}
			?>

			<!-- sidebar po ito :) -->
			<a href ="admin_view_users.php">View Users</a><br/>
			<a href ="admin_add_user.php">Add User</a><br/>
			<a href ="admin_request_approval.php">Registration Requests Approval</a><br/>
			<a href ="admin_account_activation.php">Account Activation</a><br/>
			<a href ="admin_log_files.php">User Log Files</a><br/>
		</form>
	</body>
</html>