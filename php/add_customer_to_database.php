<?php

  include "db_connect.php";

  $vorname_from_form = $_GET["add_cust_Vorname"];
  $nachname_from_form = $_GET["add_cust_Nachname"];

  if ((!empty($vorname_from_form)) && (!empty($nachname_from_form))) 
  {

    // mySQL Anfrage verpackt in php
    $sql = "INSERT INTO kunden VALUES (NULL, '$vorname_from_form' , '$nachname_from_form')";
    $result = $mysqli->query($sql);

    echo '<script>alert("Kundendaten gespeichert")</script>';
  }

  else
  {
    echo '<script>alert("Bitte Felder follständig ausfüllen!")</script>';
  }


  include "redirect.php";
?>

