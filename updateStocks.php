<?php
include "db_connect.php";
$sql = "SELECT * FROM stocks";
$result = mysqli_query($mysqli, $sql);

if (!$result) {
    die("Invalid query: " . $mysqli->error);
}

while ($entry = $result->fetch_assoc()) {
    $stock_name = $entry['Name'];
    $stock_symbol = $entry['Symbol'];
    $amount = $entry['Amount'];
    #build api request string
    #keys: 1A7WY1GIQ35IYI50, UEHA1N7EEYXN3TZZ, POXK65LMPSIFYHCQ
    #get stock price by stock symbol
    $search_str1 = 'https://www.alphavantage.co/query?function=TIME_SERIES_DAILY_ADJUSTED&symbol=';
    $search_str2 = '&apikey=1A7WY1GIQ35IYI50';
    $search_str = $search_str1 . $stock_symbol . $search_str2;
    $json = file_get_contents($search_str);
    $price = json_decode($json, true);
    $priceforAllDays = $price['Time Series (Daily)'];
    $priceforSingleDay = $priceforAllDays['2023-01-13'];
    $price = $priceforSingleDay['1. open'];
    $price = substr($price, 0, 5);
    echo('new price: ');
    echo ($price);
    #get exchange rate 
    $search_str = 'https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency=EUR&to_currency=USD&apikey=UEHA1N7EEYXN3TZZ';
    $json = file_get_contents($search_str);
    $rate = json_decode($json, true);
    $rate = $rate['Realtime Currency Exchange Rate'];
    $rate = $rate['5. Exchange Rate'];

    #update price currency
    $price = $price * $rate;

    #calculate value
    $value = $price * $amount;
    $sql = "UPDATE stocks SET Price=$price WHERE Symbol='$stock_symbol'";
 
    $result = $mysqli->query($sql);
}
include "redirect.php";

?>