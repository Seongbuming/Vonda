$(document).ready(function() {

  //sidebar menu hover
  $('.sidebar-menu')
  .mouseout(function() {
    // console.log("out");
    var target = $(this).children().children("img");
     var newSrc = target.attr("src").replace("peach", "gray");
     target.attr("src", newSrc);
  })
  .mouseover(function() {
    // console.log("over");
    var target = $(this).children().children("img");
     var newSrc = target.attr("src").replace("gray", "peach");
     target.attr("src", newSrc);
  });
  // .click(function (e) {
  //   e.preventDefault();
  //   var target = $(this).children().children("img");
  //   var newSrc = target.attr("src").replace("gray", "peach");
  //   target.attr("src", newSrc);
  //   console.log("click");
  // });

  $('.nav-tabs .nav-link').click(function (e) {
    e.preventDefault();
    $(this).tab('show');

    var target = $(this).parent();
    var index = target.index();

    if(index > 0){
      $(".nav-tabs .btn-container").css("display","none");
    }else{
      $(".nav-tabs .btn-container").css("display","inherit");
    }
});

});
