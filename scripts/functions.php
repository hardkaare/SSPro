<?php
header( 'Content-Type: text/html; charset=UTF-8' ); //Karaktersæt defineres som UTF-8 for at understøtte danske tegn (æøå).

//Variabler til forbindelsesindstillinger til databasen.
$db_server = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_database = 'SSPro';

//Funktionen til at oprette forbindelse til serveren.
function connectdb() {
	global $db_server; //Variabler defineres som globale for at kunne virke på tværs af siderne.
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

function get_id() {
	global $kunde_ID;
	global $row;
	if(isset($_GET['kunde_ID'])){
	
	$kunde_ID=htmlentities($_GET['kunde_ID']);
	
	if(!empty($kunde_ID)){
		queryMysql("SELECT * FROM ordrer WHERE kunde_ID= $kunde_ID");	
	}
	$row = mysqli_fetch_assoc($results);
	}

}

function print_ordreliste() {
	global $row;
	global $results;
	
	while ( $row = mysqli_fetch_assoc( $results ) ) {
		//Datoer angives som variabler for at kunne konvertere til andet datoformat.
		$d_date = date_create( $row[ 'd_date' ] );
		$n_date = date_create( $row[ 'n_date' ] );
		echo "<tr>";
		echo "<td class='table'>" . $row[ 'kunde' ] . "</td>";
		echo "<td class='table'>" . date_format( $d_date, 'd/m/y' ) . "</td>";
		echo "<td class='table'>" . date_format( $n_date, 'd/m/y' ) . "</td>";
		echo "<td class='table'>" . $row[ 'rute' ] . "</td>";
		echo "<td class='table'>" . $row[ 'str' ] . "</td>";
		echo "<td class='table'>" . $row[ 'antal' ] . "</td>";
		echo "<td class='table'>" . $row[ 'note' ] . "</td>";
		echo "<td>";
		echo "<a href='rediger_ordre.php?id='".$row['kunde_ID']."'>";
		echo "<input type='button' value='Rediger'></a></input>";
		echo "</td>";
		echo "<td>";
		echo "<form action='scripts/slet_kunde.php' method='post' onClick='return confirm('Er du sikker på du vil slette ordren?')>";
		echo "<input type='submit' value='Slet'>";
		echo "<input type='hidden' name='slettet' value=" . $row[ 'kunde_ID' ] . ">";
		echo "</form>";
		echo "</td>";
		echo "</tr>";
	}
}

?>