<?php
class Stocks extends MY_Controller
{
   function __construct()
   {
      parent::__construct("stocksmodel");
   }

   function price($symbol)
   {
      
      $result = $this->stocksmodel->getStockQuote($symbol);
      print_r($result);
      return $result;
   }

   function hello($name)
   {
      return "Hello $name!";
   }

   function add($a, $b)
   {
      $result = $a + $b;
      print_r($result);
      return $result;
   }

   function addStock($symbol, $data)
   {
      return $this->stocksmodel->addStock($symbol, $data);
   }
}