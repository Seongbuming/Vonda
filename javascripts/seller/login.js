$(document).ready(function() {
    // 로그인 액션
    $(".login_form").submit(function() {
        $.ajax({
          type: "POST",
          url: "http://api.siyeol.com/auth",
          dataType: "json",
          data: {'account':$(".login_form").find("input[name='id']").val(), 'password':$(".login_form").find("input[name='password']").val(), 'type':'seller'},
          success: function (res) {
            if (res.code == 200) {
                // 토큰 저장
                createCookie("token", res.token);
                createCookie("refresh_token", res.refresh_token);

                if (res.user.type == "general") {
                  location.href = "/";
                } else if (res.user.type == "creator") {
                  location.href = "/creator.php";
                } else if (res.user.type == "admin"){
                  location.href = "/admin.php";
                } else if (res.user.type == "seller"){
                  location.href = "/seller.php";
                }
            } else {
                // 로그인 실패
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

