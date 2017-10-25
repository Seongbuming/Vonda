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
    var parent = $(this).parent().parent()
    var size = $(parent).find("td").attr("rowspan");
    var datas = "";
    var item;

    var order_no = $(parent).find("a").first().text();

    for (var i = 0; i < size; i++) {
      datas += "<tr class='product-item'>"+$(parent).html()+"</tr>";
      // console.log($(parent).html());
      parent = $(parent).next();
    }

    $.ajax({
      type: "GET",
      url: "http://api.siyeol.com/admin/order/"+order_no+"/return?token="+readCookie('token'),
      dataType: "json",
      async: false,
      success: function (res) {
        if (res.code != 200) {
          alert(res.message);
        } else {
          item = {
            reason: res.data.reason,
            message: res.data.message
          }
        }
      },
      error: function (err) {
        alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
      }
    });

    var element = '<p class="return-reason"> 반품사유 : '+item.reason+'</p>' +
                  '<p class="comment">"'+item.message+'"</p>';
    $('#request-return-modal .contents').html(element);
    $('#request-return-modal .modal_body h4').text("반품");
    $('#request-return-modal .product-list-table').html(datas);
    $('#request-return-modal .product-list-table tr').each(function (){
      if ($(this).find("td").length > 3) {
        $(this).find("td").first().remove();
        $(this).find("td").last().remove();
      }
    });
  });

  $(document).on('click','.btn-complete-return',function () {
    var parent = $(this).parent().parent()
    var size = $(parent).find("td").attr("rowspan");
    var datas = "";
    var item;

    var order_no = $(parent).find("a").first().text();

    for (var i = 0; i < size; i++) {
      datas += "<tr class='product-item'>"+$(parent).html()+"</tr>";
      // console.log($(parent).html());
      parent = $(parent).next();
    }

    $.ajax({
      type: "GET",
      url: "http://api.siyeol.com/admin/order/"+order_no+"/return?token="+readCookie('token'),
      dataType: "json",
      async: false,
      success: function (res) {
        if (res.code != 200) {
          alert(res.message);
        } else {
          item = {
            reason: res.data.reason,
            message: res.data.message
          }
        }
      },
      error: function (err) {
        alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
      }
    });

    var element = '<p class="return-reason"> 반품사유 : '+item.reason+'</p>' +
                  '<p class="comment">"'+item.message+'"</p>';
    $('#complete-return-modal .contents').html(element);
    $('#complete-return-modal .modal_body h4').text("반품");
    $('#complete-return-modal .product-list-table').html(datas);
    $('#complete-return-modal .product-list-table tr').each(function (){
      if ($(this).find("td").length > 3) {
        $(this).find("td").first().remove();
        $(this).find("td").last().remove();
      }
    });
  });

  $('#complete-return-modal .submit').on('click',function () {
    $('#complete-return-modal .close').click();
  });
});
