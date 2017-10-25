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

    $('.pager .left').on('click',function () {
      var url = $('.pager .prev-page-url').val();

      if(url.length)
        getBoardItems(url);

    });

    $('.pager .right').on('click',function () {
      var url = $('.pager .next-page-url').val();

      if(url.length)
        getBoardItems(url);

    });
});
function getBoardItems(url) {
  $.ajax({
    type: "GET",
    url: url+"&token="+readCookie('token'),
    dataType: "json",
    data: {},
    success: function (res) {
      if (res.code == 200) {
        var element_str = '';

        $.each( res.datas.data, function (key, value) {
          element_str += '<tr class="row_subject">'+
            '<td class="time">'+ value.created_at.substring(0, 16)+'</td>'+
            '<td class="subject">'+
              '<a href="./creator.php?page=board_detail&id='+value.id+'">'+
              value.subject+'('+value.hit+')'+
              '</a>';
            if(value.is_top == "y")
              element_str += '<div class="fixed-pin"></div>';
            element_str += '</td>'+'</tr>';
        });

        if(res.datas.next_page_url){
          $('.pager .right').css("display","inline-block");
          $('.next-page-url').val(res.datas.next_page_url);
        }else{
          $('.pager .right').css("display","none");
        }

        if(res.datas.prev_page_url){
          $('.pager .left').css("display","inline-block");
          $('.prev-page-url').val(res.datas.prev_page_url);
        }else{
          $('.pager .left').css("display","none");
        }

        $('#refresh-data').html(element_str);
      }
    },
    error: function (err) {
      alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
    }
  });
}
