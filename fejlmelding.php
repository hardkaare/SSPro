<?php
require 'scripts/functions.php';
require 'scripts/connection.php';
require 'scripts/session.php';
queryMysql( "SELECT * FROM fejlmelding" );
?>

<!doctype html>
<html lang="da">

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
		<a href="fejlmelding.php" class="big_nav" id="current">Fejlmelding</a>
		<a href="ny_fejl.php" class="small_nav">Fejlmeld tavle</a>
		<a href="ruter.php" class="big_nav">Ruter</a>
		<a onclick="frames['frame'].print()" class="small_nav">Print ruteliste</a>
		<a href="scripts/logout.php" class="big_nav">Log ud</a>
	</div>

	<div class="main">
		<h2>Fejlmeldinger</h2>
		<table class="orderlist">
			<tr>
				<th class='table'>Adresse</th>
				<th class='table'>Etage</th>
				<th class='table'>Tavle</th>
				<th class='table'>Fejlmeldt dato</th>
				<th class='table'>Bemærkninger</th>
			</tr>

			<?php
			while ( $row = mysqli_fetch_assoc( $results ) ) {
				?>
			<tr>
				<?php //Datoer angives som variabler for at kunne konvertere til andet datoformat.
			$f_date = date_create($row['f_date']);
		?>
				<td class='table'>
					<?php echo $row['adresse'] ?>
				</td>
				<td class='table'>
					<?php echo $row['etage'] ?>
				</td>
				<td class='table'>
					<?php echo $row['tavlenr'] ?>
				</td>
				<td class='table'>
					<?php echo date_format($f_date, 'd/m/y') ?>
				</td>
				<td class='table'>
					<?php echo $row['note'] ?>
				</td>
				<td id="tdBtn">
					<form class="action_form" action="scripts/slet_fejl.php" method="post" onClick="return confirm('Er du sikker på du vil slette fejlmeldingen?')">
						<input type="submit" value="Afklaret">
						<input type="hidden" name="slettet" value="<?php echo $row['fejl_ID'] ?>">
					</form>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
</body>

</html>
<?php
//Luk forbindelse til database
mysqli_close( $connection );
?>