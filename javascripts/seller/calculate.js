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

          var formData = new FormData();
          formData.append("bank",bank);
          formData.append("account",account_number);
          formData.append("name",account_holder);

          $.ajax({
              type: "POST",
              url: "http://api.siyeol.com/seller/calculate/bank?token=" + readCookie('token'),
              data: formData,
              enctype: 'application/x-www-form-urlencoded',
              processData: false,
              contentType: false,
              cache:false,
              success: function (res) {
                  if (res.code == 200) {
                    alert(res.message);
                    location.reload();
                  } else if (res.code == 401) {
                      alert('비정상적인 요청입니다. 로그인을 다시 해주세요.');
                      location.href="./seller.php?page=login";
                  } else if( res.code == 400){
                    alert(res.message);
                  }else{
                      alert('정산 계좌 정보를 업데이트 하는데 실패했습니다.\n다시 시도해 주세요.');
                  }
              },
              error: function (err) {
                  alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
              }
            });
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
