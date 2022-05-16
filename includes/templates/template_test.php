<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Справочник | Главная</title>
    <link rel="stylesheet" href="css/test-style.css">
    <link rel="stylesheet" href="css/template-style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<body>
    <div class="app">

        <!-- Боковое меню сайта -->
        <aside class="sidebar">
            <div class="logo">
                <a href=""><img src="img/logo.gif" alt="logo"></a>
            </div>
            <div class="list">
                <nav class="nav">
                    <h2 class="title">Операционные системы</h2>
                    <ul class="menu">
                        <li>
                            <a href="#" class="topic1-btn">Тема 1: "Основы опер. систем"</a>
                            <ul class="submenu topic1">
                                <li><a href="#">Лекция 1: "Название лекции"</a></li>
                                <li><a href="#">Лекция 2: "Название лекции"</a></li>
                                <li><a href="#">Лекция 3: "Название лекции"</a></li>
                                <li><a href="#">Лекция 4: "Название лекции"</a></li>
                                <li><a href="#">Лекция 5: "Название лекции"</a></li>
                                <li><a href="#">Лекция 6: "Название лекции"</a></li>
                                <li><a href="#">Лекция 7: "Название лекции"</a></li>
                                <a href="template_test.php?section=oper_sys&topic=introduction"><button type="button" class="btn">Итоговый тест</button></a>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="topic2-btn">Тема 2: "Опер. система UNIX"</a>
                            <ul class="submenu topic2">
                                <li><a href="#">Лекция 1: "Название лекции"</a></li>
                                <li><a href="#">Лекция 2: "Название лекции"</a></li>
                                <li><a href="#">Лекция 3: "Название лекции"</a></li>
                                <li><a href="#">Лекция 4: "Название лекции"</a></li>
                                <li><a href="#">Лекция 5: "Название лекции"</a></li>
                                <li><a href="#">Лекция 6: "Название лекции"</a></li>
                                <li><a href="#">Лекция 7: "Название лекции"</a></li>
                                <a href="#"><button type="button" class="btn">Итоговый тест</button></a>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="topic3-btn">Тема 3: "Опер. система Linux"</a>
                            <ul class="submenu topic3">
                                <li><a href="#">Лекция 1: "Название лекции"</a></li>
                                <li><a href="#">Лекция 2: "Название лекции"</a></li>
                                <li><a href="#">Лекция 3: "Название лекции"</a></li>
                                <li><a href="#">Лекция 4: "Название лекции"</a></li>
                                <li><a href="#">Лекция 5: "Название лекции"</a></li>
                                <li><a href="#">Лекция 6: "Название лекции"</a></li>
                                <li><a href="#">Лекция 7: "Название лекции"</a></li>
                                <a href="#"><button type="button" class="btn">Итоговый тест</button></a>
                            </ul>
                        </li>
                        <li><a href="#">Тема 4: "Организация UNIX-систем и..."</a></li>
                        <li><a href="#">Тема 5: "Администрирование ОС Solaris 9"</a></li>
                    </ul>
                </nav>
            </div>
            <div class="aside-footer">
                <a href="№"><button type="button" class="btn">Вернуться на сайт</button></a>

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
            <div class="wrapper">
                <h1>Итоговый тест</h1>
                <div class="accent-line"></div>
                <h2>По теме "Основы операционных систем"</h2>

                <form action="includes/test_handler.php" method="post" id="quiz" name="quiz">
                    <?php
                        require_once("includes/connectDB.php");

                        $stmt = $pdo->prepare("SELECT * FROM exam_questions WHERE section = :section AND topic = :topic;");

                        $stmt->bindParam(":section", $section);
                        $stmt->bindParam(":topic", $topic);

                        $section = $_GET["section"];
                        $topic = $_GET["topic"];

                        $stmt->execute();

                        echo "<input name='section' value='" . $section . "' hidden></input>";
                        echo "<input name='topic' value='" . $topic . "' hidden></input>";

                        $counter = 1;
                        $quest_counter = 1;

                        while($row = $stmt->fetch(PDO::FETCH_LAZY)) {
                                
                            echo "<h3>" . $quest_counter . ". " . $row["question"] . "?</h3>";
                            echo "<div class='select'>";
                                echo "<div class='quest'>";
                                    echo "<div class='answers'>";
                                        for ($i = 1; $i < 5; $i++) { 
                                            echo "<div class='answer-box'>";
                                                echo "<input type='radio' name='question_" . $counter . "' value='" . $row["answer_" . $i] . "' id='answ1'>";
                                                echo "<label for='answ" . $i . "'>" . $row["answer_" . $i] . "</label>";
                                            echo "</div>";
                                        };                                   
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                            
                            $quest_counter++;
                            if($counter == 4) {
                                $counter = 1;
                            } else {
                                $counter++;
                            }
                        }
                    ?>
                    <button type="submit" class="complete-btn">Завершить тест</button>
                </form> 
            </div>
        </main>
    </div>

    <script src="js/script.js"></script>
</body>
</html>