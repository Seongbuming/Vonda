$(document).ready(function() {
  $('#request-return-modal .submit').on("click",function () {
    var is_confirmed = confirm("반품 요청을 승인하시겠습니까?\n"+
                            "확인을 누르면 결제모듈로 이동해서 결제취소를 진행합니다.");

    if(is_confirmed){
      //상태 변경 data 업데이트
      alert("결제 취소가 완료되었습니다.");
    }
  });

  $(document).on('click','.btn-request-return',function () {
    item = {
      reason: "구매의사취소",
      comment: "반품해주세요ㅜㅜ"
    };

    var element = '<p class="return-reason"> 반품사유 : '+item.reason+'</p>' +
                  '<p class="comment">"'+item.comment+'"</p>';
    $('#request-return-modal .contents').html(element);
    $('#request-return-modal .modal_body h4').text("반품");
  });

  $(document).on('click','.btn-complete-return',function () {
    item = {
      reason: "구매의사취소",
      comment: "반품해주세요ㅜㅜ"
    };

    var element = '<p class="return-reason"> 반품사유 : '+item.reason+'</p>' +
                  '<p class="comment">"'+item.comment+'"</p>';
    $('#complete-return-modal .contents').html(element);
    $('#complete-return-modal .modal_body h4').text("반품");
  });

  $('#complete-return-modal .submit').on('click',function () {
    $('#complete-return-modal .close').click();
  });
});
