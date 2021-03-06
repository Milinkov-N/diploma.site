<div class="lection">
    <div class="section-name">Основы операционных систем</div>

    <h1>Лекция 1: "Планирование процессов"</h1>

    <p>WinRT была создана для предоставления единообразного (в то же время изменчивого с течением времени в плане новых веяний) и безопасного окружения для работы Windows-приложений. WinRT испытала на себе влияние .NET, C++ и JavaScript. Однако стоит учитывать, что WinRT не заменяет собой CLR или Win32, а предоставляет унифицированную среду выполнения приложений, написанных на разных языках, для запуска в новых версиях Windows с использованием интерфейса. Для разработки на WinRT можно использовать языки платформы .NET (C#, VB.NET, F#) и HTML/JavaScript/CSS</p>

    <img src="05_01.jpg" alt="img">
    <p><b>Рис 1.1</b> (Архитектура WinRT)</p>
    
    <p>По сути своей WinRT это новый набор API, основные особенности которого:

        <li>Обеcпечение пользовательского интерфейса</li>
        <li>Упрощенное программирование GUI</li>
        <li>WPF и XAML для построения интерфейсов</li>
    </p>
    
    <p>Все API-вызовы асинхронны. API изначально разработана как "песочница" (приложения сразу готовы к размещению в WindowsStore). Определения API-вызовов представлены в формате метаданных ECMA 335 (лежат в файлах .winmd)</p>
    
    <P>WinRT призвано уменьшить степень взаимовлияния приложений - производительность одного приложения не должно влиять на производительность другого; ресурсы и объекты одного приложения доступны другим только через стандартные каналы ОС (контракты).</P>
    
    <P>Основная идея, которую воплощают собой контракты - "Приложения должны иметь возможность тесно работать друг с другом и при этом ничего не знать друг о друге". В этом помогает новый компонент системы - ShareBroker, который является посредником между приложениями - одно приложение готовит буфер (пакет данных с какой-либо информацией, которой собирается поделится с другими приложениями) и отправляет его ShareBroker'у, вызывающее приложение в свою очередь запрашивает интересующий пакет у ShareBroker'a, а не у приложения-источника.</P>
    
    <P>Вот некоторые из типов контрактов:</P>

    <li>Search - благодаря этому контракту приложение может стать источником поиска данных. Поиск внутри вашего приложения появляется на панели инструментов операционной системы, но данным контрактом могут воспользоваться и другие приложения;</li>
    
    <li>Sharing - с помощью этого контракта можно открыть доступ к данным других приложений. Выше был описан пример интеграции приложения с социальными сетями;</li>
    
    <li>Play To - этот контракт предназначен для передачи медиаданных из приложения на внешние устройства;</li>
    
    <li>Settings - данный контракт предоставляет доступ к настройкам приложения, благодаря чему система может интегрировать все настройки в свою панель инструментов;</li>
    
    <li>App to App - благодаря этому типу контрактов приложения могут не только обмениваться данными, но и предоставлять доступ к различных хранилищам, которыми оперируют.</li>
    
    <li>Picker - описывается какими данными приложение хочет поделится с другими, что делает простым доступ к файлам этого приложения извне, унифицируя интерфейс доступа к виду как будто бы происходит работа с жестким диском.</li>
    
    <P>Рассмотрим механизм работы контрактов. Для примера возьмем контракт share ("Отправка") состоящий из двух частей share source и share target. Приложение, которое хочет чем-то поделится с другим приложением реализует свою часть контракта (share source), принимающее - свою (share target) при этом приложениям ничего не нужно знать друг о друге, а только позаботится об исполнении своей части "контракта", об остальном (прием/передача информации и унифицированность процесса) позаботится ОС.</P>

    <h2>Share Contract</h2>

    <p>Очень важно помнить, что данная функциональность работает только для WinRT-приложений и недоступна на традиционном рабочем столе.</p>

    <p>Пример с расшариванием текста:

        // подключаем пространство имен, которое необходимо для базового шаринга <br>
    using Windows.ApplicationModel.DataTranfer; <br>
    /*в случае если нужно больше используются <br>
    Windows.Storage - для объекта StorageFile (передача файлов) <br>
    Windows.Storage.Pickers для открытия диалога выбора файлов/изображений <br>
    Windows.Storage.Streams часто используется при передаче файлов/изображений/данных в  <br>
    собственном формате Windows.Graphics.Imaging используется для изменения изобраежений <br>
    перед расшариванием (создание превью, уменьшение размеров, поворот на угол, увеличение и т.п.) <br>
    */

    </p>

    <p>Чтобы сообщить ОС что приложение собирается что-то расшарить в функции OnNavigatedTo следует сделать следующее</p>

    <p>
        // зарегестрируем приложение как источник шары <br>
this.dataTransferManager = DataTransferManager.GetForCurrentView(); <br>
this.dataTransferManager.DataRequested += new TypedEventHandler<DataTransferManager, <br>
DataRequestedEventArgs>(this.OnDataRequested); <br>

</p>

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
    <a href="includes/lection_handler.php?section=oper_sys&topic=machine_depend&page=lection&num=1"><button class="complete-btn">Продолжить</button></a>
</div>