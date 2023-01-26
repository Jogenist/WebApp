<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="./css/style_table.css?version=51">
    <link rel="stylesheet" type="text/css" href="./css/navbar.css?version=51">

    <script src="./filter.js"></script>

    <!-- <link rel="stylesheet" href="./css-1.css"> -->
    <title>Fahrzeuge</title>
</head>

<body>

    <?php include "navbar.php"; ?>

    <div class="wrapper">
        <div class="title">Fahrzeuge</div>

        <div style="overflow-x:auto;">
            <table id="emp-table" class="custom-table">
                <thead>
                    <th col-index=1>Fahrzeug-Nr.</th>

                    <th col-index=2 class="table-head">KundenID
                        <select class="table-filter" onchange="filter_rows()">
                            <option value="all"></option>
                        </select>
                    </th>

                    <th col-index=3>Typ
                        <select class="table-filter" onchange="filter_rows()">
                            <option value="all"></option>
                        </select>
                    </th>

                    <th col-index=4>Variante
                        <select class="table-filter" onchange="filter_rows()">
                            <option value="all"></option>
                        </select>
                    </th>

                    <th col-index=5>TSN
                        <select class="table-filter" onchange="filter_rows()">
                            <option value="all"></option>
                        </select>
                    </th>

                    <th col-index=6>HSN
                        <select class="table-filter" onchange="filter_rows()">
                            <option value="all"></option>
                        </select>
                    </th>

                    <th col-index=7>Motorbezeichnung
                        <select class="table-filter" onchange="filter_rows()">
                            <option value="all"></option>
                        </select>
                    </th>

                </thead>

                <tbody>

                    <?php
                    include "./php/db_connect.php";

                    $sql = "SELECT * FROM fahrzeuge";
                    $result = mysqli_query($mysqli, $sql);

                    if (!$result) {
                        die("Invalid query: " . $mysqli->error);
                    }

                    while (($row = $result->fetch_assoc()) ) {

                        // Aktuelle KundenID übernehmen um aus der Tabelle den Namen als Zeichenketette darzustellen
                        $sql_name = "SELECT kunden.Vorname FROM kunden Where kunden.ID ='".$row["KundenID"]."'";
                        $result_name = mysqli_query($mysqli, $sql_name);
                        $value_Vorname = $result_name->fetch_object();

                        $sql_name = "SELECT kunden.Nachname FROM kunden Where kunden.ID ='".$row["KundenID"]."'";
                        $result_name = mysqli_query($mysqli, $sql_name);
                        $value_Nachname = $result_name->fetch_object();

                        echo "<tr>
                <td>" . $row["ID"] . "</td>
                <td>" . $value_Vorname->Vorname. " ". $value_Nachname->Nachname."</td>
                <td>" . $row["Typ"] . "</td>
                <td>" . $row["Variante"] . "</td>
                <td>" . $row["TSN"] . "</td>
                <td>" . $row["HSN"] . "</td>
                <td>" . $row["Motorbezeichnung"] . "</td>
                </tr>";
                    }
                    ?>


                </tbody>
            </table>
        </div>
        <!-- <script>getUniqueValuesFromColumn()
    </script> -->
        <script>
            window.onload = () => {
                console.log(document.querySelector("#emp-table > tbody > tr:nth-child(1) > td:nth-child(2) ").innerHTML);
            };

            getUniqueValuesFromColumn()

        </script>
    </div>


    <?php
        include "./php/db_connect.php";

        $sql = "SELECT * FROM fahrzeuge";
        $result = mysqli_query($mysqli, $sql);

        if (!$result) {
            die("Invalid query: " . $mysqli->error);
        }

        while (($row = $result->fetch_assoc()) ) {

            // Aktuelle KundenID übernehmen um aus der Tabelle den Namen als Zeichenketette darzustellen
            $sql_name = "SELECT kunden.Vorname FROM kunden Where kunden.ID ='".$row["KundenID"]."'";
            $result_name = mysqli_query($mysqli, $sql_name);
            $value_Vorname = $result_name->fetch_object();

            $sql_name = "SELECT kunden.Nachname FROM kunden Where kunden.ID ='".$row["KundenID"]."'";
            $result_name = mysqli_query($mysqli, $sql_name);
            $value_Nachname = $result_name->fetch_object();

            $sql_brand = "SELECT m.Marke FROM marken as m JOIN fahrzeuge AS f on f.MarkenID = m.ID WHERE f.ID ='".$row["ID"]."'";
            $result_vehicle = mysqli_query($mysqli, $sql_brand);
            $value_brand = $result_vehicle->fetch_object();


            echo "<div class='wrapper'>
            <div class='title'> Fahrzeug Nr." .$row["ID"]."</div> 
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
        ?>

















    
</body>

</html>