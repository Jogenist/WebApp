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
    <title>Kundendaten</title>
</head>

<body>
    <?php include "navbar.php"; ?>
    <div class="wrapper">
        <div class="title">Filter</div>
        <!-- Formular Begin-->
        <form class="form" action="?action=filter" method="POST">

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
    include "./php/db_connect.php";

    $sql = "SELECT * FROM kunden";
    $result = mysqli_query($mysqli, $sql);

    if (!$result) {
        die("Invalid query: " . $mysqli->error);
    }


    while ($row = $result->fetch_assoc()) {

        echo "<div class='wrapper'>
            <div class='title'> Kunden-Nr." . $row["ID"] . "</div> 
            <div class='inputfield'>
                <label class='label'>Vorname</label>
                <input class='inputs' type='text' placeholder='$row[Vorname]' readonly>
            </div>
            <div class='inputfield'>
                <label class='label'>Nachname</label>
                <input class='inputs' type='text' placeholder='$row[Nachname]' readonly>
            </div>
            </div>";
    }
    ?>

</body>

</html>