<?php
    $server = 'localhost:3306';
    $username = 'root';
    $password = '';
    $database = 'php_login';
    
    try {
      $conexion = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    } catch (PDOException $e) {
      die('Connection Failed: ' . $e->getMessage());
    }

?>