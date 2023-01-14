<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <!--<meta http-equiv="content-type" content="text/html; charset=utf8mb4">-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Neuer Auftrag</title>
  <link rel="stylesheet" type="text/css" href="./css/style_add.css?version=51">
  <link rel="stylesheet" type="text/css" href="./css/navbar.css?version=51">
</head>

<body>
<?php include "navbar.php"; ?>
  <div class="wrapper">
    <div class="title">Neuer Auftrag</div>

    <!-- Formular Begin-->
    <form class="form" action="./php/add_job_to_database.php">

      <div class="inputfield">
        <label class="label">Kunde</label>
        <div class="custom-select">
        <select id="Kunden_Name" name="Kunden_Name" required>
          <option value="">--Bitte auswählen--</option>

          <?php
          include "./php/db_connect.php";
          $sql = "SELECT * FROM kunden";
          $all_customers = mysqli_query($mysqli, $sql);

          while ($customer = mysqli_fetch_array($all_customers, MYSQLI_ASSOC)):
            ;
            ?>

            <option value="<?php echo $customer["ID"]; ?>">

              <?php echo $customer["Vorname"] . " " . $customer["Nachname"];
              // To show the category name to the user
              ?>
            </option>
            <?php
          endwhile;
          // While loop must be terminated
          ?>
        </select>
        </div>
      </div>

      <div class="inputfield">
        <label class="label">Fahrzeug</label>
        <div class="custom-select">
          <select id="Kunden_Fahrzeug" name="Kunden_Fahrzeug" required>
            <option value="">--Bitte auswählen--</option>

            <?php

            $kunden_vorname = $_POST['Kunden_Name'];

            include "./php/db_connect.php";
            $sql = "SELECT * FROM kunden as k JOIN fahrzeuge AS f on f.KundenID = k.ID WHERE k.Vorname Like '%" . $kunden_vorname . "%'";

            $all_vehicles = mysqli_query($mysqli, $sql);

            while ($vehicles = mysqli_fetch_array($all_vehicles, MYSQLI_ASSOC)):
              ;
              ?>

              <option value="<?php echo $vehicles["ID"]; ?>">

                <?php echo $vehicles["Typ"] . " " . $vehicles["Handelsbezeichnung"];
                // To show the category name to the user
                ?>
              </option>

              <?php
            endwhile;
            // While loop must be terminated
            ?>

          </select>
        </div>
      </div>

      <div class="inputfield">
        <label class="label">Kilometerstand</label>
        <input class="inputs" type="text" id="Kilometerstand" name="Kilometerstand" required>
      </div>

      <div class="inputfield">
        <label class="label">Datum & Uhrzeit</label>
        <input class="inputs" type="datetime-local" id="job_data" name="job_date_input" value="datetime"
          required>
      </div>

      <div class="inputfield">
        <label class="label">Aufwand</label>
        <input class="inputs" type="text" placeholder="in Minuten" id="aufwand" name="aufwand" required>
      </div>


      <div class="inputfield">
        <label class="label">Leistung</label>
        <div class="custom-select-multi">
          <select id="chkveg" name="Leistungen[]" multiple="multiple" required>
            <?php
            // use a while loop to fetch data
            // from the $all_categories variable
            // and individually display as an option
            include "db_connect.php";

            $sql = "SELECT * FROM leistung";
            $all_services = mysqli_query($mysqli, $sql);

            while ($leistung = mysqli_fetch_array($all_services, MYSQLI_ASSOC)):;
              ?>

              <option value="<?php echo $leistung["ID"]; ?>">

                <?php echo $leistung["Leistung"];
                // To show the category name to the user
                ?>
              </option>
              <?php
            endwhile;
            // While loop must be terminated
            ?>
          </select>

          <script type="text/javascript">
            $(function () {

              $('#chkveg').umltiselect({
                includeSelectAllOption: true
              });
            });
          </script>
        </div>
      </div>

      <div class="inputfield">
        <label class="label">Kommentar</label>
        <textarea class="textareacs" name="Kommentar"></textarea>
      </div>

      <!--<div class="inputfield terms">
        <label class="check">
          <input type="checkbox">
          <span class="checkmark"></span>
        </label>
        <p>Agreed to terms and conditions</p>
      </div> -->

      <!-- Speicherknopf -->
      <input class="btn" type="submit" value="Speichern">
    </form>
  </div>

</body>

</html>