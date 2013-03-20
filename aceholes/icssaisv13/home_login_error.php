<!DOCTYPE HTML>
<?php
	session_start();
	if($_SESSION['login']==1 && $_SESSION['user']=="student"){
		header('Location: student_home.php');
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
			ICS SAIS
		</title>
	</head>
	<body>
		<form name="home_login_error" action="home_redirect.php" method="post">
			<h1>ICS SAIS</h1>
			<input type="text" name="login_username" autofocus="autofocus" autocomplete="on" required="required" placeholder="Username"/> &nbsp;&nbsp;&nbsp;
			<input type="password" name="login_password" required="required" placeholder="Password"/>
			<input type="submit" value="Log In" name="login_submit"/><br/><br/><br/>
			<?php
				if($_SESSION['errorlogin']==1){
					echo "Invalid account. Please try again.";
					$_SESSION['errorlogin']=0;
				}else if($_SESSION['pending']==1){
					echo "Your registration request is not yet approved.";
					$_SESSION['pending']=0;
				}else if($_SESSION['dapproved']==1){
					echo "Your registration request was disapproved.";
					$_SESSION['dapproved']=0;
				}else if($_SESSION['deactivated']==1){
					echo "Your account is deactivated.";
					$_SESSION['deactivated']=0;
				}else if($_SESSION['wait']==1){
					echo "You should wait for the administrator to approve your registration request.";
					$_SESSION['wait']=0;
				}

				
			?>
			<h3>Not a member yet?</h3>
			<a href="home_signup.php">Sign-up here!<a/>
		</form>
	</body>
	
</html>