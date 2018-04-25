<?php
	require_once 'scripts/connection.php';
	
	$query1 = "SELECT * FROM ordrer WHERE rute = 'Rute 1'"; //Alle data i databasen 'ordrer' vælges
	$query2 = "SELECT * FROM ordrer WHERE rute = 'Rute 2'";
	$query3 = "SELECT * FROM ordrer WHERE rute = 'Rute 3'";

	if (isset($_POST['v_rute']) && $_POST['v_rute'] == 'Rute 1'){
		$results = mysqli_query($connection, $query1);
	}
		
	if (isset($_POST['v_rute']) && $_POST['v_rute'] == 'Rute 2'){
		$results = mysqli_query($connection, $query2);
	}
	
	if (isset($_POST['v_rute']) && $_POST['v_rute'] == 'Rute 3'){
		$results = mysqli_query($connection, $query3);
	} 
	
	else {
		$query = "SELECT * FROM ordrer";
		$results = mysqli_query($connection, $query);
	}

	if(!$results){
		die("Kunne ikke oprette forbindelse til databasen".mysqli_error());
	}
?>

<!doctype html>
<html lang="da">
<head>
<meta charset="utf-8">
<title>SSPro - Ordrelist</title>
</head>


<body>
<div>
	<form method="post" action="scripts/v_rute.php">
		<select name="v_rute">
			<option name="rute1" id="rute1" value="Rute 1" selected>Rute 1</option>
			<option name="rute2" id="rute2" value="Rute 2">Rute 2</option>
			<option name="rute3" id="rute3" value="Rute 3">Rute 3</option>
		</select>
	</form>
</div>
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
			<td class='table'><?php echo $row['kunde'] ?></td>
			<td class='table'><?php echo date_format($d_date, 'd-m-Y') ?></td>
			<td class='table'><?php echo date_format($n_date, 'd-m-Y') ?></td>
			<td class='table'><?php echo $row['rute'] ?></td>
			<td class='table'><?php echo $row['str'] ?></td>
			<td class='table'><?php echo $row['antal'] ?></td>
			<td class='table'><?php echo $row['note'] ?></td>
		</tr>
	<?php } ?>
	</table>
</body>
</html>


<?php
//Luk forbindelse til database
mysqli_close($connection);
?>