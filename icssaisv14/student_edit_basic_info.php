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
		<form name="student_edit_basic_info" action="student_edit_basic_info_redirect.php" method="post"/>
			<a href ="student_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="student_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="student_messages.php">Messages</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			
			<h4>EDIT BASIC INFORMATION</h4>
			<?php
				$shaddr="";
				$scaddr="";
				$shcontact=0;
				$sccontact=0;
				$smobile=0;
				$semail="";

				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');
			
				if($conn){
					$result1 = odbc_exec($conn, "select shaddr from student where sfname = '".$_SESSION["fname"]."' and slname = '".$_SESSION["lname"]."'");
					while($row1 = odbc_fetch_array($result1)) {
						$shaddr=$row1["SHADDR"];
					}
					$result2 = odbc_exec($conn, "select scaddr from student where sfname = '".$_SESSION["fname"]."' and slname = '".$_SESSION["lname"]."'");
					while($row2 = odbc_fetch_array($result2)) {
						$scaddr=$row2["SCADDR"];
					}
					$result3 = odbc_exec($conn, "select shcontact from student where sfname = '".$_SESSION["fname"]."' and slname = '".$_SESSION["lname"]."'");
					while($row3 = odbc_fetch_array($result3)) {
						$shcontact=$row3["SHCONTACT"];
					}
					$result4 = odbc_exec($conn, "select sccontact from student where sfname = '".$_SESSION["fname"]."' and slname = '".$_SESSION["lname"]."'");
					while($row4 = odbc_fetch_array($result4)) {
						$sccontact=$row4["SCCONTACT"];
					}
					$result5 = odbc_exec($conn, "select smobile from student where sfname = '".$_SESSION["fname"]."' and slname = '".$_SESSION["lname"]."'");
					while($row5 = odbc_fetch_array($result5)) {
						$smobile=$row5["SMOBILE"];
					}
					$result6 = odbc_exec($conn, "select semail from student where sfname = '".$_SESSION["fname"]."' and slname = '".$_SESSION["lname"]."'");
					while($row6 = odbc_fetch_array($result6)) {
						$semail=$row6["SEMAIL"];
					}
				}else{
					die('could not connect');
				}

			?>
			<table>
				<tr>
					<td>HOME ADDRESS</td>
					<td><input type="text" name="student_edit_homeaddress" autofocus="autofocus" autocomplete="on" placeholder="Home Address" value="<?php print $shaddr;?>"/></td>
				</tr>
				<tr>
					<td>COLLEGE ADDRESS</td>
					<td><input type="text" name="student_edit_collegeaddress" autocomplete="on" placeholder="College Address" value="<?php print $scaddr;?>"/></td>
				</tr>
				<tr>
					<td>HOME CONTACT NO.</td>
					<td><input type="number" name="student_edit_homecontact" autocomplete="on" pattern="^[0-9]{7,11}$" placeholder="Home Address Contact No." value="<?php print $shcontact;?>"/></td>
				</tr>
				<tr>
					<td>COLLEGE CONTACT NO.</td>
					<td><input type="number" name="student_edit_collegecontact" autocomplete="on" pattern="^[0-9]{7,11}$" placeholder="College Address Contact No." value="<?php print $sccontact;?>"/></td>
				</tr>
				<tr>
					<td>MOBILE NO.</td>
					<td><input type="number" name="student_edit_mobile" autocomplete="on" pattern="^[0-9]{7,11}$" placeholder="Mobile No." value="<?php print $smobile;?>"/></td>
				</tr>
				<tr>
					<td>EMAIL ADDRESS</td>
					<td><input type="email" name="student_edit_emailaddress" required="required" autocomplete="on" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" placeholder="Email Address" value="<?php print $semail;?>"/></td>
				</tr>
				
				<tr>
					<td><input type="submit" name="student_edit_submit" value="Submit"/></td>
				</tr>
			</table>
			
			
			<a href ="student_change_password.php">Change Password</a><br/><br/>
			
			<a href = "student_view_courses.php">Courses</a><br/>
			<a href = "student_view_adviser.php">Adviser</a><br/>
			<a href = "student_view_cases.php">Cases</a><br/>
			<a href = "student_view_academic_history.php">History</a><br/>
		</form>
	</body>
</html>