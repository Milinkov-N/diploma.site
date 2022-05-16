$('.topic1-btn').click(function(){
    $('nav ul .topic1').toggleClass("show");
    $('nav ul .topic2').removeClass("show2");
    $('nav ul .topic3').removeClass("show3");
    $('nav ul .topic4').removeClass("show4");
    $('nav ul .topic5').removeClass("show5");
});

$('.topic2-btn').click(function(){
    $('nav ul .topic2').toggleClass("show2");
    $('nav ul .topic1').removeClass("show");
    $('nav ul .topic3').removeClass("show3");
    $('nav ul .topic4').removeClass("show4");
    $('nav ul .topic5').removeClass("show5");

});

$('.topic3-btn').click(function(){
    $('nav ul .topic3').toggleClass("show3");
    $('nav ul .topic1').removeClass("show");
    $('nav ul .topic2').removeClass("show2");
    $('nav ul .topic4').removeClass("show4");
    $('nav ul .topic5').removeClass("show5");
});

$('.topic4-btn').click(function(){
    $('nav ul .topic4').toggleClass("show4");
    $('nav ul .topic1').removeClass("show");
    $('nav ul .topic2').removeClass("show2")
    $('nav ul .topic3').removeClass("show3");
    $('nav ul .topic5').removeClass("show5");;
});

$('.topic5-btn').click(function(){
    $('nav ul .topic5').toggleClass("show5");
    $('nav ul .topic1').removeClass("show");
    $('nav ul .topic2').removeClass("show2");
    $('nav ul .topic3').removeClass("show3");
    $('nav ul .topic4').removeClass("show4");
});

// КНОПКА МЕНЮ-БУРГЕРА
$('.menu-button').click(function(){
    $('.sidebar').toggleClass("active");
    $('.open').toggleClass("hide");
    $('.close').toggleClass("show");
});