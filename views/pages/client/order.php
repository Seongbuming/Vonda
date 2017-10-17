<?php
header("Content-Type:text/html; charset=utf-8;"); 

error_reporting(E_ALL);

ini_set("display_errors", 1);

require($_SERVER['DOCUMENT_ROOT']."/libraries/NICEPAY/lib/NicepayLite.php");
/*
*******************************************************
* <결제요청 파라미터>
* 결제시 Form 에 보내는 결제요청 파라미터입니다.
* 샘플페이지에서는 기본(필수) 파라미터만 예시되어 있으며, 
* 추가 가능한 옵션 파라미터는 연동메뉴얼을 참고하세요.
*******************************************************
*/  
$nicepay = new NicepayLite;
$request = new Http();

$params = array( "items"=>array( array("goods_option_id"=>5, "ea"=>12), array("goods_option_id"=>4, "ea"=>4), array("goods_option_id"=>6, "ea"=>1) ) );

$response = $request->request('POST', 'http://api.siyeol.com/order?token='.$_COOKIE['token'], ['json' => $params]);

print_r($response);

$order = $response->datas;

$nicepay->m_MerchantKey = "EYzu8jGGMfqaDEp76gSckuvnaHHu+bC4opsSN6lHv3b2lurNYkVXrZ7Z1AoqQnXI3eLuaUFyoRNC6FkrzVjceg=="; // 상점키
$nicepay->m_MID         = "nicepay00m";                         // 상점아이디
$nicepay->m_Moid        = $order->order_no;                    // 상품주문번호
$nicepay->m_Price       = $order->total_price;                  // 결제상품금액
$nicepay->m_BuyerEmail  = "happy@day.co.kr";                    // 구매자메일주소
$nicepay->m_BuyerName   = "나이스";                               // 구매자명 
$nicepay->m_BuyerTel    = "01000000000";                        // 구매자연락처           
$nicepay->m_GoodsName   = $order->items[0]->info->goods_name;   // 결제상품명                     

if (sizeof($order->items) > 1) {
    $nicepay->m_GoodsName = $nicepay->m_GoodsName." 외 ".(sizeof($order->items)-1);
}

$goodsCnt               = sizeof($order->items);                                  // 결제상품개수
$nicepay->m_EdiDate     = date("YmdHis");                       // 거래 날짜
$nicepay->requestProcess();

/*
*******************************************************
* <해쉬암호화> (수정하지 마세요)
* SHA-256 해쉬암호화는 거래 위변조를 막기위한 방법입니다. 
*******************************************************
*/ 
$ediDate = date("YmdHis");
$hashString = bin2hex(hash('sha256', $nicepay->m_EdiDate.$nicepay->m_MID.$nicepay->m_Price.$nicepay->m_MerchantKey, true));

?>
<!doctype html>
<html lang="ko">
<head>
    <?= $this->loadLayout("head") ?>
    <link rel="stylesheet" href="stylesheets/client/order.css"/>
</head>
<script src="libraries/jquery-3.2.1.min.js"></script>
<script src="https://web.nicepay.co.kr/flex/js/nicepay_tr_utf.js" type="text/javascript"></script>
<script type="text/javascript">
//결제창 최초 요청시 실행됩니다.
function pay(){
    var $form = $("#form");

    if ($form[0].checkValidity() == false) {
        $(".check_button").click();
    } else {
        nicepayStart();
    }
    return false;
}

function nicepayStart(){
    goPay(document.payForm);
}

//결제 최종 요청시 실행됩니다. <<'nicepaySubmit()' 이름 수정 불가능>>
function nicepaySubmit(){
    document.payForm.submit();
}

