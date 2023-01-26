<?php

  include "db_connect.php";

  $brand_from_form = $_GET["add_brand"];

  if ((!empty($brand_from_form))) 
  {

    // mySQL Anfrage verpackt in php
    $sql = "INSERT INTO marken VALUES (NULL, '$brand_from_form')";
    $result = $mysqli->query($sql);

    echo '<script>alert("Daten gespeichert")</script>';
  }

  else
  {
    echo '<script>alert("Bitte Felder follständig ausfüllen!")</script>';
  }


  include "redirect.php";
?>