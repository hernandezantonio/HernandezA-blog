<?php

require_once(__DIR__  ."/../model/database.php");

$connection = new mysqli($host, $username, $password ); 

if($connection-> connect_error){
    die("Error: ". $connection-> connect_error);
}

$exist = $connection->select_db($database);

if(!$exist){
   $query = $connection-> query("CREATE DATABASE $database ");
  
           if($query){
               echo "successfuly created database: ". $database;  
            }
           }
           else{
               echo "database already exist."; 
           }
           
   $query = $connection-> query("CREATE TABLE posts("
           ."id in(11) NOT NULL AUTO INCREMENT,"
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