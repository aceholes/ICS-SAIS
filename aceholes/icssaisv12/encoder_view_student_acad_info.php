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
		<form name="encoder_view_student_acad_info"/>
			<!-- top right po	-->
			<a href ="encoder_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="encoder_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a>
			
			<h3>VIEW USER ACADEMIC PROFILE HERE</h3><br/><br/>
			
			<?php
				if(isset($_GET['stdnum'])){
					$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');	
				
					if($conn){
						$result = odbc_exec($conn, "select slname, sfname, sno, scurr from student where sno = '".$_GET["stdnum"]."' ");
 
						echo "<table border='1'>";
						while($row = odbc_fetch_array($result)) {
							echo "<tr>";
								echo "<td>STUDENT NO.</td>";
								echo "<td>".$row["SNO"]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>FIRST NAME</td>";
								echo "<td>".$row["SFNAME"]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>LAST NAME</td>";
								echo "<td>".$row["SLNAME"]."</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>CURRICULUM</td>";
								echo "<td>".$row["SCURR"]."</td>";
							echo "</tr>";
						}
						echo "</table><br/><br/>";	
						odbc_close($conn);
					}else{
						die('could not connect');
					}
				}				

			?>

			<!-- sidebar po ito :) -->
			<a href ="encoder_view_student_acad.php">View User Academic Profile</a><br/>
			<a href ="encoder_add_user.php">Add User</a><br/>
			<a href ="encoder_edit_user.php">Edit User</a><br/>
			<a href ="encoder_delete_users.php">Delete Users</a><br/>
		</form>
	</body>
</html>