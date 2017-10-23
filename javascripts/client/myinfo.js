$(document).ready(function() {
    var isValid = false;
    $(".submit").on("click",function () {
      if (isValid) return false;
      //입력한 비밀번호가 일치하면
      $.ajax({
        type: "POST",
        url: "http://api.siyeol.com/user/password?token="+readCookie('token'),
        dataType: "json",
        data: {password: $(".check_password").val()},
        success: function (res) {
          if (res.code == 200) {
            isValid = true;
            $(".signup_form").show();
            $(".findacc_container").hide();
          } else {
            $(".error-msg").show();
          }
        },
        error: function (err) {
          console.log(err);
          alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
        }
      });
    });
});

function saveInfo(e) {
  if ($("#password").val() != "" && $("#password").val() != $("#password_chk").val()) {
    alert('비밀번호가 일치하지 않습니다.');
    return false;
  }

  $(".signup_form").submit();
  return false;
}
