<?php
class BooksServer extends MY_SoapServer
{
   function __construct()
   {
      parent::__construct("BooksServer", "http://localhost/soappractice/booksserver");
   }

   function getBook($isbn, $property)
   {
      $this->loads("booksmodel");
      return $this->booksmodel->getBook($isbn)->$property;
   }

   function index()
   {
      $this->register(
         "BooksServer.getBook",
         [
            "isbn" => "xsd:string",
            "property" => "xsd:string"
         ],
         ["data" => "xsd:string"]
      );

      $this->serve();
   }
}