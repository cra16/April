<?php


class DB_Control
{
  function DBC()
  {
      // Define database connection constants
      define('DB_HOST', "127.0.0.1");
      define('DB_USER', "root");
      define('DB_PASSWORD', "bitnami");
      define('DB_NAME', "april");
      define('KEY', "1as4fg7jk0");
      $link=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD) or die("Could not connect database");
      // Connect formzip
      header('Content-Type: text/html; charset=utf-8');
      mysqli_query($link,"set session character_set_connection=utf8;");
      mysqli_query($link,"set session character_set_results=utf8;");
      mysqli_query($link,"set session character_set_client=utf8;");

      mysqli_set_charset($link, "utf8");
      mysqli_select_db($link,DB_NAME) or die("Could not select database");
      // Check connection
      if ($link->connect_error) {
          die("Connection failed: " . $link->connect_error);
          return false;
      }
      return $link;
  } 
}
?>
