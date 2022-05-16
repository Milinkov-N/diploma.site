<?php

// ПЕРЕМЕННЫЕ ОБЩЕГО КОЛИЧЕСТВА ЛЕКЦИЙ И ТЕСТОВ ПО ОСНОВАМ ОПЕР. СИСТЕМ И ОСНОВ АРХИТЕКТУРЫ ЭВМ

$OS_total_lections = 20;
$OS_total_tests = 6;
$OA_total_lections = 23;
$OA_total_tests = 9;

session_start();

if(!isset($_SESSION["login"], $_SESSION["password"])){

    header("Location: index.php");

} else {

    require_once("includes/connectDB.php");

    // ЗАПРОС НА ПОЛУЧЕНИЕ ПРОГРЕССА ПОЛЬЗОВАТЕЛЯ ПО ОСНОВАМ ОПЕР. СИСТЕМ

    $OSprogress_stmt = $pdo->prepare("SELECT completed_lections, completed_tests FROM user INNER JOIN progress ON user.id = progress.user_id WHERE user.email = :email AND user.password = :password AND section = 'oper_sys';");

    $OSprogress_stmt->bindParam(":email", $_SESSION["login"]);
    $OSprogress_stmt->bindParam(":password", $_SESSION["password"]);

    $OSprogress_stmt->execute();

    while($row = $OSprogress_stmt->fetch(PDO::FETCH_LAZY)) {
        $OScompleted_lections = $row["completed_lections"];
        $OScompleted_tests = $row["completed_tests"];
    }

    // ЗАПРОС НА ПОЛУЧЕНИЕ ПРОГРЕССА ПОЛЬЗОВАТЕЛЯ ПО ОСНОВАМ АРХИТЕКТУРЫ ЭВМ

    $OAprogress_stmt = $pdo->prepare("SELECT completed_lections, completed_tests FROM user INNER JOIN progress ON user.id = progress.user_id WHERE user.email = :email AND user.password = :password AND section = 'osn_arch';");

    $OAprogress_stmt->bindParam(":email", $_SESSION["login"]);
    $OAprogress_stmt->bindParam(":password", $_SESSION["password"]);

    $OAprogress_stmt->execute();

    while($row = $OAprogress_stmt->fetch(PDO::FETCH_LAZY)) {
        $OAcompleted_lections = $row["completed_lections"];
        $OAcompleted_tests = $row["completed_tests"];
    }

    // ПОДСЧЁТ ПРОЦЕНТА ПРОГРЕССА ПОЛЬЗОВАТЕЛЯ ПО ОБОИМ РАЗДЕЛАМ

    $OStotal_progress = (($OScompleted_lections + $OScompleted_tests) / ($OS_total_lections + $OS_total_tests)) * 100;
    $OAtotal_progress = (($OAcompleted_lections + $OAcompleted_tests) / ($OA_total_lections + $OA_total_tests)) * 100;

    // ЗАПРОС НА ПОЛУЧЕНИЕ РЕЗУЛЬТАТОВ ИТОГОВЫХ ТЕСТОВ ПОЛЬЗОВАТЕЛЯ ПО ОСНОВАМ ОПЕР. СИСТЕМ

    $OStests_results_stmt = $pdo->prepare("SELECT topic_full_name, mark FROM user INNER JOIN test_results ON user.id = test_results.user_id WHERE user.email = :email AND user.password = :password AND section = 'oper_sys';");

    $OStests_results_stmt->bindParam(":email", $_SESSION["login"]);
    $OStests_results_stmt->bindParam(":password", $_SESSION["password"]);

    $OStests_results_stmt->execute();

    // ЗАПРОС НА ПОЛУЧЕНИЕ РЕЗУЛЬТАТОВ ИТОГОВЫХ ТЕСТОВ ПОЛЬЗОВАТЕЛЯ ПО ОСНОВАМ АРХИТЕКТУРЫ ЭВМ

    $OAtests_results_stmt = $pdo->prepare("SELECT topic_full_name, mark FROM user INNER JOIN test_results ON user.id = test_results.user_id WHERE user.email = :email AND user.password = :password AND section = 'osn_arch';");

    $OAtests_results_stmt->bindParam(":email", $_SESSION["login"]);
    $OAtests_results_stmt->bindParam(":password", $_SESSION["password"]);

    $OAtests_results_stmt->execute();


}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="css/profile-style.css">
    <link rel="shortcut icon" href="img/vmt.ico" type="image/x-icon">
    <title><?php echo $_SESSION["name"] . " " . $_SESSION["surname"] ?></title>
</head>
<body>
    <div class="content">
        <a href="
            <?php

            if(isset($_GET["page"])) {
                echo "profile.php";
            } else {
                echo "content.php";
            }
            ?>" class="return">
            <img src="img/logout.svg" alt="image">
            <span>Назад</span>
        </a>

        <div class="main-info">
            <img src="img/user.svg" alt="image">
            <span class="name"><?php echo $_SESSION["name"] . " " . $_SESSION["surname"] ?></span>
            <span class="group">Группа: <?php if(isset($_SESSION["group"])) { echo $_SESSION["group"]; } else { echo "Не указана"; } ?></span>
            <a href="profile.php?page=profile_edit" <?php if(isset($_GET["page"])) { echo "hidden"; } ?>><button class="edit-btn">Редактировать профиль</button></a>
        </div>

        <?php
        if($_GET["page"] == "profile_edit") {
            $page = "includes/pages/" . $_GET["page"] . ".php";

            if(file_exists($page)) {
                include($page);
            }
        } else {
            include("includes/pages/profile_main.php");
        }
        ?>
    </div>

    <script src="js/profile-ajax.js"></script>
</body>
</html>