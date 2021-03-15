function login() {
    var user = $('#email').val();
    var pwd = $('#pss').val();

    $("#emailalert").html('');
    $("#pssalert").html('');
    $('#loginalert').html('');

    if (user == "") {
        $('#emailalert').html('Please insert a valid email');
        return;
    }

    if (pwd == "") {
        $('#pssalert').html('Please insert your password');
        return;
    }
    $.ajax({
        url: '/xentral-test-git/php/process/login.php',
        type: "POST",
        dataType: "JSON",
        data: { user: $('#email').val(), password: $('#pss').val() },
        success: function (resp) {
            var result_data = resp;
            var option = result_data[0];
            var action = result_data[1];

            if (option == 0) {
                $('#loginalert').html(action);
            } if (option == 1) {
                window.location.href = action;
            } else {
                $('#alertlogin').html("Something went worng");
            }
        }
    });

}

$(document).ready(function () {
    $.ajax({
        url: '/xentral-test-git/php/process/session_validation.php',
        dataType: "JSON",
        success: function (resp) {
            alert(resp);
            $("#current_user").html(resp);
        }
    });
})
