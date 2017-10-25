$(document).ready(function(){
  //신청하기 버튼과 홍보 신청 모달 연결
  $('.btn-promotion-apply').on("click", function() {
    $('#modal_promotion_apply').addClass("actived");
  });

  //체크박스의 상태값이 변할 때마다, 체크된 아이템 수를 받아옴
  //체크된 상품이 없으면, 신청하기 버튼 비활성화
  //체크된 상품이 있으면, 신청하기 버튼 활성화
  $(document).on('change','#modal_promotion_apply .item-checkbox',function () {
    $('.item-checkbox').not(this).prop('checked', false);
    var isChecked = $('.item-checkbox:checked').length;
    if(isChecked){
      //신청하기 버튼 활성화
      $('#modal_promotion_apply .submit').attr("disabled",false).css("opacity","1");
    }else{
      $('#modal_promotion_apply .submit').attr("disabled",true).css("opacity","0.5");
    }
  });

  $('#modal_promotion_apply .submit').on("click", function () {

    $('#modal_promotion_apply').removeClass("actived");
    var selected = $('.item-checkbox:checked');
    var isChecked = $('.item-checkbox:checked').length;

    $.each(selected, function (key, value) {
      var element_id = value.id;
      var index = element_id.indexOf("_");
      var id = element_id.substring(index+1, element_id.length);
      console.log(id);

      $.ajax({
          type: "POST",
          url: "http://api.siyeol.com/creator/goods/"+id+"?"+"token=" + readCookie('token'),
          enctype: 'application/json',
          processData: false,
          contentType: false,
          cache:false,
          success: function (res) {
            console.log(res.code);
              if (res.code == 200) {
                $('#modal_apply_finish').addClass("actived");
                location.reload();
              } else if (res.code == 401) {
                  alert('비정상적인 요청입니다. 로그인을 다시 해주세요.');
                  location.href="./?page=login";
              } else if( res.code == 400){
                $('#modal_apply_failed').addClass("actived");
              }else{
                  alert('크리에이터 정보를 업데이트 하는데 실패했습니다.\n다시 시도해 주세요.');
              }
          },
          error: function (err) {
              alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
          }
      });
    });
  });

  //홍보 신청된 상태 => 홍보 신청 취소하기
  $(document).on('click','.btn-cancel-apply',function () {
    var goods_id = $(this).siblings('input').val();
    $.ajax({
        type: "DELETE",
        url: "http://api.siyeol.com/creator/goods/promote"+goods_id+"?"+"token=" + readCookie('token'),
        // processData: false,
        // contentType: false,
        // cache:false,
        success: function (res) {
          console.log(res.code);
            // if (res.code == 200) {
            //
            //   // location.reload();
            // } else if (res.code == 401) {
            //     alert('비정상적인 요청입니다. 로그인을 다시 해주세요.');
            //     location.href="./?page=login";
            // } else {
            //     alert('크리에이터 정보를 업데이트 하는데 실패했습니다.\n다시 시도해 주세요.');
            // }
        },
        error: function (err) {
            alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
        }
    });
  });

  //홍보 신청 모달에서 상품 검색
  $('.submit_search').on('click',function () {
    console.log("search");
    var query = $('.input_search').val();
    $.ajax({
        type: "GET",
        url: "http://api.siyeol.com/search?query="+query,
        success: function (res) {
            if (res.code == 200) {
              template_table_element(res.datas);
            } else if (res.code == 401) {
                alert('비정상적인 요청입니다. 로그인을 다시 해주세요.');
                location.href="./?page=login";
            } else if(res.code == 400){
              template_table_element(false);
            }
            else{
                alert('주문 목록을 불러오는데 실패했습니다.\n다시 시도해 주세요.');
            }
        },
        error: function (err) {
            alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
        }
    });
  });
});

function template_table_element(datas) {
  var target = $('#modal_promotion_apply .order_list tbody');
  if(datas){
    var element_str ='';
    $.each(datas, function (key, value) {
      element_str += '<tr> <td class="">' +
          '<input id="select_'+value.id+'" class="item-checkbox" type="checkbox" title="선택">' +
          '<label for="select_'+value.id+'"></label>'+
        '</td>'+
        '<td class="product">' +
          '<div class="product_img">' +
            '<img src="http://api.siyeol.com/'+ value.goods_image+'" alt="상품사진" />' +
            '</div>' +
            '<div class="product_info">' +
              '<p class="open product_detail">'+ value.title+'</p>'+
            '</div>' +
        '</td>'+
        '<td class="seller">' +
          '<p>'+value.seller_id+'</p>' +
        '</td>'+
        '<td class="product_price">' +
          '<p>'+numberWithCommas(value.options[0].price)+'원</p>' +
        '</td>'+
      '</tr>';
    });
    target.html(element_str);
    $('#modal_promotion_apply .submit').attr("disabled",false).css("opacity","1");
  }else{
    target.html('<p style="padding: 30px 0;">검색 결과가 없습니다.</p>');
    $('#modal_promotion_apply .submit').attr("disabled",true).css("opacity","0.5");

  }
}

// 돈콤마 정규식
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
