$(document).ready(function() {

  $("[name=not-see-again]").click(function (e) {
    var value = confirm("가입신청을 다시 보지않습니다. 완료하시겠습니까?");
    if(value){
      setStatus(2, $(this).data("user_id"));
      $('.btn-container').remove();
    }
  });

  $("[name=approve-sign-up]").click(function (e) {
    var value = confirm("가입신청을 승인합니다. 완료하시겠습니까?");
    if(value){
      setStatus(1, $(this).data("user_id"));
      $('.btn-container').remove();
      $('.product-list').slideToggle();
    }
  });

});


function setStatus(status, user_id)
{
  $.ajax({
    type: "POST",
    url: "http://api.siyeol.com/admin/member/status?token="+readCookie('token'),
    dataType: "json",
    data: {"user_id": user_id, "status": status},
    success: function (res) {
      if (res.code != 200) {
        alert(res.message);
      } else {
        alert("완료되었습니다.");
        location.reload();
      }
    },
    error: function (err) {
      alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
    }
  });
}