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
			<a href ="student_messages.php">Messages</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a>
			
			<h3>CASES HERE</h3>
			
			<?php
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

				if($conn){
					$result = odbc_exec($conn, "select cno, creason, cpenalty, csem, cyear from case where sno = (select sno from student where sfname = '".$_SESSION["fname"]."' and slname = '".$_SESSION["lname"]."')");

					echo "<table border='1'>";
					echo "<tr>";
						echo "<td><b>CASE NO.</b></td>";
						echo "<td><b>REASON</b></td>";
						echo "<td><b>PENALTY</b></td>";
						echo "<td><b>SEMESTER</b></td>";
						echo "<td><b>YEAR</b></td>";
					echo "</tr>";	
					

					while($row = odbc_fetch_array($result)) {
						echo "<tr>";
							echo "<td>".$row["CNO"]."</td>";
							echo "<td>".$row["CREASON"]."</td>";
							echo "<td>".$row["CPENALTY"]."</td>";
							echo "<td>".$row["CSEM"]."</td>";
							echo "<td>".$row["CYEAR"]."</td>";
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