<!DOCTYPE HTML>
<?php
	session_start();
	
	if (isset($_POST["encoder_add_student_allowed_ge_ah_submit"])){
		$geno=$_POST["encoder_add_student_allowed_ge_ah_no"];
		
		
		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			odbc_autocommit($conn, TRUE);
			odbc_exec($conn, "insert into ge_allowed values ('".($_SESSION["sno"])."', '".($geno)."')");
			
			odbc_close($conn);
			$_SESSION["subject_add_success"]=1;
			header("Location: encoder_view_student_allowed_ge_ah.php");
			exit;
	
		}else{
			die('could not connect');
		}	
	}else if (isset($_POST["encoder_add_student_allowed_ge_mst_submit"])){
		$geno=$_POST["encoder_add_student_allowed_ge_mst_no"];
		
		
		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			odbc_autocommit($conn, TRUE);
			odbc_exec($conn, "insert into ge_allowed values ('".($_SESSION["sno"])."', '".($geno)."')");
			
			odbc_close($conn);
			$_SESSION["subject_add_success"]=1;
			header("Location: encoder_view_student_allowed_ge_mst.php");
			exit;
	
		}else{
			die('could not connect');
		}	
	}else if (isset($_POST["encoder_add_student_allowed_ge_ssp_submit"])){
		$geno=$_POST["encoder_add_student_allowed_ge_ssp_no"];
		
		
		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			odbc_autocommit($conn, TRUE);
			odbc_exec($conn, "insert into ge_allowed values ('".($_SESSION["sno"])."', '".($geno)."')");
			
			odbc_close($conn);
			$_SESSION["subject_add_success"]=1;
			header("Location: encoder_view_student_allowed_ge_ssp.php");
			exit;
	
		}else{
			die('could not connect');
		}	
	}else if (isset($_POST["encoder_add_student_allowed_elective_submit"])){
		$elno=$_POST["encoder_add_student_allowed_elective_no"];
		
		
		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			odbc_autocommit($conn, TRUE);
			odbc_exec($conn, "insert into elective_allowed values ('".($_SESSION["sno"])."', '".($elno)."')");
			
			odbc_close($conn);
			$_SESSION["subject_add_success"]=1;
			header("Location: encoder_view_student_allowed_elective.php");
			exit;
	
		}else{
			die('could not connect');
		}	
	}else if (isset($_GET["geno_ah"])){
		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			odbc_autocommit($conn, TRUE);
			odbc_exec($conn, "delete from ge_allowed where sno = '".($_SESSION["sno"])."' and geno =  '".($_GET["geno_ah"])."'");
			
			odbc_close($conn);
			$_SESSION["subject_delete_success"]=1;
			header("Location: encoder_view_student_allowed_ge_ah.php");
			exit;
	
		}else{
			die('could not connect');
		}	
	}else if (isset($_GET["geno_mst"])){
		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			odbc_autocommit($conn, TRUE);
			odbc_exec($conn, "delete from ge_allowed where sno = '".($_SESSION["sno"])."' and geno =  '".($_GET["geno_mst"])."'");
			
			odbc_close($conn);
			$_SESSION["subject_delete_success"]=1;
			header("Location: encoder_view_student_allowed_ge_mst.php");
			exit;
	
		}else{
			die('could not connect');
		}	
	}else if (isset($_GET["geno_ssp"])){
		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			odbc_autocommit($conn, TRUE);
			odbc_exec($conn, "delete from ge_allowed where sno = '".($_SESSION["sno"])."' and geno =  '".($_GET["geno_ssp"])."'");
			
			odbc_close($conn);
			$_SESSION["subject_delete_success"]=1;
			header("Location: encoder_view_student_allowed_ge_ssp.php");
			exit;
	
		}else{
			die('could not connect');
		}	
	}else if (isset($_GET["elective"])){
		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			odbc_autocommit($conn, TRUE);
			odbc_exec($conn, "delete from elective_allowed where sno = '".($_SESSION["sno"])."' and elno =  '".($_GET["elective"])."'");
			
			odbc_close($conn);
			$_SESSION["subject_delete_success"]=1;
			header("Location: encoder_view_student_allowed_elective.php");
			exit;
	
		}else{
			die('could not connect');
		}	
	}


?>