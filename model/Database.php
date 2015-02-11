<?php

class Database {

    private $connection;
    private $host;
    private $username;
    private $password;
    private $database;
    
    public $error; 

    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;

        $this->connection = new mysqli($host, $username, $password);

        if ($this->connection->connect_error) {
            die("<p>Error: " . $this->connection->connect_error . "</p>");
        }

        $exist = $this->connection->select_db($database);

        if (!$exist) {
            $query = $this->connection->query("CREATE DATABASE $database ");

            if ($query) {
                echo "<p>successfuly created database: " . $database . "</p>";
            }
        } else {
            echo "<p>database already exist.</p>";
        }
    }

    public function openConnection() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("<p>Error: " . $this->connection->connect_error . "</p>");
        }
    }

    public function closeConnection() {
        if (isset($this->connection)) {
            $this->connection->close();
        }
    }

    public function query($string) {
        $this->openConnection();

        $query = $this->connection->query($string);
        
        if(!$query){
            $this->error = $this->connection->error;  
        }

        $this->closeconnection();

        return $query;
    }

}
