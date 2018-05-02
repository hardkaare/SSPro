<?php
	require_once('functions.php');
	connectdb();
	queryMysql("SELECT * FROM ordrer");
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
			<option value="Rute 1">Rute 1</option>
			<option value="Rute 2">Rute 2</option>
			<option value="Rute 3">Rute 3</option>
		</select>
		<input type="submit" name="valg" value="Vælg">
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
	</table>
</body>
</html>


<?php
//Luk forbindelse til database
mysqli_close($connection);
?>