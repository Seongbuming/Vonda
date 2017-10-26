$(document).ready(function() {
    // 로그인 액션
    $(".signup_form").submit(function() {
        if ($("#password").val() != $("#password_chk").val()) {
          alert("비밀번호가 일치하지 않습니다.");
          return false;
        }

        var formData = new FormData();
        formData.append("type", "seller");

        $(this).find('input').each(function (){
          if ($(this).attr("type") == "file") {
            formData.append($(this).attr("name"), $(this)[0].files[0]);
          } else {
            formData.append($(this).attr("name"), $(this).val());
          }
          console.log($(this).attr("name") + " : " + $(this).val());
        });

        formData.append("phone", $(this).find('input[name="pnumber_1"]').val() + $(this).find('input[name="pnumber_2"]').val() + $(this).find('input[name="pnumber_3"]').val());

        $.ajax({
          type: "POST",
          url: "http://api.siyeol.com/user",
          dataType: "json",
          processData: false,
          contentType: false,
          data: formData,
          success: function (res) {
            if (res.code == 200) {
                location.href = "./seller.php?page=seller_registfinish";
            } else {
                // 회원가입 실패
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


function saveInfo() {
    var formData = new FormData();

    $(".signup_form input[type='file']").each(function (){
        // 파일 파라미터 추가
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

    formData.append('name') = $("#name").val();
    formData.append('phone') = tel;
    formData.append('email') = $("#email").val();

    $.ajax({
      type: "POST",
      url: "http://api.siyeol.com/admin/goods?token="+readCookie('token'),
      dataType: "json",
      processData: false,
      contentType: false,
      data: formData,
      success: function (res) {
        console.log(res);
        if (res.code != 200) {
          alert(res.message);
        } else {
          alert('상품 등록이 완료되었습니다.');
          location.href = "./admin.php?page=product_list";
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