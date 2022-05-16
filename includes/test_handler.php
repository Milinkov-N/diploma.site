<?php

require_once("connectDB.php");


// ДОСТАЁМ ИЗ БД ВСЕ ПРАВИЛЬНЫЕ ОТВЕТЫ ПО ДАННОМУ ТЕСТУ
$stmt = $pdo->prepare("SELECT correct_answer FROM exam_questions WHERE section = :section AND topic = :topic;");

$stmt->bindParam(":section", $_POST["section"]);
$stmt->bindParam(":topic", $_POST["topic"]);

$stmt->execute();

$counter = 1;
$q_counter = 1;
$test_score = 0;

// ЗАНЕСЕНИЕ В МАССИВ ПРАВИЛЬНЫХ ОТВЕТОВ ПО ДАННОМУ ТЕСТУ ИЗ БД
while($row = $stmt->fetch(PDO::FETCH_LAZY)) {
    $db_answers[$counter] = $row["correct_answer"];

    $counter++;

    // $row_count = 1;

    // while($row_empty == false) {

    //     if(!empty($row[$row_count])) {
    //         $db_answers[$row_count] = $row["correct_answer"];

    //         $row_count++;
    //     } else {
    //         $row_empty = true;
    //     }
    // }
}

// ЦИКЛ ПОДСЧЁТА ПРАВИЛЬНЫХ ОТВЕТОВ
for ($i = 1; $i < count($_POST) - 1; $i++) { 
    if(!empty($_POST["question_".$q_counter]) && !empty($db_answers[$q_counter]) && $_POST["question_".$q_counter] == $db_answers[$q_counter]) {
        $test_score += 1; 
    };

    // echo "DB answer " . $i . ": " . $db_answers[$i] . "<br>";
    // echo "POST  " . $i . ": " . $_POST["question_".$i] . "<br>";

    $q_counter += 1;
};

// РАСЧЁТ ПОЛУЧЕННЫХ БАЛЛОВ В ПРОЦЕНТАХ
$TS_percent = ($test_score / ($counter - 1)) * 100;

// ПРИСВОЕНИЕ ОЦЕНКИ ПО ПЯТИТИБАЛЛЬНОЙ ШКАЛЕ В ЗАВИСИМОСТИ ОТ НАБРАННОГО ПРОЦЕНТА  
switch ($TS_percent) {
    case 0:
        $mark = 2;
        break;
    case $TS_percent <= 50:
        $mark = 2;
        break;
    case $TS_percent <= 70:
        $mark = 3;
        break;
    case $TS_percent <= 85:
        $mark = 4;
        break;
    case $TS_percent > 85:
        $mark = 5;
        break;
}

$stmt = $pdo->prepare("SELECT mark FROM test_results WHERE section = :section AND topic = :topic AND user_id = :user_id;");

$stmt->bindParam(":section", $_POST["section"]);
$stmt->bindParam(":topic", $_POST["topic"]);
$stmt->bindParam(":user_id", $_POST["user_id"]);

$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_LAZY)) {
    $markdb = $row["mark"];
}

// ЕСЛИ СТУДЕНТ НЕ ПРОХОДИЛ ТЕСТ, ТО РЕЗУЛЬТАТ ЗАПИСЫВАЕТСЯ В БД
if(!isset($markdb)) {
    $record_stmt = $pdo->prepare("INSERT INTO test_results (section, topic, topic_full_name, mark, user_id) VALUES (:section, :topic, :topic_fname, :mark, :user_id);");

    $record_stmt->bindParam(":section", $_POST["section"]);
    $record_stmt->bindParam(":topic", $_POST["topic"]);
    $record_stmt->bindParam(":topic_fname", $_POST["topic_fname"]);
    $record_stmt->bindParam(":mark", $mark);
    $record_stmt->bindParam(":user_id", $_POST["user_id"]);

    $record_stmt->execute();

    // ПРОВЕРЯЕМ, ЕСЛИ В БД ЗАПИСЬ С ПРОГРЕССОМ У ДАННОГО ПОЛЬЗОВАТЕЛЯ
    $progress_stmt = $pdo->prepare("SELECT completed_tests, user_id FROM user INNER JOIN progress ON user.id = progress.user_id WHERE section = :section AND user_id = :uid");

    $progress_stmt->bindParam(":section",  $_POST["section"]);
    $progress_stmt->bindParam(":uid", $_POST["user_id"]);

    $progress_stmt->execute();

    while ($row = $progress_stmt->fetch(PDO::FETCH_LAZY)) {
        $com_tests_db = $row["completed_tests"];
        $user_id_db = $row["user_id"];
    }

    if(!isset($user_id_db)) {

        // ЕСЛИ НЕТ, ТО СОЗДАЁМ ЗАПИСЬ, ЗАПИСЫВАЯ ЧТО ПОЛЬЗОВАТЕЛЬ ПРОШЁЛ СВОЙ ПЕРВЫЙ ТЕСТ  
        $insert_progress_stmt = $pdo->prepare("INSERT INTO progress (completed_tests, section, user_id) VALUES (:value, :section, :uid);");

        $insert_progress_stmt->bindParam(":value", $value = 1);
        $insert_progress_stmt->bindParam(":section", $_POST["section"]);
        $insert_progress_stmt->bindParam(":uid", $_POST["user_id"]);

        $insert_progress_stmt->execute();

    } else {

        // ЕСЛИ ДА, ТО УВЕЛИЧИВАЕМ СЧЁТЧИК
        $update_progress_stmt = $pdo->prepare("UPDATE progress SET completed_tests = :value WHERE (section = :section AND user_id = :uid);");

        $com_tests_db++;
        $update_progress_stmt->bindParam(":value", $com_tests_db);
        $update_progress_stmt->bindParam(":section", $_POST["section"]);
        $update_progress_stmt->bindParam(":uid", $_POST["user_id"]);

        $update_progress_stmt->execute();

    }

    echo "Количество вопросов - " . ($counter - 1) .
     "; Набранные баллы - " . $test_score .
     "; Набранные баллы в процентах - " . $TS_percent. "%" .
     "; Оценка - " . $mark;
} else {
    echo "Этот тест уже пройден!";
}
?>