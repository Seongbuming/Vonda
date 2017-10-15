$(document).ready(function() {
    // 로그인 액션
    $(".login_form").submit(function() {
        $.ajax({
          type: "POST",
          url: "http://api.siyeol.com/auth",
          dataType: "json",
          data: {'account':$(".login_form").find("input[name='id']").val(), 'password':$(".login_form").find("input[name='password']").val()},
          success: function (res) {
            if (res.code == 200) {
                createCookie("token", res.token);
                createCookie("refresh_token", res.refresh_token);
            } else {
                alert(res.message);
            }
          },
          error: function (err) {
            alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
          }
        });

        return false;
    });
});

