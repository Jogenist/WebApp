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
    <title>Kundendaten</title>
</head>

<body>
<?php include "navbar.php"; ?>
    <div class="wrapper">
        <div class="title">Kundendaten</div>

        <table id="emp-table" class="custom-table">
            <thead>
                <th col-index=1>Kunden-Nr.</th>

                <th col-index=2 class="table-head">Vorname
                    <select class="table-filter" onchange="filter_rows()">
                        <option value="all"></option>
                    </select>
                </th>

                <th col-index=3>Nachname
                    <select class="table-filter" onchange="filter_rows()">
                        <option value="all"></option>
                    </select>
                </th>

            </thead>

            <tbody>

                <?php
                include "./php/db_connect.php";

                $sql = "SELECT * FROM kunden";
                $result = mysqli_query($mysqli, $sql);

                if (!$result) {
                    die("Invalid query: " . $mysqli->error);
                }


                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                <td>" . $row["ID"] . "</td>
                <td>" . $row["Vorname"] . "</td>
                <td>" . $row["Nachname"] . "</td>
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

    <?php
        include "./php/db_connect.php";

        $sql = "SELECT * FROM kunden";
        $result = mysqli_query($mysqli, $sql);

        if (!$result) {
            die("Invalid query: " . $mysqli->error);
        }


        while ($row = $result->fetch_assoc()) {

            echo "<div class='wrapper'>
            <div class='title'>".$row["Vorname"]."</div> </div>";
        }
        ?>
</body>

</html>