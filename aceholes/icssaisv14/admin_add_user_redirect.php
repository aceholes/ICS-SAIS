<!DOCTYPE HTML>
<?php
	session_start();

	if(isset($_POST["admin_add_user_submit"])){
		$role=$_POST["admin_add_user_role"];
		$number1=$_POST["admin_add_user_number1"];
		$number2=$_POST["admin_add_user_number2"];
		$firstname=$_POST["admin_add_user_firstname"];
		$lastname=$_POST["admin_add_user_lastname"];
		$gender=$_POST["admin_add_user_gender"];
		$emailaddress=$_POST["admin_add_user_emailaddress"];
		$username=$_POST["admin_add_user_username"];
		$password=$_POST["admin_add_user_password"];
		$password2=$_POST["admin_add_user_password_retype"];

		if($role=="student"){
			if($password != $password2){
				$_SESSION["admin_add_user_password_match_error"]=1;
				/*$_SESSION["signup_number"]=$number;
				$_SESSION["signup_number2"]=$number2;
				$_SESSION["signup_firstname"]=$firstname;
				$_SESSION["signup_lastname"]=$lastname;
				$_SESSION["signup_emailaddress"]=$emailaddress;
				$_SESSION["signup_username"]=$username;*/
				header("Location: admin_add_user.php");
				exit;
			}else{
				$num=$number1."-".$number2;
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');
				
				if($conn){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "insert into student (sno, sfname, slname, sgender, suser, spword, semail, sregdate, sappr, sact) values ('".($num)."','".($firstname)."','".($lastname)."','".($gender)."','".($username)."','".($password)."','".($emailaddress)."', sysdate, 'Approved', 'Activated')");	
					
					$_SESSION["add_no"]=$num;
					$_SESSION["add_fname"]=$firstname;
					$_SESSION["add_lname"]=$lastname;
					$_SESSION["add_user"]=$role;
					header("Location: admin_add_user_student_more.php");
					exit;
					
					odbc_close($conn);
				}else{
					die('could not connect');
				} 
			}
		}else if($role=="instructor"){
			if($password != $password2){
				$_SESSION["admin_add_user_password_match_error"]=1;
				/*$_SESSION["signup_number"]=$number;
				$_SESSION["signup_number2"]=$number2;
				$_SESSION["signup_firstname"]=$firstname;
				$_SESSION["signup_lastname"]=$lastname;
				$_SESSION["signup_emailaddress"]=$emailaddress;
				$_SESSION["signup_username"]=$username;*/
				header("Location: admin_add_user.php");
				exit;
			}else{
				$num=$number1."-".$number2;
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');
				
				if($conn){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "insert into instructor (ino, ifname, ilname, igender, iuser, ipword, iemail, iregdate, iappr, iact) values ('".($num)."','".($firstname)."','".($lastname)."','".($gender)."','".($username)."','".($password)."','".($emailaddress)."', sysdate, 'Approved', 'Activated')");	
					
					$_SESSION["add_no"]=$num;
					$_SESSION["add_fname"]=$firstname;
					$_SESSION["add_lname"]=$lastname;
					$_SESSION["add_user"]=$role;
					header("Location: admin_add_user_instructor_more.php");
					exit;
					
					odbc_close($conn);
				}else{
					die('could not connect');
				} 
			}
		}else if($role=="encoder"){
			if($password != $password2){
				$_SESSION["admin_add_user_password_match_error"]=1;
				/*$_SESSION["signup_number"]=$number;
				$_SESSION["signup_number2"]=$number2;
				$_SESSION["signup_firstname"]=$firstname;
				$_SESSION["signup_lastname"]=$lastname;
				$_SESSION["signup_emailaddress"]=$emailaddress;
				$_SESSION["signup_username"]=$username;*/
				header("Location: admin_add_user.php");
				exit;
			}else{
				$num=$number1."-".$number2;
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');
				
				if($conn){
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "insert into encoder (eno, efname, elname, egender, euser, epword, eemail, eregdate, eact) values ('".($num)."','".($firstname)."','".($lastname)."','".($gender)."','".($username)."','".($password)."','".($emailaddress)."', sysdate, 'Activated')");
					
					$_SESSION["add_no"]=$num;
					$_SESSION["add_fname"]=$firstname;
					$_SESSION["add_lname"]=$lastname;
					$_SESSION["add_user"]=$role;
					header("Location: admin_add_user_encoder_more.php");
					exit;
					
					odbc_close($conn);
				}else{
					die('could not connect');
				} 
			}
		}

		
	}
?>