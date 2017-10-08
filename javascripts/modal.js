$(".modal").each(function() {
    var modal = this;

    this.open = function() {
        $(this).addClass("actived");
    };
    this.close = function() {
        $(this).removeClass("actived");
    };

    $(this).find(".modal_close").click(function() {
        modal.close();
    });
});
