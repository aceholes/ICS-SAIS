<html>
	<head>
		<title>
		</title>
	</head>
	<body>
		<?php
			$temp="haha";
			$temp2=md5($temp);

			echo $temp2."<br/>".md5($temp2);
		?>
	</body>
</html>