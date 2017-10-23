$(document).ready(function() {

  $(".sns-item input[type=checkbox]").change(function() {

    var src = $(this).siblings("img").attr("src");
    if ($(this).prop("checked")) {
      $(this).siblings(".item-url").attr("disabled",false);
      $(this).siblings(".input-label").css("color","black");
      $(this).siblings("img").attr("src", src.replace("30.png",".png"));
    }else{
      $(this).siblings(".item-url").attr("disabled",true);
      $(this).siblings(".input-label").css("color","#979797");
      $(this).siblings("img").attr("src", src.replace(".png","30.png"));
    }
  });

  function update_creator_info(nickname,introduce,profile_image,cover_image) {
    var formData = new FormData();
    formData.append("nickname",nickname);
    formData.append("introduce",introduce);
    formData.append("profile_image",profile_image);
    formData.append("cover_image",cover_image);

    $.ajax({
        type: "POST",
        url: "http://api.siyeol.com/creator/info?"+"token=" + readCookie('token'),
        data: formData,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache:false,
        success: function (res) {
          console.log(res.code);
            // if (res.code == 200) {
            //
            // } else if (res.code == 401) {
            //     alert('비정상적인 요청입니다. 로그인을 다시 해주세요.');
            //     location.href="./?page=login";
            // } else {
            //     alert('크리에이터 정보를 업데이트 하는데 실패했습니다.\n다시 시도해 주세요.');
            // }
        },
        error: function (err) {
            alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
        }
    });
  }

  $('.submit').on('click',function () {
    var nickname = $('.creator_name').val();
    var nickname_str = nickname.slice(1, nickname.length);
    var introduce = $('.creator_contents').val();
    var profile_image = $('.creator_profile_img').attr("src");
    var cover_image = $('.creator_profile_bg_img').attr("src");
    var upload_profile_image = $('#creator-bg-upload');
    var upload_cover_image = $('#creator-profile-upload');
    var is_uploaded_profile = false;
    var is_uploaded_cover = false;

    if(upload_profile_image.get(0).files.length > 0){
      is_uploaded_profile = true;
      if (window.FileReader) { // modern browser
        upload_profile_image = $('#creator-profile-upload')[0].files[0].name;
      } else {
        // old IE
        upload_profile_image = $('#creator-profile-upload').val().split('/').pop().split('\\').pop(); // 파일명만 추출
      }
    }

    if(upload_cover_image.get(0).files.length > 0){
      is_uploaded_cover = true;
      if (window.FileReader) { // modern browser
        upload_cover_image = $('#creator-bg-upload')[0].files[0].name;
      } else {
        // old IE
        upload_cover_image = $('#creator-bg-upload').val().split('/').pop().split('\\').pop(); // 파일명만 추출
      }
    }

    if(nickname.length > 0){
      if(is_uploaded_cover){
        cover_image = upload_cover_image;

        if(is_uploaded_profile){
          profile_image = upload_profile_image;
          update_creator_info(nickname_str,introduce,upload_profile_image,upload_cover_image);

        }else{
          update_creator_info(nickname_str,introduce,upload_profile_image,upload_cover_image);

        }
      }else{
        if(is_uploaded_profile){
          profile_image = upload_profile_image;
          update_creator_info(nickname_str,introduce,upload_profile_image,upload_cover_image);

        }else{
          update_creator_info(nickname_str,introduce,upload_profile_image,upload_cover_image);

        }
      }
    }else{
      alert("닉네임을 입력해주세요.");
    }

  });

});
