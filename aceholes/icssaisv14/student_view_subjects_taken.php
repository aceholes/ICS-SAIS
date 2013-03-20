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
		<form name="student_view_subjects_taken"/>
			<a href ="student_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="student_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="student_messages.php">Messages</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>

			<?php
				$flag=0;
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

				if($conn){

					$result = odbc_exec($conn, "select scurr from student where sno = '".$_SESSION["no"]."'");

					while($row = odbc_fetch_array($result)) {
						$flag++;
					}

					if($flag != 0){
						$result2 = odbc_exec($conn, "select scurr from student where sno = '".$_SESSION["no"]."'");

						echo "<table border='1'>";
						echo "<tr>";
							echo "<td><b>CURRICULUM</b></td>";
						echo "</tr>";	
						
						while($row2 = odbc_fetch_array($result2)) {
							echo "<tr>";
								echo "<td>".$row2["SCURR"]."</td>";
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

			<h3>Courses</h3>

			<!-- <a href ="student_view_major_subjects.php">Major Subjects</a><br/> -->
			<a href ="student_view_courses.php">Allowed</a> &nbsp;&nbsp;&nbsp;
			<a href ="student_view_approved_ge.php">Approved</a> &nbsp;&nbsp;&nbsp;
			<b>Taken</b></br>

			<b>Major</b> &nbsp;&nbsp;&nbsp;
			<a href ="student_view_subjects_taken_ge.php">GE</a> &nbsp;&nbsp;&nbsp;
			<a href ="student_view_subjects_taken_elective.php">Elective</a></br>

			<?php
				$flag2=0;
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

				if($conn){

					$result = odbc_exec($conn, "select a.mno, a.mtitle, a.mdesc, a.munits, b.mtgrade, b.mtsem, b.mtyear, c.ifname, c.ilname, d.ifname, d.ilname from major a, major_taken b, instructor c, instructor d 
													where a.mno = b.mno and c.ifname = (select ifname from instructor where ino=b.inolect) and c.ilname = (select ilname from instructor where ino=b.inolect) 
													and d.ifname = (select ifname from instructor where ino=b.inolab) and d.ilname = (select ilname from instructor where ino=b.inolab)
													and sno = '".$_SESSION["no"]."'");

					while($row = odbc_fetch_array($result)) {
						$flag2++;
					}

					if($flag2 != 0){
						$result2 = odbc_exec($conn, "select a.mno, a.mtitle, a.mdesc, a.munits, b.mtgrade, b.mtsem, b.mtyear, c.ifname AS cfname, c.ilname AS clname, d.ifname AS dfname, d.ilname AS dlname from major a, major_taken b, instructor c, instructor d 
													where a.mno = b.mno and c.ifname = (select ifname from instructor where ino=b.inolect) and c.ilname = (select ilname from instructor where ino=b.inolect) 
													and d.ifname = (select ifname from instructor where ino=b.inolab) and d.ilname = (select ilname from instructor where ino=b.inolab)
													and sno = '".$_SESSION["no"]."'");

						echo "<table border='1'>";
							echo "<tr>";
							echo "<td><b>COURSE NO.</b></td>";
							echo "<td><b>COURSE TITLE</b></td>";
							echo "<td><b>COURSE DESCRIPTION</b></td>";
							echo "<td><b>UNITS</b></td>";
							echo "<td><b>GRADE</b></td>";
							echo "<td><b>LECTURER</b></td>";
							echo "<td><b>LABORATORY INSTRUCTOR</b></td>";
							echo "<td><b>SEMESTER/YEAR TAKEN</b></td>";
							echo "</tr>";		
						
							while($row2 = odbc_fetch_array($result2)) {
							echo "<tr>";
								echo "<td>".$row2["MNO"]."</td>";
								echo "<td>".$row2["MTITLE"]."</td>";
								echo "<td>".$row2["MDESC"]."</td>";
								echo "<td>".$row2["MUNITS"]."</td>";
								echo "<td>".$row2["MTGRADE"]."</td>";
								echo "<td>".$row2["CFNAME"]." ".$row2["CLNAME"]."</td>";
								echo "<td>".$row2["DFNAME"]." ".$row2["DLNAME"]."</td>";
								echo "<td>".$row2["MTSEM"]." Semester / A.Y. ".$row2["MTYEAR"]."</td>";
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
				
				$major_sum=0;
				$major_count=0;
				$ge_sum=0;
				$ge_count=0;
				$elective_sum=0;
				$elective_count=0;
				$total_sum=0;
				$total_count=0;
				$gwa=0;
				$flag1=0;
				$flag2=0;
				$flag3=0;
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

				if($conn){
					$result = odbc_exec($conn, "select sum(mtgrade) as major_sum, count(mno) as major_count from major_taken where sno = '".$_SESSION["no"]."'");
					while($row = odbc_fetch_array($result)){
						$major_sum=$row["MAJOR_SUM"];
						$major_count=$row["MAJOR_COUNT"];
					}

					$result2 = odbc_exec($conn, "select sum(gtgrade) as ge_sum, count(geno) as ge_count from ge_taken where sno = '".$_SESSION["no"]."'");
					while($row2 = odbc_fetch_array($result2)){
						$ge_sum=$row2["GE_SUM"];
						$ge_count=$row2["GE_COUNT"];
					}

					$result3 = odbc_exec($conn, "select sum(etgrade) as elective_sum, count(elno) as elective_count from elective_taken where sno = '".$_SESSION["no"]."'");
					while($row3 = odbc_fetch_array($result3)){
						$elective_sum=$row3["ELECTIVE_SUM"];
						$elective_count=$row3["ELECTIVE_COUNT"];
					}
					odbc_close($conn);
				}else{
					die('could not connect');
				}
				
				$total_sum=$major_sum+$ge_sum+$elective_sum;
				$total_count=$major_count+$ge_count+$elective_count;
				$gwa=$total_sum/$total_count;	
				
				echo "GWA: ".$gwa."<br/><br/>";
			?>			
			<a href = "student_view_courses.php">Courses</a><br/>
			<a href = "student_view_adviser.php">Adviser</a><br/>
			<a href = "student_view_cases.php">Cases</a><br/>
			<a href = "student_view_academic_history.php">History</a><br/>

		</form>
	</body>
</html>