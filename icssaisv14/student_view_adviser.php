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
		<form name="student_home">
			<a href = "student_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href = "student_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href = "student_messages.php">Messages</a>	&nbsp;&nbsp;&nbsp;
			<a href = "home.php">Sign-out</a><br/>

			<b>Registration</b> &nbsp;&nbsp;&nbsp;
			<a href="student_view_sp_adviser.php"/>SP</a><br/>

			<?php
				$enddate="";
				$enddate2="";

				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

				if($conn){

					$result = odbc_exec($conn, "select a.ifname, a.ilname, a.ino, a.idesig, a.irank, a.iroom, b.crastartdate, b.craenddate from instructor a, curr_reg_advisees b where a.ino=b.ino and b.sno='".$_SESSION["no"]."'");

					echo "CURRENT<br/>";

					echo "<table border='1'>";
					echo "<tr>";
						echo "<td>INSTRUCTOR NAME</td>";
						echo "<td>INSTRUCTOR NO.</td>";
						echo "<td>DESIGNATION</td>";
						echo "<td>RANK</td>";
						echo "<td>ROOM</td>";
						echo "<td>START DATE</td>";
						echo "<td>END DATE</td>";
					echo "</tr>";
					
					while($row = odbc_fetch_array($result)) {
						echo "<tr>";
							echo "<td>".$row["IFNAME"]." ".$row["ILNAME"]."</td>";
							echo "<td>".$row["INO"]."</td>";
							echo "<td>".$row["IDESIG"]."</td>";
							echo "<td>".$row["IRANK"]."</td>";
							echo "<td>".$row["IROOM"]."</td>";
							echo "<td>".$row["CRASTARTDATE"]."</td>";
							if(empty($row["CRAENDDATE"]))
								$enddate="Present";
							else
								$enddate=$row["CRAENDDATE"];
							echo "<td>".$enddate."</td>";
						echo "</tr>";						
					}

					echo "</table>";

					$result2 = odbc_exec($conn, "select a.ifname, a.ilname, a.ino, a.idesig, a.irank, a.iroom, b.prastartdate, b.praenddate from instructor a, prev_reg_advisees b where a.ino=b.ino and b.sno='".$_SESSION["no"]."'");

					echo "CURRENT<br/>";

					echo "<table border='1'>";
					echo "<tr>";
						echo "<td>INSTRUCTOR NAME</td>";
						echo "<td>INSTRUCTOR NO.</td>";
						echo "<td>DESIGNATION</td>";
						echo "<td>RANK</td>";
						echo "<td>ROOM</td>";
						echo "<td>START DATE</td>";
						echo "<td>END DATE</td>";
					echo "</tr>";
					
					while($row2 = odbc_fetch_array($result2)) {
						echo "<tr>";
							echo "<td>".$row2["IFNAME"]." ".$row2["ILNAME"]."</td>";
							echo "<td>".$row2["INO"]."</td>";
							echo "<td>".$row2["IDESIG"]."</td>";
							echo "<td>".$row2["IRANK"]."</td>";
							echo "<td>".$row2["IROOM"]."</td>";
							echo "<td>".$row2["PRASTARTDATE"]."</td>";
							if(empty($row2["PRAENDDATE"]))
								$enddate2="Present";
							else
								$enddate2=$row2["PRAENDDATE"];
							echo "<td>".$enddate2."</td>";
						echo "</tr>";						
					}

					echo "</table>";
					odbc_close($conn);
				}else{
					die('could not connect');
				}
			?>
			
			<a href = "student_view_courses.php">Courses</a><br/>
			<a href = "student_view_adviser.php">Adviser</a><br/>
			<a href = "student_view_cases.php">Cases</a><br/>
			<a href = "student_view_academic_history.php">History</a><br/>

			<!-- sidebar po ito :)
			<a href ="student_view_subjects_taken.php">Subjects Taken</a><br/>
			<a href ="student_view_major_subjects.php">Major Subjects</a><br/>
			<a href ="student_view_allowed_electives_cas_ics.php">Allowed Electives</a><br/>
			<a href ="student_view_approved_electives.php">Approved Electives</a><br/>
			<a href ="student_view_allowed_ge_ah.php">Allowed GE</a><br/>
			<a href ="student_view_approved_ge.php">Approved GE</a><br/>
			<a href ="student_view_reg_adviser.php">Registration Adviser</a><br/>
			<a href ="student_view_sp_adviser.php">SP Adviser</a><br/>
			<a href ="student_view_cases.php">Cases</a><br/>
			<a href ="student_view_academic_history.php">Academic History</a><br/> -->
		</form>
	</body>
</html>