<?php
require_once 'functions.php';
connectdb();

if ( isset( $_POST[ 'slettet' ] ) ) {
	$kunde_ID = $_POST[ 'slettet' ];
	queryMysql( "DELETE FROM ordrer WHERE kunde_ID=" . "'" . $kunde_ID . "'" );

	if ( $results ) {
		header( "Location: ../ordrelist.php" );
		exit();
	}
}
//Luk forbindelse til databasen
mysqli_close( $connection );
?>