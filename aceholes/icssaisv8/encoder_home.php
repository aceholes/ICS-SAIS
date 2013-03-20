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
		<form name="encoder_home"/>
			<!-- top right po	-->
			<a href ="encoder_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="encoder_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a>
			
			<h3>WELCOME <?php echo $_SESSION["fname"]." ".$_SESSION["lname"]; ?>!</h3><br/><br/>
			
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
			
			<!-- sidebar po ito :) -->
			<a href ="encoder_view_student_acad.php">View User Academic Profile</a><br/>
			<a href ="encoder_add_user.php">Add User</a><br/>
			<a href ="encoder_edit_user.php">Edit User</a><br/>
			<a href ="encoder_delete_users.php">Delete Users</a><br/>
		</form>
	</body>
</html>