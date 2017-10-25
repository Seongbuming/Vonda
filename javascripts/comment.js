$(document).ready(function() {

  //답글창 보이기,숨기기
  $(document).on('click', '.add_answer_link',function () {
    var id_str = $(this).attr('id');
    var index = id_str.indexOf("_");
    var id = id_str.slice(index*1+1,id_str.length);

    $('#comment_'+id).toggle("slow");

  });

  //답글 취소
  $(document).on('click', '.btn-cancel',function() {
      $(this).parent().parent().toggle("slow");
    });

  //답글 작성완료
  $(document).on('click', '.btn-finish',function() {
      var content = $(this).siblings('textarea').val();
      var id = $(this).siblings('input').val();

      if(content.length){
        var formData = new FormData();
        formData.append("comment_id",id);
        formData.append("answer",content);

        $.ajax({
            type: "POST",
            url: "http://api.siyeol.com/board/comment/answer?token=" + readCookie('token'),
            data: formData,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache:false,
            success: function (res) {
                if (res.code == 200) {
                  console.log(id);
                  console.log(content);
                  // location.reload();
                } else if (res.code == 401) {
                    alert('비정상적인 요청입니다. 로그인을 다시 해주세요.');
                    location.href="./?page=login";
                } else {
                    alert('답글을 생성하는데 실패했습니다.\n다시 시도해 주세요.');
                }
            },
            error: function (err) {
                alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
            }
        });
      }else{
        alert("내용을 입력해주세요.");
      }

    });


  //pager
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
        console.log(res);

        $.each( res.data.data, function (key, value) {

          var str = value.answer !== null ? "" : "답글달기";

          element_str += '<div class="user_comment">'+
              '<table class="board">'+
                  '<tbody>'+
                  '<tr class="row_subject">'+
                      '<td class="author">'+value.user.account+'</td>'+
                      '<td class="subject" style="font-weight:normal">'+value.comment+
                        '<a id="link_'+value.id+'" class="add_answer_link">'+ str +'</a>'+
                      '</td>'+
                      '<td class="time">'+ value.created_at.substring(0,16)+'</td>'+
                  '</tr>'+
                  '</tbody>'+
              '</table>'+
          '</div>';


            if(value.answer !== null){
              var nickname = $('#board-nickname').val();
              element_str += '<div class="user_link_comment">'+
                  '<table class="board">'+
                      '<tbody>'+
                      '<tr class="row_subject">'+
                          '<td class="author">ㄴ @'+nickname+'</td>'+
                          '<td class="subject">'+value.answer+'</td>'+
                          '<td class="time">'+ value.created_at.substring(0,16)+'</td>'+
                      '</tr>'+
                      '</tbody>'+
                  '</table>'+
              '</div>';
            }else{
              element_str += '<div id="comment_'+value.id+'" class="user_add_answer" style="display:none;">'+
                '<div class="comment">'+
                    '<input type="hidden" name="name" value="'+value.id+'">'+
                    '<span class="operator_comment">ㄴ</span>'+
                    '<textarea cols="130" rows="5" placeholder="답글달기"></textarea>'+
                    '<a class="btn-finish">작성완료</a>'+
                    '<a class="btn-cancel">취소</a>'+
                '</div>'+
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
