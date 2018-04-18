<!doctype html>
<html>
<!-- Oprette forbindelse til database og tabellen ordrer -->
<?php
	$connection = mysqli_connect('localhost','root','','SSPro'); //Oprettelse af forbindelse til databasen SSPRO
	$query = "SELECT * FROM ordrer"; //Alle data i databasen 'ordrer' vælges
	
	$results = mysqli_query($connection, $query); //Forespørgsel til databasen vha. de definerede variabler.
	$row = mysqli_fetch_row($results); //Hent data fra tabellen i kolonner
	mysqli_close($connection);
	
	if ($connection->connect_error){
		die("Forbindelse til database fejlslået:" . $connection->connect_error);
	}
	
	echo("Forbindelsen til database oprettet.")
?>
</html>