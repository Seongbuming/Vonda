$(document).ready(function(){
  $('.btn-promotion-apply').on("click",function() {
    $('#modal_promotion_apply').addClass("actived");
  });

  $(document).on('change','#modal_promotion_apply .item-checkbox',function () {
  });

  $('#modal_promotion_apply .submit').on("click", function () {

    $('#modal_promotion_apply').removeClass("actived");

    var isChecked = $('.item-checkbox:checked').length;
    //신청할 상품을 선택함.
    if(isChecked > 0){
      $('#modal_apply_finish').addClass("actived");
    }else{
      $('#modal_apply_failed').addClass("actived");
    }
  });
});
