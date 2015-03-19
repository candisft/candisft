<!DOCTYPE html>
<html lang="en">
<head>
	<script src="script/js/jquery-1.11.2.min.js" text="text/javascript"></script>
	<meta charset="UTF-8">
	<title>Super Web Chat</title>
</head>
<body>

	<h2>Login Form</h2>
	<div id="loginDiv">
		<form method="post" action="script/php/UserLogin.php">
			
			<p>Email: </p><input type="email" name="UsermailLogin">
			<p>Password: </p><input type="password" name="UserPasswordLogin">
			<input type="submit" value="Login">

			<?php 
				if(isset($_GET['error'])) {
			?>
			<span class="red">Error</span>
			<?php 
				}
			?>

		</form>
	</div>

	<h2>Sign Up Form</h2>
	<div id="signUpDiv">
		<form method="post" action="script/php/insertUser.php">
			
			<p>Your Name: </p><input type="text" name="UserName">
			<p>Your Email: </p><input type="mail" name="UserMail">
			<p>Password: </p><input type="password" name="UserPassword">
			<input type="submit" value="Sign Up">

			<?php  
			if(isset($_GET['success'])) {
			?>
			<span class="green">User Inserted</span>
			<?php 
			}
			?>

		</form>
	</div>
	
</body>
</html>