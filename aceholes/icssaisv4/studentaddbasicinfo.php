<!DOCTYPE HTML>
<?php
	session_start();
	if($_SESSION['login']!=1 && $_SESSION['user']==""){
		header('Location: home.php');
		exit;
	}else if($_SESSION['login']==1 && $_SESSION['user']=="instructor"){
		header('Location: instructorhome.php');
		exit;
	}else if($_SESSION['login']==1 && $_SESSION['user']=="encoder"){
		header('Location: encoderhome.php');
		exit;
	}else if($_SESSION['login']==1 && $_SESSION['user']=="admin"){
		header('Location: adminhome.php');
		exit;
	}
	
	$connected=0;
	$conn=oci_connect('tantan','tantan','localhost');
	
	if (!$conn) { 
		$connected=0;
		exit; 
	}else{
		$connected=1;
	}
?>
<html>
	<head>
		<title>
		
		</title>
	</head>
	<body>
		<form name="studentaddbasicinfo"/>
			<a href ="studenthome.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="studentprofile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			
			<h4>ADD BASIC INFORMATION</h4>
			<table>
				<tr>
					<td>ADDRESS</td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HOME</td>
					<td><input type="text" name="student_add_homeaddress" placeholder="Home Address"/></td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COLLEGE</td>
					<td><input type="text" name="student_add_collegeaddress" placeholder="College Address"/></td>
				</tr>
				<tr>
					<td>CONTACT NO.</td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HOME</td>
					<td><input type="number" name="student_add_homecontact" placeholder="Home Address Contact No."/></td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COLLEGE</td>
					<td><input type="number" name="student_add_collegecontact" placeholder="College Address Contact No."/></td>
				</tr>
				<tr>
					<td>MOBILE NO.</td>
					<td><input type="number" name="student_add_mobile" placeholder="Mobile No."/></td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="student_add_submit" value="Submit"/>
					</td>
				</tr>
			</table>
			
			
			<a href ="studenteditbasicinfo.php">Edit</a><br/>
			<a href ="studentdeletebasicinfo.php">Delete</a><br/>
			<a href ="studentchangepassword.php">Change Password</a><br/><br/>
			
			<a href ="studentviewgrades.php">Subject Grades</a><br/>
			<a href ="studentviewgwa.php">GWA</a><br/>
			<a href ="studentviewsubjectstaken.php">Subjects Taken</a><br/>
			<a href ="studentviewallowedelectives.php">Allowed Electives</a><br/>
			<a href ="studentviewapprovedelectives.php">Approved Electives</a><br/>
			<a href ="studentviewapprovedge.php">Approved GE</a><br/>
			<a href ="studentviewregadviser.php">Registration Adviser</a><br/>
			<a href ="studentviewspadviser.php">SP Adviser</a><br/>
			<a href ="studentviewcases.php">Cases</a><br/>
			<a href ="studentviewacademichistory.php">Academic History</a><br/>
			<a href ="studentsendmessage.php">Send Message to Administrator</a>
		</form>
	</body>
</html>