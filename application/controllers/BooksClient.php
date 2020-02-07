<?php
class BooksClient extends MY_SoapClient
{
   function __construct()
   {
      parent::__construct("http://localhost/soappractice/index.php/booksserver/?wsdl");
   }

   function getBookInfo($isbn)
   {
      $author = $this->call([$isbn, "author_name"], "BooksServer.getBookInfo");
      $title = $this->call([$isbn, "title"], "BooksServer.getBookInfo");
      echo "$title: $author <br><br>";
   }
}