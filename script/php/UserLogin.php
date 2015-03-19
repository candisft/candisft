<?php 

	include "classes.php";

	if(isset($_POST['UserMailLogin']) && isset($_POST['UserPasswordLogin'])) {
		$userN = new user();
		$userN->setUserMail($_POST['UserMailLogin']);
		$userN->setUserPassword($_POST['UserPasswordLogin']);
		$userN->UserLogin();
	}

 ?>