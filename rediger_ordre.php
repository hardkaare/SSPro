<?php
require_once 'scripts/functions.php';
require_once 'scripts/connection.php';
require_once 'scripts/session.php';

if ( isset( $_GET[ 'id' ] ) ) {

	$kunde_id = htmlentities( $_GET[ 'id' ] );

	if ( !empty( $kunde_id ) ) {
		queryMysql( "SELECT * FROM ordrer WHERE kunde_ID= $kunde_id" );
		$row = mysqli_fetch_assoc( $results );
	}
}
?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>SSPro - Rediger ordre</title>
</head>

<body>

	<head>
		<meta charset="utf-8">
		<title>SPOT Administration - Rediger ordre</title>
		<link href="styling.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<iframe src="printruter.php" style="display:none;" name="frame"></iframe>
		<!--Siden til print af ruter-->
	</head>

	<body>
		<div class="sidenav">
			<a href="ordrelist.php" class="big_nav">Ordreliste</a>
			<a href="ny_ordre.php" class="small_nav">Tilføj ordre</a>
			<a href="fejlmelding.php" class="big_nav">Fejlmelding</a>
			<a href="ny_fejl.php" class="small_nav">Fejlmeld tavle</a>
			<a href="ruter.php" class="big_nav">Ruter</a>
			<a onclick="frames['frame'].print()" class="small_nav">Print ruteliste</a>
			<a href="scripts/logout.php" class="big_nav">Log ud</a>
		</div>

		<div class="main">
		<h2>Rediger ordre</h2>
		<div class="form-container">
			<form name="rediger_ordre" id="rediger_Ordre" method="post" action="scripts/opdaterData.php" autocomplete="on">
					<div>
						<label for="kunde">Kunde:</label>
						<input type="text" required name="kunde" id="kunde" value="<?php echo $row['kunde']?>">
					</div>
					<div>
						<label for="d_date">Distributionsdato:</label>
						<input type="date" required name="d_date" id="d_date" value="<?php echo $row['d_date']?>">
					</div>
					<div>
						<label for="n_date">Nedtagningsdato:</label>
						<input type="date" name="n_date" id="n_date" value="<?php echo $row['n_date']?>">
					</div>
					<div>
						<label for="rute">Rute:</label>
						<input type="text" required name="rute" id="rute" value="<?php echo $row['rute']?>">
					</div>
					<div>
						<label for="str">Størrelse:</label>
						<input type="text" required name="str" id="str" value="<?php echo $row['str']?>">
					</div>
					<div>
						<label for="antal">Antal:</label>
						<input type="text" required name="antal" id="antal" value="<?php echo $row['antal']?>">
					</div>
					<div>
						<label for="note">Bemærkninger:</label>
						<textarea name="note" id="note" cols="30" rows="1">
							<?php echo $row['note']?>
						</textarea>
					</div>

					<div class="tlfBtnDiv">
						<input type="submit" id="submit" value="Tilføj ændringer">
					</div>
					<input type="hidden" name="kunde_id" value="<?php echo $kunde_id?>">
			</form>
			</div>
		</div>
	</body>

</html>


<?php 
//Luk forbindelsen
mysqli_close($connection);
?>