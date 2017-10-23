$(document).ready(function() {
  $('.product-detail-link').on("click",function () {
    var target = $(this).children("img").attr("src");
    console.log(target);

    $("#product-detail-modal .modal-body").html('<img style="width:100%" src="'+ target +'" alt="" />');
  });
});
