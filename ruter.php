<?php
require 'scripts/functions.php';
require 'scripts/connection.php';
require 'scripts/session.php';
queryMysql( "SELECT * FROM ordrer ORDER BY rute ASC" );
?>

<!doctype html>
<html lang="da">

<head>
	<meta charset="utf-8">
	<title>SPOT Administration - Ruter</title>
	<link href="styling.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<iframe src="printruter.php" style="display:none;" name="frame"></iframe>
	<!--Siden til print af ruter-->
</head>

<body>
	<div class="sidenav">
		<img class="banner" src="img/banner.png" width=100%/>
		<a href="ordrelist.php" class="big_nav">Ordreliste</a>
		<a href="ny_ordre.php" class="small_nav">Tilføj ordre</a>
		<a href="fejlmelding.php" class="big_nav">Fejlmelding</a>
		<a href="ny_fejl.php" class="small_nav">Fejlmeld tavle</a>
		<a href="ruter.php" class="big_nav" id="current">Ruter</a>
		<a onclick="frames['frame'].print()" class="small_nav">Print ruteliste</a>
		<a href="scripts/logout.php" class="big_nav">Log ud</a>
	</div>
	<div class="main">
		<h2>Ruter</h2>
		<table class="orderlist">
			<tr>
				<th class='table'>Kunde</th>
				<th class='table'>Distributionsdato</th>
				<th class='table'>Nedtagningsdato</th>
				<th class='table'>Rute</th>
				<th class='table'>Størrelse</th>
				<th class='table'>Antal</th>
				<th class='table'>Bemærkninger</th>
			</tr>

			<?php
			while ( $row = mysqli_fetch_array( $results ) ) {
				?>
			<tr>
				<?php //Datoer angives som variabler for at kunne konvertere til andet datoformat.
			$d_date = date_create($row['d_date']);
			$n_date = date_create($row['n_date']);
			?>
				<td class='table'>
					<?php echo $row['kunde'] ?>
				</td>
				<td class='table'>
					<?php echo date_format($d_date, 'd/m/y') ?>
				</td>
				<td class='table'>
					<?php echo date_format($n_date, 'd/m/y') ?>
				</td>
				<td class='table'>
					<?php echo $row['rute'] ?>
				</td>
				<td class='table'>
					<?php echo $row['str'] ?>
				</td>
				<td class='table'>
					<?php echo $row['antal'] ?>
				</td>
				<td class='table'>
					<?php echo $row['note'] ?>
				</td>
			</tr>
			<?php } ?>
		</table>
</body>

</html>


<?php
//Luk forbindelse til database
mysqli_close( $connection );
?>
