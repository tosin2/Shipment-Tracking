<?php 
	include('db.php');

	$mail_address = "";
	$pin = $_POST['pin'];
	$comments = $_POST['comments'];

	$query = "SELECT email FROM agent WHERE id = (SELECT agent_id FROM mtrackers.order WHERE pin = '$pin');";
	$result = mysql_query($query) or die("Could not fetch email: " . mysql_error());
	if (mysql_num_rows($result) > 0){
		$data = mysql_fetch_assoc($result);
	 $mail_address = $data['email'];

		mail( "$mail_address", "Recipient Feedback",
	  			$comments, "From: Recipient" );
		
		header( "Location: miniindex3.php" );
	}
	else {
		header("Location: feedback.php?error=1");
	}

 ?>
 