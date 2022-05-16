<?php

$appID = '7835093';
$url_script = 'http://diploma.site/includes/vk_login_user.php';

session_start();

if(isset($_SESSION["login"], $_SESSION["password"])){
    require_once("includes/connectDB.php");
    $stmt = $pdo->prepare("SELECT email, password FROM user WHERE email = :email AND password = :password;");

    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $psw);

    $email = $_SESSION["login"];
    $psw = $_SESSION["password"];
        
    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_LAZY)) {
        $emaildb = $row["email"];
        $pswdb = $row["password"];
    }

    if ($_SESSION["login"] === $emaildb && $_SESSION["password"] === $pswdb) {

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
        <title>Вход | Регистрация</title>
        <link rel="stylesheet" href="css/form-style.css">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <link rel="shortcut icon" href="img/vmt.ico" type="image/x-icon">
    </head>
    <body>
        <div class="hero">
            <div class="form-box">
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" id="btn-log" class="toggle-btn" onclick="login()">Вход</button>
                    <button type="button" id="btn-reg" class="toggle-btn" onclick="register()">Регистрация</button>
                </div>
                <div class="social-icons">
                <a href='<?php echo 'https://oauth.vk.com/authorize?client_id='.$appID.'&redirect_uri='.$url_script.'&response_type=code'; ?>'><img src="img/vk.svg" alt="050-vk"></a>
                    
                    <img src="img/google.svg" alt="behance">
                    <img src="img/instagram.svg" alt="inst">
                </div>
                <form action="/includes/login_user.php" method="POST" id="login" class="input-group">
                    <input type="email" name="email" id="email" class="input-field" placeholder="Эл. почта" autofocus required>
                    <div class="password">
                        <input type="password" name="password" id="passwordL" class="input-field" placeholder="Пароль" required>
                        <img id="eye-hideL" src="img/162-visibility.svg" alt="see password" onclick="eyehideL()">
                        <img id="eye-seeL" src="img/140-visibility-1.svg" alt="see password" onclick="eyeseeL()">
                    </div>
                    <!-- <input type="checkbox" class="check-box"><span>Запомнить пароль</span> -->
                    <button type="submit" class="submit-btn" id="login-btn">Войти</button>
                </form>
                <form action="/includes/register.php" method="POST" id="register" class="input-group">
                    <input type="text" name="name" id="name" class="input-field" placeholder="Имя" required>
                    <input type="text" name="surname" id="surname" class="input-field" placeholder="Фамилия" required>
                    <select name="student-group" id="student-group" class="student-group" required>
                        <option value="" disabled selected hidden>Группа</option>
                        <option value="П-21">П-21</option>
                        <option value="П-22">П-22</option>
                        <option value="П-31">П-31</option>
                        <option value="П-32">П-32</option>
                    </select>
                    <input type="text" name="email" id="email" class="input-field" placeholder="Эл. почта" required>  
                    <div class="password">
                        <input type="password" name="password" id="passwordR" class="input-field" placeholder="Пароль" required>
                        <img id="eye-hideR" src="img/162-visibility.svg" alt="see password" onclick="eyehideR()">
                        <img id="eye-seeR" src="img/140-visibility-1.svg" alt="see password" onclick="eyeseeR()">
                    </div>
                    <!-- <input type="checkbox" class="check-box"><span>Я принимаю условия</span> -->
                    <button type="submit" class="submit-btn" id="reg-btn">Зарегистрироваться</button>
                </form>
            </div>
        </div>
        </div>

        <div class="attribution">
            <div>Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
            <div>Icons made by <a href="https://www.flaticon.com/authors/pixel-perfect" title="Pixel perfect">Pixel perfect</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
            <div>Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
        </div>
        <script src="js/form-script.js"></script>
    </body>
</html>