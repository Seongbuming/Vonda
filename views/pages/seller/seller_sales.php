<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
	   <link rel="stylesheet" href="stylesheets/seller/common.css?v=3"/>
    <link rel="stylesheet" href="stylesheets/modal.css" />
    <link rel="stylesheet" href="stylesheets/client/orderlist.css" />
    <link rel="stylesheet" href="stylesheets/seller/order_detail.css"/>
    <link rel="stylesheet" href="stylesheets/seller/sales.css"/>
</head>
<?php
$request = new Http();
$response = $request->request('GET', '/seller/orders?token='.$_COOKIE['token']);

$orders = $response->datas;
?>
<body>
    <header>
        <?=$this->loadLayout("seller/header")?>
    </header>

    <div id="contents">
		<div class="creatorCnt">총 주문 <?=number_format(sizeof($orders))?>건</div>
        <div class="period_select">
            <input id="today" name="period" type="radio" value="today" />
            <label for="today">오늘</label>
            <input id="a_week" name="period" type="radio" value="a_week" />
            <label for="a_week">1주일</label>
            <input id="a_month" name="period" type="radio" value="a_month" />
            <label for="a_month">1개월</label>
            <input id="three_month" name="period" type="radio" value="three_month" checked />
            <label for="three_month">3개월</label>
            <input id="six_month" name="period" type="radio" value="six_month" />
            <label for="six_month">6개월</label>
            <div class="input_period">
                <input class="start" type="date" />
                <span>~</span>
                <input class="end" type="date" />
                <button class="search">조회</button>
            </div>
        </div>

        <table class="productTable order_list pd10 noneMargin" id="sales-list">
            <thead>
                <tr>
                    <th>주문번호/주문일자</th>
                    <th>상품명</th>
                    <th>결제금액</th>
                    <th>상태</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($orders as $order) {
                    foreach ($order->items as $item) {
                        echo "<tr>";
                        if ($item == $order->items[0]) {
                        ?>
                        <td class="date_id" rowspan="<?=sizeof($order->items)?>">
                            <p class="date"><?=substr($order->created_at, 0, 10)?></p>
                            <p class="id"><a href="#"><?=$order->order_no?></a></p>
                        </td>
                        <?php
                        }
                        ?>
                        <td class="product">
                            <div class="product_img">
                                <img src="http://api.siyeol.com/<?=$item->goods_image?>" alt="상품사진" />
                            </div>
                            <div class="product_info">
                                <p class="open product_detail"><?=$item->title?></p>
                                <p>옵션: <span class="option"><?=$item->name?></span></p>
                                <p>수량: <span class="amount"><?=$item->ea?></span></p>
                            </div>
                        </td>
                        <td class="order_price">
                            <p><?=number_format($item->price * $item->ea + $item->shipping_charge)?>원</p>
                        </td>
                        <td class="order_sell_status" >
                            <?php
                            if ($order->step == "2") {
                                if ($order->return) {
                                    if ($order->return->status == '1') {
                                        echo '<button type="button" name="button" class="btn-complete-return">반품완료</button>';
                                    } else {
                                        echo '<button type="button" name="button" class="btn-complete-return">반품요청</button>';
                                    }
                                } else if ($order->cancel) {
                                    echo "주문취소";
                                }
                            } else if(intval($item->step) < 40){

                                ?>
                                <select class="" name="" style="background-color:#e69a83;">

                                  <option <?= $item->step == '20' ? "selected" : ""?>>주문완료</option>
                                  <option <?= $item->step == '10' ? "selected" : ""?>>배송준비중</option>
                                  <option <?= $item->step == '25' ? "selected" : ""?>>배송중</option>
                                  <option <?= $item->step == '30' ? "selected" : ""?>>배송완료</option>
                                </select>
                                <?php
                              }else{

                                switch ($item->step) {
                                    case '1':
                                        echo "결제완료";
                                    break;
                                    case '10':
                                        echo "상품준비중";
                                    break;
                                    case '20':
                                        echo "배송준비중";
                                    break;
                                    case "25":
                                        echo "배송중";
                                    break;
                                    case "30":
                                        echo "배송완료";
                                    break;
                                    case "40":
                                        echo '<button type="button" name="button" class="btn-request-exchange">교환요청</button>';
                                    break;
                                    case "45":
                                        echo '<button type="button" name="button" class="btn-complete-exchange">교환완료</button>';
                                    break;
                                }
                            }
                            ?>
                        </td>
                        </tr>
                        <?php
                    }
                }
                ?>
                <tr>
                    <td class="date_id" rowspan="2">
                        <p class="date">2017.09.10</p>
                        <p class="id"><a href="#">2018211119</a></p>
                    </td>
                    <td class="product">
                        <div class="product_img">
                            <img src="images/products/product1.png" alt="상품사진" />
                        </div>
                        <div class="product_info">
                            <p class="open product_detail">SINGLE-BREASTED OVERSIZED BLAZER</p>
                            <p>옵션: <span class="option">실버</span></p>
                            <p>수량: <span class="amount">1</span></p>
                        </div>
                    </td>
                    <td class="order_price">
                        <p>28,500원</p>
                    </td>
                    <td class="order_sell_status" >
                      <button type="button" name="button" class="btn-request-exchange">교환요청</button>
                    </td>
                </tr>
                <tr>
                    <td class="product">
                        <div class="product_img">
                            <img src="images/products/product3.png" alt="상품사진" />
                        </div>
                        <div class="product_info">
                            <p class="open product_detail">SINGLE-BREASTED OVERSIZED BLAZER</p>
                            <p>옵션: <span class="option">실버</span></p>
                            <p>수량: <span class="amount">1</span></p>
                        </div>
                    </td>
                    <td class="order_price">
                        <p>11,500원</p>
                    </td>
                    <td class="order_sell_status">
                      <button type="button" name="button" class="btn-complete-exchange">교환완료</button>
                    </td>

                </tr>
                <tr>
                    <td class="date_id">
                        <p class="date">2017.09.09</p>
                        <p class="id"><a href="#">2018211119</a></p>
                    </td>
                    <td class="product">
                        <div class="product_img">
                            <img src="images/products/product2.png" alt="상품사진" />
                        </div>
                        <div class="product_info">
                            <p class="open product_detail">로얄 크루</p>
                            <p>옵션: <span class="option">마르살라</span></p>
                            <p>수량: <span class="amount">1</span></p>
                        </div>
                    </td>
                    <td class="order_price">
                        <p>128,500원</p>
                    </td>
                    <td class="order_sell_status">
                      <button type="button" name="button" class="btn-request-return">반품요청</button>
                    </td>

                </tr>
                <tr>
                    <td class="date_id">
                        <p class="date">2017.09.07</p>
                        <p class="id"><a href="#">2018211119</a></p>
                    </td>
                    <td class="product">
                        <div class="product_img">
                            <img src="images/products/product4.png" alt="상품사진" />
                        </div>
                        <div class="product_info">
                            <p class="open product_detail">A-Z 메신저백</p>
                            <p>수량: <span class="amount">1</span></p>
                        </div>
                    </td>
                    <td class="order_price">
                        <p>128,500원</p>
                    </td>
                    <td class="order_sell_status">
                        <button type="button" name="button" class="btn-complete-return">반품완료</button>
                    </td>

                </tr>

            </tbody>
        </table>

        <div class="pager">
            <button class="left">◀</button>
            <button class="right">▶</button>
        </div>

        <div id="modal_return_exchange" class="modal">
            <div class="close_section modal_close"></div>
            <div class="modal_body">
              <h4>교환</h4>
                <button class="close_button modal_close">
                    <img src="images/buttons/close.png" alt="닫기" />
                </button>
                <div class="orderlist-container">

                  <table class="order_list">
                      <tbody>
                          <?php
                            for ($i=0; $i < 2; $i++) {
                              ?>
                              <tr>
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
                              <?php
                            }
                          ?>
                      </tbody>
                  </table>

                </div>
                <div class="contents">

                </div>

                <button class="submit modal_close">확인</button>
            </div>
        </div>

        <div id="modal_cancel" class="modal size_msg">
            <div class="close_section modal_close"></div>
            <div class="modal_body">
                <button class="close_button modal_close">
                    <img src="images/buttons/close.png" alt="닫기" />
                </button>

                <div class="modal_contents">
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
                <button class="close_button modal_close">
                    <img src="images/buttons/close.png" alt="닫기" />
                </button>

                <div class="modal_contents">
                    <p>주문 취소 요청이 완료되었습니다.</p>
                    <button class="submit modal_close">확인</button>
                </div>
            </div>
        </div>

        <div id="modal_review" class="modal">
            <div class="close_section modal_close"></div>
            <div class="modal_body">
                <button class="close_button modal_close">
                    <img src="images/buttons/close.png" alt="닫기" />
                </button>

                <ul class="list_section">
                    <li class="selected">
                        <img src="images/products/product1.png" alt="상품사진" />
                    </li>
                </ul>
                <div class="review_section">
                </div>
            </div>
        </div>

        <div id="modal_order_detail" class="modal">
            <div class="close_section modal_close"></div>
            <div class="modal_body">
                <button class="close_button modal_close">
                    <img src="images/buttons/close.png" alt="닫기" />
                </button>

                <div class="creatorCnt">ORDER DETAIL</div>
                <table id="order-detail-table"style="width:100%" class="order-detail-table productTable table order_list noneMargin">
                  <tr class="order-detail-item">
                    <th class="order-detail-item-label">주문번호</th>
                    <td class="order-detail-item-content">2018211119</td>
                  </tr>
                  <tr class="order-detail-item">
                    <th class="order-detail-item-label">주문일시</th>
                    <td class="order-detail-item-content">2017.08.31</td>
                  </tr>
                  <tr class="order-detail-item">
                    <th class="order-detail-item-label">주문자</th>
                    <td class="order-detail-item-content">진아영</td>
                  </tr>
                  <tr class="order-detail-item">
                    <th class="order-detail-item-label">아이디</th>
                    <td class="order-detail-item-content">hayefuk</td>
                  </tr>
                  <tr class="order-detail-item"
                  style="border-bottom: solid 1px #d8d8d8;">
                    <th class="order-detail-item-label">주문상태</th>
                    <td class="order-detail-item-content">결제완료</td>
                  </tr>

                  <tr class="order-detail-item"   style="border-bottom: solid 1px #d8d8d8;">
                    <th class="order-detail-item-label">주문상품/<br>상태</th>
                    <td class="order-detail-item-content">
                      <ul class="order-product-list">
                        <li class="order-product-item">
                          <p>
                            <span class="title">SINGLE BREASTED OVERSIZED BLAZER</span>
                            <span class="option">옵션 : 실버</span>
                            <span class="count">수량 : 1</span>
                          </p>
                          <p>
                            <span class="shipping-status">배송중</span>
                            <a href="#" class="shipping-company">CJ대한통운 [23891283018390]</a>
                          </p>
                        </li>
                        <li class="order-product-item">
                          <p>
                            <span class="title">SINGLE BREASTED OVERSIZED BLAZER</span>
                            <span class="option">옵션 : 실버</span>
                            <span class="count">수량 : 1</span>
                          </p>
                          <p>
                            <span class="shipping-status">배송중</span>                          </p>
                        </li>
                      </ul>
                    </td>
                  </tr>
                  <tr class="order-detail-item">
                    <th class="order-detail-item-label">총 주문금액</th>
                    <td class="order-detail-item-content">26,000원</td>
                  </tr>
                  <tr class="order-detail-item">
                    <th class="order-detail-item-label">배송비</th>
                    <td class="order-detail-item-content">2500원</td>
                  </tr>
                  <tr class="order-detail-item">
                    <th class="order-detail-item-label">총 할인금액</th>
                    <td class="order-detail-item-content">-1,000원(쿠폰할인)</td>
                  </tr>
                  <tr class="order-detail-item">
                    <th class="order-detail-item-label">총 결제금액</th>
                    <td class="order-detail-item-content">27,500원</td>
                  </tr>
                  <tr class="order-detail-item"
                  style="border-bottom: solid 1px #d8d8d8;">
                    <th class="order-detail-item-label">결제수단</th>
                    <td class="order-detail-item-content">삼성카드 5112-3130-****-****</td>
                  </tr>

                  <tr class="order-detail-item">
                    <th class="order-detail-item-label">수령인</th>
                    <td class="order-detail-item-content">진*영</td>
                  </tr>
                  <tr class="order-detail-item">
                    <th class="order-detail-item-label">연락처</th>
                    <td class="order-detail-item-content">010-2344-****</td>
                  </tr>
                  <tr class="order-detail-item">
                    <th class="order-detail-item-label">배송지</th>
                    <td class="order-detail-item-content">
                      <p class="postcode">
                        29123
                      </p>
                      <p class="address">
                        인천광역시 연수구 신학동
                      </p>
                    </td>
                  </tr>
                  <tr class="order-detail-item"
                  style="border-bottom: solid 1px #d8d8d8;">
                    <th class="order-detail-item-label">배송메세지</th>
                    <td class="order-detail-item-content">-</td>
                  </tr>
              </table>

        </div>

      </div>


    </div>

    <footer>
        <?=$this->loadLayout("seller/footer")?>
    </footer>

    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="javascripts/select_all.js"></script>
    <script src="javascripts/modal.js"></script>
    <script src="javascripts/client/orderlist.js"></script>
    <script src="javascripts/seller/sales.js"></script>
</body>
</html>
