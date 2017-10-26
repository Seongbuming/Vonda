
$(document).ready(function() {
  var renderRow = function (row) {
      var renderItem = function (item) {
        var item_element = '<tr>' +
              '<td class="date_id">' +
                  '<p class="date">'+row.created_at+'</p>' +
                  '<p class="id"><a href="#">'+row.order_no+'</a></p>' +
              '</td>' +
              '<td class="product">' +
                  '<div class="product_img">' +
                      '<img src="'+item.goods_image+'" alt="상품사진" />' +
                  '</div>' +
                  '<div class="product_info">' +
                      '<p class="open product_detail">'+item.title+'</p>' +
                      '<p>옵션: <span class="option">'+item.goods_option_id+'</span></p>' +
                      '<p>수량: <span class="amount">'+item.ea+'</span></p>' +
                  '</div>' +
              '</td>' +
              '<td class="order_price">' +
                  '<p>'+((item.ea * item.price) + item.shipping_charge)+'원</p>' +
              '</td>';

              switch (item.step) {
                case '1':
                  item_element += '<td class="order_sell_status">' +
                      '<select class="select-status" name="select-status" value="'+item.step+'">' +
                          '<option value="1" selected>주문완료</option>' +
                          '<option value="10">상품준비중</option>' +
                          '<option value="20">배송준비중</option>' +
                          '<option value="30">배송중</option>' +
                          '<option value="40">배송완료</option>' +
                      '</select>' +
                  '</td>' +
              '</tr>';
                  break;
                case '10':
                  item_element += '<td class="order_sell_status">' +
                      '<select class="select-status" name="select-status" value="'+item.step+'">' +
                          '<option value="1">주문완료</option>' +
                          '<option value="10" selected>상품준비중</option>' +
                          '<option value="20">배송준비중</option>' +
                          '<option value="30">배송중</option>' +
                          '<option value="40">배송완료</option>' +
                      '</select>' +
                  '</td>' +
              '</tr>';
                  break;
                case '20':
                  item_element += '<td class="order_sell_status">' +
                      '<select class="select-status" name="select-status" value="'+item.step+'">' +
                          '<option value="1">주문완료</option>' +
                          '<option value="10">상품준비중</option>' +
                          '<option value="20" selected>배송준비중</option>' +
                          '<option value="30">배송중</option>' +
                          '<option value="40">배송완료</option>' +
                      '</select>' +
                  '</td>' +
              '</tr>';
                  break;
                case '30':
                  item_element += '<td class="order_sell_status">' +
                      '<select class="select-status" name="select-status" value="'+item.step+'">' +
                          '<option value="1">주문완료</option>' +
                          '<option value="10">상품준비중</option>' +
                          '<option value="20">배송준비중</option>' +
                          '<option value="30" selected>배송중</option>' +
                          '<option value="40">배송완료</option>' +
                      '</select>' +
                  '</td>' +
              '</tr>';
                  break;
                case '40':
                  item_element += '<td class="order_sell_status">' +
                      '<select class="select-status selected-complete-delivery" name="select-status" value="'+item.step+'">' +
                          '<option value="1">주문완료</option>' +
                          '<option value="10">상품준비중</option>' +
                          '<option value="20">배송준비중</option>' +
                          '<option value="30">배송중</option>' +
                          '<option value="40" selected>배송완료</option>' +
                      '</select>' +
                  '</td>' +
              '</tr>';
                  break;
                //주문취소요청,주문취소완료
                case '50':
                    item_element += '<td class="order_sell_status">' +
                            '주문취소요청' +
                          '</td>' +
                        '</tr>';
                  break;
                case '51':
                item_element += '<td class="order_sell_status">' +
                        '주문취소완료' +
                      '</td>' +
                    '</tr>';
                  break;
                //반품요청,반품완료,교환요청,교환완료
                case '100':
                  item_element += '<td class="order_sell_status">' +
                      '<button type="button" name="button" class="btn-request-return"'+
                          '반품요청' +
                      '</buton>' +
                  '</td>' +
              '</tr>';
                  break;
                  case '110':
                    item_element += '<td class="order_sell_status">' +
                        '<button type="button" name="button" class="btn-complete-return"'+
                            '반품완료' +
                        '</buton>' +
                    '</td>' +
                '</tr>';
                    break;
                    case '200':
                      item_element += '<td class="order_sell_status">' +
                          '<button type="button" name="button" class="btn-request-exchange"'+
                              '교환요청' +
                          '</buton>' +
                      '</td>' +
                  '</tr>';
                      break;
                      case '210':
                        item_element += '<td class="order_sell_status">' +
                            '<button type="button" name="button" class="btn-complete-exchange"'+
                                '교환완료' +
                            '</buton>' +
                        '</td>' +
                    '</tr>';
                        break;

              }
          return item_element;

      };
      var $items = [];

      for (var i = 0; i < row.items.length; i++) {
          var $item = $(renderItem(row.items[i]));
          if (i > 0) {
              $item.find('td.date_id').remove();
              $item.find('td.order_sell_status').remove();
          }
          $items.push($item);
      }
      // add rowspan
      if ($items.length >= 2) {
          $items[0].find('td.date_id').attr('rowspan', $items.length);
          $items[0].find('td.order_sell_status').attr('rowspan', $items.length);
      }

      return $items;
  };

  function loadOrders(page=1) {
      removeOrderItems();
      $.ajax({
          type: "GET",
          url: "http://api.siyeol.com/seller/orders?page="+page+"&token=" + readCookie('token'),
          success: function (res) {
              if (res.code == 200) {
                  // alert('정상적으로 처리되었습니다.');
                  $('#sales-list > tbody').append(res.datas.map(renderRow).reduce(function(a, b) { return a.concat(b); }, []));
              } else if (res.code == 401) {
                  alert('비정상적인 요청입니다. 로그인을 다시 해주세요.');
                  location.href="./?page=login";
              } else {
                  alert('주문 목록을 불러오는데 실패했습니다.\n다시 시도해 주세요.');
              }
              // location.reload();
          },
          error: function (err) {
              alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
          }
      });
  };

  function removeOrderItems() {
      $('#sales-list > tbody').html('');
  }

  $(function() {
      // loadOrders();
  });

  $(document).on('change','.select-status',function(){
    var order_no = $(this).data("order_no");
    var order_item_id = $(this).data("order_item_id");
    var step = $(this).val();

    $.ajax({
        type: "POST",
        url: "http://api.siyeol.com/seller/order/"+order_no+"/"+order_item_id+"/"+step+"?token=" + readCookie('token'),
        data: {_method:'PUT'},
        success: function (res) {
            alert(res.message);
            location.reload();
        },
        error: function (err) {
            alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
        }
    });
    /*
    var delevery_complete_step_code = '40';
    if($(this).val() == delevery_complete_step_code){
      $(this).addClass('selected-complete-delivery');
    }else{
      $(this).removeClass('selected-complete-delivery');
    }*/
  });

  //반품 요청 modal
  $(document).on('click','.btn-request-return',function(){
    returnInfo($(this).data("order_no"));
  });

  //반품 완료 modal
  $(document).on('click','.btn-complete-return',function(){
    returnInfo($(this).data("order_no"));
  });

  //교환 요청 modal
  $(document).on('click','.btn-request-exchange',function(){
    var id = $(this).data("id");

    changeInfo(id);

    $("#modal_return_exchange").find(".product").html($(this).parent().parent().find(".product").html());
    $("#modal_return_exchange").find(".order_price").html($(this).parent().parent().find(".order_price").html());

    // item = {
    //   comment: "사이즈 교환해주세요ㅠㅠ"
    // };
    // var element = '<p class="comment">"'+item.comment+'"</p>';
    // $('#modal_return_exchange .contents').html(element);
    // $('#modal_return_exchange .modal_body h4').text("교환");
    // $('#modal_return_exchange .submit').text("교환요청");
    // $('#modal_return_exchange').addClass('actived');
  });
  //교환 완료 modal
  $(document).on('click','.btn-complete-exchange',function(){
    var id = $(this).data("id");

    changeInfo(id);

    $("#modal_return_exchange").find(".product").html($(this).parent().parent().find(".product").html());
    $("#modal_return_exchange").find(".order_price").html($(this).parent().parent().find(".order_price").html());
    $("#modal_return_exchange").addClass('actived');
  });

  $("#modal_return_exchange .submit").click(function() {
    if ($(this).text() == "교환요청") {
      var id = $(this).data('id');

      $.ajax({
        type: "POST",
        url: "http://api.siyeol.com/seller/order/change/"+id+"?token=" + readCookie('token'),
        async: false,
        success: function (res) {
            if (res.code == "200") {
              alert("성공적으로 교환요청을 허용하였습니다.");
              location.reload();
            } else {
              return false;
            }
        },
        error: function (err) {
            alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
        }
    });
    }
  });

  //order detail 모달 띄우기
  $(document).on('click','.id a', function () {
    var order_id = $(this).text();

    //order data를 #modal_order_detail에 넣기.
    //get data by order_id;
    getItems(order_id);
    $("#modal_order_detail").addClass("actived");

  });


});

