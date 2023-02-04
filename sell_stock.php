<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Neue Kundendaten</title>
  <link rel="stylesheet" type="text/css" href="./css/style_add.css?version=51">
  <link rel="stylesheet" type="text/css" href="./css/navbar.css?version=51">
</head>


<!-- Aufbau der Seite mit Formular -->
<body>
<?php include "navbar.php"; ?>
<div class="wrapper">
    <div class="title">Sell Stocks</div>

    <!-- Formular Begin-->
    <form class="form" action="sell_stock_from_database.php" >

      <!-- Klasse für Eimgabefelder-->
      <div class="inputfield">
        <label class="label">Stock Symbol</label>
        <input class="inputs" type="text"  id="add_stk_symb" name="add_stk_symb" required>
      </div>

      <div class="inputfield">
        <label class="label">Amount</label>
        <input class="inputs" type="text" id="add_amount" name="add_amount" required>
      </div>

      <!-- Speicherknopf -->
      <input class="btn" type="submit" value="Sell">
    </form>
</div>

</body>

</html>