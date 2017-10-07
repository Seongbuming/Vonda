<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
    <link rel="stylesheet" href="stylesheets/client/orderlist.css" />
</head>

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
            <li><a href=".?page=cancellist">취소/반품/교환</a></li>
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
                <tr>
                    <td class="date_id" rowspan="2">
                        <p class="date">2017.09.10</p>
                        <p class="id"><a href=".">2018211119</a></p>
                    </td>
                    <td class="product">
                        <div class="product_img">
                            <img src="images/products/product1.png" alt="상품사진" />
                        </div>
                        <div class="product_info">
                            <p><a href=".">SINGLE-BREASTED OVERSIZED BLAZER</a></p>
                            <p>옵션: <span class="option">실버</span></p>
                            <p>수량: <span class="amount">1</span></p>
                        </div>
                    </td>
                    <td class="order_price">
                        <p>28,500원</p>
                    </td>
                    <td class="order_status">
                        <p class="status_text">상품준비중</p>
                    </td>
                    <td class="order_cancel">
                        <button class="cancel">주문취소</button>
                    </td>
                </tr>
                <tr>
                    <td class="product">
                        <div class="product_img">
                            <img src="images/products/product3.png" alt="상품사진" />
                        </div>
                        <div class="product_info">
                            <p><a href=".">SINGLE-BREASTED OVERSIZED BLAZER</a></p>
                            <p>옵션: <span class="option">실버</span></p>
                            <p>수량: <span class="amount">1</span></p>
                        </div>
                    </td>
                    <td class="order_price">
                        <p>11,500원</p>
                    </td>
                    <td class="order_status">
                        <p class="status_text">상품준비중</p>
                    </td>
                    <td class="order_cancel">
                        <button class="cancel">주문취소</button>
                    </td>
                </tr>
                <tr>
                    <td class="date_id">
                        <p class="date">2017.09.09</p>
                        <p class="id"><a href=".">2018211119</a></p>
                    </td>
                    <td class="product">
                        <div class="product_img">
                            <img src="images/products/product2.png" alt="상품사진" />
                        </div>
                        <div class="product_info">
                            <p><a href=".">로얄 크루</a></p>
                            <p>옵션: <span class="option">마르살라</span></p>
                            <p>수량: <span class="amount">1</span></p>
                        </div>
                    </td>
                    <td class="order_price">
                        <p>128,500원</p>
                    </td>
                    <td class="order_status">
                        <p class="status_text">배송중</p>
                        <p class="carrier">CJ대한통운</p>
                        <p class="shippingnum">[239389893984]</p>
                    </td>
                    <td class="order_cancel">
                        <p>-</p>
                    </td>
                </tr>
                <tr>
                    <td class="date_id">
                        <p class="date">2017.09.07</p>
                        <p class="id"><a href=".">2018211119</a></p>
                    </td>
                    <td class="product">
                        <div class="product_img">
                            <img src="images/products/product4.png" alt="상품사진" />
                        </div>
                        <div class="product_info">
                            <p><a href=".">A-Z 메신저백</a></p>
                            <p>수량: <span class="amount">1</span></p>
                        </div>
                    </td>
                    <td class="order_price">
                        <p>128,500원</p>
                    </td>
                    <td class="order_status">
                        <p class="status_text">배송완료</p>
                    </td>
                    <td class="order_cancel">
                        <button class="review">구매후기</button>
                        <button class="return">주문취소</button>
                    </td>
                </tr>
                <tr class="disabled">
                    <td class="date_id">
                        <p class="date">2016.03.11</p>
                        <p class="id"><a href=".">2018211119</a></p>
                    </td>
                    <td class="product">
                        <div class="product_img">
                            <img src="images/products/product4.png" alt="상품사진" />
                        </div>
                        <div class="product_info">
                            <p><a href=".">A-Z 메신저백</a></p>
                            <p>수량: <span class="amount">1</span></p>
                        </div>
                    </td>
                    <td class="order_price">
                        <p>128,500원</p>
                    </td>
                    <td class="order_status">
                        <p class="status_text">배송완료</p>
                    </td>
                    <td class="order_cancel">
                        <button class="review">구매후기</button>
                    </td>
                </tr>
                <tr class="disabled">
                    <td class="date_id">
                        <p class="date">2017.09.09</p>
                        <p class="id"><a href=".">2018211119</a></p>
                    </td>
                    <td class="product">
                        <div class="product_img">
                            <img src="images/products/product2.png" alt="상품사진" />
                        </div>
                        <div class="product_info">
                            <p><a href=".">로알 크루</a></p>
                            <p>옵션: <span class="option">마르샬라</span></p>
                            <p>수량: <span class="amount">1</span></p>
                        </div>
                    </td>
                    <td class="order_price">
                        <p>128,500원</p>
                    </td>
                    <td class="order_status">
                        <p class="status_text">배송완료</p>
                    </td>
                    <td class="order_cancel">
                        <button class="review">구매후기</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="pager">
            <button class="left">◀</button>
            <button class="right">▶</button>
        </div>
    </div>

    <footer>
        <?=$this->loadLayout("footer")?>
    </footer>
    
    <script src="libraries/jquery-3.2.1.min.js"></script>
</body>
</html>
