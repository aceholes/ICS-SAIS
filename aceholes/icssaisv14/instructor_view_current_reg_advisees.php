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
		<form name="instructor_view_current_reg_advisees"/>
			<a href ="instructor_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="instructor_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="instructor_messages.php">Messages</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a>
			
			<h3>CURRENT REGISTRATION ADVISEES HERE!</h3>
			
			<?php
				$sno=0;
				$startdate="";
				$enddate="";
				$flag=0;
				
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

				if($conn){

					$result = odbc_exec($conn, "select a.sno, a.sfname, a.slname, b.crastartdate, b.craenddate from student a, curr_reg_advisees b 
												where a.sfname = (select sfname from student where sno=b.sno) and
												a.slname = (select slname from student where sno=b.sno)
												and a.sno = b.sno and ino = '".$_SESSION["no"]."'");
					
					while($row = odbc_fetch_array($result)) {
						$flag++;
					}

					if($flag != 0){
						$result2 = odbc_exec($conn, "select a.sno, a.sfname, a.slname, b.crastartdate, b.craenddate from student a, curr_reg_advisees b 
												where a.sfname = (select sfname from student where sno=b.sno) and
												a.slname = (select slname from student where sno=b.sno)
												and a.sno = b.sno and ino = '".$_SESSION["no"]."'");

						echo "CURRENT<br/>";
						echo "<table border='1'>";
						echo "<tr>";
							echo "<td>STUDENT NO.</td>";
							echo "<td>STUDENT NAME</td>";
							echo "<td>START DATE</td>";
							echo "<td>END DATE</td>";
						echo "</tr>";

						while($row2 = odbc_fetch_array($result2)) {
							echo "<td>".$row2["SNO"]."</td>";
							echo "<td>".$row2["SFNAME"]." ".$row2["SLNAME"]."</td>";
							echo "<td>".$row2["CRASTARTDATE"]."</td>";
							if(empty($row2["CRAENDDATE"]))
								echo "<td>Present</td>";
							else
								echo "<td>".$row2["CRAENDDATE"]."</td>";
							
						}
						echo "</table>";
					}else{
						echo "Nothing to display<br/>";
					}

					
					odbc_close($conn);
				}else{
					die('could not connect');
				}
			?>

			<a href ="instructor_view_previous_students.php">Previous Students</a><br/>
			<a href ="instructor_view_previous_reg_advisees.php">Previous Registration Advisees</a><br/>
			<a href ="instructor_view_previous_sp_advisees.php">Previous SP Advisees</a><br/>
			<a href ="instructor_view_current_reg_advisees.php">Current Registration Advisees</a><br/>
			<a href ="instructor_view_current_sp_advisees.php">Current SP Advisees</a><br/>
			<a href ="instructor_view_grad_sp_advisees.php">Graduated SP Advisees</a><br/>
		</form>
	</body>
</html>