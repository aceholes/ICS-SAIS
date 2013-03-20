<?php

	if(isset($_POST["student_messages_sentbox_submit"])){
		$check[]=$_POST["sentbox[]"];
		$i=0;

		for($i=0; $i < sizeof($check); $i++){
			echo $check[$i]."<br/>";
		}
	}

?>