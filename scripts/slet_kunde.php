<?php
require_once 'connection.php';

if(isset($_POST['slettet'])){
	$kunde_ID = $_POST['slettet'];
	$query = "DELETE FROM ordrer WHERE kunde_ID=" ."'" .$kunde_ID. "'";
	
	$results = mysqli_query($connection, $query);
	
	if($results){
		header("Location: ../ordrelist.php");
		exit();
	}else{
		die("Kunne ikke oprette forbindelse til database "). mysqli_connect_error();
	}
}
	//Luk forbindelse til databasen
mysqli_close($connection);
?>