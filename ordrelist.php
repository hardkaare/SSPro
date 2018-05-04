<?php
require 'scripts/functions.php';
connectdb();
queryMysql( "SELECT * FROM ordrer" );
?>

<!doctype html>
<html lang="da">

<head>
	<meta charset="utf-8">
	<title>SSPro - Ordrelist</title>
	<link href="styling.css" rel="stylesheet" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<body>
<div class="sidenav">
  <a href="ordrelist.php">Orderliste</a>
  <a href="ruter.php">Ruter</a>
  <a href="#">Fejlmelding</a>
  <a href="#">Kontakt</a>
</div>

<div class="main">
<h1>Orderliste</h1>
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
		while ( $row = mysqli_fetch_assoc( $results ) ) {
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
				<form action="scripts/slet_kunde.php" method="post" onClick="return confirm('Er du sikker på du vil slette ordren?')">
					<input type="submit" value="Slet">
					<input type="hidden" name="slettet" value="<?php echo $row['kunde_ID'] ?>">
				</form>
			</td>
		</tr>
		<?php } ?>
	</table>

	<form action="ordre.php" method="POST">
		<input type="submit" value="Tilføj ordre">
	</form>
	<form action="ruter.php" method="get">
		<input type="submit" value="Eksporter ordreliste">
	</form>
</div>
</body>

</html>


<?php
//Luk forbindelse til database
mysqli_close( $connection );
?>