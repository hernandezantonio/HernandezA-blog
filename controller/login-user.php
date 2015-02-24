<?php
require_once(__DIR__ . "/../model/config.php"); 

$username = filter_input(INPUT_POST,"username", FILTER_SANATIZE_STRING);
$password = filter_input(INPUT_POST, "password", FILTER_SANATIZE_STRING); 

$query = $_SESSION["connection"]->query("SELECT salt, password FROM users WHERE username = '$username' "); 