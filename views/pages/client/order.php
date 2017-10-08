<!doctype html>
<html lang="ko">
<head>
    <?= $this->loadLayout("head") ?>
    <link rel="stylesheet" href="stylesheets/order.css"/>
</head>

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
        <tr>
            <td>
                <div class="product_img">
                    <img src="images/products/product1.png" alt="상품사진"/>
                </div>
                <div class="product_info">
                    <p class="creator"><a href=".">@Creator</a></p>
                    <p class="name"><a href=".">SINGLE-BREASTED OVERSIZED BLAZER</a></p>
                    <p class="type">실버</p>
                </div>
            </td>
            <td class="product_amount">1</td>
            <td class="product_shippingfee">2,500원</td>
            <td class="product_price">26,000원</td>
        </tr>
        </tbody>
    </table>
    <div class="sum_price">
        <div class="wrapper">
            <div class="term">
                <p class="caption">상품금액</p>
                <p class="price">26,000원</p>
            </div>
            <div class="operator">+</div>
            <div class="term">
                <p class="caption">배송비</p>
                <p class="price">2,500원</p>
            </div>
            <div class="operator">=</div>
            <div class="term">
                <p class="caption">총 결제금액</p>
                <p class="price">28,500원</p>
            </div>
        </div>
    </div>

    <h3 class="category">ORDER</h3>
    <h4 class="subcategory">주문자 정보</h4>
    <p class="required_message"><span class="required">*</span>표시는 필수 입력 항목</p>
    <form class="order_form">
        <div class="row">
            <p class="required">*</p>
            <label for="name">주문자 이름</label>
            <input id="name" name="name" type="text" class="text" required/>
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
    </form>

    <h4 class="subcategory">배송지 정보</h4>
    <form class="order_form">
        <div class="row">
            <p class="required">*</p>
            <label for="name">수령인 이름</label>
            <input id="name" name="name" type="text" class="text" required/>
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
        <div class="row pnumber">
            <p>&nbsp;&nbsp;</p>
            <label for="pnumber">추가 연락처</label>
            <input id="pnumber" name="pnumber_1" type="tel" class="tel" required/>
            <span>-</span>
            <input name="pnumber_2" type="tel" class="tel" required/>
            <span>-</span>
            <input name="pnumber_3" type="tel" class="tel" required/>
        </div>
        <div class="row">
            <p class="required">*</p>
            <label for="name">배송지</label>
            <input id="order" name="order" type="text" class="text" required/>
            <input class="address_button" type="submit" value="주소 검색">
            <div class="post_section"><input class="savepost" name="savepost" type="checkbox" checked=""> <label
                        id="savemsg" for="savepost">기본 배송지로 설정</label></div>
        </div>
        <div class="row">
            <input id="order_big" name="order" type="text" class="text" required/>
        </div>
        <div class="row">
            <input id="order_big" name="order" type="text" class="text" placeholder="상세주소입력" required/>
        </div>
        <div class="row">
            <p>&nbsp;&nbsp;</p>
            <label for="name">배송 메세지</label>
            <input id="order_bbig" name="order_msg" type="text" class="text" placeholder="20자 이내로 입력" required/>
        </div>
        <div class="row">
            <p class="order_message">도서산간지역의 경우 추후 수령 시 추가 배송비가 발생할 수 있으며, 해외배송은 불가합니다.</p>
            <p class="order_warning">배송지 불분명 및 수신불가 연락처 기입으로 반송되는 왕복 택배 비용은 구매자 부담으로 정확한 주소 및 통화 가능한 연락처 필수 기입<br>
                대리주문으로 해외 주소로 발송 전, 주문품 꼭 확인해주세요. 오배송 및 불량 교환에 따른 배송비는 국내 택배 비용만 지원됩니다.</p>
        </div>
    </form>
    <h4 class="subcategory">결제 정보</h4>
    <form class="order_form">
        <div class="row">
            <input id="option_card" name="option" class="radio" value="card" type="radio">
            <label for="option_card">신용카드</label>
        </div>
        <div class="row">
            <input id="option_exchange" name="option" class="radio" value="exchange" type="radio">
            <label for="option_exchange">무통장입금</label>
        </div>
    </form><br><br><br>
    <h4 class="subcategory">추천인 정보</h4>
    <form class="order_form">
        <div class="row">
            <p class="required">*</p>
            <label for="name">추천인 아이디</label>
            <input id="name" name="name" type="text" class="text" required/>
            <div class="recommand_section">
            </div>
        </div>
    </form>
        <div class="order_button_cont">
            <button class="order_prev">뒤로가기</button>
            <button class="order_charge">결제하기</button>
        </div>
</div>

<footer>
    <?= $this->loadLayout("footer") ?>
</footer>
</body>
</html>