function returnInfo(order_no)
{
  $.ajax({
      type: "GET",
      url: "http://api.siyeol.com//seller/order/"+order_no+"/return?token=" + readCookie('token'),
      async: false,
      success: function (res) {
          if (res.code == "200") {
            var element = '<p class="return-reason"> 반품사유 : '+res.data.reason+'</p>' +
                          '<p class="comment">"'+res.data.message+'"</p>';
            $('#modal_return_exchange .contents').html(element);
            $('#modal_return_exchange .modal_body h4').text("반품");
            $('#modal_return_exchange .submit').text(res.data.status == "1" ? "반품완료" : "반품요청");
            $('#modal_return_exchange').addClass('actived');
          } else {
            return false;
          }
      },
      error: function (err) {
          alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
      }
  });
}

function changeInfo(id)
{
  $.ajax({
      type: "GET",
      url: "http://api.siyeol.com/seller/order/change/"+id+"?token=" + readCookie('token'),
      async: false,
      success: function (res) {
        console.log(res);
          if (res.code == "200") {
            var element = '<p class="comment">"'+res.data.change.message+'"</p>';
            $('#modal_return_exchange .contents').html(element);
            $('#modal_return_exchange .modal_body h4').text("교환");
            $('#modal_return_exchange .submit').text(res.data.step == "40" ? "교환요청" : "교환완료");
            $('#modal_return_exchange .submit').data('id', id);
            $('#modal_return_exchange').addClass('actived');

          } else {
            return false;
          }
      },
      error: function (err) {
          alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
      }
  });

  return false;
}

function getItems(order_no) {
    $.ajax({
      type: "GET",
      url: "http://api.siyeol.com/seller/order/"+order_no+"?token="+readCookie('token'),
      dataType: "json",
      success: function (res) {
        if (res.code == 200) {
            console.log(res);
            var order = res.data;

            $("#modal_order_detail").find(".order_no").text(order.order_no);
            $("#modal_order_detail").find(".order_date").text(order.created_at);
            $("#modal_order_detail").find(".order_name").text(order.order_name);
            $("#modal_order_detail").find(".order_account").text(order.user_account);
            $("#modal_order_detail").find(".origin_price").text(order.origin_price.format());
            $("#modal_order_detail").find(".shipping_price").text(order.shipping_price.format());
            $("#modal_order_detail").find(".total_price").text(order.total_price.format());
            $("#modal_order_detail").find(".receive_name").text(order.delivery.receive_name);
            $("#modal_order_detail").find(".receive_phone").text(order.delivery.receive_phone);
            $("#modal_order_detail").find(".postcode").text(order.delivery.zipcode);
            $("#modal_order_detail").find(".address").text(order.delivery.address);
            $("#modal_order_detail").find(".delivery_message").text(order.delivery.delivery_message);


            $("#modal_order_detail").addClass("actived");
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
