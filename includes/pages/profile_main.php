<div class="progress">
    <h1>Прогресс</h1>

    <div class="info">
        <div class="total">
            <span>Общий прогресс по "Основам Операционных Систем"</span>
            <div class="progress-bar">
                <div class="bar">
                    <div class="oper-sys" style="width: <?php echo round($OStotal_progress, 0, PHP_ROUND_HALF_DOWN); ?>%"></div>
                </div>
                <span class="percent"><?php echo round($OStotal_progress, 0, PHP_ROUND_HALF_DOWN); ?>%</span>
            </div>
        </div>
        
        <div class="other-info">
            <span>Прочитано лекций: <?php echo $OScompleted_lections . " из " . $OS_total_lections; ?></span>
            <span>Завершено итоговых тестов: <?php echo $OScompleted_tests . " из " . $OS_total_tests; ?></span>
        </div>           
    </div>
    <div class="info">
        <div class="total">
            <span>Общий прогресс по "Основам Архитектуры ЭВМ"</span>
            <div class="progress-bar">
                <div class="bar">
                    <div class="osn-arch" style="width: <?php echo round($OAtotal_progress, 0, PHP_ROUND_HALF_DOWN); ?>%"></div>
                </div>
                <span class="percent"><?php echo round($OAtotal_progress, 0, PHP_ROUND_HALF_DOWN); ?>%</span>
            </div>
        </div>

        <div class="other-info">
        <span>Прочитано лекций: <?php echo $OAcompleted_lections . " из " . $OA_total_lections; ?></span>
            <span>Завершено итоговых тестов: <?php echo $OAcompleted_tests . " из " . $OA_total_tests; ?></span>
        </div>           
    </div>
</div>

<div class="progress">
    <h1>Успеваемость</h1>

    <div class="info">
        <div class="total">
            <span>Итоговая оценка по "Основам Операционных Систем"</span>
            <div class="result">5</div>
        </div>

        <div class="tests-results">
            <span>Оценки за итоговые тесты:</span>
            <?php
            $e = 1;

            while($row = $OStests_results_stmt->fetch(PDO::FETCH_LAZY)) {
                echo "<div class='test'>";
                    echo "<span>$e. '" . $row["topic_full_name"] . "'</span>";
                    echo "<div class='result ";
                    switch ($row["mark"]) {
                        case 5:
                            echo "'>";
                            $OS_score_arr[$e] = 5;
                            break;
                        case 4:
                            echo "good'>";
                            $OS_score_arr[$e] = 4;
                            break;
                        case 3:
                            echo "average'>";
                            $OS_score_arr[$e] = 3;
                            break;
                        case 2:
                            echo "bad'>";
                            $OS_score_arr[$e] = 2;
                            break;
                        default:
                            echo "uncomplete'>";
                            $OS_score_arr[$e] = 0;
                            break;
                    };
                    if(isset($row["mark"])) { 
                        echo $row["mark"]; 
                    } else { 
                        echo "Тест не пройден"; 
                    };
                    echo "</div>";
                echo "</div>";

                $e++;      
            }
            ?>
            <div class="average-score">
                <span>Средний балл:</span>
                <?php 
                if(isset($OS_score_arr)) {
                    for ($i = 1; $i < count($OS_score_arr)+1; $i++) { 
                        $OS_score += $OS_score_arr[$i];
                    }

                    $OS_average_score = $OS_score / count($OS_score_arr);
                    echo "<div class='result ";
                    switch (round($OS_average_score, 0, PHP_ROUND_HALF_DOWN)) {
                        case 5:
                            echo "'>";
                            break;
                        case 4:
                            echo "good'>";
                            break;
                        case 3:
                            echo "average'>";
                            break;
                        case 2:
                            echo "bad'>";
                            break;
                        default:
                            echo "uncomplete'>";
                            break;
                    };
                    echo round($OS_average_score, 0, PHP_ROUND_HALF_DOWN) . "</div>";
                } 
                ?>
            </div>
        </div>
    </div>

    <div class="info">
        <div class="total">
            <span>Итоговая оценка по "Основам Архитектуры ЭВМ"</span>
            <div class="result good">4</div>
        </div>

        <div class="tests-results">
            <span>Оценки за итоговые тесты:</span>
            <?php
            $e = 1;

            while($row = $OAtests_results_stmt->fetch(PDO::FETCH_LAZY)) {
                echo "<div class='test'>";
                    echo "<span>$e. '" . $row["topic_full_name"] . "'</span>";
                    echo "<div class='result ";
                    switch ($row["mark"]) {
                        case 5:
                            echo "'>";
                            $OA_score_arr[$e] = 5;
                            break;
                        case 4:
                            echo "good'>";
                            $OA_score_arr[$e] = 4;
                            break;
                        case 3:
                            echo "average'>";
                            $OA_score_arr[$e] = 3;
                            break;
                        case 2:
                            echo "bad'>";
                            $OA_score_arr[$e] = 2;
                            break;
                        default:
                            echo "uncomplete'>";
                            $OA_score_arr[$e] = 0;
                            break;
                    };

                    if(isset($row["mark"])) { 
                        echo $row["mark"]; 
                    } else { 
                        echo "Тест не пройден"; 
                    };
                    echo "</div>";
                echo "</div>";

                $e++;
            }
            ?>
            <div class="average-score">
                <span>Средний балл:</span>
                <?php 
                // var_dump($OA_score_arr);

                if(isset($OA_score_arr)) {
                    for ($i = 1; $i < count($OA_score_arr)+1; $i++) { 
                        $OA_score += $OA_score_arr[$i];
                    }

                    $OA_average_score = $OA_score / count($OA_score_arr);
                    echo "<div class='result ";
                    switch (round($OA_average_score, 0, PHP_ROUND_HALF_DOWN)) {
                        case 5:
                            echo "'>";
                            break;
                        case 4:
                            echo "good'>";
                            break;
                        case 3:
                            echo "average'>";
                            break;
                        case 2:
                            echo "bad'>";
                            break;
                        default:
                            echo "uncomplete'>";
                            break;
                    };
                    echo round($OA_average_score, 0, PHP_ROUND_HALF_DOWN) . "</div>";
                }
                ?>
            </div>
        </div>
    </div>       
</div>