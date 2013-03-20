<!DOCTYPE HTML>
<?php
	session_start();
?>

<html>
	<head>
		<title>
			ICS SAIS
		</title>
	</head>
	<body>
		<form name="home_signup_instructor_more" action="home_signup_instructor_more_redirect.php" method="post">
			<h2>More information...</h2>
			<table>
				<tr>
					<td><input type="text" name="signup_homeaddress" autofocus="autofocus" autocomplete="on"  title="Invalid home address." placeholder="Home Address"/></td>
				</tr>
				<tr>
					<td><input type="text" name="signup_collegeaddress" autocomplete="on"  title="Invalid college address." placeholder="College Address"/></td>
				</tr>
				<tr>
					<td><input type="number" name="signup_homecontact" autocomplete="on" pattern="^[0-9]{11}$"  title="Invalid home contact no." placeholder="Home Contact No."/></td>
				</tr>
				<tr>
					<td><input type="number" name="signup_collegecontact" autocomplete="on" pattern="^[0-9]{7,11}$"  title="Invalid college contact no." placeholder="College Contact No."/></td>
				</tr>
				<tr>
					<td><input type="number" name="signup_mobile" autocomplete="on" pattern="^[0-9]{7,11}$"  title="Invalid mobile no." placeholder="Mobile No."/></td>
				</tr>
				<tr>
					<td>
						<select name="signup_designation" required="required"  title="Invalid designation.">
							<option></option>
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
						<input type="number" name="signup_rank" autocomplete="on" required="required" pattern="^[1-9]{1,}$" min="1" max="20"  title="Invalid rank." placeholder="Rank"/>
						&nbsp;&nbsp;<font color="red">*</font>
					</td>
				</tr>
				<tr>
					<td>
						<select name="signup_room" required="required"  title="Invalid room.">
							<option></option>
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
					<td><input type="submit" name="signup_submit" value="Submit"/></td>
				</tr>
			</table>
		</form>
	</body>
	
</html>