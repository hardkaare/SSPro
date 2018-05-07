<?php
//Funktion til at kalde alle ordrer fra databasen.
function queryMysql( $query ) {
	global $connection;
	global $results;
	$results = $connection->query( $query ); //Forespørgsel til databasen vha. de definerede variabler.
	if ( !$results )die( $connection->error ); //Hvis der ikke findes resultater er forbindelsen lukket, og der vises fejlkode.
}
?>