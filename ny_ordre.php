<?php
	include('scripts/ny_ordre.php');
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SSPro - Tilføj ordre</title>
</head>

<body>
	<form name="ny_ordre" id="ny_Ordre" method="post" action="scripts/ny_ordre.php" autocomplete="on">
		<fieldset>
			<legend>Tilføj ordre</legend>
			<div>
				<label for="kunde">Kunde</label>
				<input type="text" required name="kunde" id="kunde">
			</div>
			<div>
				<label for="d_date">Distributionsdato</label>
				<input type="date" required name="d_date" id="d_date">
			</div>
			<div>
				<label for="n_date">Nedtagningsdato</label>
				<input type="date" name="n_date" id="n_date">
			</div>
			<div>
				<label for="rute">Rute</label>
				<!-- <input type="rute" name="rute" id="rute">-->
				<select name="rute" id="rute">
					<option value="Rute 1">Rute 1</option>
					<option value="Rute 2">Rute 2</option>
					<option value="Rute 3">Rute 3</option>
					<option value="Niels Jernes Vej 6A">Niels Jernes Vej 6A</option>
					<option value="Niels Jernes Vej 8A">Niels Jernes Vej 8A</option>
				</select>
<!--				<input type="radio" required name="rute" id="rute" value="Rute 1" checked>1
				<input type="radio" required name="rute" id="rute" value="Rute 2">2
				<input type="radio" required name="rute" id="rute" value="Rute 3">3-->
			</div>
			<div>
				<label for="str">Størrelse</label>
				<input type="text" required name="str" id="str">
			</div>
			<div>
				<label for="antaæ">Antal</label>
				<input type="number" required name="antal" id="antal">
			</div>
			<div>
				<label for="note">Bemærkninger</label>
				<textarea name="note" id="note" cols="30" rows="1"></textarea>
			</div>
			
			<div class="tlfBtnDiv">
				<input type="submit" id="submit" value="Tilføj">
			</div>
		</fieldset>
	</form>
</body>
</html>