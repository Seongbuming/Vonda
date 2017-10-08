$(document).ready(function() {
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

    $("button.return").click(function() {
        $("#option_exchange").prop("checked", true);
        refreshReturnModal();
        $("#modal_return").get(0).open();
    });
    $("#modal_return input[name=option]").change(refreshReturnModal);
});
