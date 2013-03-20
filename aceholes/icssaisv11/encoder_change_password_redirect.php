<!DOCTYPE HTML>
<?php
	session_start();

	if(isset($_POST["encoder_change_password_submit"])){
		$old=$_POST["encoder_password_old"];
		$new=$_POST["encoder_password_new"];
		$new2=$_POST["encoder_password_new_retype"];
		$flag=0;
		$temp="";

		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			if($old!=""){
				$result=odbc_exec($conn, "select epword from encoder where efname = '".htmlspecialchars($_SESSION['fname'])."' and elname = '".htmlspecialchars($_SESSION['lname'])."'");

				while($row = odbc_fetch_array($result)) {
					$temp=$row["EPWORD"];
				}

				if($temp!=$old){
					$_SESSION["password_not_found"]=1;
				}else{
					$_SESSION["password_not_found"]=0;
				}
			}else{
				$_SESSION["password_old_error"]=1;
			}

			if($new=="") $_SESSION['password_new_error']=1;
			if($new2=="") $_SESSION['password_new_retype_error']=1;

			if($new=="" || $new2=="" || $old=="" || $_SESSION["password_not_found"]==1){
				header('Location: encoder_change_password.php');
				exit;	
			}
			
			if($new!="" && $new2!="" && $_SESSION["password_not_found"]==0){
				if($new!=$new2){
					$_SESSION["password_match_error"]=1;
					header('Location: encoder_change_password.php');
					exit;		
				}else{
					odbc_autocommit($conn, TRUE);
					odbc_exec($conn, "update encoder set epword = '".htmlspecialchars($new)."' where efname = '".htmlspecialchars($_SESSION['fname'])."' and elname = '".htmlspecialchars($_SESSION['lname'])."'");
					$_SESSION["change_password_successful"]=1;
					odbc_close($conn);
					header("Location: encoder_profile.php");
					exit;
				}
			}


		}else{
			die('could not connect');
		}
		
	}
?>
