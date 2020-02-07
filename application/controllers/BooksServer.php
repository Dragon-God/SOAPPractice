<?php
class BooksServer extends MY_SoapServer
{
   function __construct()
   {
      parent::__construct("BooksServer", "http://localhost/soappractice/booksserver");
   }

   function getBookInfo($isbn, $property)
   {
      $this->loads("booksmodel");
      return $this->booksmodel->getBook($isbn)->$property;
   }

   function getBookData($isbn)
   {
      $this->loads("booksmodel");
      return $this->booksmodel->getBook($isbn);
   }

   function index()
   {
      $this->register(
         "BooksServer.getBookInfo",
         [
            "isbn" => "xsd:string",
            "property" => "xsd:string"
         ],
         ["data" => "xsd:string"]
      );

      $this->serve();
   }
}