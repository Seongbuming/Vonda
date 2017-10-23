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
    require($_SERVER['DOCUMENT_ROOT']."/libraries/NICEPAY/lib/NicepayLite.php");

    $nicepay                  = new NicepayLite;
    $MerchantKey              = "EYzu8jGGMfqaDEp76gSckuvnaHHu+bC4opsSN6lHv3b2lurNYkVXrZ7Z1AoqQnXI3eLuaUFyoRNC6FkrzVjceg=="; // 상점키
    $nicepay->m_NicepayHome   = $_SERVER['DOCUMENT_ROOT']."/libraries/NICEPAY/log";               // 로그 디렉토리 설정
    $nicepay->m_ActionType    = "PYO";                  // ActionType
    $nicepay->m_charSet       = "UTF8";                 // 인코딩
    $nicepay->m_ssl           = "true";                 // 보안접속 여부
    $nicepay->m_Price         = $_POST['Amt'];                   // 금액
    $nicepay->m_NetCancelAmt  = $_POST['Amt'];                   // 취소 금액
    $nicepay->m_NetCancelPW   = "123456";               // 결제 취소 패스워드 설정   

    /*
    *******************************************************
    * <결제 결과 필드>
    *******************************************************
    */
    $nicepay->m_BuyerName     = $_POST['BuyerName'];             // 구매자명
    $nicepay->m_BuyerEmail    = $_POST['BuyerEmail'];            // 구매자이메일
    $nicepay->m_BuyerTel      = $_POST['BuyerTel'];              // 구매자연락처
    //$nicepay->m_EncryptedData = $EncryptedData'];         // 해쉬값
    $nicepay->m_GoodsName     = $_POST['GoodsName'];             // 상품명
    $nicepay->m_GoodsCnt      = $_POST['m_GoodsCnt'];            // 상품개수
    $nicepay->m_GoodsCl       = $_POST['GoodsCl'];               // 실물 or 컨텐츠
    $nicepay->m_Moid          = $_POST['Moid'];                  // 주문번호
    $nicepay->m_MallUserID    = $_POST['MallUserID'];            // 회원사ID
    $nicepay->m_MID           = $_POST['MID'];                   // MID
    $nicepay->m_MallIP        = $_POST['MallIP'];                // Mall IP
    $nicepay->m_MerchantKey   = $_POST['MerchantKey'];           // 상점키
    $nicepay->m_LicenseKey    = $_POST['MerchantKey'];           // 상점키
    $nicepay->m_TransType     = $_POST['TransType'];             // 일반 or 에스크로
    $nicepay->m_TrKey         = $_POST['TrKey'];                 // 거래키
    $nicepay->m_PayMethod     = $_POST['PayMethod'];             // 결제수단
    $nicepay->startAction();
        
    /*
    *******************************************************
    * <결제 성공 여부 확인>
    *******************************************************
    */  
    $resultCode = $nicepay->m_ResultData["ResultCode"];

    $paySuccess = false;
    if($PayMethod == "CARD"){
        if($resultCode == "3001") $paySuccess = true;   // 신용카드(정상 결과코드:3001)
    }else if($PayMethod == "BANK"){
        if($resultCode == "4000") $paySuccess = true;   // 계좌이체(정상 결과코드:4000)
    }else if($PayMethod == "CELLPHONE"){
        if($resultCode == "A000") $paySuccess = true;   // 휴대폰(정상 결과코드:A000)
    }else if($PayMethod == "VBANK"){
        if($resultCode == "4100") $paySuccess = true;   // 가상계좌(정상 결과코드:4100)
    }else if($payMethod == "SSG_BANK"){
        if($resultCode == "0000") $paySuccess = true;   // SSG은행계좌(정상 결과코드:0000)
    }

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
