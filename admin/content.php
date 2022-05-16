<?php

session_start();

if(isset($_SESSION["admin_login"], $_SESSION["admin_password"]) == false){

    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Справочник | Администратор</title>
    <link rel="stylesheet" href="../css/template-style.css">
    <link rel="stylesheet" href="../css/admin-style.css">
    <link rel="stylesheet" href="../css/lection-style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="shortcut icon" href="../img/vmt.ico" type="image/x-icon">
</head>
<body>
    <div class="app">

        <!-- Боковое меню сайта -->
        <aside class="sidebar">
            <div class="logo">
                <a href="content.php"><img src="/img/logo.gif" alt="logo"></a>
            </div>
            <!-- Меню админ-панели -->
            <div class="admin-list">
                <!-- В отдельной странице админ-панели изменить название класса тега nav на nav -->
                <nav class="admin">
                    <ul>
                        <li class="main-section <?php if($_GET["page"] == "main" || $_GET["page"] == "") { echo "selected"; } ?>"><a href="content.php?page=main">Данные об успеваемости</a></li>
                        <li class="edit-section <?php if($_GET["page"] == "edit") { echo "selected"; } ?>"><a href="content.php?page=edit">Редактирование</a></li>
                        <li><a href="#">Прочее</a></li>
                    </ul>
                </nav>
            </div>

            <div class="aside-footer">
                <a href="/includes/logout_admin.php"><button type="button" class="btn">Вернуться на сайт</button></a>

                <div>Разработано студентами ВМТ</div>
                <div><span>Милиньковым Никитой</span> и <span>Аннюком Алексеем</span></div>
                <div>2021</div>
            </div>
        </aside>

        <main class="main">
            <?php

            // В ЗАВИСИМОСТИ ОТ ТОГО, ПО КАКОЙ ССЫЛКЕ НАЖАЛ ПОЛЬЗОВАТЕЛЬ, ПОДГРУЖАЕМ НА ОСНОВНУЮ СТРАНИЦУ ЗАПРОШЕННЫЙ МАТЕРИАЛ
            if($_GET["page"] == "edit") {
                $page = "../includes/pages/admin/" . $_GET["page"] . ".php";

                if(file_exists($page)) {
                    include($page);
                }
            } else {
                $page = "../includes/pages/admin/main.php";

                if(file_exists($page)) {
                    include($page);
                }
            }
            ?>
            <div class="menu-button">
            <div class="open">
                <div class="btn-bar"></div>
                <div class="btn-bar"></div>
                <div class="btn-bar"></div>
            </div>
            <div class="close">
                <div class="btn-bar first"></div>
                <div class="btn-bar second"></div>
            </div>
        </div>
        </main>
    </div>
    <script src="../js/admin-script.js"></script>
</body>
</html>