// 크리에이터 요청 응답 API
function promoteCreator(request_id, type) {
    $.ajax({
        type: "POST",
        url: "http://api.siyeol.com/seller/promote/" + request_id + "/" + type + "?token=" + readCookie('token'),
        // dataType: "json",
        success: function (res) {
            if (res.code == 200) {
                alert('정상적으로 처리되었습니다.');
            } else if (res.code == 401) {
                alert('비정상적인 요청입니다. 로그인을 다시 해주세요.');
            } else {
                alert('요청에 실패했습니다. 다시 시도해 주세요.');
            }
            location.reload();
        },
        error: function (err) {
            alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
        }
    });
}

