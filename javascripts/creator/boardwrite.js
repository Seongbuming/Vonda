function write_notice(subject,content) {
  var formData = new FormData();
  formData.append("subject",subject);
  formData.append("content",content);
  formData.appen("is_top","n");

  $.ajax({
      type: "POST",
      url: "http://api.siyeol.com/creator/board?"+"token=" + readCookie('token'),
      data: formData,
      enctype: 'multipart/form-data',
      processData: false,
      contentType: false,
      cache:false,
      success: function (res) {
          if (res.code == 200) {
            location.href="creator.php?page=board_detail&id="+res.data.id;
          } else if (res.code == 401) {
              alert('비정상적인 요청입니다. 로그인을 다시 해주세요.');
              location.href="./?page=login";
          } else {
              alert('게시물을 생성하는데 실패했습니다.\n다시 시도해 주세요.');
          }
      },
      error: function (err) {
          alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
      }
  });
}

$('.submit').on('click', function () {
  var subject = $('.title').val();
  var content = $('#text-editor').summernote('code');

  //form validation
  if(subject.length > 0 ){
    if(content.length > 0){
      write_notice(subject,content);
    }else{
      alert("내용을 입력해주세요");
    }
  }else{
    alert("제목을 입력해주세요");
  }
});
