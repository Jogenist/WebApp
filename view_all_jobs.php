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
    <title>Alle Aufträge</title>
</head>

<body>

    <?php include "navbar.php"; ?>
    <div class="wrapper">
        <div class="title">Alle Aufträge</div>

        <div style="overflow-x:auto;">
            <table id="emp-table" class="custom-table">
                <thead>
                    <th col-index=1>Auftrags-Nr.</th>

                    <th col-index=2 class="table-head">Kunde
                        <select class="table-filter" onchange="filter_rows()">
                            <option value="all"></option>
                        </select>
                    </th>

                    <th col-index=3 class="table-head">Fahrzeug
                        <select class="table-filter" onchange="filter_rows()">
                            <option value="all"></option>
                        </select>
                    </th>

                    <th col-index=4 class="table-head">Modell
                        <select class="table-filter" onchange="filter_rows()">
                            <option value="all"></option>
                        </select>
                    </th>

                    <th col-index=5 class="table-head">Zeitstempel
                        <select class="table-filter" onchange="filter_rows()">
                            <option value="all"></option>
                        </select>
                    </th>

                    <th col-index=6>Leistung
                        <select class="table-filter" onchange="filter_rows()">
                            <option value="all"></option>
                        </select>
                    </th>

                    <th col-index=7>Zeitaufwand</th>

                    <th col-index=8>Kommentar
                        <!--
                        <select class="table-filter" onchange="filter_rows()">
                            <option value="all"></option>
                        </select>
                        -->
                    </th>

                </thead>

                <tbody>

                    <?php
                    include "./php/db_connect.php";

                    $sql = "SELECT * FROM auftrag";
                    $result = mysqli_query($mysqli, $sql);

                    if (!$result) {
                        die("Invalid query: " . $mysqli->error);
                    }


                    while ($row = $result->fetch_assoc()) {

                        // Aktuelle fahrzeugID übernehmen um aus der Tabelle den Namen als Zeichenketette darzustellen
                        $sql_name = "SELECT k.Vorname FROM kunden as k JOIN fahrzeuge AS f on f.KundenID = k.ID JOIN auftrag as a ON a.FahrzeugID = f.ID WHERE a.fahrzeugID ='".$row["FahrzeugID"]."'";
                        $result_name = mysqli_query($mysqli, $sql_name);
                        $value_Vorname = $result_name->fetch_object();

                        $sql_name = "SELECT k.Nachname FROM kunden as k JOIN fahrzeuge AS f on f.KundenID = k.ID JOIN auftrag as a ON a.FahrzeugID = f.ID WHERE a.fahrzeugID ='".$row["FahrzeugID"]."'";
                        $result_name = mysqli_query($mysqli, $sql_name);
                        $value_Nachname = $result_name->fetch_object();

                        $sql_brand = "SELECT m.Marke FROM marken as m JOIN fahrzeuge AS f on f.MarkenID = m.ID JOIN auftrag as a ON a.FahrzeugID = f.ID WHERE a.fahrzeugID ='".$row["FahrzeugID"]."'";
                        $result_vehicle = mysqli_query($mysqli, $sql_brand);
                        $value_brand = $result_vehicle->fetch_object();

                        $sql_model = "SELECT f.Typ FROM auftrag as a JOIN fahrzeuge AS f on a.FahrzeugID= f.ID WHERE a.FahrzeugID='".$row["FahrzeugID"]."'";
                        $result_model = mysqli_query($mysqli, $sql_model);
                        $value_model = $result_model->fetch_object();

                        echo "<tr>
                        <td>" . $row["ID"] . "</td>
                        <td>" . $value_Vorname->Vorname. " ". $value_Nachname->Nachname."</td>
                        <td>" . $value_brand->Marke."</td>
                        <td>" . $value_model->Typ."</td>
                        <td>" . $row["Zeitstempel"] . "</td>
                        <td>" . $row["Leistung"] . "</td>
                        <td>" . $row["Zeitaufwand"] . "</td>
                        <td>" . $row["Kommentar"] . "</td>
                        </tr>";
                            }
                    ?>


                </tbody>
            </table>
            <!-- <script>getUniqueValuesFromColumn()
    </script> -->
            <script>
                window.onload = () => {
                    console.log(document.querySelector("#emp-table > tbody > tr:nth-child(1) > td:nth-child(2) ").innerHTML);
                };

                getUniqueValuesFromColumn()

            </script>
        </div>
    </div>
</body>

</html>