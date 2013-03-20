<!DOCTYPE HTML>
<?php
	
	session_start();
	

	if (isset($_POST["login_submit"])){
		
		$username=$_POST["login_username"];
		$password=$_POST["login_password"];
		
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
				$iappr = $row2["IAPPR"];
				$iact = $row2["IACT"];
			}

			$enc_result = odbc_exec($conn, "select eno, efname, elname, eact from encoder where euser = '".$username."' and epword = '".$password."'");
			while($row3 = odbc_fetch_array($enc_result)) {
				$flag3++;
				$eno = $row3["ENO"];
				$efname = $row3["EFNAME"];
				$elname = $row3["ELNAME"];
				$eact = $row3["EACT"];
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
					if($sappr=='Pending' || $sappr=='Disapproved' || $sact=='Deactivated'){
						if($sappr=='Pending'){
							$_SESSION["pending"]=1;
							header("Location: home_login_error.php");
							exit;			
						}else if($sappr=='Disapproved'){
							$_SESSION["dapproved"]=1;
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
						
						odbc_autocommit($conn, TRUE);
						odbc_exec($conn, "insert into student_log values ('".($sno)."','".$sfname." ".$slname." logs in."."',sysdate)");

						header("Location: student_home.php");
						exit;
					}
				}else if($flag2>0){
					if($iappr=='Pending' || $iappr=='Disapproved' || $iact=='Deactivated'){
						if($iappr=='Pending'){
							$_SESSION["pending"]=1;
							header("Location: home_login_error.php");
							exit;			
						}else if($iappr=='Disapproved'){
							$_SESSION["dapproved"]=1;
							header("Location: home_login_error.php");
							exit;			
						}else if($iact=='Deactivated'){
							$_SESSION["deactivated"]=1;
							header("Location: home_login_error.php");
							exit;			
						}
					}else if($iappr=='Approved' && $iact=='Activated'){
						$_SESSION["no"]=$ino;
						$_SESSION["fname"]=$ifname;
						$_SESSION["lname"]=$ilname;
						$_SESSION["login"]=1;
						$_SESSION["user"]="instructor";

						odbc_autocommit($conn, TRUE);
						odbc_exec($conn, "insert into instructor_log values ('".($ino)."','".$ifname." ".$ilname." logs in."."',sysdate)");

						header("Location: instructor_home.php");
						exit;
					}
				}else if($flag3>0){
					if($eact=='Deactivated'){
						$_SESSION["deactivated"]=1;
						header("Location: home_login_error.php");
						exit;	
					}else{
						$_SESSION["no"]=$eno;
						$_SESSION["fname"]=$efname;
						$_SESSION["lname"]=$elname;
						$_SESSION["login"]=1;
						$_SESSION["user"]="encoder";

						odbc_autocommit($conn, TRUE);
						odbc_exec($conn, "insert into encoder_log values ('".($eno)."','".$efname." ".$elname." logs in."."',sysdate)");

						header("Location: encoder_home.php");
						exit;
					}
					
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