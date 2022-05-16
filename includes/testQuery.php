<?php

// query 

require_once("connectDB.php");

$stmt = $pdo->prepare("SELECT * FROM user;");
$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_LAZY)) {
    echo $row["0"] . ' ';
    echo $row["1"] . '<br>';
    echo $row["2"] . '<br>';
    echo $row["3"] . '<br>';
    echo $row["4"] . '<br>';
}