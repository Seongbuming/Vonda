$(document).ready(function() {
    $("#select_all").change(function() {
        $(".select input[type=checkbox]")
            .prop("checked", $(this).prop("checked"));
    });
    $(".select input[type=checkbox]").change(function() {
        var $select_all = $("#select_all");
        if ($(this).prop("checked") === false && $select_all.prop("checked") === true)
            $select_all.prop("checked", false);
        else if ($(".select input[type=checkbox]").not(":checked").not($select_all).length === 0)
            $select_all.prop("checked", true);
    });
    
    $(".product_amount button").click(function() {
        var $amount = $(this).parent().find(".amount");
        var amount = parseInt($amount.text());
        if ($(this).is(".add") === true)
            $amount.text(amount+1);
        else if ($(this).is(".sub") === true && amount > 1)
            $amount.text(amount-1);
    });
});
