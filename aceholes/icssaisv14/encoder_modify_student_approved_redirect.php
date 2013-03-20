<!DOCTYPE HTML>
<?php
	session_start();
	
	if (isset($_POST["encoder_add_student_approved_ge_ah_submit"])){
		$geno=$_POST["encoder_add_student_approved_ge_ah_no"];
		$gasem=$_POST["encoder_add_student_approved_ge_ah_sem"];
		$gayear=$_POST["encoder_add_student_approved_ge_ah_year"];
		
		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			odbc_autocommit($conn, TRUE);
			odbc_exec($conn, "insert into ge_approved values ('".($_SESSION["sno"])."', '".($geno)."', '".($gasem)."', '".($gayear)."')");
			
			odbc_close($conn);
			$_SESSION["subject_add_success"]=1;
			header("Location: encoder_view_student_approved_ge_ah.php");
			exit;
	
		}else{
			die('could not connect');
		}	
	}else if (isset($_POST["encoder_add_student_approved_ge_mst_submit"])){
		$geno=$_POST["encoder_add_student_approved_ge_mst_no"];
		$gasem=$_POST["encoder_add_student_approved_ge_mst_sem"];
		$gayear=$_POST["encoder_add_student_approved_ge_mst_year"];
		
		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			odbc_autocommit($conn, TRUE);
			odbc_exec($conn, "insert into ge_approved values ('".($_SESSION["sno"])."', '".($geno)."', '".($gasem)."', '".($gayear)."')");
			
			odbc_close($conn);
			$_SESSION["subject_add_success"]=1;
			header("Location: encoder_view_student_approved_ge_mst.php");
			exit;
	
		}else{
			die('could not connect');
		}	
	}else if (isset($_POST["encoder_add_student_approved_ge_ssp_submit"])){
		$geno=$_POST["encoder_add_student_approved_ge_ssp_no"];
		$gasem=$_POST["encoder_add_student_approved_ge_ssp_sem"];
		$gayear=$_POST["encoder_add_student_approved_ge_ssp_year"];
		
		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			odbc_autocommit($conn, TRUE);
			odbc_exec($conn, "insert into ge_approved values ('".($_SESSION["sno"])."', '".($geno)."', '".($gasem)."', '".($gayear)."')");
			
			odbc_close($conn);
			$_SESSION["subject_add_success"]=1;
			header("Location: encoder_view_student_approved_ge_ssp.php");
			exit;
	
		}else{
			die('could not connect');
		}	
	}else if (isset($_POST["encoder_add_student_approved_elective_submit"])){
		$elno=$_POST["encoder_add_student_approved_elective_no"];
		$easem=$_POST["encoder_add_student_approved_elective_sem"];
		$eayear=$_POST["encoder_add_student_approved_elective_year"];
		
		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			odbc_autocommit($conn, TRUE);
			odbc_exec($conn, "insert into elective_approved values ('".($_SESSION["sno"])."', '".($elno)."', '".($easem)."', '".($eayear)."')");
			
			odbc_close($conn);
			$_SESSION["subject_add_success"]=1;
			header("Location: encoder_view_student_approved_elective.php");
			exit;
	
		}else{
			die('could not connect');
		}	
	}else if (isset($_GET["geno_ah"])){
		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			odbc_autocommit($conn, TRUE);
			odbc_exec($conn, "delete from ge_approved where sno = '".($_SESSION["sno"])."' and geno =  '".($_GET["geno_ah"])."'");
			
			odbc_close($conn);
			$_SESSION["subject_delete_success"]=1;
			header("Location: encoder_view_student_approved_ge_ah.php");
			exit;
	
		}else{
			die('could not connect');
		}	
	}else if (isset($_GET["geno_mst"])){
		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			odbc_autocommit($conn, TRUE);
			odbc_exec($conn, "delete from ge_approved where sno = '".($_SESSION["sno"])."' and geno =  '".($_GET["geno_mst"])."'");
			
			odbc_close($conn);
			$_SESSION["subject_delete_success"]=1;
			header("Location: encoder_view_student_approved_ge_mst.php");
			exit;
	
		}else{
			die('could not connect');
		}	
	}else if (isset($_GET["geno_ssp"])){
		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			odbc_autocommit($conn, TRUE);
			odbc_exec($conn, "delete from ge_approved where sno = '".($_SESSION["sno"])."' and geno =  '".($_GET["geno_ssp"])."'");
			
			odbc_close($conn);
			$_SESSION["subject_delete_success"]=1;
			header("Location: encoder_view_student_approved_ge_ssp.php");
			exit;
	
		}else{
			die('could not connect');
		}	
	}else if (isset($_GET["elective"])){
		$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

		if($conn){
			odbc_autocommit($conn, TRUE);
			odbc_exec($conn, "delete from elective_approved where sno = '".($_SESSION["sno"])."' and elno =  '".($_GET["elective"])."'");
			
			odbc_close($conn);
			$_SESSION["subject_delete_success"]=1;
			header("Location: encoder_view_student_approved_elective.php");
			exit;
	
		}else{
			die('could not connect');
		}	
	}
?>