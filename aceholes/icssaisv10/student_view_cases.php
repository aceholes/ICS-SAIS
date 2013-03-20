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
		<form name="student_view_cases"/>
			<a href ="student_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="student_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a>
			
			<h3>CASES HERE</h3><br/><br/>
			
			<?php
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

				if($conn){
					$result = odbc_exec($conn, "select cno, creason, cpenalty, csem, cyear from case where sno = (select sno from student where sfname = '".$_SESSION["fname"]."' and slname = '".$_SESSION["lname"]."')");

					while($row = odbc_fetch_array($result)) {
						echo "<table border='1'>";
						echo "<tr>";
							echo "<td>CASE NO.</td>";
							echo "<td>".$row["CNO"]."</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>REASON</td>";
							echo "<td>".$row["CREASON"]."</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>PENALTY</td>";
							echo "<td>".$row["CPENALTY"]."</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>SEMESTER</td>";
							echo "<td>".$row["CSEM"]."</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>YEAR</td>";
							echo "<td>".$row["CYEAR"]."</td>";
						echo "</tr>";
						echo "</table><br/><br/>";	
					}
					
					odbc_close($conn);
				}else{
					die('could not connect');
				}
			?>

			<a href ="student_view_grades.php">Subject Grades</a><br/>
			<a href ="student_view_gwa.php">GWA</a><br/>
			<a href ="student_view_subjects_taken.php">Subjects Taken</a><br/>
			<a href ="student_view_allowed_electives.php">Allowed Electives</a><br/>
			<a href ="student_view_approved_electives.php">Approved Electives</a><br/>
			<a href ="student_view_approved_ge.php">Approved GE</a><br/>
			<a href ="student_view_reg_adviser.php">Registration Adviser</a><br/>
			<a href ="student_view_sp_adviser.php">SP Adviser</a><br/>
			<a href ="student_view_cases.php">Cases</a><br/>
			<a href ="student_view_academic_history.php">Academic History</a><br/>
			<a href ="student_send_message.php">Send Message to Administrator</a>
		</form>
	</body>
</html>