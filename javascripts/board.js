$(document).ready(function() {
    function openPost(display_) {
        var display = display_ || "table-row";

        if ($(this).hasClass("row_subject")) {
            var opened = $(this).hasClass("opened");
            display = opened ? "none" : "table-row";
            $(this).toggleClass("opened", !opened);
        }

        var $next = $(this).next(".row_post");
        if ($next.length > 0) {
            $next.css("display", display);
            openPost.call($next, display);
        }
    }

    $("table.board .row_subject").click(openPost);
});
