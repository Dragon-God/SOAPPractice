<?php
require_once("nusoap-0.9.5/lib/nusoap.php");

$client = new nusoap_client("http://localhost/SOAPPractice/soap-server.php?wsdl");
$stockPrice = $client->call('getStockQuote', ['symbol' => 'ABC']);
foreach ($stockPrice as $key => $value) {
   echo "$key:\t $value <br>";
}
// echo "The stock price for 'ABC' is {$stockPrice}";