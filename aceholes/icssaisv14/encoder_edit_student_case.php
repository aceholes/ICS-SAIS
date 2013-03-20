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
		<form name="encoder_view_student_case" action="encoder_edit_student_case_redirect.php" method="post">
			<a href ="encoder_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="encoder_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			
			<b>Edit University Case</b><br/>
			<?php
				$cno=0;
				$creason="";
				$cpenalty="";
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');
			
				if($conn){
					$result1 = odbc_exec($conn, "select cno, creason, cpenalty from case where cno = '".$_SESSION["cno"]."'");
					while($row1 = odbc_fetch_array($result1)) {
						$cno=$row1["CNO"];
						$creason=$row1["CREASON"];
						$cpenalty=$row1["CPENALTY"];
					}
				}else{
					die('could not connect');
				}

			?>
			<table>
				<tr>
					<td>CASE NO</td>
					<td><input type="number" name="encoder_edit_student_case_no" required="required" autofocus="autofocus" autocomplete="on" placeholder="Case No" value="<?php print $cno;?>"/></td>
				</tr>
				<tr>
					<td>REASON</td>
					<td><input type="text" name="encoder_edit_student_case_reason" required="required" autocomplete="on" placeholder="Reason" value="<?php print $creason;?>"/></td>
				</tr>
				<tr>
					<td>PENALTY</td>
					<td><input type="text" name="encoder_edit_student_case_penalty" required="required" autocomplete="on" placeholder="Penalty" value="<?php print $cpenalty;?>"/></td>
				</tr>
				<tr>
					<td>DATE</td>
					<td>
						<select name="encoder_edit_student_case_month" required='required'>
							<option></option>
							<option value="January">January</option>
							<option value="February">February</option>
							<option value="March">March</option>
							<option value="April">April</option>
							<option value="May">May</option>
							<option value="June">June</option>
							<option value="July">July</option>
							<option value="August">August</option>
							<option value="September">September</option>
							<option value="October">October</option>
							<option value="November">November</option>
							<option value="December">December</option>
						</select> - 

						<?php
							$day=1;
							echo "<select name='encoder_edit_student_case_day' required='required'>";
								echo "<option></option>";				

								for($day=1; $day <= 31; $day++){
									echo "<option value='".$day."'> $day </option>";
								}
							echo "</select> - ";
						?>

						<?php
							$year=1909;
							echo "<select name='encoder_edit_student_case_year' required='required'>";
								echo "<option></option>";				

								for($year=1909; $year <= 2013; $year++){
									echo "<option value='".$year."'> $year </option>";
								}
							echo "</select>";
						?>
					</td>
				</tr>
			</table>

			<br/>
			<input type="submit" name="encoder_edit_student_case_submit" value="Edit Case"/><br/>
			<a href="encoder_view_student_case"
			<br/><a href="encoder_course.php"> Courses </a><br/>
			<a href="encoder_adviser.php"> Adviser </a><br/>
			<a href="encoder_case.php"> Case </a><br/>	
		</form>
	</body>
</html>