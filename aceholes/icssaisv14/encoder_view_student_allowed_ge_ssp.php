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
		<form name="encoder_view_student_allowed_ge_ssp" action="encoder_modify_student_allowed_redirect.php" method="post">
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

			<b>GE</b> &nbsp;&nbsp;&nbsp;
			<a href="encoder_view_student_allowed_elective.php"/>Elective</a><br/>

			<a href="encoder_view_student_allowed_ge_ah.php"/>AH</a> &nbsp;&nbsp;&nbsp;
			<a href="encoder_view_student_allowed_ge_mst.php"/>MST</a>&nbsp;&nbsp;&nbsp;
			<b>SSP</b> <br/><br/>

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

					$result = odbc_exec($conn, "select b.geno, b.getitle, b.gedesc, b.geunits
						 						from student a, ge b, ge_allowed c 
						 						where a.sno=c.sno and b.geno=c.geno and
						 						b.gedomain='SSP' and a.sno='".$_SESSION["sno"]."'");

					while($row = odbc_fetch_array($result)) {
						$flag++;
					}

					if($flag != 0){
						$result2 = odbc_exec($conn, "select b.geno, b.getitle, b.gedesc, b.geunits
						 						from student a, ge b, ge_allowed c 
						 						where a.sno=c.sno and b.geno=c.geno and
						 						b.gedomain='SSP' and a.sno='".$_SESSION["sno"]."'");
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
								echo "<td>".$row2["GENO"]."</td>";
								echo "<td>".$row2["GETITLE"]."</td>";
								echo "<td>".$row2["GEDESC"]."</td>";
								echo "<td>".$row2["GEUNITS"]."</td>";
								echo "<td><a name='geno_ssp' href='encoder_modify_student_allowed_redirect.php?geno_ssp=".$row2["GENO"]."'>Delete</a></td>";
							echo "</tr>";						
						}

						echo "</table><br/><br/>";

						

						$result3 = odbc_exec($conn, "select geno, getitle from ge where gedomain='SSP' and geno not in (select geno from ge_allowed)");

						while($row3 = odbc_fetch_array($result3)){
							$flag2++;
						}

						if($flag2 != 0){
							$result4 = odbc_exec($conn, "select geno, getitle from ge where gedomain='SSP' and geno not in (select geno from ge_allowed)");

							echo "<select name='encoder_add_student_allowed_ge_ssp_no' required='required'>";
							echo "<option></option>";

							while($row4 = odbc_fetch_array($result4)){
								echo "Add Subject:<br/>";
								$geno = $row4["GENO"];
								$getitle = $row4["GETITLE"];
								echo "<option value='".$geno."'>$geno - $getitle</option>";	
							}

							echo "</select><br/>";

							echo "<input type='submit' name='encoder_add_student_allowed_ge_ssp_submit' value='Add Subject'/>";
							
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