<!DOCTYPE HTML>
<?php
	session_start();
?>
<html>
	<head>
		<title>
			
		</title>
	</head>
	<body>
		<form name="encoder_change_reg_adviser" action="encoder_change_reg_adviser_redirect.php" method="post"/>
			<!-- top right po	-->
			<a href ="encoder_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="encoder_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a><br/>

			<a href="encoder_view_reg_adviser.php"/>Registration</a> &nbsp;&nbsp;&nbsp;
			<b>SP</b><br/>

			<select name="encoder_change_sp_adviser_name">
				<option value="---">---</option>
				<?php
					$flag=0;
					$conn = odbc_connect("Driver={Microsoft ODBC for Oracle};Server=localhost;Uid=tantan;Pwd=tantan;", 'tantan', 'tantan');

					if($conn){
						$result = odbc_exec($conn, "select ifname, ilname from instructor");

						while($row = odbc_fetch_array($result)) {
							$flag++;
						}

						if($flag != 0){
							$result2 = odbc_exec($conn, "select ifname, ilname from instructor");
							echo "<table>";
							while($row2 = odbc_fetch_array($result2)) {
								$name = $row2["IFNAME"]." ".$row2["ILNAME"];
								echo "<option value='".$name."'>$name</option>";	
							}
						}else{
							echo "Nothing to display";
						}

						odbc_close($conn);
					}else{
						die('could not connect');
					}
				?>

			</select><br/>
			Reason/Justification:<br/>
			<textarea name="encoder_change_reg_adviser_reason" cols="50" rows="20" wrap="hard" autocomplete="on" required="required"></textarea><br/><br/>
			<input type="submit" name="encoder_change_sp_adviser_done_submit" value="Done"/><br/><br/>

			<a href="encoder_view_reg_adviser.php">Adviser</a><br/>
		</form>
	</body>
</html>