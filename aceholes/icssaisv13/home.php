<!DOCTYPE HTML>
<?php
	session_start();
	$_SESSION["login"]=0;
	$_SESSION["no"]=0;
	$_SESSION["fname"]="";
	$_SESSION["lname"]="";
	$_SESSION["user"]="";
	$_SESSION["errorlogin"]=0;
	$_SESSION["password_not_found"]=0;
	$_SESSION["password_match_error"]=0;
	/*$_SESSION["signup_number"]="";
	$_SESSION["signup_number2"]="";
	$_SESSION["signup_firstname"]="";
	$_SESSION["signup_lastname"]="";
	$_SESSION["signup_emailaddress"]="";
	$_SESSION["signup_username"]="";*/
	$_SESSION["signup_password_match_error"]=0;
	$_SESSION["edit_basic_info_successful"]=0;
	$_SESSION["change_password_successful"]=0;
	$_SESSION["edit_basic_info_successful"]=0;
	$_SESSION["change_password_successful"]=0;
	$_SESSION["delete_number"]=0;
	$_SESSION["role"]="";
	$_SESSION["delete_user_successful"]=0;
	$_SESSION["deactivated"]=0;
	$_SESSION["pending"]=0;
	$_SESSION["dapproved"]=0;
	$_SESSION["wait"]=0;
	$_SESSION["request_approval_error"]=0;
	$_SESSION["request_approval_number"]=0;
	$_SESSION["approved"]=0;
	$_SESSION["disapproved"]=0;
	$_SESSION["activated"]=0;
	$_SESSION["deactivated"]=0;
	$_SESSION["account_activation_error"]=0;
	$_SESSION["account_activation_number"]=0;
	/*$_SESSION["admin_add_user_number_invalid"]=0;
	$_SESSION["admin_add_user_firstname_invalid"]=0;
	$_SESSION["admin_add_user_lastname_invalid"]=0;
	$_SESSION["admin_add_user_emailaddress_invalid"]=0;
	$_SESSION["admin_add_user_username_invalid"]=0;*/
	$_SESSION["admin_add_user_password_match_error"]=0;
	/*$_SESSION["admin_add_user_role_error"]=0;
	$_SESSION["admin_add_user_number_error"]=0;
	$_SESSION["admin_add_user_firstname_error"]=0;
	$_SESSION["admin_add_user_lastname_error"]=0;
	$_SESSION["admin_add_user_gender_error"]=0;
	$_SESSION["admin_add_user_emailaddress_error"]=0;
	$_SESSION["admin_add_user_username_error"]=0;
	$_SESSION["admin_add_user_password_error"]=0;
	$_SESSION["admin_add_user_password_retype_error"]=0;*/
	$_SESSION["added"]=0;
	$_SESSION["add_no"]="";
	$_SESSION["add_user"]="";
	$_SESSION["add_fname"]="";
	$_SESSION["add_lname"]="";
	$_SESSION["subject_error"]=0;
	$_SESSION["body_error"]=0;
	$_SESSION["message_error"]=0;
	$_SESSION["message_success"]=0;
	$_SESSION["designation_error"]=0;
	$_SESSION["room_error"]=0;
	$_SESSION["recipient_invalid"]=0;
	$_SESSION["sno"]=0;
	$_SESSION["ino"]=0;
	$_SESSION["adviser_invalid"]=0;
	$_SESSION["adviser_add_success"]=0;
	$_SESSION["adviser_delete_success"]=0;
	$_SESSION["adviser_change_success"]=0;
?>

<html>
	<head>
		<title>
			ICS SAIS
		</title>
	</head>
	<body>
		<form name="home" action="home_redirect.php" method="post">
			<h1>ICS SAIS</h1>
				<input type="text" name="login_username" autofocus="autofocus" autocomplete="on" required="required" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]{1,}$" title="Invalid username." placeholder="Username"/> &nbsp;&nbsp;&nbsp;
				<input type="password" name="login_password" required="required" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]{1,}$"  title="Invalid password." placeholder="Password"/>
				<input type="submit" value="Log In" name="login_submit"/><br/><br/><br/>

			<h3>Not a member yet?</h3>
			<a href="home_signup.php">Sign-up here!<a/>

		</form>
	</body>
	
</html>