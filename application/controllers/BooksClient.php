<?php
class BooksClient extends MY_SoapClient
{
   function __construct()
   {
      parent::__construct("http://localhost/soappractice/index.php/booksserver/?wsdl");
   }

   function getBook($isbn)
   {
      $author = $this->call([$isbn, "author_name"], "BooksServer.getBook");
      $title = $this->call([$isbn, "title"], "BooksServer.getBook");
      echo "$title: $author <br><br>";
   }
}