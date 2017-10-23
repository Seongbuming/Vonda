<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
	<link rel="stylesheet" href="stylesheets/seller/common.css?v=2">
	<link rel="stylesheet" href="stylesheets/seller/board.css">
	<link rel="stylesheet" href="stylesheets/client/product_detail.css"/>
	<link rel="stylesheet" href="stylesheets/board.css"/>
	<link rel="stylesheet" href="stylesheets/modal.css"/>
	<link rel="stylesheet" href="stylesheets/client/orderlist.css" />
  <link rel="stylesheet" href="stylesheets/seller/home.css">
  <link rel="stylesheet" href="stylesheets/admin/chart.css" />
  <link rel="stylesheet" href="stylesheets/admin/table_product.css">
</head>
<?php
$request = new Http();
// Get Products
$res = $request->request('GET', '/seller/goods?token='.$_COOKIE['token']);
if ($res->code == "400") {
    header("location:/?page=login");
}
$products = $res->datas->data;
// Get Creators
$res = $request->request('GET', '/seller/creators?token='.$_COOKIE['token']);
if ($res->code == "400") {
    header("location:/?page=login");
}
$creators = $res->datas;
// Get Notices
$res = $request->request('GET', '/notice/seller?token='.$_COOKIE['token']);
if ($res->code == "400") {
    header("location:/?page=login");
}
$notices = $res->datas->data;
?>
<body>
    <header>
        <?=$this->loadLayout("seller/header")?>
    </header>

    <div id="contents">
      <div class="btn-custom-group marginTop50" role="group" >
        <button type="button" class="btn btn-sm btn-default">일간</button>
        <button type="button" class="btn btn-sm btn-default">주간</button>
        <button type="button" class="btn btn-sm btn-default">월간</button>
      </div>
      <div class="chart-container" style="width:900px;">
        <canvas id="sales-chart" width="100%"></canvas>
      </div>

      <ul class="chart-label ">
        <li style="color:#52CC5D"><i style="color:#52CC5D;"class="glyphicon glyphicon-stop"></i><span class="chart-item-label">총 매출</span><span class="chart-item-value">9,069,000원</span></li>
        <li style="color:black"><i class="glyphicon glyphicon-stop"></i><span class="chart-item-label">총 주문건수</span><span class="chart-item-value">222건</span></li>
        <li style="color:black"><i class="glyphicon glyphicon-stop"></i><span class="chart-item-label">현재 등록된 상품</span><span class="chart-item-value">9개</span></li>
        <li style="color:black"><i class="glyphicon glyphicon-stop"></i><span class="chart-item-label">현재 크리에이터</span><span class="chart-item-value">11명</span></li>
      </ul>
		<div class="creatorCnt">나의 상품<a href="./seller.php?page=seller_myproduct_list" class="allView">전체보기</a></div>
		<table id="product-table"class="order_list productTable noneMargin pd10">
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
        <div class="creatorCnt">크리에이터<a href="./seller.php?page=seller_creator" class="allView">전체보기</a></div>
        <table id="creator-table"class="order_list productTable noneMargin pd10">
            <thead>
                <tr>
                    <th colspan="2">크리에이터</th>
                    <th>판매수</th>
                    <th>판매금액</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($creators as $creator) { ?>
                <tr>
                    <td class="seller_num">
                        <p class="num"><?=$creator->id?></p>
                    </td>
                    <td class="product">
                        <div class="product_img">
                            <img src="<?=$creator->profile_image?>" alt="크리에이터 사진" style="height:100%;"/>
                        </div>
                        <div class="product_info">
                            <p class="open product_detail">@<?=$creator->nickname?></p>
                        </div>
                    </td>
                    <td class="order_cnt">
                        <p class="status_text"><?=number_format($creator->total_count)?></p>
                    </td>
                    <td class="order_totalPrice">
                        <p><?=number_format($creator->total_price)?>원</p>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="creatorCnt">공지사항<a href="./seller.php?page=seller_notice" class="allView">전체보기</a></div>

            <table id="notice-table" class="board productTable noneMargin pd10">
                <tbody>
                    <?php foreach ($notices as $notice) { ?>
                    <tr class="row_subject">
                        <td class="time"><?=$notice->created_at?></td>
                        <td class="subject">
                            <a href=".?page=notice_detail"><?=$notice->subject?>(<?=$notice->hit?>)</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js"></script>
    <script src="javascripts/admin/stati_chart.js"></script>
</body>
</html>
