$(document).ready(function() {
    /* 반품/교환 */
    function refreshReturnModal() {
        var option = $("#modal_return input[name=option]:checked").val();
        if (option == "exchange" || option == undefined) {
            $("#modal_return .exchange_form").css("display", "block");
            $("#modal_return .return_form").css("display", "none");
        } else {
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

        $modal.get(0).open();
    });
    // 반품/교환 확인
    $("#modal_return .submit").click(function() {
        var $modal = $("#modal_return");
        var option = $modal.find("input[name=option]:checked").val();
        var $form = $modal.find(`.${option}_form`);
        
        // 빈 칸 검사
        if ($form.find(".reason").val() === null) {
            alert("반품사유를 선택해 주세요.");
        } else if ($form.find("textarea").val().length === 0) {
            alert("반품 상세 사유를 입력해 주세요.");
        } else {
            // 반품/교환 작업을 여기에서 수행하세요.
            
            $modal.get(0).close();
        }
    });

    /* 주문취소 */
    // 주문취소 모달 열기
    $("button.cancel").click(function() {
        var $modal = $("#modal_cancel");

        // 모달 내용 초기화
        $modal.find("select option").eq(0).prop("selected", true);

        $modal.get(0).open();
    });
    // 주문취소 확인
    $("#modal_cancel .submit").click(function() {
        var $modal = $("#modal_cancel");
        var reason = $modal.find(".reason").val();

        // 빈 칸 검사
        if (reason == null) {
            alert("취소사유를 입력해 주세요.");
        } else {
            // 주문취소 작업을 여기에서 수행하세요.

            $modal.get(0).close();
            $("#modal_cancel_finish").get(0).open();
        }
    });
});
