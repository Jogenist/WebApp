<?php

  include "db_connect.php";

  $input_Kundenname   = $_GET["input_Kundenname"];
  $input_kraftstoff   = $_GET["input_kraftstoff"];
  $input_marke        = $_GET["input_marke"];
  $input_Typ          = $_GET["input_Typ"];
  $input_Variante     = $_GET["input_Variante"];
  $input_Version      = $_GET["input_Version"];
  $input_Fahrzeugklasse   = $_GET["input_Fahrzeugklasse"];
  $input_TSN          = $_GET["input_TSN"];
  $input_HSN          = $_GET["input_HSN"];
  $input_Hubraum      = $_GET["input_Hubraum"];
  $input_Nennleistung = $_GET["input_Nennleistung"];
  $input_Nenndrehzahl = $_GET["input_Nenndrehzahl"];
  $input_Höchstgeschwindigkeit = $_GET["input_Höchstgeschwindigkeit"];
  $input_Jahr         = $_GET["input_Jahr"];
  $input_Handelsbezeichnung = $_GET["input_Handelsbezeichnung"];
  $input_Kilometerstand     = $_GET["input_Kilometerstand"];
  $input_Motorbezeichnung   = $_GET["input_Motorbezeichnung"];
  $input_Oeltyp             = $_GET["input_Oeltyp"];


  // mySQL Anfrage verpackt in php
  $sql = "INSERT INTO fahrzeuge VALUES 
  (NULL, 
  '$input_Kundenname', 
  '$input_kraftstoff',
  '$input_marke',
  '$input_Typ',     
  '$input_Variante',     
  '$input_Version',
  '$input_kraftstoff',  
  '$input_TSN',          
  '$input_HSN',      
  '$input_Hubraum',      
  '$input_Nennleistung',
  '$input_Nenndrehzahl',
  '$input_Höchstgeschwindigkeit',
  '$input_Jahr',
  '$input_Handelsbezeichnung',
  '$input_Kilometerstand',  
  '$input_Motorbezeichnung', 
  '$input_Oeltyp'
  )";

  $result = $mysqli->query($sql);

  echo '<script>alert("Kundendaten gespeichert")</script>';


  include "redirect.php";
?>
