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
		<form name="encoder_view_student_case" action="encoder_add_student_case_redirect.php" method="post">
			<!-- top right po	-->
			<a href ="encoder_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="encoder_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			
			<b>University Case</b><br/><br/>
			
			<?php
				if($_SESSION["case_add_success"]==1){
					echo "Case successfully added.<br/>";
					$_SESSION["case_add_success"]=0;
				}else if($_SESSION["case_delete_success"]==1){
					echo "Case successfully deleted.<br/>";
					$_SESSION["case_delete_success"]=0;
				}else if($_SESSION["case_edit_success"]==1){
					echo "Case successfully edited.<br/>";
					$_SESSION["case_edit_success"]=0;
				}
			?>

			<?php
				$flag=0;
				$i=1;
				$cno=0;
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

				if($conn){
					$result = odbc_exec($conn, "select cno, creason, cpenalty, cdate from case where sno = '".$_SESSION["sno"]."'");

					while($row = odbc_fetch_array($result)) {
						$flag++;
					}

					if($flag != 0){
						$result2 = odbc_exec($conn, "select cno, creason, cpenalty, cdate from case where sno = '".$_SESSION["sno"]."'");
						echo "<table border='1'>";
						echo "<tr>";
							echo "<td>CASE NO.</td>";
							echo "<td>REASON</td>";
							echo "<td>PENALTY</td>";
							echo "<td>DATE</td>";
							echo "<td>ACTION</td>";
						echo "</tr>";
						while($row2 = odbc_fetch_array($result2)) {
							$cno=$row2["CNO"];
							echo "<tr>";
								echo "<td>".$row2["CNO"]."</td>";
								echo "<td>".$row2["CREASON"]."</td>";
								echo "<td>".$row2["CPENALTY"]."</td>";
								echo "<td>".$row2["CDATE"]."</td>";
								echo "<td><a name='delete' href='encoder_modify_student_case_redirect.php?delete=".$row2["CNO"]."'>Delete</a>";

								echo " | <a name='edit' href='encoder_modify_student_case_redirect.php?edit=".$row2["CNO"]."'>Edit</a></td>";
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
			
			<?php
				echo "Case No:<br/>";
				echo "<input type='number' name='encoder_add_student_case_no' required='required' autofocus='autofocus' min='".($cno+1)."' max='1000000'/><br/>";	
			?>

			Reason:<br/>
			<textarea name="encoder_add_student_case_reason" cols="50" rows="5" wrap="hard" autocomplete="on" required="required"></textarea><br/><br/>

			Penalty:<br/>
			<textarea name="encoder_add_student_case_penalty" cols="50" rows="5" wrap="hard" autocomplete="on" required="required"></textarea><br/><br/>

			Date:<br/>

			<select name="encoder_add_student_case_month" required='required'>
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
				echo "<select name='encoder_add_student_case_day' required='required'>";
					echo "<option></option>";				

					for($day=1; $day <= 31; $day++){
						echo "<option value='".$day."'> $day </option>";
					}
				echo "</select> - ";
			?>

			<?php
				$year=1909;
				echo "<select name='encoder_add_student_case_year' required='required'>";
					echo "<option></option>";				

					for($year=1909; $year <= 2013; $year++){
						echo "<option value='".$year."'> $year </option>";
					}
				echo "</select>";
			?>

			<br/>
			<input type="submit" name="encoder_add_student_case_submit" value="Add Case"/><br/>

			<br/><a href="encoder_course.php"> Courses </a><br/>
			<a href="encoder_adviser.php"> Adviser </a><br/>
			<a href="encoder_case.php"> Case </a><br/>	
		</form>
	</body>
</html>