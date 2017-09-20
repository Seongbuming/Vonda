function showDetail(origin, $item, top) {
    // creator_detail이 삽입될 위치 탐색
    const $next = $item.next(".item");
    if ($next.length > 0) {
        const nextTop = $next.position().top;
        if ($next.length > 0 && nextTop <= top) {
            showDetail(origin, $next, nextTop);
            return;
        }
    }

    // creator_detail 생성
    const $template = $("#contents .creator .creator_detail_template");
    let $detail = $("#contents .creator .creator_detail");
    const dest = $detail.data("dest");
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
            $detail.show();
        }
    }
}

$(document).ready(function() {
    $("#contents .creator .item").click(function() {
        showDetail(this, $(this), $(this).position().top);
    });

    // 배너 슬라이더 로드
    $("#contents .bxslider").bxSlider({
        wrapperClass: "banner bx-wrapper",
        auto: true,
        pause: 5000,
        pager: false,
    });
});