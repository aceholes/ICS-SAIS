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
		<form name="encoder_view_reg_adviser" action="encoder_modify_student_reg_adviser_redirect.php" method="post">
			<!-- top right po	-->
			<a href ="encoder_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="encoder_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>

			<b>Registration</b> &nbsp;&nbsp;&nbsp;
			<a href="encoder_view_student_sp_adviser.php"/>SP</a><br/><br/>

			<?php
				if($_SESSION["adviser_add_success"]==1){
					echo "Registration Adviser successfully added.<br/>";
					$_SESSION["adviser_add_success"]=0;
				}else if($_SESSION["adviser_delete_success"]==1){
					echo "Registration Adviser successfully deleted.<br/>";
					$_SESSION["adviser_delete_success"]=0;
				}else if($_SESSION["adviser_change_success"]==1){
					echo "Registration Adviser successfully changed.<br/>";
					$_SESSION["adviser_change_success"]=0;
				}
			?>

			<?php
				$flag=0;
				$flag2=0;
				$flag3=0;
				$enddate="";
				$enddate3="";
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

				if($conn){

					$result = odbc_exec($conn, "select a.ifname, a.ilname, a.ino, a.idesig, a.irank, a.iroom, b.crastartdate, b.craenddate from instructor a, curr_reg_advisees b where a.ino=b.ino and b.sno='".$_SESSION["sno"]."'");

					while($row = odbc_fetch_array($result)) {
						$flag++;
					}

					if($flag != 0){
						$result2 = odbc_exec($conn, "select a.ifname, a.ilname, a.ino, a.idesig, a.irank, a.iroom, b.crastartdate, b.craenddate from instructor a, curr_reg_advisees b where a.ino=b.ino and b.sno='".$_SESSION["sno"]."'");
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
							$_SESSION["r_ino"]=$row2["INO"];
							echo "<tr>";
								echo "<td>".$row2["IFNAME"]." ".$row2["ILNAME"]."</td>";
								echo "<td>".$row2["INO"]."</td>";
								echo "<td>".$row2["IDESIG"]."</td>";
								echo "<td>".$row2["IRANK"]."</td>";
								echo "<td>".$row2["IROOM"]."</td>";
								echo "<td>".$row2["CRASTARTDATE"]."</td>";
								if(empty($row2["CRAENDDATE"]))
									$enddate="Present";
								else
									$enddate=$row2["CRAENDDATE"];
								echo "<td>".$enddate."</td>";
							echo "</tr>";						
						}

						echo "</table><br/>";

						$result3 = odbc_exec($conn, "select a.ifname, a.ilname, a.ino, a.idesig, a.irank, a.iroom, b.prastartdate, b.praenddate from instructor a, prev_reg_advisees b where a.ino=b.ino and b.sno='".$_SESSION["sno"]."'");

						while($row3 = odbc_fetch_array($result3)) {
							$flag2++;
						}

						if($flag2 != 0){
							$result4 = odbc_exec($conn, "select a.ifname, a.ilname, a.ino, a.idesig, a.irank, a.iroom, b.prastartdate, b.praenddate from instructor a, prev_reg_advisees b where a.ino=b.ino and b.sno='".$_SESSION["sno"]."'");
							echo "<br/>PREVIOUS<br/>";
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
							
							while($row4 = odbc_fetch_array($result4)) {
								echo "<tr>";
									echo "<td>".$row4["IFNAME"]." ".$row4["ILNAME"]."</td>";
									echo "<td>".$row4["INO"]."</td>";
									echo "<td>".$row4["IDESIG"]."</td>";
									echo "<td>".$row4["IRANK"]."</td>";
									echo "<td>".$row4["IROOM"]."</td>";
									echo "<td>".$row4["PRASTARTDATE"]."</td>";
									if(empty($row4["PRAENDDATE"]))
										$enddate3="Present";
									else
										$enddate3=$row4["PRAENDDATE"];
									echo "<td>".$enddate3."</td>";
								echo "</tr>";						
							}

							echo "</table><br/>";
						}

						$result5 = odbc_exec($conn, "select ifname, ilname from instructor");

						while($row5 = odbc_fetch_array($result5)) {
							$flag3++;
						}
		
						if($flag3 != 0){
							$result6 = odbc_exec($conn, "select ino, ifname, ilname from instructor");
							echo "Change Registration Adviser<br/>";
							echo "<select name='encoder_change_reg_adviser_ino' required='required'>";
								echo "<option></option>";
								while($row6 = odbc_fetch_array($result6)) {
									$name = $row6["ILNAME"].", ".$row6["IFNAME"];
									echo "<option value='".$row6["INO"]."'>$name</option>";	
								}
						
							echo "</select>";
							echo "<br/><input type='submit' name='encoder_change_reg_adviser_submit' value='Change Registration Adviser'/><br/>";
						}else{
							echo "Nothing to display<br/>";
						}
						
					}else{
						echo "Nothing to display.<br/><br/>";

						$result3 = odbc_exec($conn, "select ifname, ilname from instructor");

						while($row3 = odbc_fetch_array($result3)) {
							$flag2++;
						}
	
						if($flag2 != 0){
							$result4 = odbc_exec($conn, "select ino, ifname, ilname from instructor");
							echo "Add Registration Adviser<br/>";
							echo "<select name='encoder_add_reg_adviser_ino' required='required'>";
								echo "<option></option>";
								while($row4 = odbc_fetch_array($result4)) {
									$name = $row4["ILNAME"].", ".$row4["IFNAME"];
									echo "<option value='".$row4["INO"]."'>$name</option>";	
								}
						
							echo "</select>";
							echo "<br/><input type='submit' name='encoder_add_reg_adviser_submit' value='Add Registration Adviser'/><br/>";
						}else{
							echo "Nothing to display<br/>";
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