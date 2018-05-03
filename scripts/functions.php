<?php
header( 'Content-Type: text/html; charset=UTF-8' ); //Karaktersæt defineres som UTF-8 for at understøtte danske tegn (æøå).

//Variabler til forbindelsesindstillinger til databasen.
$db_server = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_database = 'SSPro';

//Funktionen til at oprette forbindelse til serveren.
function connectdb() {
global $db_server;
global $db_user;
global $db_pass;
global $db_database;
global $connection;
	$connection = mysqli_connect( $db_server, $db_user, $db_pass, $db_database ); //Forbindelsen til databasen defineres med udgangspunkt i definerede forbindelsesvariabler.

	// Hvis ikke der oprettes forbindelse til databasen.
	if ( mysqli_connect_error() ) {
		printf( "Forbindelse til database fejlet: %s\n", mysqli_connect_error() ); //Fejlmeddelelse skrives følges af mysql fejl.
		exit(); //Scriptet slutter.
	}
	//Skifte karaktersættet i MySQL til "utf8" således at databasen også opgiver dansk tegnsætning (æøå).
	mysqli_set_charset( $connection, "utf8" );
}

//Funktion til at kalde alle ordrer fra databasen.
function queryMysql( $query ) {
	global $connection;
	global $results;
	$results = $connection->query( $query ); //Forespørgsel til databasen vha. de definerede variabler.
	if ( !$results )die( $connection->error ); //Hvis der ikke findes resultater er forbindelsen lukket, og der vises fejlkode.
}
?>