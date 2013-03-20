<!DOCTYPE HTML>
<?php
	session_start();
	if($_SESSION['login']!=1 && $_SESSION['user']==""){
		header('Location: home.php');
		exit;
	}else if($_SESSION['login']==1 && $_SESSION['user']=="student"){
		header('Location: studenthome.php');
		exit;
	}else if($_SESSION['login']==1 && $_SESSION['user']=="encoder"){
		header('Location: encoderhome.php');
		exit;
	}else if($_SESSION['login']==1 && $_SESSION['user']=="admin"){
		header('Location: adminhome.php');
		exit;
	}
?>

<html>
	<head>
		<title>
		
		</title>
	</head>
	<body>
		<form name="instructorchangepassword" action="changepassword_redirect.php" method="post"/>
			<a href ="instructorhome.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="instructorbasicprofile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="logout_redirect.php">Sign-out</a><br/><br/>
			
			<a href ="instructorbasicprofile.php">Basic Information</a>	&nbsp;&nbsp;&nbsp;
			<a href ="instructoracadprofile.php">Academic Information</a><br/>
			
			<h4>CHANGE PASSWORD</h4>
			<table>
				<tr>
					<td>Old Password</td>
					<td><input type="password" name="instructorpassword_old" placeholder="Old Password Here"></td>
					<?php
						if($_SESSION['password_old_error']==1) echo "<td>Please fill out your old password.</td>";
					?>
				</tr>
				<tr>
					<td>New Password</td>
					<td><input type="password" name="instructorpassword_new" placeholder="New Password Here"></td>
					<?php
						if($_SESSION['password_new_error']==1) echo "<td>Please fill out your new password.</td>";
						if($_SESSION['password_match_error']==1) echo "<td>Passwords do not match.</td>";
					?>
				</tr>
				<tr>
					<td>Retype New Password</td>
					<td><input type="password" name="instructorpassword_new_retype" placeholder="Retype New Password Here"></td>
					<?php
						if($_SESSION['password_new_retype_error']==1) echo "<td>Please retype your new password.</td>";
					?>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="instructorchangepassword_submit" value="Change Password"/></td>
				</tr>
			</table>
			</form>
	</body>
</html>