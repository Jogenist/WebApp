<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>virtual stock portfolio</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css?version=51">
    <link rel="stylesheet" type="text/css" href="./css/navbar.css?version=51">
    <style>
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
    </style>
    <meta charset="utf-8">
</head>

<body>
    
    <?php 
    include "navbar.php";
    include "./php/db_users_connect.php";
    // Initialize the session
    session_start();
  
    // Check if the user is logged in, otherwise redirect to login page
      if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
    #keys: 1A7WY1GIQ35IYI50, UEHA1N7EEYXN3TZZ, POXK65LMPSIFYHCQ
    ?>
    <div class="wrapper">
    <form action="./php/updateStocks.php" method="get">
    <input type="submit" value="Refresh portfolio">
    <p>
    </p>
    </form> 
        <div class="row">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>WkN</th>
                        <th>Anzahl</th>
                        <th>Kurs [&#x20AC;]</th>
                        <th>Wert [&#x20AC;]</th>
                    </tr>   
                    <?php
                    include "./php/db_connect.php";
                    #$sql = "UPDATE stocks SET Price=$price WHERE Symbol='$stock_symbol'";
                    $user = $_SESSION["username"];
                    $sql = "SELECT * FROM stocks WHERE User='$user'";
                    $result = mysqli_query($mysqli, $sql);

                    if (!$result) {
                        die("Invalid query: " . $mysqli->error);
                    }


                    while ($row = $result->fetch_assoc()) {
                        $stock_name = $row['Name'];
                        $stock_symbol = $row['Symbol'];
                        $amount = $row['Amount'];
                        $price = $row['Price'];
                        $value = $row['Value'];

                        echo "<tr>
                        <td>" . $stock_name ."</td>
                        <td>" . $stock_symbol . " </td>
                        <td>" . $amount ."</td>
                        <td>" . $price ."</td>
                        <td>" . $value . "</td>
                        </tr>";
                            }
                    ?>
                </table> 
            </div>
        </div>
    </div>
</body>

</html>