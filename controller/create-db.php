<?php

require_once(__DIR__  ."/../model/database.php");

$connection = new mysqli($host, $username, $password ); 

if($connection-> connect_error){
    die("<p>Error: ". $connection-> connect_error."</p>");
}

$exist = $connection->select_db($database);

if(!$exist){
   $query = $connection-> query("CREATE DATABASE $database ");
  
           if($query){
               echo "<p>successfuly created database: ". $database. "</p>";  
            }
           }
           else{
               echo "<p>database already exist.</p>"; 
           }
             
   $query = $connection->query("CREATE TABLE posts ("
           ."id int(11) NOT NULL AUTO_INCREMENT,"
           ."title varchar(255) NOT NULL,"
           ."post text NOT NULL,"
           ."PRIMARY KEY (id))");

   if($query){
       echo "succesfully created table: post";
   }
   else {
       echo"<p>$connection->error</p>";
   }

$connection->close();  