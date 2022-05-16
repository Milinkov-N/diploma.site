<?php

session_start();

if(isset($_SESSION["admin_login"], $_SESSION["admin_password"])){
    require_once("../includes/connectDB.php");
    $stmt = $pdo->prepare("SELECT login, password FROM admin WHERE login = :login AND password = :password;");

    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':password', $psw);

    $login = $_SESSION["admin_login"];
    $psw = $_SESSION["admin_password"];
        
    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_LAZY)) {
        $logindb = $row["login"];
        $pswdb = $row["password"];
    }

    if ($_SESSION["admin_login"] === $logindb && $_SESSION["admin_password"] === $pswdb) {

        header("Location: content.php");
    }
}

?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Вход</title>
        <link rel="stylesheet" href="../css/form-style.css">
        <link rel="shortcut icon" href="../img/vmt.ico" type="image/x-icon">
    </head>
    <body>
        <div class="hero">           
            <div class="form-box">
                <div class="header">
                    <h1>Авторизация</h1>
                    <span>в админ-панель</span>
                </div>
                <form action="../includes/login_admin.php" method="POST" id="login" class="input-group">
                    <input type="text" name="admin_login" id="admin_login" class="input-field" placeholder="Логин" required>
                    <div class="password">
                        <input type="password" name="admin_password" id="admin_password" class="input-field" placeholder="Пароль" required>
                        <img id="eye-hideL" src="../img/162-visibility.svg" alt="see password" onclick="eyehideL()">
                        <img id="eye-seeL" src="../img/140-visibility-1.svg" alt="see password" onclick="eyeseeL()">
                    </div>
                    <!-- <input type="checkbox" class="check-box"><span>Запомнить пароль</span> -->
                    <button type="submit" class="submit-btn" id="login-btn">Войти</button>
                </form>
                <div class="logo">
                    <a href="/index.php"><img src="../img/logo.gif" alt="logo"></a>
                </div>
            </div>
        </div>
        </div>

        <div class="attribution">
            <div>Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
            <div>Icons made by <a href="https://www.flaticon.com/authors/pixel-perfect" title="Pixel perfect">Pixel perfect</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
            <div>Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
        </div>
        <script src="../js/form-script.js"></script>
    </body>
</html>