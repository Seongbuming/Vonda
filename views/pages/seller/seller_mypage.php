<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
	<link rel="stylesheet" href="stylesheets/seller/common.css">
    <link rel="stylesheet" href="stylesheets/client/signup.css" />
</head>
<?php
$request = new Http();
$response = $request->request('GET', '/self?token='.$_COOKIE['token']);

$user = $response->data;
?>
<body>
    <header>
        <?=$this->loadLayout("seller/header")?>
    </header>

    <div id="contents">
		<form class="signup_form">
			<h3 class="category">비밀번호 변경</h3>      
            <div class="row">
                <label for="password">새 비밀번호</label>
                <input id="password" name="password" type="password" class="password"   />               
            </div>
            <div class="row">
                <label for="password_chk">새 비밀번호 확인</label>
                <input id="password_chk" name="password_chk" type="password" class="password"  />                
            </div>
			<h3 class="category">내 정보 수정</h3>       
            <div class="row">
                <label for="name">이름</label>
                <input id="name" name="name" type="text" class="text" value="<?=$user->name?>" required />
            </div>
            <div class="row pnumber">
                <label for="pnumber">연락처</label>
                <input id="pnumber" name="pnumber_1" type="tel" class="tel" value="<?=substr($user->phone, 0, 3)?>" required />
                <span>-</span>
                <input name="pnumber_2" type="tel" class="tel" required value="<?=substr($user->phone, 3, 4)?>" />
                <span>-</span>
                <input name="pnumber_3" type="tel" class="tel" value="<?=substr($user->phone, 7)?>" required />
            </div>
			<div class="row">
                <label for="email">이메일</label>
                <input id="email" name="email" type="email" class="email" value="<?=$user->email?>" required />
            </div>
            <h3 class="category">구비서류</h3> 
			<div class="row">
                <label for="businessRegist">사업자등록증</label>
                <input id="businessRegist" name="business_certification" type="file" class="file" required />
            </div>
			<div class="row">
                <label for="bankBook">통장사본</label>
                <input id="bankBook" name="account_copy" type="file" class="file" required />
            </div>
			<div class="row">
                <label for="mailOrder">통신판매업신고증</label>
                <input id="mailOrder" name="sell_certification" type="file" class="file" required />
            </div>
            

            <div class="button_container">
                <a class="goback" href=".?page=login">취소</a>
                <input class="submit" type="button" value="확인" onclick="saveInfo()" />
            </div>
        </form>
    </div>

    <footer>
        <?=$this->loadLayout("seller/footer")?>
    </footer>
    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script>
    function saveInfo()
    {
        var formData = new FormData();

        $(".signup_form input[type='file']").each(function (){
            if ($(this).val() != "") {
                formData.append($(this).attr("name"), $(this)[0].files[0]);
            }
        });

        if ($("#password").val() == $("#password_chk").val() && $("#password").val() != "") {
            formData.append('password', $("#password"));
        }

        var tel = "";

        $(".tel").each(function(){
            tel += $(this).val();
        });

        formData.append('name', $("#name").val());
        formData.append('phone', tel);
        formData.append('email', $("#email").val());

        $.ajax({
          type: "POST",
          url: "http://api.siyeol.com/user/info?token="+readCookie('token'),
          dataType: "json",
          processData: false,
          contentType: false,
          data: formData,
          success: function (res) {
            console.log(res);
            if (res.code != 200) {
              alert(res.message);
            } else {
              alert('회원정보 수정이 성공적으로 완료되었습니다.');
              location.reload();
            }
            return false;
          },
          error: function (err) {
            console.log(err);
            alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
            return false;
          }
        });

    }
    </script>
</body>
</html>
