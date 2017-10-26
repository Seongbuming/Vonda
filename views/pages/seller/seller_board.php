<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
	   <link rel="stylesheet" href="stylesheets/seller/common.css?v=3">
    <link rel="stylesheet" href="stylesheets/modal.css" />
    <link rel="stylesheet" href="stylesheets/client/orderlist.css" />
    <link rel="stylesheet" href="stylesheets/board.css">
    <link rel="stylesheet" href="stylesheets/seller/seller_board.css">
</head>
<?php
$request = new Http();
$response = $request->request('GET', '/seller/goods/qna?token='.$_COOKIE['token']);
$qnas = $response->datas->data;

$response = $request->request('GET', '/seller/goods/reviews?token='.$_COOKIE['token']);
$reviews = $response->datas->data;
?>
<body>
    <header>
        <?=$this->loadLayout("seller/header")?>
    </header>

    <div id="contents">
      <h3 class="category">Q&amp;A</h3>

      <table id="table-qna" class="board review">
          <thead>
            <th>
              작성일자/문의번호
            </th>
            <th>
              상품명/문의내용
            </th>
          </thead>
          <tbody>
              <?php
              foreach ($qnas as $qna) {
              ?>
                <tr class="row_subject">
                    <td class="time">
                          <p class="date"><?=substr($qna->created_at, 0, 16)?></p>
                          <p class="id"><a href="."><?=$qna->id?></a></p>
                    </td>
                    <td class="subject">
                      <span class="product_name"><?=$qna->goods->title?></span>
                      <?=$qna->content?>
                    </td>
                </tr>
                <tr class="row_post">
                    <td class="type">Q.</td>
                    <td class="result" colspan="3"><?=$qna->content?></td>
                </tr>
                <tr class="row_post">
                  <td class="type">
                  </td>
                  <td class="result">
                    <div class="comment">
                        <textarea cols="125" rows="5" placeholder="답변을 입력해주세요."></textarea>
                        <button class="comment_submit">답변 등록</button>
                    </div>
                  </td>
                </tr>
              <?php
              }
              ?>
          </tbody>
      </table>
      <div class="pager">
          <button class="left">◀</button>
          <button class="right">▶</button>
      </div>

      <h3 class="category">후기</h3>

      <table id="table-review"class="board faq">
        <thead>
          <th>
            주문일자/주문번호
          </th>
          <th>
            상품명/후기내용
          </th>
          <th>
            주문금액
          </th>
          <th>
            상태
          </th>
        </thead>
          <tbody>
              <?php
              foreach ($reviews as $review) {
              ?>
                <tr class="row_subject" data-review_id="<?=$review->id?>">
                  <td class="time">
                        <p class="date"><?=substr($review->created_at, 0, 16)?></p>
                        <p class="id"><a href="."><?=$review->order_no?></a></p>
                  </td>
                  <td class="subject">
                    <p class="product_name">
                       <?=$review->goods->title?>
                       <span class="review_state"><?=$review->answer ? "답변완료" : ""?></span>
                    </p>
                    <p class="review_description">
                      <?=$review->content?>
                      <?=$review->images ? '<img src="images/icons/camera.png" style="vertical-align:sub;"alt="카메라아이콘.png" />' : ''?>
                    </p>
                  </td>
                  <td class="price"><?=number_format($review->info->total_price)?>원</td>
                  <td class="state">
                    <?php
                    switch ($review->info->step) {
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
                            echo '교환요청';
                        break;
                        case "45":
                            echo '교환완료';
                        break;
                    }
                    ?>
                  </td>
                  <td class="product" style="display: none">
                    <div class="product_img">
                      <img src="http://api.siyeol.com/<?=$review->goods->goods_image?>" alt="상품사진">
                    </div>
                    <div class="product_info">
                      <p class="open product_detail"><?=$review->goods->title?></p>
                      <p>옵션: <span class="option"><?=$review->info->name?></span></p>
                      <p>수량 :<span class="amount"><?=$review->info->ea?></span></p>
                    </div>
                  </td>
                  <td class="order_price" style="display: none;">
                    <p><?=number_format($review->info->total_price)?>원</p>
                  </td>
                  <td class="review_description" style="display: none;">
                      <?=$review->content?><br>
                      <?php
                      foreach ($review->images as $image) {
                        echo '<img src="http://api.siyeol.com/'.$image->file.'">';
                      }
                      ?>
                  </td>
                </tr>
              <?php
              }
              ?>
          </tbody>
      </table>
      <div class="pager">
          <button class="left">◀</button>
          <button class="right">▶</button>
      </div>

      <div id="modal_return" class="modal ">
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

        <div id="modal_review_detail" class="modal">
            <div class="close_section modal_close"></div>
            <div class="modal_body">
                <button class="close_button modal_close">
                    <img src="images/buttons/close.png" alt="닫기" />
                </button>

                <div class="modal_header">
                  <table class="order_list productTable pd10">
                      <tbody>
                        <tr>
                          <td class="product">
                              <div class="product_img">
                                  <img src="images/products/product1.png" alt="상품사진" />
                              </div>
                              <div class="product_info">
                                  <p class="open product_detail">SINGLE-BREASTED OVERSIZED BLAZER</p>
                                  <p>옵션: <span class="option">실버</span></p>
                                  <p>수량 :<span class="amount">1</span></p>
                              </div>
                          </td>
                          <td class="order_price">
                              <p>28,500원</p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                </div>

                <div class="review_description">
                      이거, 펴바르면 약간 화한 느낌이 있어요.<br>
                      <br>저는 눈두덩이랑 다크서클에 아주 편히 문질러 바르는데,<br>
                      그렇다고 눈이 시릴 정도는 아니고요.<br>
                      Niacinamide/alpha arbutin에 비하면 보습감도 살짝 있고 전혀 밀림 없어요.<br>
                      <br>
                      일주일 넘게 사용했는데 눈에 띄는 효과를 본 건 아니지만<br>
                      요새 화장 거의 안하는데 왠지 좀 덜 쾡해 보이나 싶기도 하고...<br>
                      그냥 왠지 호감인, 믿음이 가는 제품이에요ㅋㅋㅋ<br><br>
                      가격도 저렴하니 한 병 꾸준히 비워볼랍니다 :)<br><br>
                      <img src="images/detail/후기사진.png">
                      <img src="images/detail/후기사진.png">
                      <img src="images/detail/후기사진.png">
                </div>
                <div class="comment">
                    <textarea cols="105" rows="7" placeholder="답변을 입력해주세요."></textarea>
                </div>
                <button type="button" name="button" class="submit">확인</button>
              </div>
      </div>




    </div>

    <footer>
        <?=$this->loadLayout("seller/footer")?>
    </footer>

    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="javascripts/select_all.js"></script>
    <script src="javascripts/modal.js"></script>
    <script src="javascripts/board.js"></script>
    <script src="javascripts/client/orderlist.js"></script>
</body>
</html>
