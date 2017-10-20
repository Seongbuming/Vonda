<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
    <link rel="stylesheet" href="stylesheets/seller/common.css?v=3">
    <link rel="stylesheet" href="stylesheets/modal.css" />
    <link rel="stylesheet" href="stylesheets/client/findaccount.css" />
    <link rel="stylesheet" href="stylesheets/client/signup.css" />
    <link rel="stylesheet" href="stylesheets/client/myinfo.css" />
</head>
<?php
$request = new Http();
$response = $request->request('GET', '/order?token='.$_COOKIE['token']);

if ($response->code == "400") {
    header("location:./?page=login");
}

$orders = $response->datas->data;
?>
<body>
    <header>
        <?=$this->loadLayout("creator/header")?>
    </header>

    <div id="contents">

        <ul class="link_menu">
            <li><a href="./creator.php?page=myproduct">나의상품</a></li>
            <li><a href="./creator.php?page=board">게시판 관리</a></li>
            <li><a href="./creator.php?page=profile">프로필 관리</a></li>
            <li><a href="./creator.php?page=calculate">정산내역</a></li>
        </ul>

        <div class="findacc_container">
            <p class="alert">회원님의 소중한 정보보호를 위해 비밀번호를 재확인하고 있습니다.</p>
            <input class="email" type="email" placeholder="현재 비밀번호 입력" />
            <button class="submit">확인</button>

            <p class="error message error-msg">비밀번호가 일치하지 않습니다.</p>

        </div>

        <form class="signup_form" style="display:none;">
    			<h3 class="category">비밀번호 변경</h3>
            <div class="row">
                <label for="password">새 비밀번호</label>
                <input id="password" name="password" type="password" class="password" placeholder="(8~15자리 영.숫자 조합가능)"/>
            </div>
            <div class="row">
                <label for="password_chk">새 비밀번호 확인</label>
                <input id="password_chk" name="password_chk" type="password" class="password"  />
            </div>

            <h3 class="category">내 정보 수정</h3>
              <div class="row">
                    <label for="name">이름</label>
                    <input id="name" name="name" type="text" class="text" required />
              </div>
              <div class="row pnumber">
                    <label for="pnumber">연락처</label>
                    <input id="pnumber" name="pnumber_1" type="tel" class="tel" required />
                    <span>-</span>
                    <input name="pnumber_2" type="tel" class="tel" required />
                    <span>-</span>
                    <input name="pnumber_3" type="tel" class="tel" required />
              </div>
    			    <div class="row">
                    <label for="email">이메일</label>
                    <input id="email" name="email" type="email" class="email" required />
              </div>

                <div class="button_container">
                    <a class="goback" href=".?page=login">취소</a>
                    <input class="submit" type="submit" value="확인" />
                </div>
            </form>


        <div id="modal_return" class="modal">
            <div class="close_section modal_close"></div>
            <div class="modal_body">
                <button class="close_button modal_close">
                    <img src="images/buttons/close.png" alt="닫기" />
                </button>

                <div class="option_container">
                    <input id="option_exchange" name="option" class="radio" value="exchange" type="radio" />
                    <label for="option_exchange">교환</label>
                    <input id="option_return" name="option" class="radio" value="return" type="radio" />
                    <label for="option_return">반품</label>
                </div>

                <table class="order_list">
                    <thead>
                        <tr>
                            <th class="select">
                                <input id="select_all" type="checkbox" title="모두선택" />
                                <label for="select_all"></label>
                            </th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="select">
                                <input id="select_1" type="checkbox" title="선택" />
                                <label for="select_1"></label>
                            </td>
                            <td class="product">
                                <div class="product_img">
                                    <img src="images/products/product1.png" alt="상품사진" />
                                </div>
                                <div class="product_info">
                                    <p>SINGLE-BREASTED OVERSIZED BLAZER</p>
                                    <p>옵션: <span class="option">실버</span></p>
                                    <p>수량: <span class="amount">1</span></p>
                                </div>
                            </td>
                            <td class="order_price">
                                <p>28,500원</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="select">
                                <input id="select_2" type="checkbox" title="선택" />
                                <label for="select_2"></label>
                            </td>
                            <td class="product">
                                <div class="product_img">
                                    <img src="images/products/product3.png" alt="상품사진" />
                                </div>
                                <div class="product_info">
                                    <p>SINGLE-BREASTED OVERSIZED BLAZER</p>
                                    <p>옵션: <span class="option">실버</span></p>
                                    <p>수량: <span class="amount">1</span></p>
                                </div>
                            </td>
                            <td class="order_price">
                                <p>11,500원</p>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="exchange_form form">
                    <p>상품과 함께 배송비(교환5,000원/반품2,500원) 동봉 후 착불로 보내주시면 됩니다.</p>
                    <p>&nbsp;</p>
                    <p>교환은 주문하신 동일 상품의 색상/사이즈로만 교환 가능합니다.</p>
                    <p>환불은 상품도착 후 카드사 영업일 기준 3~5일 이내로 환불됩니다.</p>
                    <textarea></textarea>
                </div>

                <div class="return_form form">
                    <p>상품과 함께 배송비(교환5,000원/반품2,500원) 동봉 후 착불로 반송해주시면 됩니다.</p>
                    <p>&nbsp;</p>
                    <p>교환은 주문하신 동일 상품의 색상/사이즈로만 교환 가능합니다.</p>
                    <p>환불은 상품도착 후 카드사 영업일 기준 3~5일 이내로 환불됩니다.</p>
                    <select class="reason">
                        <option value="" disabled selected>반품사유</option>
                        <option value="구매 의사 취소">구매 의사 취소</option>
                        <option value="다른 상품 잘못 주문">다른 상품 잘못 주문</option>
                        <option value="서비스 및 상품 불만족">서비스 및 상품 불만족</option>
                        <option value="배송 지연">배송 지연</option>
                        <option value="상품 품절">상품 품절</option>
                        <option value="상품 정보 상이">상품 정보 상이</option>
                        <option value="오배송">오배송</option>
                    </select>
                    <textarea></textarea>
                </div>

                <button class="submit">확인</button>
            </div>
        </div>

        <div id="modal_cancel" class="modal size_msg">
            <div class="close_section modal_close"></div>
            <div class="modal_body">
                <div class="modal_contents">
                    <button class="close_button modal_close">
                        <img src="images/buttons/close.png" alt="닫기" />
                    </button>

                    <p>선택한 주문건에 대해 취소 처리를 진행합니다.</p>
                    <select class="reason">
                        <option value="" disabled selected>취소사유</option>
                        <option value="서비스 및 상품 불만족">서비스 및 상품 불만족</option>
                        <option value="배송 지연">배송 지연</option>
                        <option value="상품 품절">상품 품절</option>
                    </select>

                    <button class="submit">주문취소요청</button>
                </div>
            </div>
        </div>

        <div id="modal_cancel_finish" class="modal size_msg">
            <div class="close_section modal_close"></div>
            <div class="modal_body">
                <div class="modal_contents">
                    <button class="close_button modal_close">
                        <img src="images/buttons/close.png" alt="닫기" />
                    </button>

                    <p>주문 취소 요청이 완료되었습니다.</p>

                    <button class="submit modal_close">확인</button>
                </div>
            </div>
        </div>

    </div>

    <footer>
        <?=$this->loadLayout("creator/footer")?>
    </footer>

    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="javascripts/select_all.js"></script>
    <script src="javascripts/modal.js"></script>
    <script src="javascripts/client/orderlist.js"></script>
    <script src="javascripts/client/myinfo.js"></script>
</body>
</html>
