<?php
class StocksServer extends MY_SoapServer
{
   function __construct()
   {
      parent::__construct("StocksServer", "http://localhost/soappractice/stocksserver/");
   }

   function price($symbol)
   {
      $this->loads("stocksmodel");
      return $this->stocksmodel->getStockQuote($symbol);
   }

   function hello($name)
   {
      return "Hello $name!";
   }

   function add($a, $b)
   {
      return $a + $b;
   }

   function addStock($symbol, $data)
   {
      $this->loads("stocksmodel");
      return $this->stocksmodel->addStock($symbol, $data);
   }

   function index()
   {
      $this->register(
         "StocksServer.price",
         ["symbol" => "xsd:string"],
         ["return" => "xsd:decimal"]
      );
      $this->register(
         "StocksServer.hello",
         ["name" => "xsd:string"],
         ["return" => "xsd:string"]
      );
      $this->register(
         "StocksServer.add",
         [
            "a" => "xsd:decimal",
            "b" => "xsd:decimal"
         ],
         ["return" => "xsd:decimal"]
      );
      $this->register(
         "StocksServer.addStock",
         [
            "symbol"  => "xsd:string",
            "price" => "xsd:string"
         ],
         ["return" => "xsd:integer"]
      );
      
      $this->serve();
   }
}