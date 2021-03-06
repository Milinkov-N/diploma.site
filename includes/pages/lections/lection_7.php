<div class="lection">
    <div class="section-name">Основы операционных систем</div>

    <h1>Лекция 3: "Файловая система FAT"</h1>

    <h2>FAT</h2>

    <p>FAT (англ. File Allocation Table «таблица размещения файлов») — классическая архитектура файловой системы, которая из-за своей простоты всё ещё широко применяется для флеш-накопителей. Используется в дискетах, картах памяти и некоторых других носителях информации. Ранее находила применение и на жёстких дисках.</p>

    <p>Разработана Биллом Гейтсом и Марком МакДональдом (англ.) в 1976—1977 годах. Использовалась в качестве основной файловой системы в операционных системах семейств MS-DOS и Windows 9x.</p>
    
    <p>Отметим, что при использовании файловой системы ZFS думать о разбиении диска на разделы незачем, но об этом подробнее рассказывается в "Концепция, устройство и администрирование файловой системы ZFS" .</p>
    
    <p>В корневом каталоге системы располагается несколько файлов и ряд обязательных для работы системы подкаталогов. Это подкаталоги /bin, /sbin, /dev, /devices, /etc, /tmp. Как правило, имеются подкаталоги /usr и /opt, а также /export, они обычно являются точками монтирования других разделов.</p>

    <p>Структура FAT следует стандарту ECMA-107 и подробно определяется официальной спецификацией Microsoft, известной под названием FATGEN</p>

    <h2>Версии системы FAT</h2>

    <p>Существует четыре версии FAT — FAT12, FAT16, FAT32 и exFAT (FAT64). Они отличаются разрядностью записей в дисковой структуре, то есть количеством бит, отведённых для хранения номера кластера. FAT12 применяется в основном для дискет, FAT16 — для дисков малого объёма. На основе FAT была разработана новая файловая система exFAT (extended FAT), используемая преимущественно для флеш-накопителей.</p>

    <p>Изначально FAT не поддерживала иерархическую систему каталогов — все файлы располагались в корне диска. Это было сделано для упрощения, так как на односторонних дискетах ёмкостью всего 160–180 Кбайт сортировать немногочисленные файлы по каталогам попросту не было смысла. С распространением дискет на 320 и более килобайт хранение всех файлов в корне оказалось неудобным, к тому же малый размер корневого каталога ограничивал количество файлов на диске. Каталоги были введены с выходом MS-DOS 2.0.</p>

    <h3>VFAT</h3>
    
    <p>VFAT — расширение FAT, появившееся в Windows 95. В FAT имена файлов имеют формат 8.3 и состоят только из символов кодировки ASCII. В VFAT была добавлена поддержка длинных (до 255 символов) имён файлов (англ. Long File Name, LFN) в кодировке UTF-16LE, при этом LFN хранятся одновременно с именами в формате 8.3, ретроспективно называемыми SFN (англ. Short File Name). LFN нечувствительны к регистру при поиске, однако, в отличие от SFN, которые хранятся в верхнем регистре, LFN сохраняют регистр символов, указанный при создании файла.</p>
    
    <h2>Структура системы FAT</h2>

    <p>В файловой системе FAT смежные секторы диска объединяются в единицы, называемые кластерами. Количество секторов в кластере равно степени двойки (см. далее). Для хранения данных файла отводится целое число кластеров (минимум один), так что, например, если размер файла составляет 40 байт, а размер кластера 4 Кбайт, реально занят информацией файла будет лишь 1 % отведённого для него места. Во избежание подобных ситуаций целесообразно уменьшать размер кластеров, а для сокращения объёма адресной информации и повышения скорости файловых операций — наоборот. На практике выбирают некоторый компромисс. Так как ёмкость диска вполне может и не выражаться целым числом кластеров, обычно в конце тома присутствуют так называемые surplus sectors — «остаток» размером менее кластера, который не может отводиться ОС для хранения информации.</p>

    <p>Пространство тома FAT32 логически разделено на три смежные области:</p>
    
    <p>- Зарезервированная область. Содержит служебные структуры, которые принадлежат загрузочной записи раздела (Partition Boot Record — PBR, для отличия от Master Boot Record — главной загрузочной записи диска; также PBR часто некорректно называется загрузочным сектором) и используются при инициализации тома;</p>
    
    <p>- Область таблицы FAT, содержащая массив индексных указателей («ячеек»), соответствующих кластерам области данных. Для повышения надёжности на диске обычно представлено две копии таблицы FAT;</p>
    
    <p>- Область данных, где записано собственно содержимое файлов — то есть текст текстовых файлов, кодированное изображение для файлов рисунков, оцифрованный звук для аудиофайлов и т. д.</p>

    <div class="quest">
        <h3>*Вопрос по лекции*?</h3>
        <div class="answers">
            <div class="answer-box">
                <label for="answ1">Вариант ответа №1</label>
                <input type="radio" name="answer1" id="answ1">
            </div>
            <div class="answer-box">
                <label for="answ1">Вариант ответа №2</label>
                <input type="radio" name="answer1" id="answ2">
            </div>
            <div class="answer-box">
                <label for="answ1">Вариант ответа №3</label>
                <input type="radio" name="answer1" id="answ3">
            </div>
            <div class="answer-box">
                <label for="answ1">Вариант ответа №4</label>
                <input type="radio" name="answer1" id="answ4">
            </div>
        </div>
        
        <input class="submit" type="submit" value="Подтвердить">
    </div>
    <a href="includes/lection_handler.php?section=oper_sys&topic=introduction&page=lection&num=7"><button class="complete-btn">Продолжить</button></a>
</div>