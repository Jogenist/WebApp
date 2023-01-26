<?php

  include "db_connect.php";

  $Leistungen = $_GET["Leistungen"];
  $Kunden_name = $_GET["Kunden_Name"];
  $fahrzeug = $_GET["Kunden_Fahrzeug"];
  $datums = $_GET["job_date_input"];
  $aufwand = $_GET["aufwand"];
  $kommentar = $_GET["Kommentar"];
  $Kilometerstand = $_GET["Kilometerstand"];

  $leistungs_string = "";

  foreach(($_GET['Leistungen']) as $selected)
  {

    $sql_name = "SELECT l.Leistung FROM leistung as l WHERE l.ID = '". $selected."'";
    $result = mysqli_query($mysqli, $sql_name);
    $value = $result->fetch_object();
    
    $leistungs_string = $leistungs_string .";". $value->Leistung;
  }


  $sql = "INSERT INTO auftrag VALUES (NULL, '$datums' , '$fahrzeug' , '$aufwand', '$kommentar', '$leistungs_string' , '$Kilometerstand')";
  $result = $mysqli->query($sql);


  echo '<script>alert("Kundendaten gespeichert")</script>';
  

  include "redirect.php";
?>

