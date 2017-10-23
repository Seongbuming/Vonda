
var renderRow = function (row) {
    var renderItem = function (item) {
        return '<tr>' +
            '<td class="date_id">' +
                '<p class="date">'+row.created_at+'</p>' +
                '<p class="id"><a href="#">'+row.order_no+'</a></p>' +
            '</td>' +
            '<td class="product">' +
                '<div class="product_img">' +
                    '<img src="'+item.goods_image+'" alt="상품사진" />' +
                '</div>' +
                '<div class="product_info">' +
                    '<p class="open product_detail">'+item.title+'</p>' +
                    '<p>옵션: <span class="option">'+item.goods_option_id+'</span></p>' +
                    '<p>수량: <span class="amount">'+item.ea+'</span></p>' +
                '</div>' +
            '</td>' +
            '<td class="order_price">' +
                '<p>'+((item.ea * item.price) + item.shipping_charge)+'원</p>' +
            '</td>' +
            '<td class="order_sell_status">' +
                '<select class="select-status" name="select-status" value="'+item.step+'">' +
                    '<option value="1">주문완료</option>' +
                    '<option value="10">상품준비중</option>' +
                    '<option value="20">배송준비중</option>' +
                    '<option value="30">배송중</option>' +
                    '<option value="40">배송완료</option>' +
                '</select>' +
            '</td>' +
        '</tr>';
    };
    var $items = [];

    for (var i = 0; i < row.items.length; i++) {
        var $item = $(renderItem(row.items[i]));
        if (i > 0) {
            $item.find('td.date_id').remove();
        }
        $items.push($item);
    }
    // add rowspan
    if ($items.length >= 2) {
        $items[0].find('td.date_id').attr('rowspan', $items.length);
    }

    return $items;
}

function loadOrders(page=1) {
    removeOrderItems();
    $.ajax({
        type: "GET",
        url: "http://api.siyeol.com/seller/orders?page="+page+"&token=" + readCookie('token'),
        success: function (res) {
            if (res.code == 200) {
                // alert('정상적으로 처리되었습니다.');
                $('#sales-list > tbody').append(res.datas.map(renderRow).reduce(function(a, b) { return a.concat(b); }, []));
            } else if (res.code == 401) {
                alert('비정상적인 요청입니다. 로그인을 다시 해주세요.');
                location.href="./?page=login";
            } else {
                alert('주문 목록을 불러오는데 실패했습니다.\n다시 시도해 주세요.');
            }
            // location.reload();
        },
        error: function (err) {
            alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
        }
    });
}
function removeOrderItems() {
    $('#sales-list > tbody').html('');
}

$(function() {
    loadOrders();
});