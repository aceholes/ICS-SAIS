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
		<form name="student_view_approved_ge"/>
			<a href ="student_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="student_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="student_messages.php">Messages</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
						
			<h3>Courses</h3>

			<!-- <a href ="student_view_major_subjects.php">Major Subjects</a><br/> -->
			<a href ="student_view_courses.php">Allowed</a> &nbsp;&nbsp;&nbsp;
			<b>Approved</b> &nbsp;&nbsp;&nbsp;
			<a href ="student_view_subjects_taken.php">Taken</a></br>

			<b>GE</b> &nbsp;&nbsp;&nbsp;
			<a href ="student_view_approved_electives.php">Elective</a></br>

			<b>Arts and Humanities</b>&nbsp;&nbsp;&nbsp;
			<a href="student_view_approved_ge_ssp.php">SSP</a> &nbsp;&nbsp;&nbsp;
			<a href="student_view_approved_ge_mst.php">MST</a><br/><br/>
			
			<?php
				$flag=0;
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

				if($conn){

					$result = odbc_exec($conn, "select a.geno, a.getitle, a.gedesc, a.geunits, b.gasem, b.gayear from ge a, ge_approved b where a.geno = b.geno and b.sno = '".$_SESSION["no"]."' and a.gedomain='AH'");
					
					while($row = odbc_fetch_array($result)) {
						$flag++;
					}

					if($flag != 0){
						$result2 = odbc_exec($conn, "select a.geno, a.getitle, a.gedesc, a.geunits, b.gasem, b.gayear from ge a, ge_approved b where a.geno = b.geno and b.sno = '".$_SESSION["no"]."' and a.gedomain='AH'");
						echo "<table border='1'>";
						echo "<tr>";
							echo "<td><b>COURSE NO.</b></td>";
							echo "<td><b>COURSE TITLE</b></td>";
							echo "<td><b>COURSE DESCRIPTION</b></td>";
							echo "<td><b>UNITS</b></td>";
							echo "<td><b>SEMESTER/YEAR APPROVED</b></td>";
						echo "</tr>";	
						while($row2 = odbc_fetch_array($result2)) {
							echo "<tr>";

								echo "<td>".$row2["GENO"]."</td>";
								echo "<td>".$row2["GETITLE"]."</td>";
								echo "<td>".$row2["GEDESC"]."</td>";
								echo "<td>".$row2["GEUNITS"]."</td>";
								echo "<td>".$row2["GASEM"]." Semester / A.Y. ".$row2["GAYEAR"]."</td>";
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
			<a href = "student_view_courses.php">Courses</a><br/>
			<a href = "student_view_adviser.php">Adviser</a><br/>
			<a href = "student_view_cases.php">Cases</a><br/>
			<a href = "student_view_academic_history.php">History</a><br/>
		</form>
	</body>
</html>