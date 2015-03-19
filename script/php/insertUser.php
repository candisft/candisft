<?php 

	include "classes.php";
	$userN = new user();

	if(isset($_POST['UserName']) && isset($_POST['UserMail']) && isset($_POST['UserPassword'])) {
		$userN->setUserName($_POST['UserName']);
		$userN->setUserMail($_POST['UserMail']);
		$userN->setUserPassword($_POST['UserPassword']);
		$userN->InsertUser();

		header ("Location: ../../index.php?success=1");
	}
	
 ?>