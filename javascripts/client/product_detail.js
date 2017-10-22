$(document).ready(function() {
    // 수량 조절
    $(".amount_wrapper button").click(function() {
        var $amount = $(this).parent().find(".amount");
        var amount = parseInt($amount.text());
        if ($(this).is(".add") === true)
            $amount.text(amount+1);
        else if ($(this).is(".sub") === true && amount > 1)
            $amount.text(amount-1);
    });
        
    // 장바구니 버튼 클릭
    $(".basket").click(function() {
        // 장바구니 담기 작업을 여기에서 수행하세요.
        if (readCookie('token') == null) {
            alert("비회원은 이용할 수 없습니다.");
            return false;
        }

        var $amount = $(".amount");
        var amount = parseInt($amount.text());

        $.ajax({
          type: "POST",
          url: "http://api.siyeol.com/cart?token="+readCookie('token'),
          dataType: "json",
          data: {'goods_id':getParam('id'), 'goods_option_id':$(".goods_option_id").val(), 'ea':amount},
          success: function (res) {
            if (res.code == 200) {
                // 장바구니 등록 성공
                $(".basket_message").text("장바구니에 담겼습니다.");
                $(".basket_message")
                    .fadeIn("slow")
                    .delay(1000)
                    .fadeOut("slow");
            } else if (res.code == 401) {
                // 토큰 오류  
            } else {
                $(".basket_message").text("장바구니 등록에 오류가 발생하였습니다.");
                $(".basket_message")
                    .fadeIn("slow")
                    .delay(1000)
                    .fadeOut("slow");
            }
          },
          error: function (err) {
            alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
          }
        });

        
    });

    $(".buy").click(function () {
        if (readCookie('token') == null) {
            alert("비회원은 이용할 수 없습니다.");
            return false;
        }

        var $amount = $(".amount");
        var amount = parseInt($amount.text());

        $.ajax({
          type: "POST",
          url: "http://api.siyeol.com/cart?token="+readCookie('token'),
          dataType: "json",
          data: {'goods_id':getParam('id'), 'goods_option_id':$(".goods_option_id").val(), 'ea':amount},
          success: function (res) {
            if (res.code == 200) {
                // 장바구니 등록 성공
                location.href="./?page=order&type=direct"
            } else if (res.code == 401) {
                // 토큰 오류  
            } else {
                $(".basket_message").text("장바구니 등록에 오류가 발생하였습니다.");
                $(".basket_message")
                    .fadeIn("slow")
                    .delay(1000)
                    .fadeOut("slow");
            }
          },
          error: function (err) {
            alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
          }
        });
    });
        
    /* FAQ */
    // 문의 모달 열기
    $("button.ask").click(function() {
        if (readCookie('token') == null) {
            alert("비회원은 이용할 수 없습니다.");
            return false;
        }
        // 모달 내용 초기화
        $("#modal_ask textarea").val("");

        $("#modal_ask").get(0).open();
    });
    // 문의하기
    $("#modal_ask .submit").click(function() {
        var $modal = $("#modal_ask");

        // 빈 칸 검사
        if ($modal.find("textarea").val().length == 0) {
            alert("문의 내용을 입력해 주세요.");
        } else {
            // 문의 접달 작업을 여기에서 수행하세요.
            $.ajax({
              type: "POST",
              url: "http://api.siyeol.com/goods/qna?token="+readCookie('token'),
              dataType: "json",
              data: {'goods_id':getParam('id'), 'content':$modal.find("textarea").val()},
              success: function (res) {
                if (res.code == 200) {
                    alert("성공적으로 문의를 등록하였습니다.");
                } else if (res.code == 401) {
                    // 토큰 오류  
                } else {
                    alert("상품문의 등록에 오류가 발생하였습니다.");
                }
                location.reload();
              },
              error: function (err) {
                alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
              }
            });
            $modal.get(0).close();
        }
    });
});

