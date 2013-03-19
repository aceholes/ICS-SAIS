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
		<form name="encoder_edit_basic_info" action="encoder_edit_basic_info_redirect.php" method="post"/>
			<a href ="encoder_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="encoder_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			
			<h4>EDIT BASIC INFORMATION</h4>
			<?php
				$ehaddr="";
				$ecaddr="";
				$ehcontact=0;
				$eccontact=0;
				$emobile=0;
				$eemail="";

				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');
			
				if($conn){
					$result1 = odbc_exec($conn, "select ehaddr from encoder where efname = '".$_SESSION["fname"]."' and elname = '".$_SESSION["lname"]."'");
					while($row1 = odbc_fetch_array($result1)) {
						$ehaddr=$row1["EHADDR"];
					}
					$result2 = odbc_exec($conn, "select ecaddr from encoder where efname = '".$_SESSION["fname"]."' and elname = '".$_SESSION["lname"]."'");
					while($row2 = odbc_fetch_array($result2)) {
						$ecaddr=$row2["ECADDR"];
					}
					$result3 = odbc_exec($conn, "select ehcontact from encoder where efname = '".$_SESSION["fname"]."' and elname = '".$_SESSION["lname"]."'");
					while($row3 = odbc_fetch_array($result3)) {
						$ehcontact=$row3["EHCONTACT"];
					}
					$result4 = odbc_exec($conn, "select eccontact from encoder where efname = '".$_SESSION["fname"]."' and elname = '".$_SESSION["lname"]."'");
					while($row4 = odbc_fetch_array($result4)) {
						$eccontact=$row4["ECCONTACT"];
					}
					$result5 = odbc_exec($conn, "select emobile from encoder where efname = '".$_SESSION["fname"]."' and elname = '".$_SESSION["lname"]."'");
					while($row5 = odbc_fetch_array($result5)) {
						$emobile=$row5["EMOBILE"];
					}
					$result6 = odbc_exec($conn, "select eemail from encoder where efname = '".$_SESSION["fname"]."' and elname = '".$_SESSION["lname"]."'");
					while($row6 = odbc_fetch_array($result6)) {
						$eemail=$row6["EEMAIL"];
					}
				}else{
					die('could not connect');
				}

			?>
			<table>
				<tr>
					<td>HOME ADDRESS</td>
					<td><input type="text" name="encoder_edit_homeaddress" autofocus="autofocus" autocomplete="on" placeholder="Home Address" value="<?php print $ehaddr;?>"/></td>
				</tr>
				<tr>
					<td>COLLEGE ADDRESS</td>
					<td><input type="text" name="encoder_edit_collegeaddress" autocomplete="on" placeholder="College Address" value="<?php print $ecaddr;?>"/></td>
				</tr>
				<tr>
					<td>HOME CONTACT NO.</td>
					<td><input type="number" name="encoder_edit_homecontact" autocomplete="on" pattern="^[0-9]{7,11}$" placeholder="Home Address Contact No." value="<?php print $ehcontact;?>"/></td>
				</tr>
				<tr>
					<td>COLLEGE CONTACT NO.</td>
					<td><input type="number" name="encoder_edit_collegecontact" autocomplete="on" pattern="^[0-9]{7,11}$" placeholder="College Address Contact No." value="<?php print $eccontact;?>"/></td>
				</tr>
				<tr>
					<td>MOBILE NO.</td>
					<td><input type="number" name="encoder_edit_mobile" autocomplete="on" pattern="^[0-9]{7,11}$" placeholder="Mobile No." value="<?php print $emobile;?>"/></td>
				</tr>
				<tr>
					<td>EMAIL ADDRESS</td>
					<td><input type="email" name="encoder_edit_emailaddress" required="required" autocomplete="on" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" placeholder="Email Address" value="<?php print $eemail;?>"/></td>
				</tr>
				
				<tr>
					<td><input type="submit" name="encoder_edit_submit" value="Submit"/></td>
				</tr>
			</table>
			
			<a href ="encoder_change_password.php">Change Password</a><br/><br/>
			
			<a href ="encoder_view_student_acad.php">View User Academic Profile</a><br/>
			<a href ="encoder_add_user.php">Add User</a><br/>
			<a href ="encoder_edit_user.php">Edit User</a><br/>
			<a href ="encoder_delete_users.php">Delete Users</a><br/>
		</form>
	</body>
</html>