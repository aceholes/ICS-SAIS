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
		<form name="encoder_view_student_approved_elective" action="encoder_modify_student_approved_redirect.php" method="post">
			<!-- top right po	-->
			<a href ="encoder_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="encoder_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/>

			<h3>Courses</h3>

			<?php
				echo "<b>Student Number: ".$_SESSION["sno"]."</b><br/><br/>";
			?>

			<a href="encoder_view_student_allowed_ge_ah.php"/>Allowed</a>&nbsp;&nbsp;&nbsp;
			<b>Approved</b> &nbsp;&nbsp;&nbsp;
			<a href="encoder_view_student_taken.php"/>Taken</a><br/>

			<a href="encoder_view_student_approved_ge_ah.php"/>GE</a> &nbsp;&nbsp;&nbsp;
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
				if(isset($_GET["stdnum"])){
					$_SESSION["sno"]=$_GET["stdnum"];
				}

				$flag=0;
				$flag2=0;
				$count=0;
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

				if($conn){

					$result = odbc_exec($conn, "select b.elno, b.eltitle, b.eldesc, b.elunits, c.easem, c.eayear
						 						from student a, elective b, elective_approved c 
						 						where a.sno=c.sno and b.elno=c.elno and
						 						a.sno='".$_SESSION["sno"]."'");

					while($row = odbc_fetch_array($result)) {
						$flag++;
					}

					if($flag != 0){
						$result2 = odbc_exec($conn, "select b.elno, b.eltitle, b.eldesc, b.elunits, c.easem, c.eayear
						 						from student a, elective b, elective_approved c 
						 						where a.sno=c.sno and b.elno=c.elno and
						 						a.sno='".$_SESSION["sno"]."'");
						echo "<table border='1'>";
						echo "<tr>";
							echo "<td>COURSE NO.</td>";
							echo "<td>COURSE TITLE</td>";
							echo "<td>COURSE DESCRIPTION</td>";
							echo "<td>UNITS</td>";
							echo "<td>SEMESTER / YEAR APPROVED</td>";
							echo "<td>ACTION</td>";
						echo "</tr>";
						
						while($row2 = odbc_fetch_array($result2)) {
							echo "<tr>";
								echo "<td>".$row2["ELNO"]."</td>";
								echo "<td>".$row2["ELTITLE"]."</td>";
								echo "<td>".$row2["ELDESC"]."</td>";
								echo "<td>".$row2["ELUNITS"]."</td>";
								echo "<td>".$row2["EASEM"]." / ".$row2["EAYEAR"]."</td>";
								echo "<td><a name='geno_ssp' href='encoder_modify_student_approved_redirect.php?geno_ssp=".$row2["GENO"]."'>Delete</a></td>";
							echo "</tr>";						
						}

						echo "</table><br/>";

					}else{
						echo "Nothing to display.<br/>";
					}

					$result3 = odbc_exec($conn, "select count(b.elno) AS NUM
						 						from student a, elective b, elective_approved c 
						 						where a.sno=c.sno and b.elno=c.elno and
						 						a.sno='".$_SESSION["sno"]."'");

					while($row3 = odbc_fetch_array($result3)){
						$count=$row3["NUM"];
					}

					if($count < 3){
						$result4 = odbc_exec($conn, "select elno, eltitle from elective where and elno not in (select elno from elective_approved)");

						while($row4 = odbc_fetch_array($result4)){
							$flag2++;
						}

						if($flag2 != 0){
							echo "Add Subject<br/>";
							echo "<select name='encoder_add_student_approved_elective_no' required='required'>";
							echo "<option></option>";

							$result5 = odbc_exec($conn, "select elno, eltitle from elective where and elno not in (select elno from elective_approved)");

							while($row5 = odbc_fetch_array($result5)){
								$elno = $row5["ELNO"];
								$eltitle = $row5["ELTITLE"];
								echo "<option value='".$elno."'>$elno - $eltitle</option>";
							}

							echo "</select><br/>";
							echo "Semester";
							echo "<input type='radio' name='encoder_add_student_approved_elective_sem' value='1st' required='required'/>1st";
							echo "<input type='radio' name='encoder_add_student_approved_elective_sem' value='2nd' required='required'/>2nd";
								

							$result6 = odbc_exec($conn, "select extract(year from sysdate) year from dual");

							while($row6 = odbc_fetch_array($result6)){
								$currentyear = $row6["YEAR"];
							}

							$batch = substr((string)$_SESSION["sno"],0,4);
							$gap = $currentyear - $batch;
							$until=0;
							$ay="";
							echo "<br/>Year";
							echo "<select name='encoder_add_student_approved_elective_year' required='required'>";
								echo "<option></option>";
								for($i = 0; $i < $gap; $i++){
									$until = $currentyear + 1;
									$ay = $currentyear."-".$until;
									echo "<option value='".$ay."'>$ay</option>";
									$currentyear++;
								}
							echo "</select><br/>";

							echo "<input type='submit' name='encoder_add_student_approved_elective_submit' value='Submit'/><br/>";

						}else{
							echo "Nothing to display.<br/>";
						}
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