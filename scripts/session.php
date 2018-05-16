<?php
include 'connection.php';
   session_start();//Sessionen startes

   $user_check = $_SESSION['login_user']; //Brugeren skal checkes for login på login.php

   $sql = mysqli_query($connection,"SELECT email FROM brugere WHERE email = '$user_check' ");//Forespørgsel til databasen efter email på den bruger der er logget ind

   $row = mysqli_fetch_array($sql,MYSQLI_ASSOC); //Dataene bliver hentet fra databasen.

   $login_session = $row['email'];//Login sessionen defineres ud fra emailen.

   if(!isset($_SESSION['login_user'])){//Hvis der ikke er nogen session, sendes brugeren tilbage til loginsiden.
      header("location:login.php");
   }
?>
