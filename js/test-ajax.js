$("#quiz").on("submit", function () {
    $.ajax({
        url: '/includes/test_handler.php',
        method: 'post',
        dataType: 'html',
        data: $(this).serialize(),
        error: function (req, text, error) {
            alert('Ошибка AJAX: ' + text + ' | ' + error);
        },
        success: function (data) {
            alert(data);
        }
    });
});
