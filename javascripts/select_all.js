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
});
