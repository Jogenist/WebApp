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
    
    <?php include "navbar.php";
    include "db_connect.php";
    #keys: 1A7WY1GIQ35IYI50, UEHA1N7EEYXN3TZZ, POXK65LMPSIFYHCQ

  /*   $rate = $rate['Realtime Currency Exchange Rate'];
    $dataforAllDays = $data['Time Series (Daily)'];
    $dataforSingleDay = $dataforAllDays['2023-01-13'];
    $data = $dataforSingleDay['1. open'];
    $data = substr($data, 0, 5);
    $rate = $rate['5. Exchange Rate'];
    $data = $data * $rate; #convert from dollar to euro
    $amount = 1;
    $value = $data * $amount; #calculate total value */
    ?>

    <div class="wrapper">
        <div class="row">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>WkN</th>
                        <th>Anzahl</th>
                        <th>Kurs [&#x20AC;]</th>
                        <th>Wert [&#x20AC;]</th>
                    </tr>
                    <tr>
                        <td>Mercedes-Benz Group</td>
                        <td>710000</td>
                        <td><?= $amount ?></td>
                        <td><?= $data ?></td>
                        <td><?= $value ?></td>
                    </tr>
                </table> 
            </div>
        </div>
    </div>
</body>

</html>