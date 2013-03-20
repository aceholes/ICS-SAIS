<!DOCTYPE HTML>
<?php
	
	session_start();
	

	if (isset($_POST["login_submit"])){
		
		$username=$_POST["login_username"];
		$password=$_POST["login_password"];
		
		if(($username=="") || ($password=="")){
			
			$_SESSION["errorlogin"]=1;
			header("Location: home_login_error.php");
			exit;

		}else{
			$flag1=0;
			$flag2=0;
			$flag3=0;
			$flag4=0;
			
			
			$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');
			
			if($conn){

				$std_result = odbc_exec($conn, "select sno, sfname, slname, sappr, sact from student where suser = '".$username."' and spword = '".$password."'");
				while($row1 = odbc_fetch_array($std_result)) {
					$flag1++;
					$sno = $row1["SNO"];
					$sfname = $row1["SFNAME"];
					$slname = $row1["SLNAME"];
					$sappr = $row1["SAPPR"];
					$sact = $row1["SACT"];
				}

				$ins_result = odbc_exec($conn, "select ino, ifname, ilname, iappr, iact from instructor where iuser = '".$username."' and ipword = '".$password."'");
				while($row2 = odbc_fetch_array($ins_result)) {
					$flag2++;
					$ino = $row2["INO"];
					$ifname = $row2["IFNAME"];
					$ilname = $row2["ILNAME"];
					$iappr = $row1["IAPPR"];
					$iact = $row1["IACT"];
				}

				$enc_result = odbc_exec($conn, "select eno, efname, elname from encoder where euser = '".$username."' and epword = '".$password."'");
				while($row3 = odbc_fetch_array($enc_result)) {
					$flag3++;
					$eno = $row3["ENO"];
					$efname = $row3["EFNAME"];
					$elname = $row3["ELNAME"];
				}

				$adm_result = odbc_exec($conn, "select ano, afname, alname from administrator where auser = '".$username."' and apword = '".$password."'");
				while($row4 = odbc_fetch_array($adm_result)) {
					$flag4++;
					$ano = $row4["ANO"];
					$afname = $row4["AFNAME"];
					$alname = $row4["ALNAME"];
				}

				if($flag1==0 && $flag2==0 && $flag3==0 && $flag4==0){
					$_SESSION["errorlogin"]=1;
					header("Location: home_login_error.php");
					exit;
				}else{
					if($flag1>0){
						if($sappr=='Pending' || $sact=='Deactivated'){
							if($sappr=='Pending'){
								$_SESSION["pending"]=1;
								header("Location: home_login_error.php");
								exit;			
							}else if($sact=='Deactivated'){
								$_SESSION["deactivated"]=1;
								header("Location: home_login_error.php");
								exit;			
							}
						}else if($sappr=='Approved' && $sact=='Activated'){
							$_SESSION["no"]=$sno;
							$_SESSION["fname"]=$sfname;
							$_SESSION["lname"]=$slname;
							$_SESSION["login"]=1;
							$_SESSION["user"]="student";
							header("Location: student_home.php");
							exit;
						}
					}else if($flag2>0){
						$_SESSION["no"]=$ino;
						$_SESSION["fname"]=$ifname;
						$_SESSION["lname"]=$ilname;
						$_SESSION["login"]=1;
						$_SESSION["user"]="instructor";
						header("Location: instructor_home.php");
						exit;
					}else if($flag3>0){
						$_SESSION["no"]=$eno;
						$_SESSION["fname"]=$efname;
						$_SESSION["lname"]=$elname;
						$_SESSION["login"]=1;
						$_SESSION["user"]="encoder";
						header("Location: encoder_home.php");
						exit;
					}else if($flag4>0){
						$_SESSION["no"]=$ano;
						$_SESSION["fname"]=$afname;
						$_SESSION["lname"]=$alname;
						$_SESSION["login"]=1;
						$_SESSION["user"]="administrator";
						header("Location: admin_home.php");
						exit;
					}
				}
				odbc_close($conn);
			}else{
				die('could not connect');
			}	


		}

	}else if(isset($_POST["signup_submit"])){
		$role=$_POST["signup_role"];
		$number=$_POST["signup_number"];
		$firstname=$_POST["signup_firstname"];
		$lastname=$_POST["signup_lastname"];
		$gender=$_POST["signup_gender"];
		$emailaddress=$_POST["signup_emailaddress"];
		$username=$_POST["signup_username"];
		$password=$_POST["signup_password"];
		$password2=$_POST["signup_password_retype"];

		if($role=="" || $number=="" || $firstname=="" || $lastname=="" || $gender=="" || $emailaddress=="" || $username=="" || $password=="" || $password2==""){
			if($role=="") $_SESSION["signup_role_error"]=1;
			if($number=="") $_SESSION["signup_number_error"]=1;
			if($firstname=="") $_SESSION["signup_firstname_error"]=1;
			if($lastname=="") $_SESSION["signup_lastname_error"]=1;
			if($gender=="") $_SESSION["signup_gender_error"]=1;
			if($emailaddress=="") $_SESSION["signup_emailaddress_error"]=1;
			if($username=="") $_SESSION["signup_username_error"]=1;
			if($password=="") $_SESSION["signup_password_error"]=1;
			if($password2=="") $_SESSION["signup_password_retype_error"]=1;
			header('Location: home_signup_error.php');
			exit;	
		}else if($role!="" && $number!="" && $firstname!="" && $lastname!="" && $gender!="" && $emailaddress!="" && $username!="" && $password!="" && $password2!=""){
			if(!ctype_digit($number)) $_SESSION["signup_number_invalid"]=1;
			if(!ctype_alpha($firstname)) $_SESSION["signup_firstname_invalid"]=1;
			if(!ctype_alpha($lastname)) $_SESSION["signup_lastname_invalid"]=1;
			//if(!ctype_alpha($emailaddress)) $_SESSION["signup_emailaddress_invalid"]=1;
			if(!ctype_alpha($username)) $_SESSION["signup_username_invalid"]=1;
			if($password!=$password2) $_SESSION["signup_password_match_error"]=1;

			if($_SESSION["signup_number_invalid"]==1 || $_SESSION["signup_firstname_invalid"]==1 || $_SESSION["signup_lastname_invalid"]==1 || $_SESSION["signup_emailaddress_invalid"]==1 || $_SESSION["signup_username_invalid"]==1 || $_SESSION["signup_password_match_error"]==1){
				header('Location: home_signup_error.php');
				exit;
			}else if($_SESSION["signup_number_invalid"]==0 && $_SESSION["signup_firstname_invalid"]==0 && $_SESSION["signup_lastname_invalid"]==0 && $_SESSION["signup_emailaddress_invalid"]==0 && $_SESSION["signup_username_invalid"]==0 && $_SESSION["signup_password_match_error"]==0 && $password==$password2){
				
				$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');
				
				if($conn){
					if($role=="student"){
						odbc_autocommit($conn, TRUE);
						odbc_exec($conn, "insert into student (sno, sfname, slname, sgender, suser, spword, semail, sregdate, sappr, sact) values ('".htmlspecialchars($number)."','".htmlspecialchars($firstname)."','".htmlspecialchars($lastname)."','".htmlspecialchars($gender)."','".htmlspecialchars($username)."','".htmlspecialchars($password)."','".htmlspecialchars($emailaddress)."', sysdate, 'Pending', 'Deactivated')");	
					}else if($role=="instructor"){
						odbc_autocommit($conn, TRUE);
						odbc_exec($conn, "insert into instructor (ino, ifname, ilname, igender, iuser, ipword, iemail, iregdate, iappr, iact) values ('".htmlspecialchars($number)."','".htmlspecialchars($firstname)."','".htmlspecialchars($lastname)."','".htmlspecialchars($gender)."','".htmlspecialchars($username)."','".htmlspecialchars($password)."','".htmlspecialchars($emailaddress)."', sysdate, 'Pending', 'Deactivated')");	
					}
					$_SESSION["no"]=$number;
					$_SESSION["fname"]=$firstname;
					$_SESSION["lname"]=$lastname;
					$_SESSION["user"]=$role;
					header("Location: home_signup_more.php");
					exit;
					
					odbc_close($conn);
				}else{
					die('could not connect');
				} 
			}
		}
	}

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