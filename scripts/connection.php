<?php
//header('Content-Type: text/html; charset=UTF-8');

 $connection = mysqli_connect("localhost", "root", "", "sspro");
    
  /* check connection */
  if (mysqli_connect_error()) {
      printf("Kunne ikke oprette forbindelse til databasen: %s\n", mysqli_connect_error());
      exit();
  }
    
  /* Skift af karaktersæt til utf8 */
  //if (!$connection->set_charset("utf8")) {
      //printf("Fejl ved indlæsning af karaktersæt utf8: %s\n", $connection->error);
  //}
?>