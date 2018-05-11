<?php
require_once 'connection.php';
require_once 'functions.php';

if(isset($_POST['slettet'])){
	$fejl_ID = $_POST['slettet'];
	queryMysql("DELETE FROM fejlmelding WHERE fejl_ID=" ."'" .$fejl_ID. "'");
	header("Location: ../fejlmelding.php");
	exit();
}
	//Luk forbindelse til databasen
mysqli_close($connection);
?>