
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Neues Fahrzeug</title>
	<link rel="stylesheet" type="text/css" href="./css/style_add.css?version=51">
    <link rel="stylesheet" type="text/css" href="./css/navbar.css?version=51">
</head>

<body>
<?php include "navbar.php"; ?>



<div class="wrapper">
    <div class="title">Neue Marke</div>

    <!-- Formular Begin-->
    <form class="form" action="./php/add_new_brand.php" >

      <!-- Klasse für Eimgabefelder-->
      <div class="inputfield">
        <label class="label">Marke</label>
        <input class="inputs" type="text"  id="add_brand" name="add_brand" required>
      </div>

      <!-- Speicherknopf -->
      <input class="btn" type="submit" value="Speichern">
    </form>
</div>



<div class="wrapper">
    <div class="title"> Neues Fahrzeug </div>

    <!-- Formular Begin-->
    <form class="form" action="./php/add_vehicle_to_database.php" >

       <div class="inputfield">
          <label class="label">Kunde</label>
          <div class="custom-select">
            <select id="input_Kundenname" name="input_Kundenname" required>
            <option value="">--Bitte auswählen--</option>

              <?php
              include "./php/db_connect.php";
              $sql = "SELECT * FROM kunden";
              $all_customers = mysqli_query($mysqli,$sql);
          
              while ($customer = mysqli_fetch_array($all_customers,MYSQLI_ASSOC)):;
              ?>

              <option value="<?php echo $customer["ID"];?>">
  
                      <?php echo $customer["Vorname"] ." ". $customer["Nachname"];
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
          <label class="label">Kraftstoff</label>
          <div class="custom-select">
            <select id="input_kraftstoff" name="input_kraftstoff" required>
            <option value="">--Bitte auswählen--</option>
             
            <?php
              include "./php/db_connect.php";
              $sql = "SELECT * FROM kraftstoffarten";
              $all_customers = mysqli_query($mysqli,$sql);
          
              while ($customer = mysqli_fetch_array($all_customers,MYSQLI_ASSOC)):;
              ?>

              <option value="<?php echo $customer["ID"];?>">
  
                      <?php echo $customer["Typ"];
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
          <label class="label">Marke</label>
          <div class="custom-select">
            <select id="input_marke" name="input_marke" required>
            <option value="">--Bitte auswählen--</option>
             
            <?php
              include "./php/db_connect.php";
              $sql = "SELECT * FROM marken";
              $all_customers = mysqli_query($mysqli,$sql);
          
              while ($customer = mysqli_fetch_array($all_customers,MYSQLI_ASSOC)):;
              ?>

              <option value="<?php echo $customer["ID"];?>">
  
                      <?php echo $customer["Marke"];
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
            <label class="label">Typ (D.2)</label>
            <input type="text" class="inputs" id="input_Typ", name="input_Typ" required>
        </div>  

        <div class="inputfield">
            <label class="label" >Variante (D.2)</label>
            <input type="text" class="inputs" id="input_Variante", name="input_Variante" required>
        </div> 
        
        <div class="inputfield">
            <label class="label">Version (D.2)</label>
            <input type="text" class="inputs" id="input_Version", name="input_Version" required>
        </div> 

        <div class="inputfield">
            <label class="label">Fahrzeugklasse (J)</label>
            <input type="text" class="inputs" id="input_Fahrzeugklasse", name="input_Fahrzeugklasse" required>
        </div> 

        <div class="inputfield">
            <label class="label">HSN (2.1)</label>
            <input type="text" class="inputs" id="input_HSN", name="input_HSN" required>
        </div>

        <div class="inputfield">
            <label class="label">TSN (2.2)</label>
            <input type="text" class="inputs" id="input_TSN", name="input_TSN" required>
        </div>

        <div class="inputfield">
            <label class="label">Hubraum (P.1)</label>
            <input type="text" class="inputs", id="input_Hubraum", name="input_Hubraum" required>
        </div>

        <div class="inputfield">
            <label class="label">Nennleistung (P.2)</label>
            <input type="text" class="inputs" id="input_Nennleistung", name="input_Nennleistung" required>
        </div>

        <div class="inputfield">
            <label class="label">Nenndrehzahl (P.4)</label>
            <input type="text" class="inputs" id="input_Nenndrehzahl", name="input_Nenndrehzahl" required>
        </div>

        <div class="inputfield">
            <label class="label">Höchstgeschwindigkeit (P.4)</label>
            <input type="text" class="inputs" id="input_Höchstgeschwindigkeit", name="input_Höchstgeschwindigkeit" required>
        </div>

        <div class="inputfield">
            <label class="label">Jahr der Erstzulassung (B)</label>
            <input type="text" class="inputs" placeholder="z.B. 2010" id="input_Jahr", name="input_Jahr" required>
        </div>

        <div class="inputfield">
            <label class="label">Handelsbezeichnung (D.3)</label>
            <input type="text" class="inputs" id="input_Handelsbezeichnung", name="input_Handelsbezeichnung" required>
        </div>

        <div class="inputfield">
            <label class="label">Kilometerstand</label>
            <input type="text" class="inputs" id="input_Kilometerstand", name="input_Kilometerstand" required>
        </div>

        <div class="inputfield">
            <label class="label">Motorbezeichnung</label>
            <input type="text" class="inputs" placeholder="z.B. 1.6L EcoTec" id="input_Motorbezeichnung", name="input_Motorbezeichnung" required>
        </div>

        <div class="inputfield">
            <label class="label">Öl-Typ</label>
            <input type="text" class="inputs" id="input_Oeltyp", name="input_Oeltyp" required>
        </div>

        <!-- Speicherknopf -->
      <input class="btn" type="submit" value="Speichern">

    </form>
</div>	
	
</body>
</html>

