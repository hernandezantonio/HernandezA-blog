<?php
require_once(__DIR__ . "/../model/config.php"); 

$email = filter_input(input_post, "email", FILTER_SANITIZE_EMAIL);
$username = filter_input (INPUT_POST, "username", FILTER_SANATIZE_STRING); 
$password = filter_input (INPUT_POST, "password", FILTER_SANITIZE_STRING);
 

$salt = "$5$" . "rounds=5000$" . uniqid(mt_rand(), true) . "$"; 

$hashedPassword = crypt($password, $salt); 

$query = $_SESSION["connection"]->query("INSERT INTO users SET "
        . "email = '$email',"
        ."username = '$username',"
        . "password ='$hashedPassword',"
        . "salt = '$salt'");

if($query){
    echo "successfully created user: $username";
    
}
else {
    echo "<p>" . $_SESSION["connection"]->error . "</p>"; 
}