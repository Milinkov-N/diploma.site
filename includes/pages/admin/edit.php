<div class="wrapper">
    <h2>Список лекций</h2>
    <ul class="folder-list">
        <?php
        $lections_path = "../includes/pages/lections";
        $dir;

        function outputFiles($path, $dir) {

            // Проверяем, существует-ли данная дериктория
            if(file_exists($path) && is_dir($path)) {
                // Сканируем файлы в этой директории
                $result = scandir($path);

                // С помощью функции array_diff фильтруем текущую и родительскую директории
                $files = array_diff($result, array(".", ".."));

                if(count($files) > 0) {
                    // Проходимся по вернувшемуся массиву через цикл
                    foreach ($files as $file) {
                        if(is_dir("$path/$file")) {
                            $dir = $file;
                            // Выводим название директории
                            echo "<li class='folder'>";
                                echo "<div class='content' onclick='toggleFolder(" . $dir . ")'>";
                                    echo "<img class='folder-img' src='../img/folder.svg' alt='folder-img'>";
                                    echo "<span>" . $dir . "</span>";
                                echo "</div>";
                                echo "<ul class='file-list' id='" . $dir . "'>";
                                    // Рекурсивно вызываем функцию, если найдены другии директории
                                    outputFiles("$path/$file", $dir);
                                echo "</ul>";
                            echo "</li>";
                        }

                        if(is_file("$path/$file")) {
                            // Выводим название файла
                            echo "<li class='file'>";
                                echo "<div class='content'>";
                                    echo "<img class='file-img' src='../img/php.svg ' alt='file-img'>";
                                    echo "<span>" . $file . "</span>";
                                    echo "<div class='button-group'>";
                                        echo "<div class='button'>";
                                            echo "<a href='content.php?page=edit&preview=true&topic=" . $dir . "&lection=" . $file . "'>Предпросмотр</a>";
                                        echo "</div>";
                                        echo "<hr>";
                                        echo "<div class='button'>";
                                            echo "<form method='post' name='lection_delete' id='lection_delete'>";
                                                echo "<input type='text' name='folder' value='" . $dir . "' hidden>";
                                                echo "<input type='text' name='lection' value='" . $file . "' hidden>";
                                                echo "<input type='text' name='func' value='delete' hidden>";
                                                echo "<input type='submit' value='Удалить'>";
                                            echo "</form>";
                                    echo "</div>";
                                echo "</div>";
                                echo "</div>";
                                
                            echo "</li>";
                        }  
                    }
                } else {
                    echo "ERROR: No files found in the directory.";
                }
            } else {
                echo "ERROR: The directory does not exist.";
            } 
        }

        // Вызов функции
        outputFiles($lections_path, $dir);
        ?>
    </ul>
    <div class="preview-header">
        <h2>Предпросмотр лекций</h2>
        <a href="content.php?page=edit"><button class="btn">Очистить</button></a>
    </div>
    
</div>

<div class="lection-preview">
    <?php
    // В ЗАВИСИМОСТИ ОТ ТОГО, ПО КАКОЙ ССЫЛКЕ НАЖАЛ ПОЛЬЗОВАТЕЛЬ, ПОДГРУЖАЕМ НА ОСНОВНУЮ СТРАНИЦУ ЗАПРОШЕННЫЙ МАТЕРИАЛ
    if($_GET["preview"] == "true") {
        $page = "../includes/pages/lections/" . $_GET["topic"] . "/" . $_GET["lection"];

        if(file_exists($page)) {
            include($page);
        } else {
            echo "File does not exist";
        }
    }
    ?>
</div>

<div hidden>Icons made by <a href="https://www.flaticon.com/authors/dinosoftlabs" title="DinosoftLabs">DinosoftLabs</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
<div hidden>Icons made by <a href="https://www.flaticon.com/authors/retinaicons" title="Retinaicons">Retinaicons</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>

<script src="../js/admin-ajax.js"></script>