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
		<form name="instructoreditbasicinfo"/>
			<a href ="instructorhome.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="instructorbasicprofile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="logout_redirect.php">Sign-out</a><br/><br/>
			<a href ="instructorbasicprofile.php">Basic Information</a>	&nbsp;&nbsp;&nbsp;
			<a href ="instructoracadprofile.php">Academic Information</a><br/>
			
			<h4>EDIT BASIC INFORMATION</h4>
			<table>
				<tr>
					<td>FIRST NAME</td>
					<td><input type="text" name="instructor_edit_firstname" placeholder="First Name"/></td>
				</tr>
				<tr>
					<td>LAST NAME</td>
					<td><input type="text" name="instructor_edit_lastname" placeholder="Last Name"/></td>
				</tr>
				<tr>
					<td>GENDER</td>
					<td>
						<input type="radio" name="instructor_edit_gender" value="male"/> Male
						<input type="radio" name="instructor_edit_gender" value="female"/> Female
					</td>
				</tr>
				<tr>
					<td>MOBILE NO.</td>
					<td><input type="number" name="instructor_edit_mobileno" placeholder="Mobile No."/></td>
				</tr>
			</table>
			
			
			<a href ="instructorchangepassword.php">Change Password</a><br/>
		</form>
	</body>
</html>