<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SSPro - Tilføj ordre</title>
</head>

<body>
	<form name="ny_ordre" id="ny_Ordre" method="post" action="ny_ordre.php" autocomplete="on">
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
				<input type="text" required name="rute" id="rute">
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