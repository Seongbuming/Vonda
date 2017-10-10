$(document).ready(function() {
    // 수량 조절
    $(".product_amount button").click(function() {
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

        // 애니메이션
        $(".basket_message")
            .fadeIn("slow")
            .delay(1000)
            .fadeOut("slow");
    });
        
    /* FAQ */
    // 문의 모달 열기
    $("button.ask").click(function() {
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

            $modal.get(0).close();
        }
    });
});
