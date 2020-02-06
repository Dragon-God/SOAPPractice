<?php
class StocksClient extends MY_SoapClient
{
   function __construct()
   {
      parent::__construct("http://localhost/soappractice/index.php/stocksserver/?wsdl");
   }

   function display($params, $action)
   {
      $result = $this->call($params, $action);
      if ($result)
         echo "<br><h2>Result</h2><p>{$result}</p><br><br>";
   }

   function price($symbol)
   {
      $this->display(["symbol" => $symbol], "StocksServer.price");
   }

   function hello($name="World")
   {
      $this->display(["name" => $name], "StocksServer.hello");
   }

   function add($a, $b)
   {
      $this->display(["a" => $a, "b" => $b], "StocksServer.add");
   }

   function addStock($symbol, $price)
   {
      $this->display(["symbol" => $symbol, "price" => $price], "StocksServer.addStock");
   }
}