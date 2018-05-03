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
				<select name="rute" id="rute" required>
					<option value="Rute 1">Rute 1</option>
					<option value="Rute 2">Rute 2</option>
					<option value="Rute 3">Rute 3</option>
					<option value="Badehusvej">Badehusvej</option>
					<option value="Fibigerstræde">Fibigerstræde1</option>
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