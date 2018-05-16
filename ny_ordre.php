<?php
include 'scripts/ny_ordre.php';
?>

<!doctype html>
<html lang="da">

<head>
	<meta charset="utf-8">
	<title>SPOT Administration - Tilføj ordre</title>
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
		<a href="ny_ordre.php" class="small_nav" id="current">Tilføj ordre</a>
		<a href="fejlmelding.php" class="big_nav">Fejlmelding</a>
		<a href="ny_fejl.php" class="small_nav">Fejlmeld tavle</a>
		<a href="ruter.php" class="big_nav">Ruter</a>
		<a onclick="frames['frame'].print()" class="small_nav">Print ruteliste</a>
		<a href="scripts/logout.php" class="big_nav">Log ud</a>
	</div>

	<div class="main">
		<h2>Tilføj ordre</h2>
		<div class="form_container">
			<form name="ny_ordre" id="ny_Ordre" method="post" action="scripts/ny_ordre.php" autocomplete="on">
				<div>
					<label for="kunde">Kunde:</label>
					<input type="text" required name="kunde" id="kunde">
				</div>
				<div>
					<label for="d_date">Distributionsdato:</label>
					<input type="date" required name="d_date" id="d_date">
				</div>
				<div>
					<label for="n_date">Nedtagningsdato:</label>
					<input type="date" name="n_date" id="n_date">
				</div>
				<div>
					<label for="rute">Rute:</label>
					<select name="rute" id="rute" required>
						<option value="Rute 1">Rute 1</option>
						<option value="Rute 2">Rute 2</option>
						<option value="Rute 3">Rute 3</option>
						<option value="Badehusvej">Badehusvej</option>
						<option value="Fibigerstræde">Fibigerstræde</option>
						<option value="Fredrik Bajers Vej">Fredrik Bajers Vej</option>
						<option value="Kroghstræde">Kroghstræde</option>
						<option value="Niels Jernes Vej">Niels Jernes Vej</option>
						<option value="Nyhavnsgade">Nyhavnsgade</option>
						<option value="Pontoppidanstræde">Pontoppidanstræde</option>
						<option value="Rendsburggade">Rendsburggade</option>
						<option value="Selma Lagerløfs Vej (Cassiopeia)">Selma Lagerløfs Vej (Cassiopeia)</option>
						<option value="Skibbrogade">Skibbrogade</option>
						<option value="Strandvejen">Strandvejen</option>
					</select>
				</div>
				<div>
					<label for="str">Størrelse:</label>
					<input type="text" required name="str" id="str">
				</div>
				<div>
					<label for="antal">Antal:</label>
					<input type="text" required name="antal" id="antal">
				</div>
				<div>
					<label for="note">Bemærkninger:</label>
					<textarea name="note" id="note" cols="30" rows="1"></textarea>
				</div>

				<div class="tlfBtn">
					<input type="submit" id="submit" value="Tilføj">
				</div>
			</form>
		</div>
	</div>
</body>

</html>