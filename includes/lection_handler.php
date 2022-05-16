<?php

session_start();
require_once("connectDB.php");

// СОЕДИНЯЕМ ПОЛНОЕ ИМЯ ЛЕКЦИИ
$lection = $_GET["page"] . "_" . $_GET["num"];

// СОЗДАЁМ ПЕРЕМЕННУЮ С НАЗВАНИЕМ СЛЕДУЮЩЕЙ ЛЕКЦИИ И ССЫЛКУ НА НЕЁ
$next_lection_num = $_GET["num"] + 1;
$page = "pages/lections/" . $_GET["topic"] . "/" . $_GET["page"] . "_" . $next_lection_num . ".php";
if(file_exists($page)) {
    $link = "content.php?section=" . $_GET["section"] . "&topic=" . $_GET["topic"] . "&page=lection&num=_" . $next_lection_num;
} else {
    $link = "content.php?section=" . $_GET["section"] . "&topic=" . $_GET["topic"] . "&topic_full_name=Введение&page=test";
}

// ПРОВЕРЯЕМ, ЧИТАЛ ЛИ ПОЛЬЗОВАТЕЛЬ ДАННУЮ ЛЕКЦИЮ РАНЕЕ
$stmt = $pdo->prepare("SELECT * FROM completed_lections AS cl INNER JOIN user AS u ON cl.user_id = u.id WHERE section = :section AND topic = :topic AND lection = :lection AND user_id = :uid;");

$stmt->bindParam(":section", $_GET["section"]);
$stmt->bindParam(":topic", $_GET["topic"]);
$stmt->bindParam(":lection", $lection);
$stmt->bindParam(":uid", $_SESSION["user_id"]);

$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_LAZY)) {
    $lection_db = $row["lection"];
}

if(!isset($lection_db)) {

    // ЕСЛИ НЕТ, ТО ЗАПИСЫВАЕМ В БД ЧТО ЛЕКЦИЯ ПРОЧИТАНА
    $record_stmt = $pdo->prepare("INSERT INTO completed_lections (section, topic, lection, user_id) VALUES (:section, :topic, :lection, :uid);");

    $record_stmt->bindParam(":section", $_GET["section"]);
    $record_stmt->bindParam(":topic", $_GET["topic"]);
    $record_stmt->bindParam(":lection", $lection);
    $record_stmt->bindParam(":uid", $_SESSION["user_id"]);

    $record_stmt->execute();

    // ПРОВЕРЯЕМ, ЕСЛИ В БД ЗАПИСЬ С ПРОГРЕССОМ У ДАННОГО ПОЛЬЗОВАТЕЛЯ
    $progress_stmt = $pdo->prepare("SELECT completed_lections, user_id FROM user INNER JOIN progress ON user.id = progress.user_id WHERE section = :section AND user_id = :uid");

    $progress_stmt->bindParam(":section", $_GET["section"]);
    $progress_stmt->bindParam(":uid", $_SESSION["user_id"]);

    $progress_stmt->execute();

    while ($row = $progress_stmt->fetch(PDO::FETCH_LAZY)) {
        $com_lec_db = $row["completed_lections"];
        $user_id_db = $row["user_id"];
    }

    if(!isset($user_id_db)) {

        // ЕСЛИ НЕТ, ТО СОЗДАЁМ ЗАПИСЬ, ЗАПИСЫВАЯ ЧТО ПОЛЬЗОВАТЕЛЬ ПРОЧИТАЛ СВОЮ ПЕРВУЮ ЛЕКЦИЮ
        $insert_progress_stmt = $pdo->prepare("INSERT INTO progress (completed_lections, section, user_id) VALUES (:value, :section, :uid);");

        $insert_progress_stmt->bindParam(":value", $value = 1);
        $insert_progress_stmt->bindParam(":section", $_GET["section"]);
        $insert_progress_stmt->bindParam(":uid", $_SESSION["user_id"]);

        $insert_progress_stmt->execute();

        // ВОЗВРАЩАЕМ ЕГО НА ОСНОВНУЮ СТРАНИЦУ САЙТА, НО УЖЕ НА СЛЕДУЮЩУЮ ЛЕКЦИЮ
        header("Location: ../" . $link);
       
    } else {

        // ЕСЛИ ДА, ТО УВЕЛИЧИВАЕМ СЧЁТЧИК
        $update_progress_stmt = $pdo->prepare("UPDATE progress SET completed_lections = :value WHERE (section = :section AND user_id = :uid);");

        $com_lec_db++;
        $update_progress_stmt->bindParam(":value", $com_lec_db);
        $update_progress_stmt->bindParam(":section", $_GET["section"]);
        $update_progress_stmt->bindParam(":uid", $_SESSION["user_id"]);

        $update_progress_stmt->execute();

        // ВОЗВРАЩАЕМ ЕГО НА ОСНОВНУЮ СТРАНИЦУ САЙТА, НО УЖЕ НА СЛЕДУЮЩУЮ ЛЕКЦИЮ
        header("Location: ../" . $link);
    }

} else {
    // ВОЗВРАЩАЕМ ЕГО НА ОСНОВНУЮ СТРАНИЦУ САЙТА, НО УЖЕ НА СЛЕДУЮЩУЮ ЛЕКЦИ
    header("Location: ../" . $link);
}
?>