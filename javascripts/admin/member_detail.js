$(document).ready(function() {

  $("[name=not-see-again]").click(function (e) {
    var value = confirm("가입신청을 다시 보지않습니다. 완료하시겠습니까?");
    if(value){
      alert("가입신청 다시보지 않기가 완료되었습니다.");
      $('.btn-container').remove();
    }
  });

  $("[name=approve-sign-up]").click(function (e) {
    console.log("Text");
    var value = confirm("가입신청을 승인합니다. 완료하시겠습니까?");
    if(value){
      alert("가입신청 승인이 완료되었습니다.");
      $('.btn-container').remove();
      $('.product-list').slideToggle();
    }
  });

});
