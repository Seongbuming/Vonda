$(document).ready(function() {

  $(".sns-item input[type=checkbox]").change(function() {

    var src = $(this).siblings("img").attr("src");
    console.log(src);
    if ($(this).prop("checked")) {
      $(this).siblings(".item-url").attr("disabled",false);
      $(this).siblings(".input-label").css("color","black");
      $(this).siblings("img").attr("src", src.replace("30.png",".png"));
    }else{
      console.log("not checked");
      $(this).siblings(".item-url").attr("disabled",true);
      $(this).siblings(".input-label").css("color","#979797");
      $(this).siblings("img").attr("src", src.replace(".png","30.png"));
    }
  });

});
