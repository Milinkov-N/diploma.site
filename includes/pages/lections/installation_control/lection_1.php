<div class="lection">
    <div class="section-name">Основы операционных систем</div>

    <h1>Лекция 1: " Контроль за установкой и удалением приложений"</h1>

    <p>Концепция "авторитетных рекомендаций" представляет собой набор указаний, которые обеспечивают должный уровень безопасности. Авторитетные рекомендации (далее - рекомендации) - это комбинация указаний, эффективность которых доказана при применении в самых различных организациях. Не все указания пригодны для использования в конкретной организации. В некоторых компаниях необходимы дополнительные политики и процедуры, обучение персонала или контроль за технической безопасностью для достижения приемлемого уровня управления безопасностью.</p>

    <h2>Административная безопасность</h2>

    <p>Рекомендации по административной безопасности - это те решения, которые соответствуют политикам и процедурам, ресурсам, степени ответственности, потребностям в обучении персонала и планам по выходу из критических ситуаций. Эти меры призваны определить важность информации и информационных систем для компании и объяснить персоналу, в чем именно заключается эта важность. Рекомендации по обеспечению административной безопасности определяют ресурсы, необходимые для осуществления должного управления рисками и определения лиц, несущих ответственность за управление безопасностью организации.</p>
    
    <p>При исполнении программы только часть ее кода и данных, к которым происходит обращение, в каждый момент требует размещения в физической памяти. Поэтому, естественно, возникает идея расширить пространство логической памяти, которое может быть реализовано намного большего размера, чем физическая память. Это и есть основной принцип организации виртуальной памяти.</p>
    
    <p>Виртуальная память поддерживает совместное использование одного и того же адресного пространства более чем одним процессом, создание и исполнение облегченных процессов в общем пространстве виртуальной памяти.</p>
    
    <p>Виртуальная память допускает более эффективное создание процесса, чем предшествующие схемы организации памяти и процессов.</p>
    
    <p>Заметим, что концепция виртуальной памяти непосредственно не связана ни со страничной, ни с сегментной стратегиями распределения памяти. Виртуальная память может быть реализована различными способами, например, с помощью:</p>
    
    <p><b>страничной организации по требованию (paging on demand);</b></p>
    
    <p><b>сегментной организации по требованию (segmentation on demand).</b></p>

    <p>В приведенных терминах подчеркивается динамический характер управления виртуальной памятью: термин по требованию означает, что страница или сегмент будут размещены в физической памяти только в случае, если к ним реально происходит обращение из программы пользователя. Причем если размер обрабатываемой области виртуальной памяти (например, массива) очень велик – например, 1000 страниц, то в физической памяти будет размещена только та его страница, к которой обращается пользовательская программа.</p>

    <img src="18_1sm.png" alt="img">
    <p><b>Рис 1.1</b> (Виртуальная память и физическая память)</p>
   
    <h2>Страничная организация по требованию</h2>

    <p>Принцип реализации виртуальной памяти в виде страничной организации по требованию заключается в том, что каждая страница загружается в память, только если она реально требуется при выполнении программы – содержит код или данные, к которым произошло обращение.</p>
    
    <p>Преимущества данного подхода:</p>
    
    <P>Меньший объем ввода-вывода: В память подкачивается только минимально необходимый объем данных (например, одна страница большого массива, а не весь многостраничный массив);</P>
    
    <P>Меньший объем памяти: При данном способе расходуется минимально необходимый объем физической памяти;</P>
    
    <P>Более быстрая реакция системы: Поскольку объем пересылаемых данных меньше, система в среднем быстрее реагирует на каждый запрос к памяти;</P>

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
    <a href="includes/lection_handler.php?section=oper_sys&topic=installation_control&page=lection&num=1"><button class="complete-btn">Продолжить</button></a>
</div>