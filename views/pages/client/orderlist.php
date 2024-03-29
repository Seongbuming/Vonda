<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>

    <link rel="stylesheet" href="libraries/jquery.bxslider.min.css" />

    <link rel="stylesheet" href="stylesheets/modal.css" />
    <link rel="stylesheet" href="stylesheets/client/orderlist.css" />
    <link rel="stylesheet" href="stylesheets/seller/order_detail.css" />
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
        <?=$this->loadLayout("header")?>
    </header>

    <div id="contents">
        <h2 class="page_title">My Page</h2>

        <ul class="link_menu">
            <li class="actived"><a href=".?page=orderlist">My Page</a></li>
            <li><a href=".?page=board">Board</a></li>
            <li><a href=".?page=myinfo">My Info</a></li>
        </ul>

        <ul class="category_menu">
            <li class="actived"><a href=".?page=orderlist">주문내역</a></li>
            <li><a href=".?page=cancellist">취소/반품</a></li>
        </ul>

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

        <table class="order_list">
            <thead>
                <tr>
                    <th>주문번호/주문일자</th>
                    <th>상품명</th>
                    <th>주문금액</th>
                    <th>상태</th>
                    <th>취소/반품/교환</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($orders as $order) {
                        foreach ($order->items as $item) {
                ?>
                        <tr>
                            <?php
                            if ($item == $order->items[0]) {
                            ?>
                            <td class="date_id" rowspan="<?=sizeof($order->items)?>">
                                <p class="date"><?=$order->created_at?></p>
                                <p class="id"><a href="#" onClick="openDetail(<?=$order->order_no?>)"><?=$order->order_no?></a></p>
                            </td>
                            <?php
                            }
                            ?>
                            <td class="product">
                                <div class="product_img">
                                    <img src="http://api.siyeol.com/<?=$item->goods->goods_image?>" alt="상품사진" />
                                </div>
                                <div class="product_info" data-item_id="<?=$item->id?>">
                                    <p class="open product_detail"><?=$item->goods->title?></p>
                                    <?php
                                    if (sizeof($item->goods->options) > 1) {
                                        foreach ($item->goods->options as $option) {
                                            if ($option->id == $item->goods_option_id) {
                                                echo '<p>옵션: <span class="option">'.$option->name.'</span></p>';
                                            }
                                        }
                                    }
                                    ?>
                                    <p>수량: <span class="amount"><?=$item->ea?></span></p>
                                </div>
                            </td>
                            <td class="order_price">
                                <p><?=number_format($item->goods->options[0]->price * $item->ea)?>원</p>
                            </td>
                            <td class="order_status">
                                <p class="status_text">
                                    <?php
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
                                            echo "교환요청";
                                        break;
                                        case "45":
                                            echo "교환승인";
                                        break;
                                    }
                                    ?>
                                </p>
                                <?php
                                if ($item->step == "25" || $item->step == "30") {
                                    echo '<p class="carrier">'.$item->delivery->delivery_company.'</p>';
                                    echo '<p class="shippingnum">['.$item->delivery->delivery_number.']</p>';
                                }
                                ?>
                            </td>


                            <?php
                            if ($item == $order->items[0]) {
                            ?>
                            <td class="order_cancel" rowspan="<?=sizeof($order->items)?>" >

                                <?php
                                $random = time();
                                $temp = $random == 1 ? "1" : "30";
                                if ($item->step == "1") {
                                // if ($temp == "1") {
                                    echo '<button class="cancel">주문취소</button>';
                                } else {
                                    echo '<button class="review">구매후기</button>';
                                    echo '<button class="return">반품/교환</button>';
                                }
                                ?>
                            </td>
                            <?php
                            }
                            ?>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>

        <div class="pager">
            <button class="left">◀</button>
            <button class="right">▶</button>
        </div>

        <div id="modal_return" class="modal">
            <input type="hidden" class="order_no">
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
                    <tbody class="body">
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

        <div id="modal_review" class="modal">
            <input type="hidden" class="order_item_no">
            <div class="close_section modal_close"></div>
            <div class="modal_body">
                <button class="close_button modal_close">
                    <img src="images/buttons/close.png" alt="닫기" />
                </button>

                <div class="left_content">
                  <div class="slide_control_container">
                    <a href="#" class="slide_prev">
                      <img src="images/buttons/arrow_up.png" alt="" />
                    </a>
                  </div>

                  <ul class="bxslider">
                    <li>
                      <a href="#"><img src="images/products/product1.png" alt="" title="1" /></a>
                    </li>
                    <li>
                      <a href="#"><img src="images/products/product2.png" alt="" title="2" /></a>
                    </li>
                    <li>
                      <a href="#"><img src="images/products/product3.png" alt="" title="3" /></a>
                    </li>
                    <li>
                      <a href="#"><img src="images/products/product4.png" alt="" title="4" /></a>
                    </li>
                    <li>
                      <a href="#"><img src="images/products/product1.png" alt="" title="1" /></a>
                    </li>
                    <li>
                      <a href="#"><img src="images/products/product2.png" alt="" title="2" /></a>
                    </li>
                    <li>
                      <a href="#"><img src="images/products/product3.png" alt="" title="3" /></a>
                    </li>
                    <li>
                      <a href="#"><img src="images/products/product4.png" alt="" title="4" /></a>
                    </li>
                  </ul>
                  <div class="slide_control_container">
                    <a href="#" class="slide_next">
                      <img src="images/buttons/arrow_down.png" alt="" />
                    </a>
                  </div>
                </div>

                <div class="right_content">
                  <table class="order_list">

                      <tbody class="body">
                          <tr>
                              <td class="product">
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
                      </tbody>
                  </table>

                  <div class="review_comment">
                    <textarea name="name" rows="20" cols="75">
                      후기를 남겨주세요. (최대 50자)
                    </textarea>
                  </div>

                  <div class="upload_img_files">
                    <?php
                      for ($i=0; $i <5 ; $i++) {?>
                        <div class="filebox">
                          <label for="<?="ex_filename_".$i?>">
                            <img src="images/buttons/add_photo_review.png" alt="" />
                          </label>
                          <input type="file" name="review_image" id="<?="ex_filename_".$i?>" class="upload-hidden" accept="image/*">
                        </div>
                        <?php
                      }
                    ?>
                  </div>

                  <button class="submit">후기남기기</button>
                </div>

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
                    <input type="hidden" class="order_no"/>

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

        <div id="modal_reivew_finish" class="modal size_msg">
            <div class="close_section modal_close"></div>
            <div class="modal_body">
                <div class="modal_contents">
                    <button class="close_button modal_close">
                        <img src="images/buttons/close.png" alt="닫기" />
                    </button>

                    <p>정상적으로 등록되었습니다.</p>
                    <p>소중한 후기 감사합니다!</p>

                    <button class="submit modal_close">확인</button>
                </div>
            </div>
        </div>


        <div id="modal_order_detail" class="modal">
          <div class="close_section modal_close"></div>
          <div class="modal_body">
              <button class="close_button modal_close">
                  <img src="images/buttons/close.png" alt="닫기" />
              </button>

              <h3 class="category">ORDER DETAIL</h3>
                <table id="order-detail-table"style="width:100%" class="order-detail-table productTable table order_list noneMargin">
                  <tr class="order-detail-item">
                    <th class="order-detail-item-label">주문번호</th>
                    <td class="order-detail-item-content order_no">2018211119</td>
                  </tr>
                  <tr class="order-detail-item">
                    <th class="order-detail-item-label">주문일시</th>
                    <td class="order-detail-item-content order_date">2017.08.31</td>
                  </tr>
                  <tr class="order-detail-item"
                  style="border-bottom: solid 1px #d8d8d8;">
                    <th class="order-detail-item-label">주문자</th>
                    <td class="order-detail-item-content order_name">진아영</td>
                  </tr>

                  <!-- 주문상태 임시 제거
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
                            <span class="shipping-status">배송중</span>
                          </p>
                        </li>
                      </ul>
                    </td>
                  </tr>
                    -->
                  <tr class="order-detail-item">
                    <th class="order-detail-item-label">총 주문금액</th>
                    <td class="order-detail-item-content origin_price">26,000원</td>
                  </tr>
                  <tr class="order-detail-item">
                    <th class="order-detail-item-label">배송비</th>
                    <td class="order-detail-item-content shipping_price">2500원</td>
                  </tr>
                  <!--
                  <tr class="order-detail-item">
                    <th class="order-detail-item-label">총 할인금액</th>
                    <td class="order-detail-item-content">-1,000원(쿠폰할인)</td>
                  </tr>
                    -->
                  <tr class="order-detail-item">
                    <th class="order-detail-item-label">총 결제금액</th>
                    <td class="order-detail-item-content total_price">27,500원</td>
                  </tr>
                  <!--
                  <tr class="order-detail-item"
                  style="border-bottom: solid 1px #d8d8d8;">
                    <th class="order-detail-item-label">결제수단</th>
                    <td class="order-detail-item-content">삼성카드 5112-3130-****-****</td>
                  </tr>
                    -->

                  <tr class="order-detail-item">
                    <th class="order-detail-item-label">수령인</th>
                    <td class="order-detail-item-content receive_name">진*영</td>
                  </tr>
                  <tr class="order-detail-item">
                    <th class="order-detail-item-label">연락처</th>
                    <td class="order-detail-item-content receive_phone">010-2344-****</td>
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
                    <td class="order-detail-item-content delivery_message">-</td>
                  </tr>
              </table>

          </div>
        </div>

    </div>



    <footer>
        <?=$this->loadLayout("footer")?>
    </footer>

    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="libraries/jquery.bxslider.min.js"></script>
    <script src="javascripts/select_all.js"></script>
    <script src="javascripts/modal.js"></script>
    <script src="javascripts/client/orderlist.js"></script>
</body>
</html>
