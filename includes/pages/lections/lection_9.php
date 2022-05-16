<div class="lection">
    <div class="section-name">Основы операционных систем</div>

    <h1>Лекция 2: "Технология работы в MS DOS"</h1>

    <p>В MS DOS совершенно не реализована мультизадачность, т. е. она не может естественным образом выполнять несколько задач (работающих программ) одновременно. Поэтому она не может использоваться в качестве основной операционной системы для полноценной многопользовательской работы в сети. MS DOS не имеет никаких средств контроля и защиты от несанкционированных действий программ и пользователя, что привело к появлению огромного количества так называемых вирусов.</p>

    <p>Перечислим некоторые компоненты операционной системы MS DOS. Дисковые файлы IO.SYS и MSDOS.SYS (они могут называться и по-другому, например IBMBIO.COM и IBMDOS.COM для PC DOS ) помещаются в оперативную память при загрузке и остаются в ней постоянно. Файл IO.SYS представляет собой дополнение к базовой системе ввода-вывода, а MSDOS.SYS реализует основные высокоуровневые услуги операционной системы.</p>
    
    <p> <b>Командный процессор</b> DOS обрабатывает команды, вводимые пользователем. Командный процессор находится в дисковом файле COMMAND.COM на диске, с которого загружается операционная система. Некоторые команды пользователя, например type, dir или copy, командный процессор выполняет сам. Такие команды называются внутренними или встроенными. Для выполнения остальных (внешних) команд пользователя командный процессор ищет на дисках программу с соответствующим именем и, если находит ее, загружает в память и передает ей управление. По окончании работы программы командный процессор удаляет программу из памяти и выводит сообщение о готовности к выполнению команд (приглашение DOS).</p>

    <p> <b>Внешние команды DOS</b> - это программы, поставляемые вместе с операционной системой в виде отдельных файлов. Эти программы выполняют действия обслуживающего характера, например форматирование дискет ( format.com ), проверку состояния дисков ( scandisk.exe ) и т. д.</p>
    
    <p><b>Драйверы устройств</b> - это специальные программы, которые дополняют систему ввода-вывода DOS и обеспечивают обслуживание новых или нестандартное использование имеющихся устройств. Например, с помощью драйвера DOS ramdrive.sys возможна работа с "электронным диском", т. е. частью памяти компьютера, с которой можно работать так же, как с диском. Драйверы помещаются в память компьютера при загрузке операционной системы, их имена указываются в специальном файле CONFIG.SYS. Такая схема облегчает добавление новых устройств и позволяет делать это, не затрагивая системные файлы DOS.</p>

    <div class="note">
        <div class="content">
            <p><b>Заметка: </b>Командный процессор находится в дисковом файле COMMAND.COM на диске, с которого загружается операционная система.</p>
        </div>
        <div class="icon">
            <img src="img/note_img.svg" alt="image">
        </div>
    </div>

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
    <a href="includes/lection_handler.php?section=oper_sys&topic=introduction&page=lection&num=9"><button class="complete-btn">Продолжить</button></a>
</div>