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
	<title>SPOT Administration - Print Ruteliste</title>
	<link href="print.css" rel="stylesheet" type="text/css">
</head>

<body>
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
		<?php while($row=mysqli_fetch_assoc($results)) { ?>
		<tr>
			<?php //Datoer angives som variabler for at kunne konvertere til andet datoformat.
			$d_date = date_create($row['d_date']);
			$n_date = date_create($row['n_date']);
		?>
			<td class='table'>
				<?php echo $row['kunde'] ?>
			</td>
			<td class='table'>
				<?php echo date_format($d_date, 'd-m-Y') ?>
			</td>
			<td class='table'>
				<?php echo date_format($n_date, 'd-m-Y') ?>
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