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
		<form name="encoder_case" action="encoder_choose_sno_redirect.php" method="post">
			<!-- top right po	-->
			<a href ="encoder_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="encoder_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			
			Select student...<br/>
			
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
						echo "<select name='encoder_choose_sno' required='required'/>";
						echo "<option></option>";
						while($row2 = odbc_fetch_array($result2)) {
							$sno=$row2["SNO"];
							echo "<option value='".$sno."'>$sno</option>";
						}
						echo "</select><br/>";	
						echo "<input type='submit' name='encoder_choose_sno_case_submit' value='Submit'/><br/>";
					}else{
						echo "Nothing to display";
					}
						
					
					odbc_close($conn);
				}else{
					die('could not connect');
				}
			?>
			<a href="encoder_course.php"> Courses </a><br/>
			<a href="encoder_adviser.php"> Adviser </a><br/>
			<a href="encoder_case.php"> Case </a><br/>	
		</form>
	</body>
</html>