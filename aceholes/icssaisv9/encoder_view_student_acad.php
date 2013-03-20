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
		<form name="encoder_view_student_acad" action="encoder_view_student_acad_info.php" method="post"/>
			<!-- top right po	-->
			<a href ="encoder_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="encoder_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a>
			
			<h3>VIEW USER ACADEMIC PROFILE HERE</h3><br/><br/>
			
			<?php
				$i=1;
				$name="";
				$num=0;
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

				if($conn){
					$result = odbc_exec($conn, "select slname, sfname, sno from student");

					echo "<table>";
					while($row = odbc_fetch_array($result)) {
						echo "<tr>";
							echo "<td>".$i++.". </td>";
							$name=$row["SLNAME"].", ".$row["SFNAME"];
							$num=$row["SNO"];
							echo "<td><a name='stdnum' href='encoder_view_student_acad_info.php?stdnum=".$num."'>$name</a></td>";
						echo "</tr>";
					}
					echo "</table><br/><br/>";	
						
					
					odbc_close($conn);
				}else{
					die('could not connect');
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