// КНОПКА МЕНЮ-БУРГЕРА
$('.menu-button').click(function(){
    $('.sidebar').toggleClass("active");
    $('.open').toggleClass("hide");
    $('.close').toggleClass("show");
});

// РАСКРЫТИЕ СОДЕРЖИМОГО ПАПОК
function toggleFolder(folderName) {
    $(folderName).toggleClass("active");
}

// СОРТИРОВКА ТАБЛИЦЫ ПО ГРУППЕ
$('#p-21').click(function(){
    $('.p-21').addClass("selected");
    $('.p-22').removeClass("selected");
    $('.p-31').removeClass("selected");
    $('.p-32').removeClass("selected");
});

$('#p-22').click(function(){
    $('.p-22').addClass("selected");
    $('.p-21').removeClass("selected");
    $('.p-31').removeClass("selected");
    $('.p-32').removeClass("selected");
});

$('#p-31').click(function(){
    $('.p-31').addClass("selected");
    $('.p-21').removeClass("selected");
    $('.p-22').removeClass("selected");
    $('.p-32').removeClass("selected");
});

$('#p-32').click(function(){
    $('.p-32').addClass("selected");
    $('.p-21').removeClass("selected");
    $('.p-22').removeClass("selected");
    $('.p-31').removeClass("selected");
});