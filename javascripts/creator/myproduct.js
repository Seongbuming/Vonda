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

  $('.submit_search').on('click',function () {
    console.log("search");
    var query = $('.input_search').val();
    $.ajax({
        type: "GET",
        url: "http://api.siyeol.com/search?query="+query,
        success: function (res) {
            if (res.code == 200) {
              console.log("검색결과있음.", res.datas);
              template_table_element(res.datas);
            } else if (res.code == 401) {
                alert('비정상적인 요청입니다. 로그인을 다시 해주세요.');
                location.href="./?page=login";
            } else if(res.code == 400){
              console.log("검색결과없음.");
              template_table_element(false);
            }
            else{
                alert('주문 목록을 불러오는데 실패했습니다.\n다시 시도해 주세요.');
            }
            // location.reload();
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
  }else{
    target.html("<p>검색 결과가 없습니다.</p>");
  }
}

// 돈콤마 정규식
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
