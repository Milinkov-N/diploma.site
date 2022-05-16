<div class="wrapper">
    <h1>Итоговый тест</h1>
    <div class="accent-line"></div>
    <h2>По теме "Основы операционных систем"</h2>

    <form method="post" id="quiz" name="quiz">
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
            echo "<input name='user_id' value='" . $_SESSION["user_id"] . "' hidden></input>";
            echo "<input name='topic_fname' value='" . $_GET["topic_full_name"] . "' hidden></input>";

            $counter = 1;
            $quest_counter = 1;

            while($row = $stmt->fetch(PDO::FETCH_LAZY)) {
                    
                echo "<h3>" . $quest_counter . ". " . $row["question"] . "?</h3>";
                echo "<div class='select'>";
                    echo "<div class='quest'>";
                        echo "<div class='answers'>";
                            for ($i = 1; $i < 5; $i++) { 
                                echo "<div class='answer-box'>";
                                    echo "<input type='radio' name='question_" . $quest_counter . "' value='" . $row["answer_" . $i] . "' id='answ" . $i . "'>";
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