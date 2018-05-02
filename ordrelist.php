<?php
require 'functions.php';
connectdb();
queryMysql("SELECT * FROM ordrer");
global $row;
//Datoer angives som variabler for at kunne konvertere til andet datoformat.
$d_date = date_create($row['d_date']);
$n_date = date_create($row['n_date']);
?>

<!doctype html>
<html lang="da">
<head>
<meta charset="utf-8">
<title>SSPro - Ordrelist</title>
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
		
	<?php
	while($row=mysqli_fetch_assoc($results)) { ?>
		<tr>
			<td class='table'><?php echo $row['kunde'] ?></td>
			<td class='table'><?php echo date_format($d_date, 'd/m/y') ?></td>
			<td class='table'><?php echo date_format($n_date, 'd/m/y') ?></td>
			<td class='table'><?php echo $row['rute'] ?></td>
			<td class='table'><?php echo $row['str'] ?></td>
			<td class='table'><?php echo $row['antal'] ?></td>
			<td class='table'><?php echo $row['note'] ?></td>
			<td>
				<a href="rediger_ordre.php?kunid=<?php echo $row['kunde_ID']?>" class="butRed"><input type="button" value="Rediger"></a></input>
			</td>
			<td>
				<form action="scripts/slet_kunde.php" method="post" onClick="return confirm('Er du sikker på du vil slette ordren?')">
					<input type="submit" value="Slet">
					<input type="hidden" name="slettet" value="<?php echo $row['kunde_ID'] ?>">
				</form>
			</td>
		</tr>
	<?php } ?>
	</table>
	
	<form action="ordre.php" method="POST">
		<input type="submit" value="Tilføj ordre" >
	</form>
	<form action="ruter.php" method="get">
		<input type="submit" value="Eksporter ordreliste">
	</form>
</body>
</html>


<?php
//Luk forbindelse til database
mysqli_close($connection);
?>