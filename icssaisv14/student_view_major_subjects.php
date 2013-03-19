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
		<form name="student_view_major_subjects"/>
			<a href ="student_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="student_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="student_messages.php">Messages</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			
			<h3>MAJOR SUBJECTS HERE</h3>
			
			<?php
				$mno=0;
				$mtitle="";
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

				if($conn){

					$result = odbc_exec($conn, "select mno, mtitle from major");

					echo "<table border='1'>";
					echo "<tr>";
						echo "<td><b>COURSE NO.</b></td>";
						echo "<td><b>COURSE TITLE</b></td>";
					echo "</tr>";	
					while($row = odbc_fetch_array($result)) {

						echo "<tr>";
							$mno=$row["MNO"];
							$mtitle=$row["MTITLE"];
							echo "<td><a name='mno' href='student_view_major_subjects_info.php?mno=".$mno."'>$mno</a></td>";
							echo "<td><a name='mtitle' href='student_view_major_subjects_info.php?mtitle=".$mtitle."'>$mtitle</a></td>";
						echo "</tr>";
					}
					echo "</table><br/>";
					odbc_close($conn);
				}else{
					die('could not connect');
				}
			?>			
			<a href ="student_view_subjects_taken.php">Subjects Taken</a><br/>
			<a href ="student_view_major_subjects.php">Major Subjects</a><br/>
			<a href ="student_view_allowed_electives_cas_ics.php">Allowed Electives</a><br/>
			<a href ="student_view_approved_electives.php">Approved Electives</a><br/>
			<a href ="student_view_allowed_ge_ah.php">Allowed GE</a><br/>
			<a href ="student_view_approved_ge.php">Approved GE</a><br/>
			<a href ="student_view_reg_adviser.php">Registration Adviser</a><br/>
			<a href ="student_view_sp_adviser.php">SP Adviser</a><br/>
			<a href ="student_view_cases.php">Cases</a><br/>
			<a href ="student_view_academic_history.php">Academic History</a><br/>
		</form>
	</body>
</html>