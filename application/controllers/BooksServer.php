<?php
class BooksServer extends MY_SoapServer
{
   function __construct()
   {
      parent::__construct("BooksServer", "http://localhost/soappractice/booksserver");
      $this->server->wsdl->addComplexType(
         "bookData",
         "complexType",
         "struct",
         "all",
         "",
         [
            "id" => [
               "name" => "id",
               "type" => "xsd:integer"
            ],
            "title" => [
               "name" => "title",
               "type" => "xsd:string"
            ],
            "author_name" => [
               "name" => "author_name",
               "type" => "xsd:string"
            ],
            "price" => [
               "name" => "price",
               "type" => "xsd:string"
            ],
            "isbn" => [
               "name" => "isbn",
               "type" => "xsd:string"
            ],
            "category" => [
               "name" => "category",
               "type" => "xsd:string"
            ],
         ]
      );
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
      $this->register(
         "BooksServer.getBookData",
         ["isbn" => "xsd:string"],
         ["books" => "tns:booksType"]
      );

      $this->serve();
   }
}