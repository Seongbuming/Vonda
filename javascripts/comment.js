$(document).ready(function() {

  $(document).on('click', '.add_answer_link',function () {
    var id_str = $(this).attr('id');
    var index = id_str.indexOf("_");
    var id = id_str.slice(index*1+1,id_str.length);

    $('#comment_'+id).toggle("slow");

  });

  $(document).on('click', '.btn-cancel',function() {
      $(this).parent().parent().toggle("slow");
    });


    $('.pager .left').on('click',function () {
      var url = $('.pager .prev-page-url').val();

      if(url.length)
        getCommentItems(url);

    });

    $('.pager .right').on('click',function () {
      var url = $('.pager .next-page-url').val();

      if(url.length)
        getCommentItems(url);

    });
});
function getCommentItems(url) {
  $.ajax({
    type: "GET",
    url: url,
    dataType: "json",
    data: {},
    success: function (res) {
      if (res.code == 200) {
        var element_str = '';

        $.each( res.data.data, function (key, value) {


          element_str += '<div class="user_comment">'+
              '<table class="board">'+
                  '<tbody>'+
                  '<tr class="row_subject">'+
                      '<td class="author">'+value.user.account+'</td>'+
                      '<td class="subject">'+value.comment+'</td>'+
                      '<td class="time">'+ value.created_at.substring(0,16)+'</td>'+
                  '</tr>'+
                  '</tbody>'+
              '</table>'+
          '</div>';

            if(value.answer !== null){
              element_str += '<div class="user_link_omment">'+
                  '<table class="board">'+
                      '<tbody>'+
                      '<tr class="row_subject">'+
                          '<td class="author">ㄴ @'+"board->nickname"+'</td>'+
                          '<td class="subject">'+value.anwer+'</td>'+
                          '<td class="time">'+ value.created_at.substring(0,16)+'</td>'+
                      '</tr>'+
                      '</tbody>'+
                  '</table>'+
              '</div>';
            }
        });

        if(res.data.next_page_url){
          $('.pager .right').css("visibility","visible");
          $('.next-page-url').val(res.data.next_page_url);
        }else{
          $('.pager .right').css("visibility","hidden");
        }

        if(res.data.prev_page_url){
          $('.pager .left').css("visibility","visible");
          $('.prev-page-url').val(res.data.prev_page_url);
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
