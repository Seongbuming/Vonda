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
    <?php
    if ($_POST["AuthResultCode"] != "0000") {
        // error
        echo "<script>error();</script>";
        exit;
    }

    $request = new Http();
    // Payment
    $response = $request->request('POST', 'http://api.siyeol.com/order/payment?token='.$_COOKIE['token'], ['json' => ['order_no' => $_POST['Moid'], 'tid' => $_POST['TID']]]);

    // Info
    $response = $request->request('POST', 'http://api.siyeol.com/order/info?token='.$_COOKIE['token'], ['json' => $_POST]);

    $order = $response->data;

    // order_no, TID, 
    ?>
    <div id="contents">
        <h2 class="page_title">주문이 완료되었습니다.</h2>
        <h3 class="category">ORDER DETAILS</h3>

        <div class="order_message">
            <p class="order_m"><span class="order_title">주문번호</span><?=$_POST['Moid']?></p>
            <p class="order_m"><span class="order_title">주문일시</span><?=date("Y.m.d")?></p>
            <p class="order_m"><span class="order_title">주문자</span><?=$_POST['BuyerName']?></p>
        </div>
        <div class="order_line"></div>
        <div class="order_message">
            <p class="order_m"><span class="order_title">총 주문금액</span><?=number_format($_POST['Amt'])?>원</p>
            <!--
            <p class="order_m"><span class="order_title">결제수단</span>결제수단</p>
            <p class="order_payment"><span class="order_title"></span>삼성카드 5112-3130-****-****</p>
        -->
        </div>
        <div class="order_line"></div>
        <div class="order_message">
            <p class="order_m"><span class="order_title">수령인</span><?=$order->delivery->receive_name?></p>
            <p class="order_m"><span class="order_title">연락처</span><?=$order->delivery->receive_phone?></p>
            <p class="order_m"><span class="order_title">배송지</span><?=$order->delivery->zipcode?></p>
            <p class="order_location"><span class="order_title"></span><?=$order->delivery->address?></p>
            <p class="order_location"><span class="order_title"></span><?=$order->delivery->address_detail?></p>
            <p class="order_m"><span class="order_title"><?=$order->delivery->delivery_message?></span>-</p>
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
    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script>
        $(".order_list").click(function() {
            location.href = "./?page=orderlist";
        });

        $(".order_home").click(function() {
            location.href = "/";
        });

        function error() {
            alert("상품 결제에 실패하였습니다.");
            location.href = "./?page=cart";
        }
    </script>
</body>
</html>
