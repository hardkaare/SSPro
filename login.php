<?php
require 'scripts/functions.php';
require 'scripts/connection.php';
session_start();
$error = "";

if ( $_POST ) {//Hvis der bliver sendt brugernavn og password fra formen
	$email = mysqli_real_escape_string( $connection, $_POST[ 'email' ] );
	$password = mysqli_real_escape_string( $connection, $_POST[ 'password' ] );

	queryMysql( "SELECT id FROM brugere WHERE email = '$email' and password = '$password'" );
	$row = mysqli_fetch_array( $results, MYSQLI_ASSOC );
	$count = mysqli_num_rows( $results );

	if ( $count == 1 ) {//Hvis resultatet af query row er lig med $email og $password, så må der være 1 række i tabellen.
		$_SESSION[ 'login_user' ] = $email;
		header( "location: ordrelist.php" );//Brugeren sendes videre til ordrelisten.
	} else {
		$error = "Din email eller adgangskode er forkert.";//Hvis ikke der er match, ændres fejlmeddelelsen
	}
}
?>

<!DOCTYPE html>
<html lang="da">
<head>
	<meta charset="utf-8">
	<title>SPOT Administration - Login</title>
	<link href="styling.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	<div class="main_login">
		<h1>SPOT Administration</h1>
		<p>AAU's interne administrationsystem til SPOT-tavler</p>
	</div>
	<form class="form_login" method="post" accept-charset="utf-8">
		<h2>Login</h2>
		<input type="hidden" name="submitted" id="submitted" value="1"/>

		<label class="login_label" for="username">Email*:</label>
		<input class="login_input" type="email" name="email" id="email" maxlength="50" required/>

		<label class="login_label" for="password">Password*:</label>
		<input class="login_input" type="password" name="password" id="password" maxlength="50" required/>

		<input class="login_btn" type="submit" name="login_btn" value="Log ind"/>
		<span class="login_error_msg">
			<?php echo $error; ?>
		</span>
	</form>
</body>
</html>
