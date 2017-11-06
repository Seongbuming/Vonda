$(document).ready(function() {
    function showDetail(origin, $item, top) {
        // creator_detail이 삽입될 위치 탐색
        var $next = $item.next(".item");
        if ($next.length > 0) {
            var nextTop = $next.position().top;
            if ($next.length > 0 && nextTop <= top) {
                showDetail(origin, $next, nextTop);
                return;
            }
        }

        // creator_detail 생성
        var $template = $("#contents .creator_section .creator_detail_template");
        var $detail = $("#contents .creator_section .creator_detail");
        var dest = $detail.data("dest");
        $(dest).removeClass("actived"); // dest item 비활성화 처리
        if ($detail.length > 0 && dest === origin) { // 이미 생성되어 있는 경우
            $detail.slideUp("fast", function() { $detail.remove(); });
        } else {
            $detail.remove();
            $detail = $("<div/>")
                .addClass("creator_detail")
                .html($template.html())
                .data("dest", origin)
                .insertAfter($item);
            $(origin).addClass("actived"); // origin item 활성화 처리

            // creator_detail 열기
            if (dest === undefined) {
                $detail.slideDown("fast");
            } else {
                $detail.slideDown("fast");
            }
        }
    }
    
    $("#contents .creator_section .item").click(function() {
        $(".creator_detail_template").html($(this).find(".info").html());
        showDetail(this, $(this), $(this).position().top);
    });

    $(".comment_submit").click(function() {
        if (readCookie('token') == null) {
            alert('로그인이 필요합니다.');
        } else {
            $.ajax({
              type: "POST",
              url: "http://api.siyeol.com/board/"+getParam('id')+"/comment?token="+readCookie('token'),
              dataType: "json",
              data: {'comment': $(".comment textarea").val()},
              success: function (res) {
                if (res.code == 200) {
                    location.reload();
                } else if (res.code == 401) {
                    // 토큰 오류  
                } else {
                    alert("댓글 등록에 오류가 발생하였습니다.");
                }
                location.reload();
              },
              error: function (err) {
                alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
              }
            });
        }

        return false;
    });
});
