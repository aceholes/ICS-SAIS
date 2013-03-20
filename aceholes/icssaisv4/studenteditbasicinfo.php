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
		<form name="studenteditbasicinfo"/>
			<a href ="studenthome.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="studentprofile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			
			<h4>EDIT BASIC INFORMATION</h4>
			<table>
				<tr>
					<td>FIRST NAME</td>
					<td><input type="text" name="student_edit_firstname" value="<?php
							if ($connected==1) { 
								$c = oci_parse($conn, "Select sfname from student where suser = '".htmlspecialchars($_SESSION['username'])."'");
								oci_execute($c);
								
								while ($row = oci_fetch_array($c, OCI_ASSOC+OCI_RETURN_NULLS)) {
									foreach ($row as $item) {
										echo($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;");
									}
								}
								
							}
						?>"/></td>
				</tr>
				<tr>
					<td>LAST NAME</td>
					<td><input type="text" name="student_edit_firstname" value="<?php
							if ($connected==1) { 
								$c = oci_parse($conn, "Select slname from student where suser = '".htmlspecialchars($_SESSION['username'])."'");
								oci_execute($c);
								
								while ($row = oci_fetch_array($c, OCI_ASSOC+OCI_RETURN_NULLS)) {
									foreach ($row as $item) {
										echo($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;");
									}
								}
								
							}
						?>"/></td>
				</tr>
				<tr>
					<td>GENDER</td>
					<td>
						<input type="radio" name="student_edit_gender" value="male"/> Male
						<input type="radio" name="student_edit_gender" value="female"/> Female
					</td>
				</tr>
				<tr>
					<td>EMAIL ADDRESS</td>
					<td><input type="text" name="student_edit_firstname" value="<?php
							if ($connected==1) { 
								$c = oci_parse($conn, "Select semail from student where suser = '".htmlspecialchars($_SESSION['username'])."'");
								oci_execute($c);
								
								while ($row = oci_fetch_array($c, OCI_ASSOC+OCI_RETURN_NULLS)) {
									foreach ($row as $item) {
										echo($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;");
									}
								}
								
							}
						?>"/></td>
				</tr>
				<tr>
					<td>ADDRESS</td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HOME</td>
					<td><input type="text" name="student_edit_firstname" value="<?php
							if ($connected==1) { 
								$c = oci_parse($conn, "Select shaddr from student where suser = '".htmlspecialchars($_SESSION['username'])."'");
								oci_execute($c);
								
								while ($row = oci_fetch_array($c, OCI_ASSOC+OCI_RETURN_NULLS)) {
									foreach ($row as $item) {
										echo($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;");
									}
								}
								
							}
						?>"/></td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COLLEGE</td>
					<td><input type="text" name="student_edit_firstname" value="<?php
							if ($connected==1) { 
								$c = oci_parse($conn, "Select scaddr from student where suser = '".htmlspecialchars($_SESSION['username'])."'");
								oci_execute($c);
								
								while ($row = oci_fetch_array($c, OCI_ASSOC+OCI_RETURN_NULLS)) {
									foreach ($row as $item) {
										echo($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;");
									}
								}
								
							}
						?>"/></td>
				</tr>
				<tr>
					<td>CONTACT NO.</td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HOME</td>
					<td><input type="text" name="student_edit_firstname" value="<?php
							if ($connected==1) { 
								$c = oci_parse($conn, "Select shcontact from student where suser = '".htmlspecialchars($_SESSION['username'])."'");
								oci_execute($c);
								
								while ($row = oci_fetch_array($c, OCI_ASSOC+OCI_RETURN_NULLS)) {
									foreach ($row as $item) {
										echo($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;");
									}
								}
								
							}
						?>"/></td>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COLLEGE</td>
					<td><input type="text" name="student_edit_firstname" value="<?php
							if ($connected==1) { 
								$c = oci_parse($conn, "Select sccontact from student where suser = '".htmlspecialchars($_SESSION['username'])."'");
								oci_execute($c);
								
								while ($row = oci_fetch_array($c, OCI_ASSOC+OCI_RETURN_NULLS)) {
									foreach ($row as $item) {
										echo($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;");
									}
								}
								
							}
						?>"/></td>
				</tr>
				<tr>
					<td>MOBILE NO.</td>
					<td><input type="text" name="student_edit_firstname" value="<?php
							if ($connected==1) { 
								$c = oci_parse($conn, "Select smobile from student where suser = '".htmlspecialchars($_SESSION['username'])."'");
								oci_execute($c);
								
								while ($row = oci_fetch_array($c, OCI_ASSOC+OCI_RETURN_NULLS)) {
									foreach ($row as $item) {
										echo($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;");
									}
								}
								
							}
						?>"/></td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="student_edit_submit" value="Submit"/>
					</td>
				</tr>
			</table>
			
			
			<a href ="studentaddbasicinfo.php">Add</a><br/>
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