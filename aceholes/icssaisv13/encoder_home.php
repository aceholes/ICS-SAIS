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
		<form name="encoder_home"/>
			<!-- top right po	-->
			<a href ="encoder_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="encoder_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a>
			
			<h3>WELCOME <?php echo $_SESSION["fname"]." ".$_SESSION["lname"]; ?>!</h3>
			
			<?php
				$flag=0;
				$i=1;
				$sno=0;
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

				if($conn){
					$result = odbc_exec($conn, "select sno from student");

					while($row = odbc_fetch_array($result)) {
						$flag++;
					}

					if($flag != 0){
						$result2 = odbc_exec($conn, "select slname, sfname, sno from student");
						echo "<table>";
						while($row2 = odbc_fetch_array($result2)) {
							echo "<tr>";
								echo "<td>".$i++.". </td>";
								$sno=$row2["SNO"];
								echo "<td><a name='stdnum' href='encoder_view_student_acad_info.php?stdnum=".$sno."'>$sno</a></td>";
							echo "</tr>";
						}
						echo "</table><br/><br/>";	
					}else{
						echo "Nothing to display";
					}
						
					
					odbc_close($conn);
				}else{
					die('could not connect');
				}
			?>
			
		</form>
	</body>
</html>