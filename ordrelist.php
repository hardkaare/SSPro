<?php
	require_once 'scripts/connection.php';
	$query = "SELECT * FROM ordrer"; //Alle data i databasen 'ordrer' vælges
	
	$results = mysqli_query($connection, $query); //Forespørgsel til databasen vha. de definerede variabler.

	if(!$results){
		die("Kunne ikke oprette forbindelse til databasen".mysqli_error());
	}
?>

<!doctype html>
<html lang="da">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>SSPro - Orderlist</title>
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
			<td class='table'><?php echo $row['d_date'] ?></td>
			<td class='table'><?php echo $row['n_date'] ?></td>
			<td class='table'><?php echo $row['rute'] ?></td>
			<td class='table'><?php echo $row['str'] ?></td>
			<td class='table'><?php echo $row['antal'] ?></td>
			<td class='table'><?php echo $row['note'] ?></td>
			<td>
				<form action="scripts/slet_kunde.php" method="post">
					<input type="submit" value="Slet">
					<input type="hidden" name="slettet" value="<?php echo $row['kunde_ID'] ?>">
				</form>
			</td>
			<td>
				<a href="rediger_ordre.php?kunid=<?php echo $row['kunde_ID']?>" class="butRed"><input type="button" value="Rediger"></a></input>
			</td>
		</tr>
	<?php } ?>
	</table>
	
	<form action="ordre.php" method="POST">
		<input type="submit" value="Tilføj ordre" >
	</form>
	<form action="eksporter.php" method="get">
		<input type="submit" value="Eksporter ordreliste">
	</form>
</body>
</html>


<?php
//Luk forbindelse til database
mysqli_close($connection);
?>