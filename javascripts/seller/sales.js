
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
      loadOrders();
  });

  $(document).on('change','.select-status',function(){

    var delevery_complete_step_code = '40';
    if($(this).val() == delevery_complete_step_code){
      $(this).addClass('selected-complete-delivery');
    }else{
      $(this).removeClass('selected-complete-delivery');
    }
  });
});
