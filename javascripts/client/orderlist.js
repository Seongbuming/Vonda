$(document).ready(function() {
    /* 반품/교환 */
    function refreshReturnModal() {
        var option = $("#modal_return input[name=option]:checked").val();
        if (option == "exchange" || option == undefined) {
            $("#modal_return .select").css("display", "table-cell");
            $("#modal_return .exchange_form").css("display", "block");
            $("#modal_return .return_form").css("display", "none");
        } else {
            $("#modal_return .select").css("display", "none");
            $("#modal_return .exchange_form").css("display", "none");
            $("#modal_return .return_form").css("display", "block");
        }
    }
    $("#modal_return input[name=option]").change(refreshReturnModal);
    // 반품/교환 모달 열기
    $("button.return").click(function() {
        var $modal = $("#modal_return");

        // 모달 내용 초기화
        $("#option_exchange").prop("checked", true);
        $modal.find("select option").eq(0).prop("selected", true);
        $modal.find("textarea").val("");
        refreshReturnModal();

        // 모달 주문번호 입력
        var order_no = $(this).parent().parent().find(".id").text();
        $modal.find(".order_no").val(order_no);

        getItems(order_no);

        $modal.get(0).open();
    });
    // 반품/교환 확인
    $("#modal_return .submit").click(function() {
        var $modal = $("#modal_return");
        var option = $modal.find("input[name=option]:checked").val();
        var $form = $modal.find(`.${option}_form`);
        var order_no = $modal.find(".order_no").val();
        var type = $("#modal_return input[name=option]:checked").val();

        // 빈 칸 검사
        if ($form.find(".reason").val() === null) {
            alert("반품사유를 선택해 주세요.");
        } else if ($form.find("textarea").val().length === 0) {
            alert("반품 상세 사유를 입력해 주세요.");
        } else {
            // 반품/교환 작업을 여기에서 수행하세요.
            if (type == "exchange") {
                // exchange
                var datas = [];
                $modal.find(".order_list tbody .select input[type='checkbox']:checked").each(function () {
                    datas.push($(this).val());
                });

                if (datas.lenght == 0) {
                    alert('교환 상품을 선택 해 주세요.');
                    return false;
                }

                $.ajax({
                  type: "POST",
                  url: "http://api.siyeol.com/order/"+order_no+"/change?token="+readCookie('token'),
                  dataType: "json",
                  data: {'message':$form.find("textarea").val(), 'order_item_no':datas},
                  success: function (res) {
                    if (res.code != 200) {
                        alert(res.message);
                    }
                    location.reload();
                  },
                  error: function (err) {
                    alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
                  }
                });
            } else {
                // return
                var reason = $form.find(".reason").val();
                var message = $form.find("textarea").val();

                $.ajax({
                  type: "POST",
                  url: "http://api.siyeol.com/order/"+order_no+"/return?token="+readCookie('token'),
                  dataType: "json",
                  data: {'reason':reason, 'message':message},
                  success: function (res) {
                    if (res.code != 200) {
                        alert("반품 신청에 실패하였습니다.");
                    }
                    location.reload();
                  },
                  error: function (err) {
                    alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
                  }
                });
            }
            $modal.get(0).close();
        }
    });

    /* 주문취소 */
    // 주문취소 모달 열기
    $("button.cancel").click(function() {
        var $modal = $("#modal_cancel");

        // 모달 내용 초기화
        $modal.find("select option").eq(0).prop("selected", true);

        // 모달 주문번호 입력
        var order_no = $(this).parent().parent().find(".id").text();
        $modal.find(".order_no").val(order_no);

        $modal.get(0).open();
    });
    // 주문취소 확인
    $("#modal_cancel .submit").click(function() {
        var $modal = $("#modal_cancel");
        var reason = $modal.find(".reason").val();
        var order_no = $modal.find(".order_no").val();

        // 빈 칸 검사
        if (reason == null) {
            alert("취소사유를 입력해 주세요.");
        } else {
            // 주문취소 작업을 여기에서 수행하세요.
            $.ajax({
              type: "POST",
              url: "http://api.siyeol.com/order/"+order_no+"/cancel?token="+readCookie('token'),
              dataType: "json",
              data: {'reason':reason},
              success: function (res) {
                if (res.code != 200) {
                    alert("주문취소에 실패하였습니다.");
                }
                location.reload();
              },
              error: function (err) {
                alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
              }
            });
            $modal.get(0).close();
            $("#modal_cancel_finish").get(0).open();
        }
    });

    //후기 작성 모달 슬라이드
    $(" .bxslider").bxSlider({
        mode: 'vertical',
        speed: 500,
        slideMargin:0,
        infiniteLoop: false,
        pager: false,
        controls: true,
        slideWidth: 150,
        minSlides: 4,
        maxSlides:4,
        moveSlides: 1,
        // adaptiveHeight: false,
    });

    $('.bx-wrapper > div').attr("aria-live","off");

    //후기 작성 모달 슬라이드 버튼 커스터 마이징
    $('.slide_prev').on('click',function () {
      $('.bx-controls-direction .bx-prev').click();
        console.log("prev");
    });

    $('.slide_next').on('click',function () {
      $('.bx-controls-direction .bx-next').click();
        console.log("next");
    });
});

