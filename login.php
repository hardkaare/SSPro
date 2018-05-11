<?php
require 'scripts/functions.php';
require 'scripts/connection.php';
session_start();
$error = " ";

if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" ) {
	// username and password sent from form 
	global $db;
	$email = mysqli_real_escape_string( $connection, $_POST[ 'email' ] );
	$password = mysqli_real_escape_string( $connection, $_POST[ 'password' ] );

	queryMysql( "SELECT id FROM brugere WHERE email = '$email' and password = '$password'" );
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
	<meta charset="utf-8">
	<title>SPOT Administration - Login</title>
	<link href="styling.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<iframe src="printruter.php" style="display:none;" name="frame"></iframe>
	<!--Siden til print af ruter-->
</head>

<body>

	<div class="main_login">
		<h2>SPOT Administration</h2>
		<p>AAU's interne administrationsystem til SPOT-tavler</p>
	</div>
	<form class="form_login" action="" method="post" accept-charset="utf-8">
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