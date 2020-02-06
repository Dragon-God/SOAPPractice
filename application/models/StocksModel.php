<?php
class StocksModel extends CI_Model
{
   function __construct()
   {
      $this->load->database();
   }

   function getStockQuote($symbol)
   {
      $query = $this->db
         ->where("stock_symbol", $symbol)
         ->get("stockprices");
         
      $row = $query->result()[0];
      return $row->stock_price;
   }

   function addStock($symbol, $price)
   {
      $this->db->insert("stockprices", [
         "stock_symbol" => $symbol,
         "stock_price" => $price
      ]);
      return $this->db->insert_id();
   }
}