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
		<form name="instructor_profile"/>
			<a href ="instructor_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="instructor_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			
			<h4>BASIC INFORMATION</h4>
			<?php
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

				if($conn){
					$result = odbc_exec($conn, "select ifname, ilname, igender, ihaddr, icaddr, ihcontact, iccontact, imobile, iemail from instructor where ifname = '".$_SESSION["fname"]."' and ilname = '".$_SESSION["lname"]."'" );

					echo "<table border='1'>";
					while($row = odbc_fetch_array($result)) {
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
							echo "<td>EMAIL ADDRESS</td>";
							echo "<td>".$row["IEMAIL"]."</td>";
						echo "</tr>";
						
					}
					echo "</table>";
				
					odbc_close($conn);
				}else{
					die('could not connect');
				}
			?>
			
			<a href ="instructor_edit_basic_info.php">Edit</a><br/>
			<a href ="instructor_change_password.php">Change Password</a><br/><br/>
			
			<a href ="instructor_view_previous_students.php">Previous Students</a><br/>
			<a href ="instructor_view_previous_reg_advisees.php">Previous Registration Advisees</a><br/>
			<a href ="instructor_view_previous_sp_advisees.php">Previous SP Advisees</a><br/>
			<a href ="instructor_view_current_reg_advisees.php">Current Registration Advisees</a><br/>
			<a href ="instructor_view_current_sp_advisees.php">Current SP Advisees</a><br/>
			<a href ="instructor_view_grad_sp_advisees.php">Graduated SP Advisees</a><br/>
		</form>
	</body>
</html>