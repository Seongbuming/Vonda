$(document).ready(function() {
  $('#request-return-modal .submit').on("click",function () {
    var is_confirmed = confirm("반품 요청을 승인하시겠습니까?\n"+
                            "확인을 누르면 결제모듈로 이동해서 결제취소를 진행합니다.");

    if(is_confirmed){
      var order_no = $("#request-return-modal").data("order_no");
      //상태 변경 data 업데이트
      $.ajax({
        type: "POST",
        url: "http://api.siyeol.com/admin/order/"+order_no+"/return?token="+readCookie('token'),
        dataType: "json",
        async: false,
        success: function (res) {
          if (res.code != 200) {
            alert(res.message);
          } else {
            alert("결제 취소가 완료되었습니다.");
            location.reload();
          }
        },
        error: function (err) {
          alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
        }
      });
    }
  });

  $('.btn-cancel-order').click(function() {
    var is_confirmed = confirm("반품 요청을 승인하시겠습니까?\n"+
                            "확인을 누르면 결제모듈로 이동해서 결제취소를 진행합니다.");

    if(is_confirmed){
      var order_no = $(this).parent().parent().parent().find("a").first().text();

      //상태 변경 data 업데이트
      $.ajax({
        type: "POST",
        url: "http://api.siyeol.com/admin/order/"+order_no+"/cancel?token="+readCookie('token'),
        dataType: "json",
        async: false,
        success: function (res) {
          if (res.code != 200) {
            alert(res.message);
          } else {
            alert("결제 취소가 완료되었습니다.");
            location.reload();
          }
        },
        error: function (err) {
          alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
        }
      });
    }
  });

  $(document).on('click','.btn-request-return',function () {
    var parent = $(this).parent().parent()
    var size = $(parent).find("td").attr("rowspan");
    var datas = "";
    var item;

    var order_no = $(parent).find("a").first().text();

    $("#request-return-modal").data("order_no", order_no);

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

function getItems(order_no) {
    $.ajax({
      type: "GET",
      url: "http://api.siyeol.com/admin/order/"+order_no+"?token="+readCookie('token'),
      dataType: "json",
      success: function (res) {
        if (res.code == 200) {
            console.log(res);
            var order = res.data;

            $("#order-detail-modal").find(".order_no").text(order.order_no);
            $("#order-detail-modal").find(".order_date").text(order.created_at);
            $("#order-detail-modal").find(".order_name").text(order.order_name);
            $("#order-detail-modal").find(".order_account").text(order.user_account);
            $("#order-detail-modal").find(".origin_price").text(order.origin_price.format());
            $("#order-detail-modal").find(".shipping_price").text(order.shipping_price.format());
            $("#order-detail-modal").find(".total_price").text(order.total_price.format());
            $("#order-detail-modal").find(".receive_name").text(order.delivery.receive_name);
            $("#order-detail-modal").find(".receive_phone").text(order.delivery.receive_phone);
            $("#order-detail-modal").find(".postcode").text(order.delivery.zipcode);
            $("#order-detail-modal").find(".address").text(order.delivery.address);
            $("#order-detail-modal").find(".delivery_message").text(order.delivery.delivery_message);


            $("#order-detail-modal").addClass("actived");
            var items = res.data.items;

            var html = "";

            /*
            <p>
              <span class="title">SINGLE BREASTED OVERSIZED BLAZER</span>
              <span class="option">옵션 : 실버</span>
              <span class="count">수량 : 1</span>
            </p>
            <p>
              <span class="shipping-status">배송중</span>
              <a href="#" class="shipping-company">CJ대한통운 [23891283018390]</a>
            </p>
            */
            items.forEach(function (item){
                html += '<li class="order-product-item">';
                html += '<p>';
                html += '<span class="title">'+item.goods.title+'</span>';
                html += '<span class="option">옵션: ';

                item.goods.options.forEach(function (option) {
                    if (option.id == item.goods_option_id) {
                        html += option.name;
                    }
                });

                html += '</span>';
                html += '<span class="count">수량: '+item.ea+'</span>';
                html += '</p>';
                html += '<p>';
                html += '<span class="shipping-status">';

                switch (item.step) {
                  case '1':
                    html += '주문완료';
                  break;
                  case '2':
                    html += '취소 및 반품 완료';
                  break;
                  case '10':
                    html += '상품준비중';
                  break;
                  case '20':
                    html += '배송준비중';
                  break;
                  case '25':
                    html += '배송중';
                  break;
                  case '30':
                    html += '배송완료';
                  break;
                  case '40':
                    html += '교환요청';
                  break;
                  case '45':
                    html += '교환승인';
                  break; 
                }

                html += '</span>';
                if (item.step == "25" || item.step == "30") {
                  html += '<a href="#" class="shipping-company"></a>';
                }
                html += '</p>';
                html += '</li>';
            });

            $("#order-detail-modal .order-product-list").html(html);
        }
      },
      error: function (err) {
        alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
      }
    });
}