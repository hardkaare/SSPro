<?php
require 'scripts/functions.php';
connectdb();
session_start();
if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" ) {
	// username and password sent from form 
	global $db;
	$email = mysqli_real_escape_string( $connection, $_POST[ 'email' ] );
	$password = mysqli_real_escape_string( $connection, $_POST[ 'password' ] );

	queryMysql("SELECT id FROM brugere WHERE email = '$email' and password = '$password'");	
	$row = mysqli_fetch_array( $results, MYSQLI_ASSOC );
	global $active;
	$active = $row[ 'active' ];

	$count = mysqli_num_rows( $results );

	// If result matched $myusername and $mypassword, table row must be 1 row

	if ( $count == 1 ) {
		$_SESSION[ 'login_user' ] = $email;

		header( "location: ordrelist.php" );
	} else {
		$error = "Your Login Name or Password is invalid";
	}
}
?>

<!DOCTYPE html>
<html lang="da">

<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>

<body>
	<form id="login" action="" method="post" accept-charset="utf-8">
		<fieldset>
			<legend>Login</legend>
			<input type="hidden" name="submitted" id="submitted" value="1"/>

			<label for="username">Brugernavn*:</label>
			<input type="text" name="email" id="email" maxlength="50" required/>

			<label for="password">Password*:</label>
			<input type="text" name="password" id="password" maxlength="50" required/>

			<input type="submit" name="login_btn" value="Log ind"/>
		</fieldset>
	</form>

</body>

</html>