$(document).ready(function() {
    $(".product_amount button").click(function() {
        var $amount = $(this).parent().find(".amount");
        var amount = parseInt($amount.text());
        var goods_option_id = $(this).parent().parent().parent().find(".goods_option_id").val();
        var cart_id = $(this).parent().parent().parent().find("[name='select_item[]']").val();
        var goods_id = $(this).parent().parent().parent().find(".goods_id").val();
        if ($(this).is(".add") === true)
            $amount.text(amount+1);
        else if ($(this).is(".sub") === true && amount > 1)
            $amount.text(amount-1);

        $.ajax({
          type: "POST",
          url: "http://api.siyeol.com/cart/"+cart_id+"?token="+readCookie('token'),
          dataType: "json",
          data: {'_method':'PUT', 'goods_id':goods_id, 'ea':$amount.text(), 'goods_option_id':goods_option_id},
          success: function (res) {
            if (res.code != 200) {
            	alert("장바구니 업데이트에 실패하였습니다.");
            }
          },
          error: function (err) {
            alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
          }
        });

        return false;
    });

    $(".cart_delete").click(function() {
    	$("[name='select_item[]']:checked").each(function () {
    		$.ajax({
	          type: "POST",
	          url: "http://api.siyeol.com/cart/"+$(this).val()+"?token="+readCookie('token'),
	          dataType: "json",
	          data: {'_method':'DELETE'},
	          success: function (res) {
	            if (res.code == 200) {
	                location.reload();
	            } else {
	                // 장바구니 삭제 실패
	                alert(res.message);
	            }
	          },
	          error: function (err) {
	            alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
	          }
	        });
    	});
    });
});

function selectOrder()
{
	if ($("[name='select_item[]']:checked").length == 0) {
		alert("상품을 선택하세요.");
		return false;
	}
	$(".cart_form").submit();
}

function allOrder()
{
	if ($("[name='select_item[]']").length == 0) {
		alert("상품이 없습니다.");
		return false;
	} else {
		$("[name='select_item[]']").each(function () {
			$(this).attr("checked", true);
		});
	}

	selectOrder();
}
