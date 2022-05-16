<div class="wrapper">
    <div class="admin-sort">
        <h2>Группа</h2>
        <div class="sort">
            <button class="btn" id="p-21">П-21</button>
            <button class="btn" id="p-22">П-22</button>
            <button class="btn" id="p-31">П-31</button>
            <button class="btn" id="p-32">П-32</button>
        </div>
    </div>
    <table class="admin-table">
        <thead>
            <tr>
                <th>Имя Фамилия</th>
                <th>Группа</th>
                <th class="progress-osn-arh">Прогресс Осн. Арх.</th>
                <th class="progress-os">Прогресс ОС</th>
            </tr>
        </thead>
            <tbody>
                <?php

                    // ПЕРЕМЕННЫЕ ОБЩЕГО КОЛИЧЕСТВА ЛЕКЦИЙ И ТЕСТОВ ПО ОСНОВАМ ОПЕР. СИСТЕМ И ОСНОВ АРХИТЕКТУРЫ ЭВМ

                    $OS_total_lections = 20;
                    $OS_total_tests = 6;
                    $OA_total_lections = 23;
                    $OA_total_tests = 9;

                    require_once("../includes/connectDB.php");
                    $stmt = $pdo->prepare("SELECT * FROM user");
                        
                    $stmt->execute();
                
                    while($stud_row = $stmt->fetch(PDO::FETCH_LAZY)) {
                        switch ($stud_row["stud_group"]) {
                            case "П-21":
                                $stud_group = "p-21";
                                break;
                            case "П-22":
                                $stud_group = "p-22";
                                break;
                            case "П-31":
                                $stud_group = "p-31";
                                break;
                            case "П-32":
                                $stud_group = "p-32";
                                break;
                        }

                        $OStotal_progress = 0;
                        $OAtotal_progress = 0;

                        // ЗАПРОС НА ПОЛУЧЕНИЕ ПРОГРЕССА ПОЛЬЗОВАТЕЛЯ ПО ОСНОВАМ ОПЕР. СИСТЕМ

                        $OSprogress_stmt = $pdo->prepare("SELECT completed_lections, completed_tests FROM user INNER JOIN progress ON user.id = progress.user_id WHERE user.email = :email AND user.password = :password AND section = 'oper_sys';");

                        $OSprogress_stmt->bindParam(":email", $stud_row["email"]);
                        $OSprogress_stmt->bindParam(":password", $stud_row["password"]);

                        $OSprogress_stmt->execute();

                        while($row = $OSprogress_stmt->fetch(PDO::FETCH_LAZY)) {
                            if(!empty($row["completed_lections"] || $row["completed_tests"])) {
                                $OScompleted_lections = $row["completed_lections"];
                                $OScompleted_tests = $row["completed_tests"];
                                $OStotal_progress = (($OScompleted_lections + $OScompleted_tests) / ($OS_total_lections + $OS_total_tests)) * 100;
                            }
                        }

                        // ЗАПРОС НА ПОЛУЧЕНИЕ ПРОГРЕССА ПОЛЬЗОВАТЕЛЯ ПО ОСНОВАМ АРХИТЕКТУРЫ ЭВМ

                        $OAprogress_stmt = $pdo->prepare("SELECT completed_lections, completed_tests FROM user INNER JOIN progress ON user.id = progress.user_id WHERE user.email = :email AND user.password = :password AND section = 'osn_arch';");

                        $OAprogress_stmt->bindParam(":email", $stud_row["email"]);
                        $OAprogress_stmt->bindParam(":password", $stud_row["password"]);

                        $OAprogress_stmt->execute();

                        while($row = $OAprogress_stmt->fetch(PDO::FETCH_LAZY)) {
                            if(!empty($row["completed_lections"] || $row["completed_tests"])) {
                                $OAcompleted_lections = $row["completed_lections"];
                                $OAcompleted_tests = $row["completed_tests"];
                                $OAtotal_progress = (($OAcompleted_lections + $OAcompleted_tests) / ($OA_total_lections + $OA_total_tests)) * 100;
                            }
                        }

                        // ВЫВОД ВСЕХ ДАННЫЗ В СТРОКУ ТАБЛИЦЫ

                        echo "<tr class='" . $stud_group . "'>";
                            echo "<td>" . $stud_row["name"] . " " . $stud_row["surname"] . "</td>";
                            echo "<td>" . $stud_row["stud_group"] . "</td>";
                            echo "<td class='progress-cell'>";
                                echo "<div class='progress'>";
                                    echo "<div class='bar osn-arh'>";
                                        echo "<div style='width: " . round($OStotal_progress, 0, PHP_ROUND_HALF_DOWN) . "%'>" . "</div>"; 
                                    echo "</div>";
                                    echo "<span class='percent'>" . round($OStotal_progress, 0, PHP_ROUND_HALF_DOWN) . "%" . "</span>";
                                echo "</div>";
                                
                            echo "</td>";
                            echo "<td class='progress-cell'>";
                                echo "<div class='progress'>";
                                    echo "<div class='bar os'>";
                                        echo "<div style='width: " . round($OAtotal_progress, 0, PHP_ROUND_HALF_DOWN) . "%'>" . "</div>"; 
                                    echo "</div>";
                                    echo "<span class='percent'>" . round($OAtotal_progress, 0, PHP_ROUND_HALF_DOWN) . "%" . "</span>";
                                echo "</div>";
                                
                            echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
    </table>
</div>
