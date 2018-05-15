<?php
	include 'scripts/ny_fejlmelding.php';
?>
<!doctype html>
<html>
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
	<a href="fejlmelding.php" class="big_nav">Fejlmelding</a>
	<a href="ny_fejl.php" class="small_nav" id="current">Fejlmeld tavle</a>
	<a href="ruter.php" class="big_nav">Ruter</a>
	<a onclick="frames['frame'].print()" class="small_nav">Print ruteliste</a>
	<a href="scripts/logout.php" class="big_nav">Log ud</a>
</div>
		<div class="main">
		<h2>Fejlmeld tavle</h2>
	<form name="ny_fejlmelding" id="ny_fejlmelding" method="post" action="scripts/ny_fejlmelding.php" autocomplete="on">
			<div>
				<label for="adresse">Adresse</label>
				<select name="adresse" id="adresse" required>
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
			<div>
				<label for="etage">Etage</label>
				<input type="text" required name="etage" id="etage" maxlength="10">
			</div>
			<div>
				<label for="tavle">Tavlenr</label>
				<input type="text" name="tavle" id="tavle" maxlength="25">
			</div>
			<div>
				<label for="f_date">Dato fejlmeldt</label>
				<input type="date" required name="f_date" id="f_date">
			</div>
			<div>
				<label for="note">Bemærkninger</label>
				<textarea name="note" id="note" cols="30" rows="1" maxlength="250"></textarea>
			</div>
			
			<div class="tlfBtnDiv">
				<input type="submit" id="submit" value="Fejlmeld">
			</div>
	</form>
	</div>
</body>
</html>