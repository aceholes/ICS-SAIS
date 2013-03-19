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
		<form name="student_view_approved_ge_ah"/>
			<a href ="student_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="student_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="student_messages.php">Messages</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			
			<h3>Courses</h3>

			<!-- <a href ="student_view_major_subjects.php">Major Subjects</a><br/> -->
			<b>Allowed</b> &nbsp;&nbsp;&nbsp;
			<a href ="student_view_approved_ge.php">Approved</a> &nbsp;&nbsp;&nbsp;
			<a href ="student_view_subjects_taken.php">Taken</a></br>

			<a href ="student_view_courses.php">Major</a> &nbsp;&nbsp;&nbsp;
			<b>General Education</b> &nbsp;&nbsp;&nbsp;
			<a href ="student_view_allowed_electives_cas_ics.php">Elective</a></br>

			<b>Arts and Humanities</b> &nbsp;&nbsp;&nbsp;
			<a href="student_view_allowed_ge_ssp.php">SSP</a>&nbsp;&nbsp;&nbsp;
			<a href="student_view_allowed_ge_mst.php">MST</a><br/><br/>

			<?php
				
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

				if($conn){

					$result = odbc_exec($conn, "select geno, getitle, gedesc, geunits from ge where gedomain='AH'");

					echo "<table border='1'>";
					echo "<tr>";
						echo "<td><b>COURSE NO.</b></td>";
						echo "<td><b>COURSE TITLE</b></td>";
						echo "<td><b>COURSE DESCRIPTION</b></td>";
						echo "<td><b>UNITS</b></td>";
					echo "</tr>";	
					
					while($row = odbc_fetch_array($result)) {
						echo "<tr>";
							echo "<td>".$row["GENO"]."</td>";
							echo "<td>".$row["GETITLE"]."</td>";
							echo "<td>".$row["GEDESC"]."</td>";
							echo "<td>".$row["GEUNITS"]."</td>";
						echo "</tr>";
					}
					echo "</table><br/>";
					odbc_close($conn);
				}else{
					die('could not connect');
				}
			?>			

			<a href = "student_view_courses.php">Courses</a><br/>
			<a href = "student_view_adviser.php">Adviser</a><br/>
			<a href = "student_view_cases.php">Cases</a><br/>
			<a href = "student_view_academic_history.php">History</a><br/>

			
		</form>
	</body>
</html>