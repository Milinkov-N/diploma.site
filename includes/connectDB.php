<?php

// connection to database

$host = 'localhost';
$db = 'diplomadb';
$user = 'root';
$pass = 'root';
$charset = 'utf8';

try {
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $pdo = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br>";
    die();
}