<?php
// config/database.php // app/models/Event.php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'event_management');

class Database
{
    private $conn;

    public function __construct()
    {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
            $this->conn = new PDO($dsn, DB_USER, DB_PASS);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Enable exceptions for errors
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
?>