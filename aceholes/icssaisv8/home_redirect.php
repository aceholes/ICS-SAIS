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

				$std_result = odbc_exec($conn, "select sno, sfname, slname from student where suser = '".$username."' and spword = '".$password."'");
				while($row1 = odbc_fetch_array($std_result)) {
					$flag1++;
					$sno = $row1["SNO"];
					$sfname = $row1["SFNAME"];
					$slname = $row1["SLNAME"];
				}

				$ins_result = odbc_exec($conn, "select ino, ifname, ilname from instructor where iuser = '".$username."' and ipword = '".$password."'");
				while($row2 = odbc_fetch_array($ins_result)) {
					$flag2++;
					$ino = $row2["INO"];
					$ifname = $row2["IFNAME"];
					$ilname = $row2["ILNAME"];
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
				}else{
					if($flag1>0){
						$_SESSION["no"]=$sno;
						$_SESSION["fname"]=$sfname;
						$_SESSION["lname"]=$slname;
						$_SESSION["login"]=1;
						$_SESSION["user"]="student";
						header("Location: student_home.php");
					}else if($flag2>0){
						$_SESSION["no"]=$ino;
						$_SESSION["fname"]=$ifname;
						$_SESSION["lname"]=$ilname;
						$_SESSION["login"]=1;
						$_SESSION["user"]="instructor";
						header("Location: instructor_home.php");
					}else if($flag3>0){
						$_SESSION["no"]=$eno;
						$_SESSION["fname"]=$efname;
						$_SESSION["lname"]=$elname;
						$_SESSION["login"]=1;
						$_SESSION["user"]="encoder";
						header("Location: encoder_home.php");
					}else if($flag4>0){
						$_SESSION["no"]=$ano;
						$_SESSION["fname"]=$afname;
						$_SESSION["lname"]=$alname;
						$_SESSION["login"]=1;
						$_SESSION["user"]="administrator";
						header("Location: admin_home.php");
					}
				}
				odbc_close($conn);
			}else{
				die('could not connect');
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