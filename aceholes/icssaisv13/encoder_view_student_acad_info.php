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
		<form name="encoder_home"/>
			<!-- top right po	-->
			<a href ="encoder_home.php">Home</a>	&nbsp;&nbsp;&nbsp;
			<a href ="encoder_profile.php">Profile</a>	&nbsp;&nbsp;&nbsp;
			<a href ="home.php">Sign-out</a>
			
			<?php
				if(isset($_GET["stdnum"])){

					$_SESSION["sno"]=$_GET["stdnum"];
					echo "<h3>".$_GET["stdnum"]."</h3>";

				}
			?>

			<a href="encoder_view_reg_adviser.php">Adviser</a><br/>
			
		</form>
	</body>
</html>