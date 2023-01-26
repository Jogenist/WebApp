<?php

  include "db_connect.php";

  $service_from_form = $_GET["add_service"];

  if ((!empty($service_from_form))) 
  {

    // mySQL Anfrage verpackt in php
    $sql = "INSERT INTO leistung VALUES (NULL, '$service_from_form')";
    $result = $mysqli->query($sql);

    echo '<script>alert("Daten gespeichert")</script>';
  }

  else
  {
    echo '<script>alert("Bitte Felder follständig ausfüllen!")</script>';
  }


  include "redirect.php";
?>

