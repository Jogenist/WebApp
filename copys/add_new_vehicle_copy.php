
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Neues Fahrzeug</title>
	<link rel="stylesheet" href="./css/add_vehicle.css">
</head>
<body>

<div class="wrapper">
    <div class="title">
      Neues Fahrzeug
    </div>

    <div class="form">

       <div class="inputfield">
          <label>Kunde</label>
          <div class="custom_select">
            <select id="input_Kundenname" name="input_Kundenname" method="POST">
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
          <label>Kraftstoff</label>
          <div class="custom_select">
            <select id="input_kraftstoff" name="input_kraftstoff" method="POST">
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
          <label>Marke</label>
          <div class="custom_select">
            <select id="input_marke" name="input_marke" method="POST">
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
            <label>Typ (D.2)</label>
            <input type="text" class="input" id="input_Typ", name="input_Typ" method="POST">
        </div>  

        <div class="inputfield">
            <label>Variante (D.2)</label>
            <input type="text" class="input" id="input_Variante", name="input_Variante" method="POST">
        </div> 
        
        <div class="inputfield">
            <label>Version (D.2)</label>
            <input type="text" class="input" id="input_Version", name="input_Version" method="POST">
        </div> 

        <div class="inputfield">
            <label>Fahrzeugklasse (J)</label>
            <input type="text" class="input" id="input_Fahrzeugklasse", name="input_Fahrzeugklasse" method="POST">
        </div> 

        <div class="inputfield">
            <label>HSN (2.1)</label>
            <input type="text" class="input" id="input_HSN", name="input_HSN" method="POST">
        </div>

        <div class="inputfield">
            <label>TSN (2.2)</label>
            <input type="text" class="input" id="input_TSN", name="input_TSN" method="POST">
        </div>

        <div class="inputfield">
            <label>Hubraum (P.1)</label>
            <input type="text" class="input", id="input_Hubraum", name="input_Hubraum" method="POST">
        </div>

        <div class="inputfield">
            <label>Nennleistung (P.2)</label>
            <input type="text" class="input" id="input_Nennleistung", name="input_Nennleistung" method="POST">
        </div>

        <div class="inputfield">
            <label>Nenndrehzahl (P.4)</label>
            <input type="text" class="input" id="input_Nenndrehzahl", name="input_Nenndrehzahl" method="POST">
        </div>

        <div class="inputfield">
            <label>Jahr der Erstzulassung (B)</label>
            <input type="text" class="input" id="input_Jahr", name="input_Jahr" method="POST">
        </div>

        <div class="inputfield">
            <label>Handelsbezeichnung (D.3)</label>
            <input type="text" class="input" id="input_Handlesbezeichnung", name="input_Handelsbezeichnung" method="POST">
        </div>

        <div class="inputfield">
            <label>Kilometerstand</label>
            <input type="text" class="input" id="input_Kilometerstand", name="input_Kilometerstand" method="POST">
        </div>

        <div class="inputfield">
            <label>Motorbezeichnung</label>
            <input type="text" class="input" id="input_Motorbezeichnung", name="input_Motorbezeichnung" method="POST">
        </div>

        <div class="inputfield">
            <label>Öl-Typ</label>
            <input type="text" class="input" id="input_Oeltyp", name="input_Oeltyp" method="POST">
        </div>

    <div class="inputfield">
      <input type="submit" onclick="./php/add_vehicle_to_database.php" value="Speichern"class="btn">
    </div>

    </div>
</div>	
	
</body>
</html>

