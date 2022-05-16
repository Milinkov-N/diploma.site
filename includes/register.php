<?php

require_once("connectDB.php");

// В САМОМ НАЧАЛЕ ПРОБИВАЕМ ПОЛУЧЕННЫЕ ДАННЫЕ ПО БД
$check_stmt = $pdo->prepare("SELECT email, password FROM user WHERE email = :email AND password = :password;");

$check_stmt->bindParam(':email', $check_email);
$check_stmt->bindParam(':password', $check_psw);

$check_email = $_POST["email"];
$check_psw = $_POST["password"];
    
$check_stmt->execute();

while($row = $check_stmt->fetch(PDO::FETCH_LAZY)) {
    $emaildb = $row["email"];
    $pswdb = $row["password"];
}

switch (empty($emaildb) && empty($pswdb)) {

    // ЕСЛИ ПОЛЬЗОВАТЕЛЯ С ДАННЫМ ЛОГИНОМ И ПАРОЛЕМ НЕ СУЩЕСТВУЕТ, ПРОВЕРЯЕМ НАЛИЧИЕ В БД ВВЕДЁННЫХ ИМЕНИ И ФАМИЛИИ (нужно если пользователь проходил регистрацию через vk? google и тд)
    case true:
        $stmt = $pdo->prepare("SELECT id, name, surname, email, password, vk_user_id FROM user WHERE name = :name AND surname = :surname;");

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':surname', $surname);

        $name = $_POST["name"];
        $surname = $_POST["surname"];

        $stmt->execute();

        while($row = $stmt->fetch(PDO::FETCH_LAZY)) {
            $id_db = $row["id"];
            $namedb = $row["name"];
            $surnamedb = $row["surname"];
        }

        // ЕСЛИ ПОЛЬЗОВАТЕЛЬ С ДАННЫМИ ИМЕНЕМ И ФАМИЛИЕЙ СУЩЕСТВУЕТ, НО ОН НЕ ИМЕЕТ ЛОГИНА И ПАРОЛЯ, ТО ЗАПИСЫВАЕМ ИХ НА ЭТОТ АККАУНТ
        if($namedb == $_POST["name"] && $surnamedb == $_POST["surname"]) {
            $update_stmt = $pdo->prepare("UPDATE `diplomadb`.`user` SET `stud_group` = :stud_group, `email` = :email, `password` = :password WHERE (`id` = :id);");

            $update_stmt->bindParam(':id', $id_db);
            $update_stmt->bindParam(':stud_group', $update_group);
            $update_stmt->bindParam(':email', $update_email);
            $update_stmt->bindParam(':password', $update_psw);

            $update_group = $_POST["student-group"];
            $update_email = $_POST["email"];
            $update_psw = $_POST["password"];

            $update_stmt->execute();

            header("Location: login_user.php");
        } else {

            // ИНАЧЕ ПРОСТО РЕГИСТРИУЕМ ЕГО В НОВОЙ ЗАПИСИ
            $stmt = $pdo->prepare("INSERT INTO user (id, name, surname, stud_group, email, password) VALUES (NULL, :name, :surname, :stud_group, :email, :password);");
        
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':surname', $surname);
            $stmt->bindParam(':stud_group', $group);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $psw);
        
            $name = $_POST["name"];
            $surname = $_POST["surname"];
            $group = $_POST["student-group"];
            $email = $_POST["email"];
            $psw = $_POST["password"];
                
            $stmt->execute();
        
            header("Location: login_user.php");
        }

       
        break;

    case false:
        echo "Error! That user already exist.";
        break;
}

?>