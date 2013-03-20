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
		<form name="instructor_edit_basic_info" action="instructor_edit_basic_info_redirect.php" method="post"/>
			<a href ="instructor_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="instructor_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			
			<h4>EDIT BASIC INFORMATION</h4>
			<?php
				$ihaddr="";
				$icaddr="";
				$ihcontact=0;
				$iccontact=0;
				$imobile=0;
				$iemail="";

				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');
			
				if($conn){
					$result1 = odbc_exec($conn, "select ihaddr from instructor where ifname = '".$_SESSION["fname"]."' and ilname = '".$_SESSION["lname"]."'");
					while($row1 = odbc_fetch_array($result1)) {
						$ihaddr=$row1["IHADDR"];
					}
					$result2 = odbc_exec($conn, "select icaddr from instructor where ifname = '".$_SESSION["fname"]."' and ilname = '".$_SESSION["lname"]."'");
					while($row2 = odbc_fetch_array($result2)) {
						$icaddr=$row2["ICADDR"];
					}
					$result3 = odbc_exec($conn, "select ihcontact from instructor where ifname = '".$_SESSION["fname"]."' and ilname = '".$_SESSION["lname"]."'");
					while($row3 = odbc_fetch_array($result3)) {
						$ihcontact=$row3["IHCONTACT"];
					}
					$result4 = odbc_exec($conn, "select iccontact from instructor where ifname = '".$_SESSION["fname"]."' and ilname = '".$_SESSION["lname"]."'");
					while($row4 = odbc_fetch_array($result4)) {
						$iccontact=$row4["ICCONTACT"];
					}
					$result5 = odbc_exec($conn, "select imobile from instructor where ifname = '".$_SESSION["fname"]."' and ilname = '".$_SESSION["lname"]."'");
					while($row5 = odbc_fetch_array($result5)) {
						$imobile=$row5["IMOBILE"];
					}
					$result6 = odbc_exec($conn, "select iemail from instructor where ifname = '".$_SESSION["fname"]."' and ilname = '".$_SESSION["lname"]."'");
					while($row6 = odbc_fetch_array($result6)) {
						$iemail=$row6["IEMAIL"];
					}
				}else{
					die('could not connect');
				}

			?>
			<table>
				<tr>
					<td>HOME ADDRESS</td>
					<td><input type="text" name="instructor_edit_homeaddress" placeholder="Home Address" value="<?php print $ihaddr;?>"/></td>
				</tr>
				<tr>
					<td>COLLEGE ADDRESS</td>
					<td><input type="text" name="instructor_edit_collegeaddress" placeholder="College Address" value="<?php print $icaddr;?>"/></td>
				</tr>
				<tr>
					<td>HOME CONTACT NO.</td>
					<td><input type="number" name="instructor_edit_homecontact" placeholder="Home Address Contact No." value="<?php print $ihcontact;?>"/></td>
				</tr>
				<tr>
					<td>COLLEGE CONTACT NO.</td>
					<td><input type="number" name="instructor_edit_collegecontact" placeholder="College Address Contact No." value="<?php print $iccontact;?>"/></td>
				</tr>
				<tr>
					<td>MOBILE NO.</td>
					<td><input type="number" name="instructor_edit_mobile" placeholder="Mobile No." value="<?php print $imobile;?>"/></td>
				</tr>
				<tr>
					<td>EMAIL ADDRESS</td>
					<td><input type="text" name="instructor_edit_emailaddress" placeholder="Email Address" value="<?php print $iemail;?>"/></td>
				</tr>
				
				<tr>
					<td><input type="submit" name="instructor_edit_submit" value="Submit"/></td>
				</tr>
			</table>
			
			
			<a href ="instructor_change_password.php">Change Password</a><br/><br/>
			
			<a href ="instructor_view_previous_instructors.php">Previous instructors</a><br/>
			<a href ="instructor_view_previous_reg_advisees.php">Previous Registration Advisees</a><br/>
			<a href ="instructor_view_previous_sp_advisees.php">Previous SP Advisees</a><br/>
			<a href ="instructor_view_current_reg_advisees.php">Current Registration Advisees</a><br/>
			<a href ="instructor_view_current_sp_advisees.php">Current SP Advisees</a><br/>
			<a href ="instructor_view_grad_sp_advisees.php">Graduated SP Advisees</a><br/>
		</form>
	</body>
</html>