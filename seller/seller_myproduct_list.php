<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
	<link rel="stylesheet" href="stylesheets/seller/common.css?v=4">
	<link rel="stylesheet" href="stylesheets/seller/board.css">
	<link rel="stylesheet" href="stylesheets/client/product_detail.css"/>
	<link rel="stylesheet" href="stylesheets/board.css"/>
	<link rel="stylesheet" href="stylesheets/modal.css"/>
	<link rel="stylesheet" href="stylesheets/client/orderlist.css" />
</head>

<body>
    <header>
        <?=$this->loadLayout("seller/header")?>
    </header>

    <div id="contents">
		<table class="order_list productTable pd10">
            <thead>
                <tr>
                    <th colspan="2">상품명</th>
					<th>크리에이터</th>
                    <th>상품가격</th>
					<th>판매수</th>
					<th>판매금액</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="seller_num">
                         <p class="num">1</p>
                    </td>
                    <td class="product">
                        <div class="product_img">
                            <img src="images/products/product1.png" alt="상품사진" />
                        </div>
                        <div class="product_info">
                            <p class="open product_detail">SINGLE-BREASTED OVERSIZED BLAZER</p>
                            <p>옵션: <span class="option">실버</span></p>
                            <p>재고 : 211 - 실버(11), 골드(200) <span class="amount">1</span></p>
                        </div>
                    </td>
					<td class="order_creator">
                        <p>4</p>
                    </td>
                    <td class="order_price">
                        <p>28,500원</p>
                    </td>
                    <td class="order_cnt">
                        <p class="status_text">96</p>
                    </td>
                    <td class="order_totalPrice">
                        <p>1,028,500원</p>
                    </td>
                </tr>
				<tr>
                     <td class="seller_num">
                         <p class="num">2</p>
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
					<td class="order_creator">
                        <p>5</p>
                    </td>
                   <td class="order_price">
                        <p>23,500원</p>
                    </td>
                    <td class="order_cnt">
                        <p class="status_text">46</p>
                    </td>
                    <td class="order_totalPrice">
                        <p>328,500원</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <footer>
        <?=$this->loadLayout("seller/footer")?>
    </footer>
	<script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="javascripts/board.js"></script>
    <script src="javascripts/modal.js"></script>
    <script src="javascripts/client/product_detail.js"></script>
</body>
</html>
