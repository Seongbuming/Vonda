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
<?php
$request = new Http();
// Get Products
$res = $request->request('GET', '/seller/goods?token='.$_COOKIE['token']);
if ($res->code == "400") {
    header("location:/?page=login");
}
$products = $res->datas->data;
?>
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
                <?php foreach ($products as $product) { ?>
                <tr>
                    <td class="seller_num">
                        <p class="num"><?=$product->seller_id?></p>
                    </td>
                    <td class="product">
                        <div class="product_img">
                            <img src="http://api.siyeol.com/<?=$product->goods_image?>" alt="상품사진" />
                        </div>
                        <div class="product_info">
                            <p class="open product_detail"><?=$product->title?></p>
                            <!-- <span>옵션: <span class="option">실버</span></span> -->
                            <!-- <p>재고 : 211 - 실버(11), 골드(200) <span class="amount">1</span></p> -->
                            <p>
                                옵션:
                                <span class="option"><?=join(', ', array_map(function ($option) { return $option->name; }, $product->options))?></span>
                            </p>
                            <?php if (count($product->options)) { ?>
                            <p>
                                재고:
                                <?=number_format(array_sum(array_map(function ($option) { return $option->stock_ea; }, $product->options)))?>
                                -
                                <?=join(', ', array_map(function ($option) { return $option->name."(".number_format($option->stock_ea).")"; }, $product->options))?>
                            </p>
                            <?php } ?>
                        </div>
                    </td>
                    <td class="order_creator">
                        <p><?=$product->creator_count?></p>
                    </td>
                    <td class="order_price">
                        <p><?=number_format(count($product->options) ? $product->options[0]->price : 0)?>원</p>
                    </td>
                    <td class="order_cnt">
                        <p class="status_text"><?=number_format($product->order_count)?></p>
                    </td>
                    <td class="order_totalPrice">
                        <p><?=number_format((count($product->options) ? $product->options[0]->price : 0) * $product->order_count)?>원</p>
                    </td>
                </tr>
                <?php } ?>
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
