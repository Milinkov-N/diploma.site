<?php

require_once("connectDB.php");
$stmt = $pdo->prepare("SELECT login, password FROM admin WHERE login = :login AND password = :password;");

$stmt->bindParam(':login', $login);
$stmt->bindParam(':password', $psw);

$login = $_POST["admin_login"];
$psw = $_POST["admin_password"];
    
$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_LAZY)) {
    $login = $row["login"];
    $psw = $row["password"];
}

if ($login === $_POST["admin_login"] && $psw === $_POST["admin_password"]) {

    session_start();

    $_SESSION["admin_login"] = $_POST["admin_login"];
    $_SESSION["admin_password"] = $_POST["admin_password"];

    header("Location: /admin/content.php");
}