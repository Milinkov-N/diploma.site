<?php

require_once("connectDB.php");
$stmt = $pdo->prepare("SELECT id, name, surname, stud_group, email, password FROM user WHERE email = :email AND password = :password;");

$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $psw);

$email = $_POST["email"];
$psw = $_POST["password"];
    
$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_LAZY)) {
    $user_id_db = $row["id"];
    $namedb = $row["name"];
    $surnamedb = $row["surname"];
    $groupdb = $row["stud_group"];
    $emaildb = $row["email"];
    $pswdb = $row["password"];
}

if ($emaildb === $_POST["email"] && $pswdb === $_POST["password"]) {

    session_start();

    $_SESSION["user_id"] = $user_id_db;
    $_SESSION["name"] = $namedb;
    $_SESSION["surname"] = $surnamedb;
    $_SESSION["group"] = $groupdb;
    $_SESSION["login"] = $_POST["email"];
    $_SESSION["password"] = $_POST["password"];

    header("Location: /content.php");

}

?>