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
		<form name="admin_edit_basic_info" action="admin_edit_basic_info_redirect.php" method="post"/>
			<a href ="admin_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="admin_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="admin_messages.php">Messages</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			
			<h4>EDIT BASIC INFORMATION</h4>
			<?php
				$ahaddr="";
				$acaddr="";
				$ahcontact=0;
				$accontact=0;
				$amobile=0;
				$aemail="";

				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');
			
				if($conn){
					$result1 = odbc_exec($conn, "select ahaddr from administrator where afname = '".$_SESSION["fname"]."' and alname = '".$_SESSION["lname"]."'");
					while($row1 = odbc_fetch_array($result1)) {
						$ahaddr=$row1["AHADDR"];
					}
					$result2 = odbc_exec($conn, "select acaddr from administrator where afname = '".$_SESSION["fname"]."' and alname = '".$_SESSION["lname"]."'");
					while($row2 = odbc_fetch_array($result2)) {
						$acaddr=$row2["ACADDR"];
					}
					$result3 = odbc_exec($conn, "select ahcontact from administrator where afname = '".$_SESSION["fname"]."' and alname = '".$_SESSION["lname"]."'");
					while($row3 = odbc_fetch_array($result3)) {
						$ahcontact=$row3["AHCONTACT"];
					}
					$result4 = odbc_exec($conn, "select accontact from administrator where afname = '".$_SESSION["fname"]."' and alname = '".$_SESSION["lname"]."'");
					while($row4 = odbc_fetch_array($result4)) {
						$accontact=$row4["ACCONTACT"];
					}
					$result5 = odbc_exec($conn, "select amobile from administrator where afname = '".$_SESSION["fname"]."' and alname = '".$_SESSION["lname"]."'");
					while($row5 = odbc_fetch_array($result5)) {
						$amobile=$row5["AMOBILE"];
					}
					$result6 = odbc_exec($conn, "select aemail from administrator where afname = '".$_SESSION["fname"]."' and alname = '".$_SESSION["lname"]."'");
					while($row6 = odbc_fetch_array($result6)) {
						$aemail=$row6["AEMAIL"];
					}
				}else{
					die('could not connect');
				}

			?>
			<table>
				<tr>
					<td>HOME ADDRESS</td>
					<td><input type="text" name="admin_edit_homeaddress" autofocus="autofocus" autocomplete="on" placeholder="Home Address" value="<?php print $ahaddr;?>"/></td>
				</tr>
				<tr>
					<td>COLLEGE ADDRESS</td>
					<td><input type="text" name="admin_edit_collegeaddress" autocomplete="on" placeholder="College Address" value="<?php print $acaddr;?>"/></td>
				</tr>
				<tr>
					<td>HOME CONTACT NO.</td>
					<td><input type="number" name="admin_edit_homecontact" autocomplete="on" pattern="^[0-9]{7,11}$" placeholder="Home Address Contact No." value="<?php print $ahcontact;?>"/></td>
				</tr>
				<tr>
					<td>COLLEGE CONTACT NO.</td>
					<td><input type="number" name="admin_edit_collegecontact" autocomplete="on" pattern="^[0-9]{7,11}$" placeholder="College Address Contact No." value="<?php print $accontact;?>"/></td>
				</tr>
				<tr>
					<td>MOBILE NO.</td>
					<td><input type="number" name="admin_edit_mobile" autocomplete="on" pattern="^[0-9]{7,11}$" placeholder="Mobile No." value="<?php print $amobile;?>"/></td>
				</tr>
				<tr>
					<td>EMAIL ADDRESS</td>
					<td><input type="emails" name="admin_edit_emailaddress" required="required"  autocomplete="on" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" placeholder="Email Address" value="<?php print $aemail;?>"/></td>
				</tr>
				
				<tr>
					<td><input type="submit" name="admin_edit_submit" value="Submit"/></td>
				</tr>
			</table>
			
			
			<a href ="admin_change_password.php">Change Password</a><br/><br/>
			
			<a href ="admin_view_users.php">View Users</a><br/>
			<a href ="admin_add_user.php">Add User</a><br/>
			<a href ="admin_request_approval.php">Requests Approval</a><br/>
			<a href ="admin_account_activation.php">Account Activation</a><br/>
			<a href ="admin_log_files.php">Log Files</a><br/>
		</form>
	</body>
</html>