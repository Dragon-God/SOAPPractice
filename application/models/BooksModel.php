<?php
class BooksModel extends CI_Model
{
   function __construct()
   {
      $this->load->database();
   }

   function getBook($isbn)
   {
      $query = $this->db
         ->where("isbn", $isbn)
         ->get("books");
      return $query->result()[0];
   }
}