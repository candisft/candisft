<?php 

	/*$dsn = 'mysql:dbname=chat;host=localhost';
	$user = 'root';
	$password = '';

	try {
		$bdd = new PDO($dsn, $user, $password);
	} catch(Exception $e) {
		echo 'Connection failed: '.$e->getMessage();
	}*/

	$userN = 'root';
	$pass = '';
	$database = 'chat';

	$bdd = mysqli_connect('localhost',$userN,$pass);
	mysqli_select_db($bdd, $database) or die("Unable to select database");

 ?>