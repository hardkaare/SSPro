<?php
	require_once 'scripts/connection.php';
	
	$query1 = "SELECT * FROM ordrer WHERE rute = 'Rute 1'"; //Alle data i databasen 'ordrer' vælges
	$query2 = "SELECT * FROM ordrer WHERE rute = 'Rute 2'";
	$query3 = "SELECT * FROM ordrer WHERE rute = 'Rute 3'";

	if (isset($_POST['rute']) && $_POST['rute'] == 'Rute 1'){
		$results = mysqli_query($connection, $query1);
	}
		
	if (isset($_POST['rute']) && $_POST['rute'] == 'Rute 2'){
		$results = mysqli_query($connection, $query2);
	}
	
	if (isset($_POST['rute']) && $_POST['rute'] == 'Rute 3'){
		$results = mysqli_query($connection, $query3);
	} 
	
	else {
		echo "Der er ikke valgt en rute.";
	}

	if(!$results){
		die("Kunne ikke oprette forbindelse til databasen".mysqli_error());
	}
?>