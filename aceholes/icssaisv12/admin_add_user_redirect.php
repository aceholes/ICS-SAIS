<!DOCTYPE HTML>
<?php
	session_start();

	if(isset($_POST["admin_add_user_submit"])){
		$role=$_POST["admin_add_user_role"];
		$number=$_POST["admin_add_user_number"];
		$firstname=$_POST["admin_add_user_firstname"];
		$lastname=$_POST["admin_add_user_lastname"];
		$gender=$_POST["admin_add_user_gender"];
		$emailaddress=$_POST["admin_add_user_emailaddress"];
		$username=$_POST["admin_add_user_username"];
		$password=$_POST["admin_add_user_password"];
		$password2=$_POST["admin_add_user_password_retype"];

		if($role=="" || $number=="" || $firstname=="" || $lastname=="" || $gender=="" || $emailaddress=="" || $username=="" || $password=="" || $password2==""){
			if($role=="") $_SESSION["admin_add_user_role_error"]=1;
			if($number=="") $_SESSION["admin_add_user_number_error"]=1;
			if($firstname=="") $_SESSION["admin_add_user_firstname_error"]=1;
			if($lastname=="") $_SESSION["admin_add_user_lastname_error"]=1;
			if($gender=="") $_SESSION["admin_add_user_gender_error"]=1;
			if($emailaddress=="") $_SESSION["admin_add_user_emailaddress_error"]=1;
			if($username=="") $_SESSION["admin_add_user_username_error"]=1;
			if($password=="") $_SESSION["admin_add_user_password_error"]=1;
			if($password2=="") $_SESSION["admin_add_user_password_retype_error"]=1;
			header('Location: admin_add_user.php');
			exit;	
		}else if($role!="" && $number!="" && $firstname!="" && $lastname!="" && $gender!="" && $emailaddress!="" && $username!="" && $password!="" && $password2!=""){
			if(!ctype_digit($number)) $_SESSION["admin_add_user_number_invalid"]=1;
			if(!ctype_alpha($firstname)) $_SESSION["admin_add_user_firstname_invalid"]=1;
			if(!ctype_alpha($lastname)) $_SESSION["admin_add_user_lastname_invalid"]=1;
			//if(!ctype_alpha($emailaddress)) $_SESSION["admin_add_user_emailaddress_invalid"]=1;
			if(!ctype_alpha($username)) $_SESSION["admin_add_user_username_invalid"]=1;
			if($password!=$password2) $_SESSION["admin_add_user_password_match_error"]=1;

			if($_SESSION["admin_add_user_number_invalid"]==1 || $_SESSION["admin_add_user_firstname_invalid"]==1 || $_SESSION["admin_add_user_lastname_invalid"]==1 || $_SESSION["admin_add_user_emailaddress_invalid"]==1 || $_SESSION["admin_add_user_username_invalid"]==1 || $_SESSION["admin_add_user_password_match_error"]==1){
				header('Location: admin_add_user.php');
				exit;
			}else if($_SESSION["admin_add_user_number_invalid"]==0 && $_SESSION["admin_add_user_firstname_invalid"]==0 && $_SESSION["admin_add_user_lastname_invalid"]==0 && $_SESSION["admin_add_user_emailaddress_invalid"]==0 && $_SESSION["admin_add_user_username_invalid"]==0 && $_SESSION["admin_add_user_password_match_error"]==0 && $password==$password2){
				
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');
				
				if($conn){
					if($role=="student"){
						odbc_autocommit($conn, TRUE);
						odbc_exec($conn, "insert into student (sno, sfname, slname, sgender, suser, spword, semail, sregdate, sappr, sact) values ('".htmlspecialchars($number)."','".htmlspecialchars($firstname)."','".htmlspecialchars($lastname)."','".htmlspecialchars($gender)."','".htmlspecialchars($username)."','".htmlspecialchars($password)."','".htmlspecialchars($emailaddress)."', sysdate, 'Approved', 'Activated')");	
					}else if($role=="instructor"){
						odbc_autocommit($conn, TRUE);
						odbc_exec($conn, "insert into instructor (ino, ifname, ilname, igender, iuser, ipword, iemail, iregdate, iappr, iact) values ('".htmlspecialchars($number)."','".htmlspecialchars($firstname)."','".htmlspecialchars($lastname)."','".htmlspecialchars($gender)."','".htmlspecialchars($username)."','".htmlspecialchars($password)."','".htmlspecialchars($emailaddress)."', sysdate, 'Approved', 'Activated')");	
					}else if($role=="encoder"){
						odbc_autocommit($conn, TRUE);
						odbc_exec($conn, "insert into encoder (eno, efname, elname, egender, euser, epword, eemail, eregdate, eact) values ('".htmlspecialchars($number)."','".htmlspecialchars($firstname)."','".htmlspecialchars($lastname)."','".htmlspecialchars($gender)."','".htmlspecialchars($username)."','".htmlspecialchars($password)."','".htmlspecialchars($emailaddress)."', sysdate, 'Activated')");	
					}
					$_SESSION["no"]=$number;
					$_SESSION["add_fname"]=$firstname;
					$_SESSION["add_lname"]=$lastname;
					$_SESSION["user"]=$role;
					header("Location: admin_add_user_more.php");
					exit;
					
					odbc_close($conn);
				}else{
					die('could not connect');
				} 
			}
		}
	}

?>