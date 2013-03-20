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
		<form name="encoder_basic_profile"/>
			<a href ="encoder_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="encoder_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			
			<h4>BASIC INFORMATION</h4>
			<?php
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

				if($conn){
					$result = odbc_exec($conn, "select efname, elname, egender, ehaddr, ecaddr, ehcontact, eccontact, emobile, eemail from encoder where efname = '".$_SESSION["fname"]."' and elname = '".$_SESSION["lname"]."'" );

					echo "<table border='1'>";
					while($row = odbc_fetch_array($result)) {
						echo "<tr>";
							echo "<td>FIRST NAME</td>";
							echo "<td>".$row["EFNAME"]."</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>LAST NAME</td>";
							echo "<td>".$row["ELNAME"]."</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>GENDER</td>";
							echo "<td>".$row["EGENDER"]."</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>HOME ADDRESS</td>";
							echo "<td>".$row["EHADDR"]."</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>COLLEGE ADDRESS</td>";
							echo "<td>".$row["ECADDR"]."</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>HOME CONTACT NO.</td>";
							echo "<td>".$row["EHCONTACT"]."</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>COLLEGE CONTACT NO.</td>";
							echo "<td>".$row["ECCONTACT"]."</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>MOBILE NO.</td>";
							echo "<td>".$row["EMOBILE"]."</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>EMAIL ADDRESS</td>";
							echo "<td>".$row["EEMAIL"]."</td>";
						echo "</tr>";
						
					}
					echo "</table>";
				
					odbc_close($conn);
				}else{
					die('could not connect');
				}
			?>
			
			<!-- ikaw na bahala kung san to. :) -->
			<a href ="encoder_edit_basic_info.php">Edit</a><br/>
			<a href ="encoder_change_password.php">Change Password</a><br/><br/>
			
			<a href ="encoder_view_student_acad.php">View User Academic Profile</a><br/>
			<a href ="encoder_add_user.php">Add User</a><br/>
			<a href ="encoder_edit_user.php">Edit User</a><br/>
			<a href ="encoder_delete_users.php">Delete Users</a><br/>
		</form>
	</body>
</html>