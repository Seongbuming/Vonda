function write_notice(subject,content) {
  var formData = new FormData();
  formData.append("subject",subject);
  formData.append("content",content);

  $.ajax({
      type: "POST",
      url: "http://api.siyeol.com/creator/board?"+"token=" + readCookie('token'),
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

$('.submit').on('click', function () {
  var subject = $('.title').val();
  var content = $('#text-editor').summernote('code');
  write_notice(subject,content);
});
