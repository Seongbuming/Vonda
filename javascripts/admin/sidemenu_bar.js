$(document).ready(function() {

  var page_url = $(location).attr("href");
  var menu_list = ['stati', 'member', 'notice','product','sales','calculate','mainpage'];

  for(var index = 0; index< menu_list.length ;index++){
    if(page_url.indexOf(menu_list[index]) > -1){
      //change icon image
      var target = $( '.menu-' + menu_list[index] ).children().children("img");
      var newSrc = target.attr("src").replace("gray","peach");
      target.attr("src",newSrc);

      //change menu text color
      $('.menu-' + menu_list[index] ).children().children("span").css("color","#e69a83");
      break;
    }
  }

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
