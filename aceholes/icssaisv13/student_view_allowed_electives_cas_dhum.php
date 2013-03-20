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
		<form name="student_view_allowed_electives_cas_dhum"/>
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
			<a href ="student_view_allowed_ge_ah.php">GE</a> &nbsp;&nbsp;&nbsp;
			<b>Elective</b></br>
			
			<b>College of Arts and Sciences</b>&nbsp;&nbsp;&nbsp;
			<a href="student_view_allowed_electives_cdc.php">CDC</a> &nbsp;&nbsp;&nbsp;
			<a href="student_view_allowed_electives_cem_dabm.php">CEM</a> &nbsp;&nbsp;&nbsp;
			<a href="student_view_allowed_electives_ceat_die.php">CEAT</a> &nbsp;&nbsp;&nbsp;
			<a href="student_view_allowed_electives_cfnr.php">CFNR</a>
			
			<br/><br/><a href="student_view_allowed_electives_cas_ics.php">ICS</a> &nbsp;&nbsp;&nbsp;
			<a href="student_view_allowed_electives_cas_imsp.php">IMSP</a> &nbsp;&nbsp;&nbsp;
			<a href="student_view_allowed_electives_cas_instat.php">INSTAT</a> &nbsp;&nbsp;&nbsp;
			<b>Department of Humanities</b>&nbsp;&nbsp;&nbsp;
			<a href="student_view_allowed_electives_cas_dss.php">DSS</a> <br/><br/>
			<?php

				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

				if($conn){
					$result = odbc_exec($conn, "select elno, eltitle, eldesc, elunits from elective where elcollege='CAS' and eldept='DHUM'");

					echo "<table border='1'>";
					echo "<tr>";
						echo "<td><b>COURSE NO.</b></td>";
						echo "<td><b>COURSE TITLE</b></td>";
						echo "<td><b>COURSE DESCRIPTION</b></td>";
						echo "<td><b>UNITS</b></td>";
					echo "</tr>";	
					while($row = odbc_fetch_array($result)) {
						echo "<tr>";

							echo "<td>".$row["ELNO"]."</td>";
							echo "<td>".$row["ELTITLE"]."</td>";
							echo "<td>".$row["ELDESC"]."</td>";
							echo "<td>".$row["ELUNITS"]."</td>";
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