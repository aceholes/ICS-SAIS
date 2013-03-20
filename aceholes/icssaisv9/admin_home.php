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
		<form name="admin_home"/>
			<!-- top right po	-->
			<a href ="admin_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="admin_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
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
			<a href ="admin_view_users.php">View Users</a><br/>
			<a href ="admin_add_user.php">Add User</a><br/>
			<a href ="admin_request_approval.php">Registration Requests Approval</a><br/>
			<a href ="admin_account_activation.php">Account Activation</a><br/>
			<a href ="admin_log_files.php">User Log Files</a><br/>
		</form>
	</body>
</html>