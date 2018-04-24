<?php
require_once 'scripts/connection.php';

if(isset($_GET['kunid'])){
	
	$kunde_id=htmlentities($_GET['kunid']);
	
	if(!empty($kunde_id)){
		
		$query = "SELECT * FROM ordrer WHERE kunde_ID= $kunde_id";
		
		$results = mysqli_query($connection,$query);
		
		if(!$results){
			die("Kunne ikke oprette forbindelse til databasen".mysqli_error($connection));
		}
		
		$row = mysqli_fetch_assoc($results);
	}
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SSPro - Rediger ordre</title>
</head>

<body>
<form name="rediger_ordre" id="rediger_Ordre" method="post" action="scripts/opdaterData.php" autocomplete="on">
		<fieldset>
			<legend>Rediger ordre</legend>
			<div>
				<label for="kunde">Kunde</label>
				<input type="text" required name="kunde" id="kunde" value="<?php echo $row['kunde']?>">
			</div>
			<div>
				<label for="d_date">Distributionsdato</label>
				<input type="date" required name="d_date" id="d_date" value="<?php echo $row['d_date']?>">
			</div>
			<div>
				<label for="n_date">Nedtagningsdato</label>
				<input type="date" name="n_date" id="n_date" value="<?php echo $row['n_date']?>">
			</div>
			<div>
				<label for="rute">Rute</label>
				<input type="text" required name="rute" id="rute" value="<?php echo $row['rute']?>">
			</div>
			<div>
				<label for="str">Størrelse</label>
				<input type="text" required name="str" id="str" value="<?php echo $row['str']?>">
			</div>
			<div>
				<label for="antaæ">Antal</label>
				<input type="number" required name="antal" id="antal" value="<?php echo $row['antal']?>">
			</div>
			<div>
				<label for="note">Bemærkninger</label>
				<textarea name="note" id="note" cols="30" rows="1"><?php echo $row['note']?></textarea>
			</div>
			
			<div class="tlfBtnDiv">
				<input type="submit" id="submit" value="Rediger">
			</div>
			<input type="hidden" name="kunde_id" value="<?php echo $kunde_id?>">
		</fieldset>
	</form>

</body>
</html>


<?php 
//Luk forbindelsen
mysqli_close($connection);
?>