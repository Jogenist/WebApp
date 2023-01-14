<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="./css/style_add.css?version=51">
    <link rel="stylesheet" type="text/css" href="./css/navbar.css?version=51">

    <script src="./filter.js"></script>

    <!-- <link rel="stylesheet" href="./css-1.css"> -->
    <title>Fahrzeuge</title>
</head>

<body>

    <?php include "navbar.php"; ?>

    <div class="wrapper">
        <div class="title">Filter</div>


        <!-- Formular Begin-->
        <form class="form" action="?action=filter" method="post">

        <div class="inputfield">
                <label class="label">Vorname</label>
                <div class="custom-select">
                    <select id="Kunden_Vorname" name="Kunden_Vorname">
                        <option value="">--Bitte auswählen--</option>

                        <?php
                        include "./php/db_connect.php";
                        $sql = "SELECT * FROM kunden";
                        $all_customers = mysqli_query($mysqli, $sql);

                        while ($customer = mysqli_fetch_array($all_customers, MYSQLI_ASSOC)):
                            ;
                            ?>

                            <option value="<?php echo $customer["ID"]; ?>">

                                <?php echo $customer["Vorname"];
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
                <label class="label">Nachname</label>
                <div class="custom-select">
                    <select id="Kunden_Nachname" name="Kunden_Nachname">
                        <option value="">--Bitte auswählen--</option>

                        <?php
                        include "./php/db_connect.php";
                        $sql = "SELECT * FROM kunden";
                        $all_customers = mysqli_query($mysqli, $sql);

                        while ($customer = mysqli_fetch_array($all_customers, MYSQLI_ASSOC)):
                            ;
                            ?>

                            <option value="<?php echo $customer["ID"]; ?>">

                                <?php echo $customer["Nachname"];
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

            <input class="btn" type="submit" value="Anwenden">
        </form>
    </div>

    <?php
        filter();
    ?>


    <?php
    function filter()
    {
        include "./php/db_connect.php";

        //$Kunden_Vorname= $_GET["Kunden_Vorname"];

        //$sql = "SELECT * FROM kunden as k JOIN fahrzeuge AS f on f.KundenID = k.ID WHERE  k.Vorname LIKE '%".$Kunden_Vorname."%'";
        $sql = "SELECT * FROM  fahrzeuge";
        $result = mysqli_query($mysqli, $sql);

        if (!$result) {
            die("Invalid query: " . $mysqli->error);
        }

        while (($row = $result->fetch_assoc())) {

            // Aktuelle KundenID übernehmen um aus der Tabelle den Namen als Zeichenketette darzustellen
            $sql_name = "SELECT kunden.Vorname FROM kunden Where kunden.ID ='" . $row["KundenID"] . "'";
            $result_name = mysqli_query($mysqli, $sql_name);
            $value_Vorname = $result_name->fetch_object();

            $sql_name = "SELECT kunden.Nachname FROM kunden Where kunden.ID ='" . $row["KundenID"] . "'";
            $result_name = mysqli_query($mysqli, $sql_name);
            $value_Nachname = $result_name->fetch_object();

            $sql_brand = "SELECT m.Marke FROM marken as m JOIN fahrzeuge AS f on f.MarkenID = m.ID WHERE f.ID ='" . $row["ID"] . "'";
            $result_vehicle = mysqli_query($mysqli, $sql_brand);
            $value_brand = $result_vehicle->fetch_object();


            echo "<div class='wrapper'>
            <div class='title'> Fahrzeug-Nr." . $row["ID"] . "</div> 
            <div class='inputfield'>
                <label class='label'>Name</label>
                <input class='inputs' type='text' placeholder='$value_Vorname->Vorname  $value_Nachname->Nachname' readonly>
            </div>

            <div class='inputfield'>
                <label class='label'>Marke</label>
                <input class='inputs' type='text' placeholder='$value_brand->Marke' readonly>
            </div>

            <div class='inputfield'>
                <label class='label'>Typ</label>
                <input class='inputs' type='text' placeholder='$row[Typ]' readonly>
            </div>

            <div class='inputfield'>
                <label class='label'>Variante</label>
                <input class='inputs' type='text' placeholder='$row[Variante]' readonly>
            </div>

            <div class='inputfield'>
                <label class='label'>TSN</label>
                <input class='inputs' type='text' placeholder='$row[TSN]' readonly>
            </div>

            <div class='inputfield'>
                <label class='label'>HSN</label>
                <input class='inputs' type='text' placeholder='$row[HSN]' readonly>
            </div>

            <div class='inputfield'>
                <label class='label'>Motorbezeichnung</label>
                <input class='inputs' type='text' placeholder='$row[Motorbezeichnung]' readonly>
            </div>
            
            
            
            </div>";
        }
    }
    ?>


</body>

</html>