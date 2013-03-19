<!DOCTYPE HTML>
<?php
	session_start();
	if($_SESSION['login']!=1 && $_SESSION['user']==""){
		header('Location: home.php');
		exit;
	}else if($_SESSION['login']==1 && $_SESSION['user']=="instructor"){
		header('Location: instructor_home.php');
		exit;
	}else if($_SESSION['login']==1 && $_SESSION['user']=="encoder"){
		header('Location: encoder_home.php');
		exit;
	}else if($_SESSION['login']==1 && $_SESSION['user']=="admin"){
		header('Location: admin_home.php');
		exit;
	}
?>

<html>
	<head>
		<title>
		
		</title>
	</head>
	<body>
		<form name="student_profile"/>
			<a href ="student_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="student_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="student_messages.php">Messages</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/><br/>
			
			<?php
				if($_SESSION["edit_basic_info_successful"]==1){
					echo "Information successfully edited.<br/><br/>";
					$_SESSION["edit_basic_info_successful"]=0;
				}

				if($_SESSION["change_password_successful"]==1){
					echo "Password successfully changed.<br/><br/>";
					$_SESSION["change_password_successful"]=0;
				}
			?>
							
			<h4>BASIC INFORMATION</h4>
			
			<?php
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

				if($conn){
					$result = odbc_exec($conn, "select sfname, slname, sgender, shaddr, scaddr, shcontact, sccontact, smobile, semail from student where sfname = '".$_SESSION["fname"]."' and slname = '".$_SESSION["lname"]."'" );

					echo "<table border='1'>";
					while($row = odbc_fetch_array($result)) {
						echo "<tr>";
							echo "<td>FIRST NAME</td>";
							echo "<td>".$row["SFNAME"]."</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>LAST NAME</td>";
							echo "<td>".$row["SLNAME"]."</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>GENDER</td>";
							echo "<td>".$row["SGENDER"]."</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>HOME ADDRESS</td>";
							echo "<td>".$row["SHADDR"]."</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>COLLEGE ADDRESS</td>";
							echo "<td>".$row["SCADDR"]."</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>HOME CONTACT NO.</td>";
							echo "<td>".$row["SHCONTACT"]."</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>COLLEGE CONTACT NO.</td>";
							echo "<td>".$row["SCCONTACT"]."</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>MOBILE NO.</td>";
							echo "<td>".$row["SMOBILE"]."</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>EMAIL ADDRESS</td>";
							echo "<td>".$row["SEMAIL"]."</td>";
						echo "</tr>";
						
					}
					echo "</table>";
				
					odbc_close($conn);
				}else{
					die('could not connect');
				}
			?>
			
			<!-- ikaw na bahala kung san to. :) -->
			<a href ="student_edit_basic_info.php">Edit</a><br/>
			<a href ="student_change_password.php">Change Password</a><br/><br/>
			
			<a href = "student_view_courses.php">Courses</a><br/>
			<a href = "student_view_adviser.php">Adviser</a><br/>
			<a href = "student_view_cases.php">Cases</a><br/>
			<a href = "student_view_academic_history.php">History</a><br/>
		</form>
	</body>
</html>