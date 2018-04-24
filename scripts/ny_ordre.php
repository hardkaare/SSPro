<?php
require_once 'connection.php';

if(isset($_POST['kunde'])){
				$kunde=htmlentities($_POST['kunde']);
				
				if(isset($_POST['d_date'])){
					$d_date = htmlentities($_POST['d_date']);
				}else{
					$d_date="";
				}
	
				if(isset($_POST['n_date'])){
					$n_date = htmlentities($_POST['n_date']);
				}else{
					$n_date="";
				}
				
				if(isset($_POST['rute'])){
					$rute = htmlentities($_POST['rute']);
				}else{
					$rute="";
				}
				
				if(isset($_POST['str'])){
					$str = htmlentities($_POST['str']);
				}else{
					$str="";
				}
				
				if(isset($_POST['antal'])){
					$antal = htmlentities($_POST['antal']);
				}else{
					$antal="";
				}
				if(isset($_POST['note'])){
					$note = htmlentities($_POST['note']);
				}else{
					$note="";
				}
				
				if(!empty($kunde)){
					$query = "INSERT INTO ordrer VALUES ('','$kunde','$d_date','$n_date','$rute','$str','$antal','$note')";
   					$results = mysqli_query($connection,$query);

					 if(!$results){
							die("Kunne ikke oprette forbindelse til databasen".mysqli_error());
					 }	
				header('Location: ../ordrelist.php');
				}
			}else{
				echo "Noget gik galt";
			}
			
mysqli_close($connection);
?>