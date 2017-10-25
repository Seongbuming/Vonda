$(document).ready(function() {
  $('.btn-edit').on('click',function () {
    console.log("test");
    $('#modal_edit').addClass("actived");
  });

  $('#modal_edit .submit').on( "click", function() {
    var bank = $('#bank').val();
    var account_number = $('#account-number').val();
    var account_holder = $('#account-holder').val();

    if(bank){
      if( (account_number.length >= 11) && (account_number.length <= 14) ){
        if(account_holder.length > 0){
          alert("submit");
        }else{
          alert("예금주를 입력해주세요. ");
        }
      }else{
        alert("계좌번호를 정확하게 입력해주세요.");
      }
    }else{
      alert("은행을 선택해주세요");
    }
  });

});
