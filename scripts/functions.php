<?php
//Funktion til at kalde alle ordrer fra databasen.
function queryMysql( $query ) {
	global $connection;
	global $results;
	$results = mysqli_query($connection, $query); //Forespørgsel til databasen vha. de definerede variabler.
	if ( !$results ){
		die($connection);
		printf( "Forbindelse til database fejlet: ", mysqli_connect_error()); 
		exit(); //Scriptet slutter.
	}
}
?>
