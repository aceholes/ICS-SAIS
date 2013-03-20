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
		<form name="admin_request_approval_info" action="admin_request_approval_redirect.php" method="post"/>
			<!-- top right po	-->
			<a href ="admin_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="admin_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a>
			
			<h3>VIEW USER INFORMATION HERE</h3><br/><br/>
			
			<?php
				if($_SESSION["request_approval_error"]==1){
					echo "Invalid Action";
					$_SESSION["request_approval_error"]=0;
				}

				if(isset($_GET['stdnum'])){
			
					$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

					if($conn){
						$result = odbc_exec($conn, "select sno, sfname, slname, sgender, shaddr, scaddr, shcontact, sccontact, smobile, suser, semail, sregdate, scurr, sclass, sappr, sact from student where sno = '".$_GET["stdnum"]."'" );

						echo "<table border='1'>";
						while($row = odbc_fetch_array($result)) {
							$_SESSION["request_approval_number"]=$row["SNO"];
							$_SESSION["role"]='student';
							echo "<tr>";
								echo "<td>STUDENT NO.</td>";
								echo "<td>".$row["SNO"]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>FIRST NAME</td>";
								echo "<td>".$row["SFNAME"]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>LAST NAME</td>";
								echo "<td>".$row["SLNAME"]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>GENDER</td>";
								echo "<td>".$row["SGENDER"]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>HOME ADDRESS</td>";
								echo "<td>".$row["SHADDR"]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>COLLEGE ADDRESS</td>";
								echo "<td>".$row["SCADDR"]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>HOME CONTACT NO.</td>";
								echo "<td>".$row["SHCONTACT"]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>COLLEGE CONTACT NO.</td>";
								echo "<td>".$row["SCCONTACT"]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>MOBILE NO.</td>";
								echo "<td>".$row["SMOBILE"]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>USERNAME</td>";
								echo "<td>".$row["SUSER"]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>EMAIL ADDRESS</td>";
								echo "<td>".$row["SEMAIL"]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>REGISTRATION DATE</td>";
								echo "<td>".$row["SREGDATE"]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>CURRICULUM</td>";
								echo "<td>".$row["SCURR"]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>CLASS</td>";
								echo "<td>".$row["SCLASS"]."</td>";
							echo "</tr>";
							
							
						}
						echo "</table>";
						
						
						odbc_close($conn);
					}else{
						die('could not connect');
					}
				}else if(isset($_GET['insnum'])){
			
					$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

					if($conn){
						$result = odbc_exec($conn, "select ino, ifname, ilname, igender, ihaddr, icaddr, ihcontact, iccontact, imobile, iuser, iemail, iregdate, idesig, irank, iroom, iappr, iact from instructor where ino = '".$_GET["insnum"]."'" );

						echo "<table border='1'>";
						while($row = odbc_fetch_array($result)) {
							$_SESSION["request_approval_number"]=$row["INO"];
							$_SESSION["role"]='instructor';
							echo "<tr>";
								echo "<td>INSTRUCTOR NO.</td>";
								echo "<td>".$row["INO"]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>FIRST NAME</td>";
								echo "<td>".$row["IFNAME"]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>LAST NAME</td>";
								echo "<td>".$row["ILNAME"]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>GENDER</td>";
								echo "<td>".$row["IGENDER"]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>HOME ADDRESS</td>";
								echo "<td>".$row["IHADDR"]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>COLLEGE ADDRESS</td>";
								echo "<td>".$row["ICADDR"]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>HOME CONTACT NO.</td>";
								echo "<td>".$row["IHCONTACT"]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>COLLEGE CONTACT NO.</td>";
								echo "<td>".$row["ICCONTACT"]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>MOBILE NO.</td>";
								echo "<td>".$row["IMOBILE"]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>USERNAME</td>";
								echo "<td>".$row["IUSER"]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>EMAIL ADDRESS</td>";
								echo "<td>".$row["IEMAIL"]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>REGISTRATION DATE</td>";
								echo "<td>".$row["IREGDATE"]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>DESIGNATION</td>";
								echo "<td>".$row["IDESIG"]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>RANK</td>";
								echo "<td>".$row["IRANK"]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>ROOM</td>";
								echo "<td>".$row["IROOM"]."</td>";
							echo "</tr>";
							
							
						}
						echo "</table>";
						odbc_close($conn);
					}else{
						die('could not connect');
					}
				}
			?>

			<select name="approval">
				<option value="---">---</option>
				<option value="approve">Approve</option>
				<option value="disapprove">Disapprove</option>
			</select>

			<input type="submit" name="admin_request_approval_submit" value="Submit"/><br/><br/>

			<!-- sidebar po ito :) -->
			<a href ="admin_view_users.php">View Users</a><br/>
			<a href ="admin_add_user.php">Add User</a><br/>
			<a href ="admin_request_approval.php">Registration Requests Approval</a><br/>
			<a href ="admin_account_activation.php">Account Activation</a><br/>
			<a href ="admin_log_files.php">User Log Files</a><br/>
		</form>
	</body>
</html>