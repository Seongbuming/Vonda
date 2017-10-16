$(document).ready(function() {
    $(".product_amount button").click(function() {
        var $amount = $(this).parent().find(".amount");
        var amount = parseInt($amount.text());
        if ($(this).is(".add") === true)
            $amount.text(amount+1);
        else if ($(this).is(".sub") === true && amount > 1)
            $amount.text(amount-1);
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
