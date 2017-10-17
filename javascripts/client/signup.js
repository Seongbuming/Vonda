$(function () {
    var passwordValid = function () {
        if (/^[0-9a-zA-Z]{8,20}$/.test(this.value)) {
            $('#password').parent().find('p').hide();
            return true;
        } else {
            $('#password').parent().find('p').show();
            return false;
        }
    };
    var passwordEqualizing = function () {
        if ($('#password').val() === $('#password_chk').val()) {
            $('#password_chk').parent().find('p').hide();
            return true;
        } else {
            $('#password_chk').parent().find('p').show();
            return false;
        }
    };
    $('#password').keyup(function () {
        passwordValid.call(this);
        passwordEqualizing();
    });
    $('#password_chk').keyup(passwordEqualizing);

    // Form Handler
    $('.signup_form').submit(function () {
        // 검증 실패시 폼을 넘기지 않음
        if (!passwordValid.call({value: $('#password').val()})) {
            $('#password').focus();
            return false;
        }
        if (!passwordEqualizing()) {
            $('#password_chk').focus();
            return false;
        }
    });
});