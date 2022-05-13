<?php 
 define("HOST", "localhost");
 define("username", "root");
 define("password", "");
 define("database", "shop");
 $mysqli = new mysqli(HOST, username, password, database);


 if ($mysqli->connect_errno) {
   printf("Connection error: ", $mysqli->connect_error);
   exit();
 } else {
  //  echo "Connection success";
 }