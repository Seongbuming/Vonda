$(document).ready(function() {
    function openPost(visible_) {
        var display = visible_ || "table-row";

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

    $("#table-review .row_subject").click(function (){
      var $modal = $("#modal_review_detail");
      $modal.data("review_id", $(this).data("review_id"))
      $modal.find(".product").html($(this).find(".product").html());
      $modal.find(".order_price").html($(this).find(".order_price").html());
      $modal.find(".review_description").html($(this).find(".review_description").last().html());

      $modal.addClass('actived');
    });

    $("#modal_review_detail .submit").click(function (){
      var $modal = $("#modal_review_detail");
      var review_id = $modal.data("review_id");
      var comment = $modal.find("textarea").val();

      if (comment == "") {
        alert("답변을 입력 해 주세요.");
        return false;
      }

      $.ajax({
        type: "POST",
        url: "http://api.siyeol.com/seller/goods/review/"+review_id+"?token="+readCookie('token'),
        dataType: "json",
        data: {'answer':comment},
        success: function (res) {
          if (res.code == 200) {
              alert("성공적으로 리뷰 답글을 작성하였습니다.");
              location.reload();
          } else {
              // 답글 달기 실패
              alert(res.message);
          }
        },
        error: function (err) {
          alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
        }
      });

    });

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
          $('.pager .right').css("visibility","visible");
          $('.next-page-url').val(res.datas.next_page_url);
        }else{
          $('.pager .right').css("visibility","hidden");
        }

        if(res.datas.prev_page_url){
          $('.pager .left').css("visibility","visible");
          $('.prev-page-url').val(res.datas.prev_page_url);
        }else{
          $('.pager .left').css("visibility","hidden");
        }

        $('#refresh-data').html(element_str);
      }
    },
    error: function (err) {
      alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
    }
  });
}
