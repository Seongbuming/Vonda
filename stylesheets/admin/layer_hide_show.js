$(document).ready(function() {

  $(".btn-close-content").click(function (e) {
    var container_id = $(this).closest('div').attr('id');
    var table = "#" + container_id + " table";
    var open_button = "#" + container_id + " .btn-open-content";

    $(this).hide();
    $(table).closest('div').slideToggle();
    $(open_button).show();

  });

  $(".btn-open-content").click(function (e) {
    var container_id = $(this).closest('div').attr('id');
    console.log(container_id);
    var table = "#" + container_id + " table";
    var close_button = "#" + container_id + " .btn-close-content";

    $(this).hide();
    $(table).closest('div').slideToggle();
    $(close_button).show();

  });

});
