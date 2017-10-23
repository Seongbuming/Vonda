$(document).ready(function() {

  // 레이어 바깥 클릭할 때 레이어 사라지게
  $(document).mouseup(function (e) {
    var container = $("#layer-popup");
    if(container.has(e.target).length === 0)
      container.hide();
  });

  $(".creator-id a").click(function (e) {
    var lay_pop = $('#layer-popup');
    var pos = $(this).position();    // 버튼의 위치에 레이어를 띄우고자 할 경우, 위치 정보 가져옴
    var width = $(this).width() - 5;
    var height = $(this).height() + 5;

    // todo: 해당 아이템의 회원정보 url 넣기.
    // $("#layer-popup .member-info").attr("href", "회원정보 url 넣기");

    //proflie modal에 info 넣기
    // $("#creator-profile-modal")

    lay_pop.css('top', (pos.top + height) + 'px');    // 레이어 위치 지정
    lay_pop.css('left', (pos.left + width) + 'px');
    lay_pop.fadeIn();
    lay_pop.focus();

  });

});
