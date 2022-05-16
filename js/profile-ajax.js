function sendAJAX(formName) {
    $.ajax({
        url: '/includes/edit_profile_handler.php',
        method: 'post',
        dataType: 'html',
        data: $(formName).serialize(),
        error: function (req, text, error) {
            alert('Ошибка AJAX: ' + text + ' | ' + error);
        },
        success: function (data) {
            alert(data);
        }
    });
}

$("#edit_name").on("submit", function () {
    sendAJAX("#edit_name");
});

$("#edit_surname").on("submit", function () {
    sendAJAX("#edit_surname");
});

$("#edit_group").on("submit", function () {
    sendAJAX("#edit_group");
});

$("#edit_email").on("submit", function () {
    sendAJAX("#edit_email");
});

$("#edit_password").on("submit", function () {
    sendAJAX("#edit_password");
});
