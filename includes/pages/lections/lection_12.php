<div class="lection">
    <div class="section-name">Основы операционных систем</div>

    <h1>Лекция 2: "Архитектура ОС WINDOWS"</h1>

    <h2>Принципы проектирования Windows 2000 – расширяемость, переносимость, надежность, безопасность, совместимость, производительность, поддержка интернационализации и локализации.</h2>

    <p> <b> Расширяемость.</b> Windows 2000 имеет многоуровневую архитектуру. Ядро и его исполнительная подсистема (executive),исполняемое в защищенном режиме, обеспечивает базовые системные сервисы. Поверх ядра реализованы несколько серверных подсистем, работающих в пользовательском режиме. Модульная структура позволяет добавлять новые подсистемы окружения без модификации ядра.</p>

    <p> <b> Переносимость. </b>Благодаря своим принципам проектирования и архитектуры, Windows 2000 может быть перенесена с одной аппаратной платформы на другую со сравнительно небольшими изменениями. Система написана на языках высокого уровня - C и C++. Код, зависящий от процессора, изолирован в динамически линкуемую библиотеку (DLL), называемую уровень абстрагирования от аппаратуры - <b> hardware abstraction layer (HAL) </b>.Идея HAL была реализована фирмой Microsoft, по признанию ее менеджеров, гораздо раньше – при разработке в 1980-х гг. пакета Microsoft Office для различных аппаратных платформ, включая Macintosh / MacOS (ОС Windows тогда еще не было). Эта же идея была использована и в Windows 2000, и еще позднее – при реализации академической версии .NET – SSCLI (Rotor), работающей на трех различных платформах.</p>
    
    <p><b>Надежность.</b> Windows 2000 использует аппаратную защиту для виртуальной памяти и программные защитные механизмы для ресурсов ОС.</p>
    
    <p> <b> Безопасность. </b> Как уже было сказано в предыдущих лекциях, именно с улучшения безопасности Windows 2000 была начата инициатива trustworthy computing, и с тех пор в каждой новой ОС Microsoft уделяет особое внимание безопасности.</p>

    <h2>Архитектура Windows 2000</h2>

   <p>ОС Windows 2000 с точки зрения архитектуры организована как многоуровневая система модулей. Система поддерживает защищенный (системный) режим, в котором выполняются HAL, ядро и исполнительная подсистема (executive). В пользовательском режиме исполняется набор <b> подсистем </b>, среди которых - <b> подсистемы окружения </b>, эмулирующие различные ОС, с целью совместимости приложений. <b> Подсистемы защиты </b> реализуют различные функции безопасности.</p>

   <img src="arch_win.png" alt="img">
    <p><b>Рис 1.1</b> (Схема архитектуры Windows 2000)</p>

    <h2>Ядро Windows 2000</h2>

    <p>Ядро в системе является основой функционирования исполнительной подсистемы (executive) и подсистем, выполняемых в пользовательском режиме. Отказы страниц в ядре исключены. Его исполнение никогда не прерывается.</p>

    <p>Ядро выполняет следующие основные функции:</p>
    
    <li>-Планирование потоков</li>
    <li>-Обработка прерываний и исключений</li>
    <li>-Низкоуровневую синхронизацию процессов</li>
    <li>-Восстановление после отказов электропитания.</li>

    <p>Особенно важной и принципиально новой в операционных системах особенностью является то, что ядро системы Windows - объектно-ориентированное. Ядро использует два набора объектов:</p>

    <li> <b> Объекты-диспетчеры </b>- - объекты, управляющие диспетчеризацией и синхронизацией (события, мьютексы, семафоры, потоки, таймеры).</li>
    <li> <b> Управляющие объекты </b> - асинхронные вызовы процедур, обработчики прерываний, объекты нотификации об электропитании, объекты состояния электропитания, объекты профилирования.</li>

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
    <a href="includes/lection_handler.php?section=oper_sys&topic=introduction&page=lection&num=12"><button class="complete-btn">Продолжить</button></a>
</div>