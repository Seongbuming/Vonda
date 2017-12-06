$(document).ready(function() {

  $("#seller .input-item").change(function (e) {
    var ad_rate = $('input[name=input-ad-rate]').val() * 1;
    var fee_rate = $('input[name=input-fee-rate]').val() * 1;

    // var price = $('#general-price').text();
    //var price = 900000;
    var price = parseInt($("#general-price").text().replace("원", "").replace(/,/g, ""));
    var rate = 100 - ( ad_rate + fee_rate);

    // 수수료와 광고료 비율의 합이 100을 넘을 수 없음.
    if( (rate >= 100) || (rate <= 0)){
      alert("옳은 입력값이 아닙니다. 다시 입력해주세요.");
    }else{
        var result = ( price / 100 ) * rate;
        $('#result-price').text(result.format() + "원");
    }
  });

  $("#creator .input-item").change(function (e) {
    var fee_rate = $('input[name=input-fee-rate]').val() * 1;

    // var price = $('#general-price').text();
    var price = parseInt($("#general-price").text().replace("원", "").replace(/,/g, ""));

    // 수수료 비율이 100을 넘을 수 없음.
    if( (fee_rate <= 0) || (fee_rate >= 1) ){
      alert("옳은 입력값이 아닙니다. 다시 입력해주세요.");
    }else{
        var result = price * fee_rate;
        $('#result-price').text(result.format() + "원");
    }
  });

});

function cancel() {
  var calculate_id = getParam('id');

  $.ajax({
    type: "POST",
    url: "http://api.siyeol.com/admin/calculate/"+calculate_id+"/0?token="+readCookie('token'),
    dataType: "json",
    success: function (res) {
      alert(res.message);
      location.reload();
    },
    error: function (err) {
      alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
    }
  });
}

function select_process(type) {
  $("tbody .select input[type='checkbox']:checked").each(function () {
    var calculate_id = $(this).val();
    $.ajax({
      type: "POST",
      url: "http://api.siyeol.com/admin/calculate/"+calculate_id+"/"+type+"?token="+readCookie('token'),
      dataType: "json",
      async: false,
      success: function (res) {
      },
      error: function (err) {
        alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
      }
    });
  });

  location.reload();
}

function complete() {
  var calculate_price = parseInt($('#result-price').text().replace("원", "").replace(/,/g, ""));
  var calculate_id = getParam('id');

  $.ajax({
    type: "POST",
    url: "http://api.siyeol.com/admin/calculate/"+calculate_id+"/1?token="+readCookie('token'),
    dataType: "json",
    success: function (res) {
      alert(res.message);
      location.reload();
    },
    error: function (err) {
      alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
    }
  });
}