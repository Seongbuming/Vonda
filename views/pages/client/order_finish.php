<!doctype html>
<html lang="ko">
<head>
    <?= $this->loadLayout("head") ?>
    <link rel="stylesheet" href="stylesheets/client/order_finish.css">
</head>

<body>
    <header>
        <?= $this->loadLayout("header") ?>
    </header>

    <div id="contents">
        <h2 class="page_title">주문이 완료되었습니다.</h2>
        <h3 class="category">ORDER DETAILS</h3>

        <div class="order_message">
            <p class="order_m"><span class="order_title">주문번호</span>2018211119</p>
            <p class="order_m"><span class="order_title">주문일시</span>2017.08.31</p>
            <p class="order_m"><span class="order_title">주문자</span>진아영</p>
        </div>
        <div class="order_line"></div>
        <div class="order_message">
            <p class="order_m"><span class="order_title">총 주문금액</span>28,500원</p>
            <p class="order_m"><span class="order_title">결제수단</span>결제수단</p>
            <p class="order_payment"><span class="order_title"></span>삼성카드 5112-3130-****-****</p>
        </div>
        <div class="order_line"></div>
        <div class="order_message">
            <p class="order_m"><span class="order_title">수령인</span>진*영</p>
            <p class="order_m"><span class="order_title">연락처</span>010-2344_****</p>
            <p class="order_m"><span class="order_title">배송지</span>29123</p>
            <p class="order_location"><span class="order_title"></span>인천광역시 연수구 선학동</p>
            <p class="order_location"><span class="order_title"></span>********</p>
            <p class="order_m"><span class="order_title">배송 메세지</span>-</p>
        </div>
        <div class="order_line"></div>

        <div class="order_button_cont">
            <button class="order_list">나의 주문내역</button>
            <button class="order_home">홈</button>
        </div>
    </div>

    <footer>
        <?= $this->loadLayout("footer") ?>
    </footer>
</body>
</html>
