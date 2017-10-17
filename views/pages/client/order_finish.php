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
    print_r($_POST);
    // Array ( [name] => [pnumber_1] => [pnumber_2] => [pnumber_3] => [email] => [PayMethod] => CARD [GoodsName] => 테스트 상품 외 1 [GoodsCnt] => 2 [Amt] => 96000 [BuyerName] => 나이스 [BuyerTel] => 01000000000 [Moid] => 201710170315193 [MID] => nicepay00m [UserIP] => 127.0.0.1 [EdiDate] => 20171017121518 [EncryptData] => 5e4c17c44442e162f8b2b9f3215c3e3f18cffdb7b32b24bdfbb3f065ed11489c [TrKey] => TRKYnicepay00m1710171216464946 [VerifySType] => S [EncGoodsName] => [EncBuyerName] => [JsVer] => nicepay_tr_utf [DeployedVer] => 1.1.1 [DeployedDate] => 170309 [DeployedFileName] => nicepay_tr_utf [AuthResultCode] => 0000 [AuthResultMsg] => 인증 성공 [BuyerEmail] => qortlduf505@gmail.com [TID] => nicepay00m01011179171216469712 [EncodeKey] => nicepay00m01011179171216469712 )

    if ($_POST["AuthResultCode"] != "0000") {
        // error
    }

    $request = new Http();
    $response = $request->request('POST', 'http://api.siyeol.com/order/payment?token='.$_COOKIE['token'], ['json' => ['order_no' => $_POST['Moid'], 'tid' => $_POST['TID']]]);

    echo "<br>";
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
