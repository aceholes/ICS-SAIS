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
		<form name="encoder_view_reg_adviser" action="encoder_add_reg_adviser_redirect.php" method="post"/>
			<!-- top right po	-->
			<a href ="encoder_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="encoder_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>

			<b>Registration</b> &nbsp;&nbsp;&nbsp;
			<a href="encoder_view_sp_adviser.php"/>SP</a><br/><br/>

			<?php
				if($_SESSION["adviser_invalid"]==1){
					echo "Invalid adviser name.<br/>";
					$_SESSION["adviser_invalid"]=0;
				}else if($_SESSION["adviser_add_success"]==1){
					echo "Registration Adviser successfully added.<br/>";
					$_SESSION["adviser_add_success"]=0;
				}else if($_SESSION["adviser_delete_success"]==1){
					echo "Registration Adviser successfully deleted.<br/>";
					$_SESSION["adviser_delete_success"]=0;
				}

				$flag=0;
				$flag2=0;
				$flag3=0;
				$enddate="";
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
							$_SESSION["ino"]=$row2["INO"];
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
						
					}else{
						echo "Nothing to display.<br/><br/>";

						$result3 = odbc_exec($conn, "select ifname, ilname from instructor");

						while($row3 = odbc_fetch_array($result3)) {
							$flag2++;
						}
	
						if($flag2 != 0){
							$result4 = odbc_exec($conn, "select ino, ifname, ilname from instructor");
							echo "Add Registration Adviser<br/>";
							echo "<select name='encoder_add_reg_adviser_ino'>";
								echo "<option value='---'>---</option>";
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

			<br/><a href="encoder_view_reg_adviser.php">Adviser</a><br/>
		</form>
	</body>
</html>