<?php
  // Initialize the session
  session_start();
  
  // Check if the user is logged in, otherwise redirect to login page
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
      header("location: login.php");
      exit;
  }
 
  // Include config file
  require_once "db_users_connect.php";
  include "db_connect.php";

  $symbol_from_form = $_GET["add_stk_symb"];
  $amount_from_form = $_GET["add_amount"];

  if ((!empty($symbol_from_form)) && (!empty($amount_from_form))) 
  {
    #build api request string
    #keys: 1A7WY1GIQ35IYI50, UEHA1N7EEYXN3TZZ, POXK65LMPSIFYHCQ
    #get company data by stock symbol
    $search_str1 = 'https://www.alphavantage.co/query?function=OVERVIEW&symbol=';
    $search_str2 = '&apikey=1A7WY1GIQ35IYI50';
    $search_str = $search_str1 . $symbol_from_form . $search_str2;
    $json = file_get_contents($search_str);
    $company = json_decode($json,true);
    print_r($company);
    $company = $company['Name'];
 
    #get stock price by stock symbol
    $search_str1 = 'https://www.alphavantage.co/query?function=TIME_SERIES_DAILY_ADJUSTED&symbol=';
    $search_str2 = '&apikey=1A7WY1GIQ35IYI50';
    $search_str = $search_str1 . $symbol_from_form . $search_str2;
    $json = file_get_contents($search_str);
    $price = json_decode($json,true);
    $priceforAllDays = $price['Time Series (Daily)'];
    $priceforSingleDay = $priceforAllDays['2023-01-13'];
    $price = $priceforSingleDay['1. open'];
    $price = substr($price, 0, 5);

    #get exchange rate 
    $search_str = 'https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency=EUR&to_currency=USD&apikey=UEHA1N7EEYXN3TZZ';
    $json =  file_get_contents($search_str);
    $rate = json_decode($json, true);
    $rate = $rate['Realtime Currency Exchange Rate'];
    $rate = $rate['5. Exchange Rate'];

    #update price currency
    $price = $price * $rate;

    #calculate value
    $value = $price * $amount_from_form;
  
    // mySQL Anfrage verpackt in php
    $user = $_SESSION["username"];
    $sql = "INSERT INTO stocks (Name, Symbol, Amount, Price, Value, User) VALUES ('$company', '$symbol_from_form', '$amount_from_form', '$price', '$value', '$user')";
    $result = $mysqli->query($sql);
    echo '<script>alert("Kundendaten gespeichert")</script>';
  }
  else
  {
    echo '<script>alert("Bitte Felder follständig ausfüllen!")</script>';
  }


  include "redirect.php";
?>
