$(document).ready(function() {

  $("#seller .input-item").change(function (e) {
    var ad_rate = $('input[name=input-ad-rate]').val() * 1;
    var fee_rate = $('input[name=input-fee-rate]').val() * 1;

    // var price = $('#general-price').text();
    var price = 900000;
    var rate = 100 - ( ad_rate + fee_rate);

    // 수수료와 광고료 비율의 합이 100을 넘을 수 없음.
    if( (rate >= 100) || (rate <= 0)){
      alert("옳은 입력값이 아닙니다. 다시 입력해주세요.");
    }else{
        var result = ( price / 100 ) * rate;
        $('#result-price').text(result + "원");
    }
  });

  $("#creator .input-item").change(function (e) {
    var fee_rate = $('input[name=input-fee-rate]').val() * 1;

    // var price = $('#general-price').text();
    var price = 900000;

    // 수수료 비율이 100을 넘을 수 없음.
    if( (fee_rate <= 0) || (fee_rate >= 1) ){
      alert("옳은 입력값이 아닙니다. 다시 입력해주세요.");
    }else{
        var result = price * fee_rate;
        $('#result-price').text(result + "원");
    }
  });

});
