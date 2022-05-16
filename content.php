<?php

session_start();

if(!isset($_SESSION["login"], $_SESSION["password"])){

    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Справочник | 
    <?php

    if($_GET["page"] == "lection") {
        echo "Лекция";
    } elseif($_GET["page"] == "test") {
        echo "Тест";
    } else {
        echo "Главная";
    }
    ?>
    </title>
    <link rel="stylesheet" href="css/template-style.css">
    <link rel="stylesheet" href="css/lection-style.css">
    <link rel="stylesheet" href="css/test-style.css">
    <link rel="stylesheet" href="css/main-screen-style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="shortcut icon" href="img/vmt.ico" type="image/x-icon">
</head>
<body>
    <div class="app">

        <!-- Боковое меню сайта -->
        <aside class="sidebar">
            <div class="logo">
                <a href="content.php"><img src="img/logo.gif" alt="logo"></a>
            </div>
            <div class="list">
                <nav class="nav">
                    <h2 class="title">Операционные системы</h2>
                    <ul class="menu">
                        <li>
                            <a href="#" class="topic1-btn">Тема 1: "Основы теории операционных систем"</a>
                            <ul class="submenu topic1">
                                <li><a href="content.php?section=oper_sys&topic=introduction&page=lection&num=_1">Лекция 1: "Введение"</a></li>
                                <li><a href="content.php?section=oper_sys&topic=introduction&page=lection&num=_2">Лекция 2: "Классификация ОС"</a></li>
                                <li><a href="content.php?section=oper_sys&topic=introduction&page=lection&num=_3">Лекция 3: "Классификация ОС"</a></li>
                                <li><a href="content.php?section=oper_sys&topic=introduction&page=lection&num=_4">Лекция 4: "Интерфейс ОС"</a></li>
                                <a href="content.php?section=oper_sys&topic=introduction&topic_full_name=Введение&page=test"><button type="button" class="btn">Итоговый тест</button></a>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="topic2-btn">Тема 2: "Машинно-независимые свойства ОС"</a>
                            <ul class="submenu topic2">
                                <li><a href="content.php?section=oper_sys&topic=machine_independ&page=lection&num=_1">Лекция 1: "Понятие и назначение файловой системы NFS. Работа с файлами."</a></li>
                                <li><a href="content.php?section=oper_sys&topic=machine_independ&page=lection&num=_2">Лекция 2: "Работа с дисками"</a></li>
                                <li><a href="content.php?section=oper_sys&topic=machine_independ&page=lection&num=_3">Лекция 3: "Файловая система FAT"</a></li>
                                <a href="content.php?section=oper_sys&topic=machine_independ&topic_full_name=Введение&page=test"><button type="button" class="btn">Итоговый тест</button></a>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="topic3-btn">Тема 3: "Операционная система MS DOS для ПЭВМ"</a>
                            <ul class="submenu topic3">
                                <li><a href="content.php?section=oper_sys&topic=ms_dos&page=lection&num=_1">Лекция 1: "Основные сведения о MS DOS"</a></li>
                                <li><a href="content.php?section=oper_sys&topic=ms_dos&page=lection&num=_2">Лекция 2: "Технология работы в MS DOS"</a></li>
                                <li><a href="content.php?section=oper_sys&topic=ms_dos&page=lection&num=_3">Лекция 3: "Командные файлы MS DOS"</a></li>
                                <a href="content.php?section=oper_sys&topic=ms_dos&topic_full_name=Введение&page=test"><button type="button" class="btn">Итоговый тест</button></a>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="topic4-btn">Тема 4: "Операционная система WINDOWS95/98/ME/2000"</a>
                            <ul class="submenu topic4">
                                <li><a href="content.php?section=oper_sys&topic=win_os&page=lection&num=_1">Лекция 1: "Основные сведения об ОС WINDOWS"</a></li>
                                <li><a href="content.php?section=oper_sys&topic=win_os&page=lection&num=_2">Лекция 2: "Архитектура ОС WINDOWS"</a></li>
                                <li><a href="content.php?section=oper_sys&topic=win_os&page=lection&num=_3">Лекция 3: "Файловая система WINDOWS"</a></li>
                                <li><a href="content.php?section=oper_sys&topic=win_os&page=lection&num=_4">Лекция 4: "Основные объекты WINDOWS"</a></li>
                                <li><a href="content.php?section=oper_sys&topic=win_os&page=lection&num=_5">Лекция 5: "Начальная загрузка ОС WINDOWS. Режимы работы WINDOWS"</a></li>
                                <li><a href="content.php?section=oper_sys&topic=win_os&page=lection&num=_6">Лекция 6: "Работа приложений WINDOWS. Обмен данными между приложениями"</a></li>
                                <a href="content.php?section=oper_sys&topic=win_os&topic_full_name=Введение&page=test"><button type="button" class="btn">Итоговый тест</button></a>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="topic5-btn">Тема 5: "Машинно-зависимые свойства ОС"</a>
                            <ul class="submenu topic5">
                                <li><a href="content.php?section=oper_sys&topic=machine_depend&page=lection&num=_1">Лекция 1: "Планирование процессов"</a></li>
                                <li><a href="content.php?section=oper_sys&topic=machine_depend&page=lection&num=_2">Лекция 2: "Управление реальной памятью"</a></li>
                                <li><a href="content.php?section=oper_sys&topic=machine_depend&page=lection&num=_3">Лекция 3: "Управление виртуальной памятью"</a></li>
                                <a href="content.php?section=oper_sys&topic=machine_depend&topic_full_name=Введение&page=test"><button type="button" class="btn">Итоговый тест</button></a>
                            </ul>
                        </li>
                        <li><a href="content.php?section=oper_sys&topic=file_managers&page=lection&num=_1">Тема: 6: "Файловые менеджеры"</a></li>
                        <li><a href="content.php?section=oper_sys&topic=viruses&page=lection&num=_1">Тема: 7: "Компьютерные вирусы"</a></li>
                        <li><a href="content.php?section=oper_sys&topic=data_compression&page=lection&num=_1">Тема: 8: "Сжатие информации"</a></li>
                        <li><a href="content.php?section=oper_sys&topic=installation_control&page=lection&num=_1">Тема: 9: "Контроль за установкой и удалением приложений"</a></li>
                        <li><a href="content.php?section=oper_sys&topic=service_resources&page=lection&num=_1">Тема: 10: "Сервисные средства"</a></li>
                        <li><a href="content.php?section=oper_sys&topic=modern_os&page=lection&num=_1">Тема: 11: "Обзор современных операционных систем"</a></li>
                    </ul>
                </nav>
            </div>

            <div class="aside-footer">
                <a href="#"><button type="button" class="btn">Перейти к Осн. Арх.</button></a>

                <div>Разработано студентами ВМТ</div>
                <div><span>Милиньковым Никитой</span> и <span>Аннюком Алексеем</span></div>
                <div>2021</div>
            </div>
        </aside>

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

        <main class="main">
            <div class="profile">
                <div class="avatar">
                    <span><?php echo $_SESSION["name"] . " " . $_SESSION["surname"] ?></span>
                    <img src="img/user.svg" alt="image">
                </div>
                <hr>
                <div class="btn-group">
                    <a href="profile.php">Личный кабинет</a>
                    <a href="includes/logout.php" class="logout">Выйти</a>
                </div>
            </div>
            <?php

                // В ЗАВИСИМОСТИ ОТ ТОГО, ПО КАКОЙ ССЫЛКЕ НАЖАЛ ПОЛЬЗОВАТЕЛЬ, ПОДГРУЖАЕМ НА ОСНОВНУЮ СТРАНИЦУ ЗАПРОШЕННЫЙ МАТЕРИАЛ
                if($_GET["page"] == "lection") {
                    $page = "includes/pages/lections/" . $_GET["topic"] . "/" . $_GET["page"] . $_GET["num"] . ".php";

                    if(file_exists($page)) {
                        include($page);
                    }
                } elseif($_GET["page"] == "") {

                    // ВАРИАНТ ПО УМОЛЧАНИЮ
                    include("includes/pages/main.php");
                } else {
                    $page = "includes/pages/" . $_GET["page"] . ".php";

                    if(file_exists($page)) {
                        include($page);
                    }
                }
            ?>
        </main>
    </div>

    <script src="js/script.js"></script>
    <script src="js/test-ajax.js"></script>
    <script src="js/carousel-script.js"></script>
</body>
</html>