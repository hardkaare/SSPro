<?php
header('Content-Type: text/html; charset=UTF-8');

 $connection = mysqli_connect("localhost", "root", "", "sspro");
    
  /* check connection */
  if (mysqli_connect_error()) {
      printf("Forbindelse til database fejlet: %s\n", mysqli_connect_error());
      exit();
  }
    
  /* change character set to utf8 */
  if (!$connection->set_charset("utf8")) {
      printf("Error loading character set utf8: %s\n", $connection->error);
  }
?>