<!DOCTYPE HTML>
<?php
	
	session_start();
	
	if(isset($_POST["signup_submit"])){
		$role=$_POST["signup_role"];
		$number1=$_POST["signup_number1"];
		$number2=$_POST["signup_number2"];
		$firstname=$_POST["signup_firstname"];
		$lastname=$_POST["signup_lastname"];
		$gender=$_POST["signup_gender"];
		$emailaddress=$_POST["signup_emailaddress"];
		$username=$_POST["signup_username"];
		$password=$_POST["signup_password"];
		$password2=$_POST["signup_password_retype"];

		if($role=='student'){
			if($password != $password2){
				$_SESSION["signup_password_match_error"]=1;
				/*$_SESSION["signup_number"]=$number;
				$_SESSION["signup_number2"]=$number2;
				$_SESSION["signup_firstname"]=$firstname;
				$_SESSION["signup_lastname"]=$lastname;
				$_SESSION["signup_emailaddress"]=$emailaddress;
				$_SESSION["signup_username"]=$username;*/
				header("Location: home_signup.php");
				exit;
			}else{
				$num=$number1."-".$number2;
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');
					
				if($conn){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "insert into student (sno, sfname, slname, sgender, suser, spword, semail, sregdate, sappr, sact) values ('".($num)."','".($firstname)."','".($lastname)."','".($gender)."','".($username)."','".($password)."','".($emailaddress)."', sysdate, 'Pending', 'Deactivated')");	
					$_SESSION["no"]=$number;
					$_SESSION["fname"]=$firstname;
					$_SESSION["lname"]=$lastname;
					$_SESSION["user"]=$role;
					header("Location: home_signup_student_more.php");
					exit;

					odbc_close($conn);
				}else{
					die('could not connect');
				}
			}
		}else if($role=='instructor'){
			if($password != $password2){
				$_SESSION["signup_password_match_error"]=1;
				/*$_SESSION["signup_number"]=$number;
				$_SESSION["signup_number2"]=$number2;
				$_SESSION["signup_firstname"]=$firstname;
				$_SESSION["signup_lastname"]=$lastname;
				$_SESSION["signup_emailaddress"]=$emailaddress;
				$_SESSION["signup_username"]=$username;*/
				header("Location: home_signup.php");
				exit;
			}else{
				$num=$number1."-".$number2;
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');
					
				if($conn){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "insert into instructor (ino, ifname, ilname, igender, iuser, ipword, iemail, iregdate, iappr, iact) values ('".($num)."','".($firstname)."','".($lastname)."','".($gender)."','".($username)."','".($password)."','".($emailaddress)."', sysdate, 'Pending', 'Deactivated')");	
					$_SESSION["no"]=$number;
					$_SESSION["fname"]=$firstname;
					$_SESSION["lname"]=$lastname;
					$_SESSION["user"]=$role;
					header("Location: home_signup_instructor_more.php");
					exit;

					odbc_close($conn);
				}else{
					die('could not connect');
				}
			}
		}

		
	}
?>