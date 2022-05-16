<?php
session_start();

// ФУНКЦИЯ ОБРАБОТЧИКА ЗАПРОСОВ
function update($row, $value) {
    require_once("connectDB.php");

    // В ЗАВИСИМОСТИ ОТ ТОГО, КАКОЕ ПОЛЕ В СВОЁМ ПРОФИЛЕ ХОЧЕТ ИЗМЕНИТЬ ПОЛЬЗОВАТЕЛЬ, ВЫЗЫВАЕТСЯ ПОДХОДЯШИЙ ЗАПРОС
    switch ($row) {
        case 'name':
            $stmt = $pdo->prepare("UPDATE user SET name = :value WHERE (id = :uid);");
            break;
        case 'surname':
            $stmt = $pdo->prepare("UPDATE user SET surname = :value WHERE (id = :uid);");
            break;
        case 'group':
            $stmt = $pdo->prepare("UPDATE user SET stud_group = :value WHERE (id = :uid);");
            break;
        case 'email':
            $stmt = $pdo->prepare("UPDATE user SET email = :value WHERE (id = :uid);");
            break;
        case 'password':
            $stmt = $pdo->prepare("UPDATE user SET password = :value WHERE (id = :uid);");
            break;
    }

    $stmt->bindParam(":value", $value);
    $stmt->bindParam(":uid", $_POST["uid"]);

    $stmt->execute();

    $result = "Данные успешно обновлены с " . $_SESSION[$row] . " на " . $value;

    return $result;
}

if(!empty($_POST["name"])) {
    $row = "name";
    $value = $_POST["name"];
    echo update($row, $value);
    $_SESSION["name"] = $_POST["name"];
}

if(!empty($_POST["surname"])) {
    $row = "surname";
    $value = $_POST["surname"];
    echo update($row, $value);
    $_SESSION["surname"] = $_POST["surname"];
}

if(!empty($_POST["group"])) {
    $row = "group";
    $value = $_POST["group"];
    echo update($row, $value);
    $_SESSION["group"] = $_POST["group"];
}

if(!empty($_POST["email"])) {
    $row = "email";
    $value = $_POST["email"];
    echo update($row, $value);
    $_SESSION["login"] = $_POST["email"];
}

if(!empty($_POST["password"])) {
    $row = "password";
    $value = $_POST["password"];
    echo update($row, $value);
    $_SESSION["password"] = $_POST["password"];
}
?>