//결제창 종료 함수 <<'nicepayClose()' 이름 수정 불가능>>
function nicepayClose(){
    alert("결제가 취소 되었습니다");
}
</script>
<body>
    <header>
        <?= $this->loadLayout("header") ?>
    </header>

    <div id="contents">
        <h2 class="page_title">ORDER</h2>
        <h3 class="category"></h3>
        <table class="product_list">
            <thead>
                <tr>
                    <th>상품명</th>
                    <th width="80px">수량</th>
                    <th width="80px">배송비</th>
                    <th width="100px">주문금액</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($order->items as $item) {
                ?>
                    <tr>
                        <td>
                            <div class="product_img">
                                <img src="http://api.siyeol.com/<?=$item->info->image?>" alt="상품사진"/>
                            </div>
                            <div class="product_info">
                                <!-- <p class="creator"><a href=".">@Creator</a></p> -->
                                <p class="name"><a href="."><?=$item->info->goods_name?></a></p>
                                <?php
                                if ($item->info->option) {
                                    echo '<p class="type">'.$item->info->option.'</p>';
                                }
                                ?>
                            </div>
                        </td>
                        <td class="product_amount"><?=$item->ea?></td>
                        <td class="product_shippingfee"><?=number_format($item->shipping_charge)?>원</td>
                        <td class="product_price"><?=number_format($item->price * $item->ea)?>원</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="sum_price">
            <div class="wrapper">
                <div class="term">
                    <p class="caption">상품금액</p>
                    <p class="price"><?=number_format($order->origin_price)?>원</p>
                </div>
                <div class="operator">+</div>
                <div class="term">
                    <p class="caption">배송비</p>
                    <p class="price"><?=number_format($order->shipping_price)?>원</p>
                </div>
                <div class="operator">=</div>
                <div class="term">
                    <p class="caption">총 결제금액</p>
                    <p class="price"><?=number_format($order->total_price)?>원</p>
                </div>
            </div>
        </div>

        <h3 class="category">ORDER</h3>
        <h4 class="subcategory">주문자 정보</h4>
        <p class="required_message"><span class="required">*</span>표시는 필수 입력 항목</p>
        <form id="form" class="order_form" name="payForm" method="POST" action=".?page=order_finish">
            <div class="row">
                <p class="required">*</p>
                <label for="name">주문자 이름</label>
                <input id="name" name="BuyerName" type="text" class="text" required/>
            </div>
            <div class="row pnumber">
                <p class="required">*</p>
                <label for="pnumber">연락처</label>
                <input id="pnumber" name="pnumber_1" type="tel" class="tel" required/>
                <span>-</span>
                <input name="pnumber_2" type="tel" class="tel" required/>
                <span>-</span>
                <input name="pnumber_3" type="tel" class="tel" required/>
            </div>
            <div class="row">
                <p class="required">*</p>
                <label for="email">이메일</label>
                <input id="email" name="email" type="email" class="email" required/>
                <p class="email_message">이메일로 주문 진행상황을 안내해드립니다.</p>
            </div>
            <input type="hidden" name="PayMethod" value="CARD">
            <!-- 결제 상품명 -->
            <input type="hidden" name="GoodsName" value="<?php echo($nicepay->m_GoodsName);?>"></td>
            <!-- 결제 상품개수 -->
            <input type="hidden" name="GoodsCnt" value="<?=$goodsCnt?>"></td>
            <!-- 결제 상품금액 -->
            <input type="hidden" name="Amt" value="<?php echo($nicepay->m_Price);?>"></td>
            <!-- 구매자 연락처 -->
            <input type="hidden" name="BuyerTel" value="<?php echo($nicepay->m_BuyerTel);?>"></td>
            <!-- 상품 주문번호 -->
            <input type="hidden" name="Moid" value="<?php echo($nicepay->m_Moid);?>"></td>
            <!-- 상점 아이디 -->
            <input type="hidden" name="MID" value="<?php echo($nicepay->m_MID);?>"></td>
            <!-- IP -->
            <input type="hidden" name="UserIP" value="<?php echo($nicepay->m_UserIp);?>"/>
            <!-- 회원사고객IP -->
            <!-- 변경 불가능 -->
            <input type="hidden" name="EdiDate" value="<?php echo($nicepay->m_EdiDate); ?>"/>
            <!-- 전문 생성일시 -->
            <input type="hidden" name="EncryptData" value="<?=$hashString?>"/>
            <!-- 해쉬값 -->
            <input type="hidden" name="TrKey" value=""/>
            <!-- 필드만 필요 -->

        <h4 class="subcategory">배송지 정보</h4>
            <div class="row">
                <p class="required">*</p>
                <label for="name">수령인 이름</label>
                <input id="name" name="receive_name" type="text" class="text" required/>
            </div>
            <div class="row pnumber">
                <p class="required">*</p>
                <label for="pnumber">연락처</label>
                <input id="pnumber" name="rnumber_1" type="tel" class="tel" required/>
                <span>-</span>
                <input name="rnumber_2" type="tel" class="tel" required/>
                <span>-</span>
                <input name="rnumber_3" type="tel" class="tel" required/>
            </div>
            <div class="row pnumber">
                <p>&nbsp;&nbsp;</p>
                <label for="pnumber">추가 연락처</label>
                <input id="pnumber" name="anumber_1" type="tel" class="tel"/>
                <span>-</span>
                <input name="anumber_2" type="tel" class="tel"/>
                <span>-</span>
                <input name="anumber_3" type="tel" class="tel"/>
            </div>
            <div class="row">
                <p class="required">*</p>
                <label for="name">배송지</label>
                <input id="order" name="zipcode" type="text" class="text" required/>
                <input class="address_button" type="submit" value="주소 검색">
                <div class="post_section"><input class="savepost" name="savepost" type="checkbox" checked=""> <label
                            id="savemsg" for="savepost">기본 배송지로 설정</label></div>
            </div>
            <div class="row">
                <input id="order_big" name="address" type="text" class="text" required/>
            </div>
            <div class="row">
                <input id="order_big" name="address_detail" type="text" class="text" placeholder="상세주소입력" required/>
            </div>
            <div class="row">
                <p>&nbsp;&nbsp;</p>
                <label for="name">배송 메세지</label>
                <input id="order_bbig" name="delivery_memo" type="text" class="text" placeholder="20자 이내로 입력"/>
            </div>
            <div class="row">
                <p class="order_message">도서산간지역의 경우 추후 수령 시 추가 배송비가 발생할 수 있으며, 해외배송은 불가합니다.</p>
                <p class="order_warning">배송지 불분명 및 수신불가 연락처 기입으로 반송되는 왕복 택배 비용은 구매자 부담으로 정확한 주소 및 통화 가능한 연락처 필수 기입<br>
                    대리주문으로 해외 주소로 발송 전, 주문품 꼭 확인해주세요. 오배송 및 불량 교환에 따른 배송비는 국내 택배 비용만 지원됩니다.</p>
            </div>
        <!--
        <h4 class="subcategory">결제 정보</h4>
        <form class="order_form">
            <div class="row">
                <input id="option_card" name="PayMethod" class="radio" value="card" type="radio">
                <label for="option_card">신용카드</label>
            </div>
            <div class="row">
                <input id="option_exchange" name="PayMethod" class="radio" value="exchange" type="radio">
                <label for="option_exchange">무통장입금</label>
            </div>
        </form><br><br><br>
        -->
        <h4 class="subcategory">추천인 정보</h4>
            <div class="row">
                <!--<p class="required">*</p>-->
                <label for="name">추천인 아이디</label>
                <input id="name" name="recommender" type="text" class="text"/>
                <div class="recommand_section">
                </div>
            </div>
        <input class="check_button" type="submit" value="" style="display: none">
        </form>
        <div class="order_button_cont">
            <button class="order_prev">뒤로가기</button>
            <button class="order_charge" onClick="pay();">결제하기</button>
        </div>
    </div>

    <footer>
        <?= $this->loadLayout("footer") ?>
    </footer>
</body>
</html>
