<!doctype html>
<html lang="ko">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?=$this->loadLayout("head")?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="stylesheets/admin/common.css" />
    <link rel="stylesheet" href="stylesheets/admin/login.css" />

</head>

<body style="background-color: #d8b525;">
    <section id="vd-login">
      <div class="container">
        <form id="vd-login-form" class="" action="index.html" method="post">
          <div class="form-header">
            <p class="text-gray">ADMIN</p>
            <img src="images/logo3.png" alt="" />
          </div>
          <div class="form-item">
            <input type="input" class="account" name="input-id" value="" placeholder="아이디">
          </div>
          <div class="form-item">
            <input type="password" class="password" name="input-id" value="" placeholder="비밀번호">
          </div>
          <div class="form-item">
            <button type="submit" name="btn-submit" class="btn btn-peach">로그인</button>
          </div>
        </form>
      </div>
    </section>
    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
<script>
      $("#vd-login-form").submit(function() {
        $.ajax({
          type: "POST",
          url: "http://api.siyeol.com/auth",
          dataType: "json",
          data: {"account":$(".account").val(), "password":$(".password").val(), "type":"admin"},
          success: function (res) {
            if (res.code == "200") {
              if (res.user.type == "admin") {
                createCookie("token", res.token);
                createCookie("refresh_token", res.refresh_token);

                location.href = "./admin.php";
              } else {
                alert('접근할 수 없습니다.');
              }
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
    </script>
</html>
