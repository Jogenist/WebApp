<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Neue Kundendaten</title>
  <link rel="stylesheet" type="text/css" href="./css/style_add.css?version=51">
  <link rel="stylesheet" type="text/css" href="./css/navbar.css?version=51">
</head>


<!-- Aufbau der Seite mit Formular -->
<body>
<?php include "navbar.php"; ?>
<div class="wrapper">
    <div class="title">Neue Kundendaten</div>

    <!-- Formular Begin-->
    <form class="form" action="./php/add_customer_to_database.php" >

      <!-- Klasse für Eimgabefelder-->
      <div class="inputfield">
        <label class="label">Vorname</label>
        <input class="inputs" type="text"  id="add_cust_Vorname" name="add_cust_Vorname" required>
      </div>

      <div class="inputfield">
        <label class="label">Nachname</label>
        <input class="inputs" type="text" id="add_cust_Nachname" name="add_cust_Nachname" required>
      </div>

      <!-- Speicherknopf -->
      <input class="btn" type="submit" value="Speichern">
    </form>
</div>



<div class="wrapper">
    <div class="title">Neue Leistung</div>

    <!-- Formular Begin-->
    <form class="form" action="./php/add_service_to_database.php" >

      <!-- Klasse für Eimgabefelder-->
      <div class="inputfield">
        <label class="label">Leistung</label>
        <input class="inputs" type="text"  id="add_service" name="add_service" required>
      </div>

      <!-- Speicherknopf -->
      <input class="btn" type="submit" value="Speichern">
    </form>
</div>


</body>

</html>