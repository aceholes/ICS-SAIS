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
		<form name="admin_add_user_instructor_more" action="admin_add_user_instructor_more_redirect.php" method="post"/>
			<!-- top right po	-->
			<a href ="admin_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="admin_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="admin_messages.php">Messages</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a>
			
			<h2>More information...</h2>
			<table>
				<tr>
					<td><input type="text" name="admin_add_user_homeaddress" autofocus="autofocus" autocomplete="on" placeholder="Home Address"/></td>
				</tr>
				<tr>
					<td><input type="text" name="admin_add_user_collegeaddress" autocomplete="on" placeholder="College Address"/></td>
				</tr>
				<tr>
					<td><input type="number" name="admin_add_user_homecontact" autocomplete="on" pattern="^[0-9]{11}$" placeholder="Home Contact No."/></td>
				</tr>
				<tr>
					<td><input type="number" name="admin_add_user_collegecontact" autocomplete="on" pattern="^[0-9]{7,11}$" placeholder="College Contact No."/></td>
				</tr>
				<tr>
					<td><input type="number" name="admin_add_user_mobile" autocomplete="on" pattern="^[0-9]{7,11}$" placeholder="Mobile No."/></td>
				</tr>
				
				<tr>
					<td>
						<select name="admin_add_user_designation" required="required">
							<option value="---">Designation</option>
							<option value="Instructor">Instructor</option>
							<option value="Assistant Professor">Assistant Professor</option>
							<option value="Associate Professor">Associate Professor</option>
							<option value="Professor">Professor</option>
						</select>
					&nbsp;&nbsp;<font color="red">*</font>
					</td>
					<?php
						if($_SESSION["designation_error"]==1){
							echo "<td>Invalid designation!</td>";
							$_SESSION["designation_error"]=0;
						}

					?>
				</tr>
				<tr>
					<td>
						<input type="number" name="admin_add_user_rank" autocomplete="on" required="required" pattern="^[1-9]{1,}$" min="1" max="20" placeholder="Rank"/>
						&nbsp;&nbsp;<font color="red">*</font>
					</td>
				</tr>
				<tr>
					<td>
						<select name="admin_add_user_room" required="required">
							<option value="---">Room</option>
							<option value="PS C-112">PS C-112</option>
							<option value="PS C-114">PS C-114</option>
							<option value="PS C-115">PS C-115</option>
							<option value="PS C-116">PS C-116</option>
							<option value="PS C-118">PS C-118</option>
							<option value="PS C-119">PS C-119</option>
							<option value="PS C-120">PS C-120</option>
							<option value="PS C-121">PS C-121</option>
							<option value="PS C-123">PS C-123</option>
							<option value="PS C-125">PS C-125</option>
							<option value="PS C-127">PS C-127</option>
						</select>
					&nbsp;&nbsp;<font color="red">*</font>
					</td>
					<?php
						if($_SESSION["room_error"]==1){
							echo "<td>Invalid room!</td>";
							$_SESSION["room_error"]=0;
						}

					?>
				</tr>
				<tr>
					<td><input type="submit" name="admin_add_user_submit" value="Submit"/></td>
				</tr>
			</table>

			<!-- sidebar po ito :) -->
			<a href ="admin_view_users.php">View Users</a><br/>
			<a href ="admin_add_user.php">Add User</a><br/>
			<a href ="admin_request_approval.php">Requests Approval</a><br/>
			<a href ="admin_account_activation.php">Account Activation</a><br/>
			<a href ="admin_log_files.php">Log Files</a><br/>
		</form>
	</body>
</html>