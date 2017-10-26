<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
    <link rel="stylesheet" href="stylesheets/seller/common.css?v=3">
    <link rel="stylesheet" href="stylesheets/seller/board.css">
    <link rel="stylesheet" href="stylesheets/client/product_detail.css"/>
    <link rel="stylesheet" href="stylesheets/board.css"/>
    <link rel="stylesheet" href="stylesheets/modal.css"/>
    <link rel="stylesheet" href="stylesheets/client/orderlist.css" />
</head>
<?php
$request = new Http();
// Get Creators
$res = $request->request('GET', '/seller/creators?token='.$_COOKIE['token']);
if ($res->code == "400") {
    header("location:/?page=login");
}
$creators = $res->datas;
// Get Requests
$res = $request->request('GET', '/seller/promote/request?token='.$_COOKIE['token']);
if ($res->code == "400") {
    header("location:/?page=login");
}
$requests = $res->datas->data;
?>
<body>
    <header>
        <?=$this->loadLayout("seller/header")?>
    </header>

    <div id="contents">

        <div class="creatorCnt">새로운크리에이터 신청</div>
        <table class="order_list productTable noneMargin pd10">
            <thead>
                <tr>
                    <th>신청날짜</th>
                    <th>크리에이터</th>
                    <th>신청상품</th>
                    <th>승인</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requests as $request) { ?>
                <tr>
                    <td class="order_date">
                        <p class="order_date_text"><?=$request->regist_date?></p>
                    </td>
                    <td class="product creatorInfo">
                        <div class="product_img">
                            <img src="http://api.siyeol.com/<?=$request->creator->profile_image?>" alt="상품사진" style="height:100%;"/>
                        </div>
                        <div class="product_info">
                            <p class="open product_detail">@<?=$request->creator->nickname?></p>
                        </div>
                    </td>
                    <td class="product">

                        <div class="product_info">
                            <p class="open product_detail"><?=$request->title?></p>

                        </div>
                    </td>
                    <td class="order_button">
                        <div class="buttonWrap">
                            <button type="button" class="approv" onclick="promoteCreator(<?=$request->id?>, 1)">승인</button>
                            <button type="button" class="hide" onclick="promoteCreator(<?=$request->id?>, 2)">다시 보기않기</button>
                        </div>
                    </td>
                </tr>
                <?php } ?>

            </tbody>
        </table>
        <div class="creatorCnt">총 크리에이터 <?=count($creators)?>명</div>
        <table class="order_list productTable noneMargin pd10">
            <thead>
                <tr>
                    <th>크리에이터</th>
                    <th>판매수</th>
                    <th>판매금액</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($creators as $creator) { ?>
                <tr>
                    <td class="product">
                        <div class="product_img">
                            <img src="http://api.siyeol.com/<?=$creator->profile_image?>" alt="크리에이터 사진" style="height:100%;"/>
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



        <div id="modal_ask" class="modal">
            <div class="close_section modal_close"></div>
            <div class="modal_body">
                <button class="close_button modal_close">
                    <img src="images/buttons/close.png" alt="닫기" />
                </button>

                <div class="product">
                    <img class="product_image" src="images/detail/상품사진1.png" />
                    <p class="product_name">Niacinamide 10% + Zinc 1%</p>
                    <p class="product_price">26,000원</p>
                </div>
                <textarea cols="113" rows="17" placeholder="문의를 남겨주세요. (최대 500자)"></textarea>
            </div>
        </div>

        <a class="toparrow" href="#"><img src="images/buttons/toparrow.png" alt="맨위로" /></a>
    </div>

    <footer>
        <?=$this->loadLayout("seller/footer")?>
    </footer>
    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="javascripts/board.js"></script>
    <script src="javascripts/modal.js"></script>
    <script src="javascripts/seller/creator.js"></script>
</body>
</html>
