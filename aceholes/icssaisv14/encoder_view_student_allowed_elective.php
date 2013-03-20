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
		<form name="encoder_view_student_allowed_elective" action="encoder_modify_student_allowed_redirect.php" method="post">
			<!-- top right po	-->
			<a href ="encoder_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="encoder_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/>

			<h3>Courses</h3>

			<?php
				echo "<b>Student Number: ".$_SESSION["sno"]."</b><br/><br/>";
			?>

			<b>Allowed</b> &nbsp;&nbsp;&nbsp;
			<a href="encoder_view_student_approved_ge_ah.php"/>Approved</a> &nbsp;&nbsp;&nbsp;
			<a href="encoder_view_student_taken.php"/>Taken</a><br/>

			<a href="encoder_view_student_allowed_ge_ah.php"/>GE</a>&nbsp;&nbsp;&nbsp;
			<b>Elective</b><br/><br/>

			<?php
				if($_SESSION["subject_add_success"]==1){
					echo "Subject successfully added.<br/>";
					$_SESSION["subject_add_success"]=0;
				}else if($_SESSION["subject_delete_success"]==1){
					echo "Subject successfully deleted.<br/>";
					$_SESSION["subject_delete_success"]=0;
				}			
			?>

			<?php
				$flag=0;
				$flag2=0;
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

				if($conn){

					$result = odbc_exec($conn, "select b.elno, b.eltitle, b.eldesc, b.elunits
						 						from student a, elective b, elective_allowed c 
						 						where a.sno=c.sno and b.elno=c.elno and
						 						a.sno='".$_SESSION["sno"]."'");

					while($row = odbc_fetch_array($result)) {
						$flag++;
					}

					if($flag != 0){
						$result2 = odbc_exec($conn, "select b.elno, b.eltitle, b.eldesc, b.elunits
						 						from student a, elective b, elective_allowed c 
						 						where a.sno=c.sno and b.elno=c.elno and
						 						a.sno='".$_SESSION["sno"]."'");
						echo "<table border='1'>";
						echo "<tr>";
							echo "<td>COURSE NO.</td>";
							echo "<td>COURSE TITLE</td>";
							echo "<td>COURSE DESCRIPTION</td>";
							echo "<td>UNITS</td>";
							echo "<td>ACTION</td>";
						echo "</tr>";
						
						while($row2 = odbc_fetch_array($result2)) {
							echo "<tr>";
								echo "<td>".$row2["ELNO"]."</td>";
								echo "<td>".$row2["ELTITLE"]."</td>";
								echo "<td>".$row2["ELDESC"]."</td>";
								echo "<td>".$row2["ELUNITS"]."</td>";
								echo "<td><a name='elective' href='encoder_modify_student_allowed_redirect.php?elective=".$row2["ELNO"]."'>Delete</a></td>";
							echo "</tr>";						
						}

						echo "</table><br/><br/>";

						

						$result3 = odbc_exec($conn, "select elno, eltitle from elective where elno not in (select elno from elective_allowed)");

						while($row3 = odbc_fetch_array($result3)){
							$flag2++;
						}

						if($flag2 != 0){
							$result4 = odbc_exec($conn, "select elno, eltitle from elective where elno not in (select elno from elective_allowed)");

							echo "<select name='encoder_add_student_allowed_elective_no' required='required'>";
							echo "<option></option>";

							while($row4 = odbc_fetch_array($result4)){
								echo "Add Subject:<br/>";
								$elno = $row4["ELNO"];
								$eltitle = $row4["ELTITLE"];
								echo "<option value='".$elno."'>$elno - $eltitle</option>";	
							}

							echo "</select><br/>";

							echo "<input type='submit' name='encoder_add_student_allowed_elective_submit' value='Add Subject'/>";
							
						}

						

					}else{
						echo "Nothing to display.<br/>";
					}

					odbc_close($conn);
				}else{
					die('could not connect');
				}
			?>

			<br/><a href="encoder_course.php"> Courses </a><br/>
			<a href="encoder_adviser.php"> Adviser </a><br/>
			<a href="encoder_case.php"> Case </a><br/>	
		</form>
	</body>
</html>