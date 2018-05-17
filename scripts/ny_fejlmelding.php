<?php
require_once 'functions.php';
require_once 'connection.php';

if(isset($_POST['adresse'])){
				$adr=htmlentities($_POST['adresse']);

				if(isset($_POST['etage'])){
					$etage = htmlentities($_POST['etage']);
				}else{
					$etage="";
				}

				if(isset($_POST['tavle'])){
					$tavle = htmlentities($_POST['tavle']);
				}else{
					$tavle="";
				}

				if(isset($_POST['f_date'])){
					$f_date = htmlentities($_POST['f_date']);
				}else{
					$f_date="";
				}

				if(isset($_POST['note'])){
					$note = htmlentities($_POST['note']);
				}else{
					$note="";
				}

				if(!empty($adr)||!empty($etage)||!empty($tavle)||!empty($f_date)){
					queryMysql("INSERT INTO fejlmelding VALUES ('','$adr','$etage','$tavle','$f_date','$note')");
				}
				header('Location: ../fejlmelding.php');
			}

mysqli_close($connection);
?>
