$('#p-21').click(function(){
    $('#p-21').addClass("selected");
    $('#p-22').removeClass("selected");
    $('#p-31').removeClass("selected");
    $('#p-32').removeClass("selected");

    sortTable("p-21");
});

$('#p-22').click(function(){
    $('#p-22').addClass("selected");
    $('#p-21').removeClass("selected");
    $('#p-31').removeClass("selected");
    $('#p-32').removeClass("selected");

    sortTable("p-22");
});

$('#p-31').click(function(){
    $('#p-31').addClass("selected");
    $('#p-21').removeClass("selected");
    $('#p-22').removeClass("selected");
    $('#p-32').removeClass("selected");

    sortTable("p-31");
});

$('#p-32').click(function(){
    $('#p-32').addClass("selected");
    $('#p-21').removeClass("selected");
    $('#p-22').removeClass("selected");
    $('#p-31').removeClass("selected");

    sortTable("p-32");
});

function sortTable(selectedGroup) {
    switch (selectedGroup) {
        case "p-21":
            $('.p-21').addClass("selected");
            $('.p-22').removeClass("selected");
            $('.p-31').removeClass("selected");
            $('.p-32').removeClass("selected");
            break;
        case "p-22":
            $('.p-22').addClass("selected");
            $('.p-21').removeClass("selected");
            $('.p-31').removeClass("selected");
            $('.p-32').removeClass("selected");
            break;
        case "p-31":
            $('.p-31').addClass("selected");
            $('.p-21').removeClass("selected");
            $('.p-22').removeClass("selected");
            $('.p-32').removeClass("selected");
            break;
        case "p-32":
            $('.p-32').addClass("selected");
            $('.p-21').removeClass("selected");
            $('.p-22').removeClass("selected");
            $('.p-31').removeClass("selected");
            break;
    }
}