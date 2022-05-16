<div class="lection">
    <div class="section-name">Основы операционных систем</div>

    <h1>Лекция 1: "Основные сведения о MS DOS"</h1>

    <h2>Операционная система MS DOS</h2>

    <p><b>MS DOS</b> - первая операционная система для персональных компьютеров, которая получила широкое распространение. Со временем она была практически вытеснена новыми, современными операционными системами, типа Windows и Linux, но в ряде случаев MS DOS остается удобной и единственно возможной для работы на ЭВМ (устаревшая техника, давно написанное программное обеспечение и т. п.)</p>

    <p>Работа пользователей с операционной системой DOS осуществляется с помощью командной строки, ведь собственный графический интерфейс у нее отсутствует. Предпринималось множество попыток упростить общение с системой и самое удачное решение предложил Питер Нортон (Pеter Norton). У многих пользователей работа в операционной системе DOS ассоциируется именно с его программой - <b> Norton Commander</b>. Оболочка NC скрывает от пользователя множество неудобств, возникающих при работе с файловой системой MS DOS, например, такие, как необходимость набирать команды из командной строки. Простота и удобство в использовании - вот что делает оболочки типа NC популярными и в наше время (к ним можно отнести QDos, PathMinder, XTree, Dos Navigator, Volkov Commander и др.). Принципиально отличаются от них графические оболочки Windows 3.1 и Windows 3.11. В них применяется концепция так называемых "окон", которые можно открывать, перемещать по экрану и закрывать.</p>
    
    <div class="note">
        <div class="content">
            <p><b>Заметка: </b>В MS DOS используется файловая система FAT. Одним из ее недостатков являются жесткие ограничения на имена файлов и каталогов. Имя может состоять не более чем из восьми символов.</p>
        </div>
        <div class="icon">
            <img src="img/MSDOS.png" alt="image">
        </div>
    </div>

    <p>Так как MS DOS была создана довольно давно (известно, как стремительно развиваются и устаревают компьютеры и, как следствие, программы для них), она совершенно не соответствует требованиям, предъявляемым к современным операционным системам. Она не может напрямую использовать большие объемы памяти, устанавливаемые в современные ЭВМ. В файловой системе используются только короткие имена файлов (8 символов в имени и 3 в расширении), плохо поддерживаются разные устройства типа звуковых карт, видео-ускорителей и т. д.</p>
    
    <p>В MS DOS совершенно не реализована мультизадачность, т. е. она не может естественным образом выполнять несколько задач (работающих программ) одновременно. Поэтому она не может использоваться в качестве основной операционной системы для полноценной многопользовательской работы в сети. MS DOS не имеет никаких средств контроля и защиты от несанкционированных действий программ и пользователя, что привело к появлению огромного количества так называемых вирусов.</p>
    
    <p>Перечислим некоторые компоненты операционной системы MS DOS. Дисковые файлы IO.SYS и MSDOS.SYS (они могут называться и по-другому, например IBMBIO.COM и IBMDOS.COM для PC DOS ) помещаются в оперативную память при загрузке и остаются в ней постоянно. Файл IO.SYS представляет собой дополнение к базовой системе ввода-вывода, а  <b>MSDOS.SYS</b> реализует основные высокоуровневые услуги операционной системы.</p>

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
    <a href="includes/lection_handler.php?section=oper_sys&topic=introduction&page=lection&num=8"><button class="complete-btn">Продолжить</button></a>
</div>