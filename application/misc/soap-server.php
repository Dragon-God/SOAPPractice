<?php
require_once("nusoap-0.9.5/lib/nusoap.php");

function getStockQuote($symbol)
{
   $conn = mysqli_connect("localhost", "root", "", "soap_practice");
   $query = "SELECT stock_price FROM stockprices WHERE stock_symbol = '{$symbol}'";
   $result = mysqli_query($conn, $query);
   $row = mysqli_fetch_assoc($result);

   return $row["stock_price"];
}

$server = new soap_server();
$server->configureWSDL("stockserver", "urn:stockquote");
$server->register(
   "getStockQuote",
   ["symbol" => "xsd:string"],
   ["return" => "xsd:decimal"],
   "urn:stockquote",
   "urn:stockquote#getStockQuote"
);

$HTTP_RAW_POST_DATA = $HTTP_RAW_POST_DATA ?? '';
$server->service($HTTP_RAW_POST_DATA);