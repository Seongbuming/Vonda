$(document).ready(function() {
  $('#text-editor').summernote({
    placeholder: '내용을 입력해주세요',
    height: 350,
    onImageUpload : function(files, editor, welEditable) {
            sendFile(files[0], editor, welEditable);
        },
    lang : 'ko-KR',
  });
});


function saveNotice()
{
	var subject = $(".title").val();
	var target = $(".option").val();
	var content = $("#text-editor").val();

	$.ajax({
      type: "POST",
      url: "http://api.siyeol.com/board?token="+readCookie('token'),
      dataType: "json",
      data: {subject: subject, content: content, target: target},
      success: function (res) {
        console.log(res);
        if (res.code != 200) {
          alert(res.message);
        } else {
          alert('공지 등록 완료');
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
