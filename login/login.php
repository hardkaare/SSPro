<?php 
	require 'scripts/functions.php';
	connectdb();
	session_start();
?>

<!DOCTYPE html>
<html lang="da">

<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>

<body>
	<form id="login" action='login/process_login.php' method="post" accept-charset="utf-8">
		<fieldset>
			<legend>Login</legend>
			<input type="hidden" name="submitted" id="submitted" value="1"/>

			<label for="username">Brugernavn*:</label>
			<input type="text" name="username" id="username" maxlength="20" required/>

			<label for="password">Password*:</label>
			<input type="text" name="password" id="password" maxlength="20" required/>

			<input type="submit" name="login_btn" value="Log ind"/>
		</fieldset>
	</form>

</body>

</html>