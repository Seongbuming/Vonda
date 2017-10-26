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

  $('.submit').on('click',function () {
    var nickname = $('.creator_name').val();
    var nickname_str = nickname[0] == '@' ? nickname.slice(1, nickname.length) : nickname;
    var introduce = $('.creator_contents').val();
    var profile_image = $('.creator_profile_img').attr("src");
    var cover_image = $('.creator_profile_bg_img').attr("src");

    if(nickname.length > 0){

      update_creator_info(nickname_str,introduce,profile_image,cover_image);

      // isVisible = '1'
      var selected = $('.item-checkbox:checked');
      // isVisible = '0'
      var unSelected= $('.item-checkbox:not(:checked)');

      update_creator_channel(selected,true);
      update_creator_channel(unSelected,false);
    }else{
      alert("닉네임을 입력해주세요.");
    }

  });

});

function update_creator_channel(channel,isVisible) {
  var channel_arr = ["instagram","facebook","twitter","youtube","afreeca","twitch","kakao","naverblog"];

  $.each(channel, function (key, value) {

    var element_id = value.id;
    var index = element_id.indexOf("_");
    var id = element_id.substring(index+1, element_id.length);

    var formData = new FormData();
    formData.append("channel",channel_arr[id]);
    formData.append("isVisible",isVisible === true ? '1' : '0');
    formData.append("link",$(value).siblings('.item-url').val());

    $.ajax({
        type: "POST",
        url: "http://api.siyeol.com/creator/channel?token=" + readCookie('token'),
        data: formData,
        enctype: 'application/x-www-form-urlencoded',
        processData: false,
        contentType: false,
        cache:false,
        success: function (res) {
            // if (res.code == 200) {
            //   $('#modal_apply_finish').addClass("actived");
            // } else if (res.code == 401) {
            //     alert('비정상적인 요청입니다. 로그인을 다시 해주세요.');
            //     location.href="./?page=login";
            // } else if( res.code == 400){
            //   $('#modal_apply_failed').addClass("actived");
            // }else{
            //     alert('크리에이터 정보를 업데이트 하는데 실패했습니다.\n다시 시도해 주세요.');
            // }
        },
        error: function (err) {
            // alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
        }
      });

    });
}

function update_creator_info(nickname,introduce,profile_image,cover_image) {
  var formData = new FormData();
  formData.append("nickname",nickname);
  formData.append("introduce",introduce);


  var upload_profile_image = $('#creator-profile-upload');
  var upload_cover_image = $('#creator-bg-upload');

  if(upload_profile_image.get(0).files.length > 0){

    if (window.FileReader) { // modern browser
      upload_profile_image = $('#creator-profile-upload')[0].files[0];
    } else {
      // old IE
      upload_profile_image = $('#creator-profile-upload').val();
    }
  }

  if(upload_cover_image.get(0).files.length > 0){

    if (window.FileReader) { // modern browser
      upload_cover_image = $('#creator-bg-upload')[0].files[0];
    } else {
      // old IE
      upload_cover_image = $('#creator-bg-upload').val();
    }
  }
  formData.append("profile_image",upload_profile_image);
  formData.append("cover_image",upload_cover_image);

  $.ajax({
      type: "POST",
      url: "http://api.siyeol.com/creator/info?"+"token=" + readCookie('token'),
      data: formData,
      enctype: 'multipart/form-data',
      processData: false,
      contentType: false,
      cache:false,
      success: function (res) {
          if (res.code == 200) {
            location.reload();
          } else if (res.code == 401) {
              alert('비정상적인 요청입니다. 로그인을 다시 해주세요.');
              location.href="./?page=login";
          } else {
              alert('크리에이터 정보를 업데이트 하는데 실패했습니다.\n다시 시도해 주세요.');
          }
      },
      error: function (err) {
          alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
      }
  });
}
