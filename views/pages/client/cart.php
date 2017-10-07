<!doctype html>
<html>
<head>
    <?=$this->loadLayout("head")?>
    <link rel="stylesheet" href="stylesheets/client/cart.css" />
</head>

<body>
    <header>
        <?=$this->loadLayout("header")?>
    </header>

    <div id="contents">
        <h2 class="page_title">CART</h2>

        <h3 class="category">CART</h3>

        <table class="product_list">
            <thead>
                <tr>
                    <th class="select">
                        <input id="select_all" type="checkbox" title="모두선택" />
                        <label for="select_all"></label>
                    </th>
                    <th>상품명</th>
                    <th width="140px">수량</th>
                    <th width="80px">배송비</th>
                    <th width="100px">주문금액</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="select">
                        <input id="select_1" type="checkbox" title="선택" />
                        <label for="select_1"></label>
                    </td>
                    <td>
                        <div class="product_img">
                            <img src="images/products/product1.png" alt="상품사진" />
                        </div>
                        <div class="product_info">
                            <p class="creator"><a href=".">@Creator</a></p>
                            <p class="name"><a href=".">SINGLE-BREASTED OVERSIZED BLAZER</a></p>
                            <select class="option">
                                <option value="실버">실버</option>
                                <option value="골드">골드</option>
                            </select>
                        </div>
                    </td>
                    <td class="product_amount">
                        <div class="wrapper">
                            <button class="add">+</button>
                            <span class="amount">1</span>
                            <button class="sub">-</button>
                        </div>
                    </td>
                    <td class="product_shippingfee">2,500원</td>
                    <td class="product_price">26,000원</td>
                </tr>
                <tr>
                    <td class="select">
                        <input id="select_2" type="checkbox" title="선택" />
                        <label for="select_2"></label>
                    </td>
                    <td>
                        <div class="product_img">
                            <img src="images/products/product4.png" alt="상품사진" />
                        </div>
                        <div class="product_info">
                            <p class="creator"><a href=".">@Yeomim</a></p>
                            <p class="name"><a href=".">생활도감 천연 매스틱 치약 (쿨민트향) 100g</a></p>
                        </div>
                    </td>
                    <td class="product_amount">
                        <div class="wrapper">
                            <button class="add">+</button>
                            <span class="amount">1</span>
                            <button class="sub">-</button>
                        </div>
                    </td>
                    <td class="product_shippingfee">2,500원</td>
                    <td class="product_price">26,000원</td>
                </tr>
            </tbody>
        </table>

        <button class="cart_delete">선택상품삭제</button>

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

        <div class="purchase_container">
            <button class="purchase_selected">선택상품구매</button>
            <button class="purchase_all">전체상품구매</button>
        </div>
    </div>

    <footer>
        <?=$this->loadLayout("footer")?>
    </footer>

    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="javascripts/select_all.js"></script>
    <script src="javascripts/client/cart.js"></script>
</body>
</html>
