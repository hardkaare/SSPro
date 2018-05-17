<?php
require 'scripts/functions.php';
require 'scripts/connection.php';
require 'scripts/session.php';
queryMysql( "SELECT * FROM ordrer" );
?>

<!doctype html>
<html lang="da">
<head>
	<meta charset="utf-8">
	<title>SPOT Administration - Ordreliste</title>
	<link href="styling.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<iframe src="printruter.php" style="display:none;" name="frame"></iframe>
	<!--Siden til print af ruter-->
</head>


<body>
	<div class="sidenav">
		<a href="ordrelist.php" class="big_nav" id="current">Ordreliste</a>
		<a href="ny_ordre.php" class="small_nav">Tilføj ordre</a>
		<a href="fejlmelding.php" class="big_nav">Fejlmelding</a>
		<a href="ny_fejl.php" class="small_nav">Fejlmeld tavle</a>
		<a href="ruter.php" class="big_nav">Ruter</a>
		<a onclick="frames['frame'].print()" class="small_nav">Print ruteliste</a>
		<a href="scripts/logout.php" class="big_nav">Log ud</a>
	</div>

	<div class="main">
	<h2>Ordreliste</h2>
		<table>
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
				<td id="tdBtn">
					<a href="rediger_ordre.php?id=<?php echo $row['kunde_ID']?>" class="butRed"><input type="button" value="Rediger"></a>
					</input>
				</td>
				<td id="tdBtn">
					<form action="main/scripts/slet_kunde.php" method="post" onClick="return confirm('Er du sikker på du vil slette ordren?')">
						<input type="submit" value="Slet">
						<input type="hidden" name="slettet" value="<?php echo $row['kunde_ID'] ?>">
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