function openDetail(order_no) {
    $.ajax({
      type: "GET",
      url: "http://api.siyeol.com/order/"+order_no+"?token="+readCookie('token'),
      dataType: "json",
      data: {},
      success: function (res) {
        if (res.code == 200) {
            var order = res.data;

            $("#modal_order_detail").find(".order_no").text(order.order_no);
            $("#modal_order_detail").find(".order_date").text(order.created_at);
            $("#modal_order_detail").find(".order_name").text(order.order_name);
            $("#modal_order_detail").find(".origin_price").text(order.origin_price.format());
            $("#modal_order_detail").find(".shipping_price").text(order.shipping_price.format());
            $("#modal_order_detail").find(".total_price").text(order.total_price.format());
            $("#modal_order_detail").find(".receive_name").text(order.delivery.receive_name);
            $("#modal_order_detail").find(".receive_phone").text(order.delivery.receive_phone);
            $("#modal_order_detail").find(".postcode").text(order.delivery.zipcode);
            $("#modal_order_detail").find(".address").text(order.delivery.address);
            $("#modal_order_detail").find(".delivery_message").text(order.delivery.delivery_message);


            $("#modal_order_detail").addClass("actived");
        }
      },
      error: function (err) {
        alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
      }
    });
}

function getItems(order_no) {
    $.ajax({
      type: "GET",
      url: "http://api.siyeol.com/order/"+order_no+"?token="+readCookie('token'),
      dataType: "json",
      data: {},
      success: function (res) {
        if (res.code == 200) {
            var items = res.data.items;
            console.log(items);

            var html = "";

            items.forEach(function (item){
                html += '<tr>';;
                html += '<td class="select">';
                html += '<input id="select_'+item.id+'" type="checkbox" title="선택" value="'+item.id+'" />';
                html += '<label for="select_'+item.id+'"></label>';
                html += '</td>';
                html += '<td class="product">';
                html += '<div class="product_img">';
                html += '<img src="http://api.siyeol.com/'+item.goods.goods_image+'" alt="상품사진" />';
                html += '</div>';
                html += '<div class="product_info">';
                html += '<p>'+item.goods.title+'</p>';
                html += '<p>옵션: <span class="option">';

                item.goods.options.forEach(function (option) {
                    if (option.id == item.goods_option_id) {
                        html += option.name;
                    }
                });

                html += '</span></p>';
                html += '<p>수량: <span class="amount">'+item.ea+'</span></p>';
                html += '</div>';
                html += '</td>';
                html += '<td class="order_price">';
                html += '<p>'+(item.ea * item.price).format()+'원</p>';
                html += '</td>';
            html += '</tr>';
            });

            $("#modal_return .order_list .body").html(html);
        }
      },
      error: function (err) {
        alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
      }
    });
}
