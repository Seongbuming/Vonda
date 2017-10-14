<!doctype html>
<html lang="ko">
<head>
    <?= $this->loadLayout("head") ?>
    <link rel="stylesheet" href="stylesheets/board.css"/>
    <link rel="stylesheet" href="stylesheets/modal.css"/>
    <link rel="stylesheet" href="stylesheets/client/product_detail.css"/>
</head>
<?php

if (isset($_GET['id'])) {
    $url = 'http://api.siyeol.com/goods/'.$_GET['id'];
    $request = new Http();
    $response = $request->request('GET', $url);

    $goods = $response->data;

    $response = $request->request('GET', $url.'/reviews');
    $reviews = $response->datas;

    $response = $request->request('GET', $url.'/qnas');
    $qnas = $response->datas;
} else {
    // Error
    echo "Param error";
}
?>
<body>
    <header>
        <?= $this->loadLayout("header") ?>
    </header>

    <div id="contents">
        <div class="information">
            <div class="product_image">
                <img src="http://api.siyeol.com/<?=$goods->goods_image?>" />
            </div>
            <div class="right">
                <p class="title"><?=$goods->title?></p>
                <p class="price"><?=number_format($goods->options[0]->price)?>원</p>
                <p class="post_notice">
                    <?php
                        if ($goods->explain != NULL) {
                            echo $goods->explain;
                        }
                    ?>
                </p>
                
                <div class="order_options">
                    <?php
                    if (sizeof($goods->options) > 1) {
                    ?>
                    <div class="row">
                        <p class="option_name">옵션</p>
                        <select>
                            <?php
                            foreach ($goods->options as $option) {
                                echo "<option value='{$option->id}'>{$option->name}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="row">
                        <p class="option_name">수량</p>
                        <div class="amount_wrapper">
                            <button class="add">+</button>
                            <span class="amount">1</span>
                            <button class="sub">-</button>
                        </div>
                    </div>
                    <div class="row">
                        <p class="option_name">배송비</p>
                        <p class="shippingfee">
                            <?php
                                switch ($goods->shippingRule) {
                                    case "free":
                                    echo "무료배송";
                                    break;

                                    case "charge":
                                    echo "(배송 ".number_format($goods->shippingCharge)."원)";
                                    break;

                                    case "clause":
                                    echo number_format($goods->shippingClause)."원 이상 구매시 무료배송 (배송 ".number_format($goods->shippingCharge)."원)";
                                    break;
                                }
                            ?>
                        </p>
                    </div>
                </div>
                
                <div class="order_buttons">
                    <button class="basket">장바구니 담기</buttona>
                    <button class="buy">바로 구매하기</button>
                </div>
            </div>
        </div>

        <p class="basket_message">장바구니에 담겼습니다.</p>

        <div class="product_detail">
            <?=$goods->content?>
        </div>

        <h3 class="category">상품후기</h3>

        <table class="board review">
            <tbody>
                <?php
                foreach ($reviews->data as $review) {
                ?>
                    <tr class="row_subject">
                        <td class="time"><?=$review->created_at?></td>
                        <td class="subject"><?=$review->title?></td>
                        <td class="author"><?=$review->user->account?></td>
                    </tr>
                    <tr class="row_post">
                        <td class="result" colspan="3">
                            <?=$review->content?>
                            <br>
                            <?php
                            foreach ($review->images as $image) {
                            ?>
                            <img src="http://api.siyeol.com/<?=$image->file?>">
                            <?php
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

        <h3 class="category">FAQ</h3>

        <table class="board faq">
            <tbody>
                <?php
                foreach ($qnas->data as $qna) {
                ?>
                    <tr class="row_subject">
                        <td class="time"><?=$qna->created_at?></td>
                        <td class="subject"><?=$qna->content?></td>
                        <td class="author"><?=$qna->user->account?></td>
                    </tr>
                    <tr class="row_post">
                        <td class="type">Q.</td>
                        <td class="result" colspan="3"><?=$qna->content?></td>
                    </tr>
                    <tr class="row_post">
                        <td class="type">A.</td>
                        <td class="result" colspan="3">
                            <p><?= $qna->answer ? $qna->answer : "답변이 등록되지 않았습니다."?></p>
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
        <button class="ask">문의하기</button>

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
                <button class="submit">문의하기</button>
            </div>
        </div>

        <a class="toparrow" href="#"><img src="images/buttons/toparrow.png" alt="맨위로" /></a>
    </div>

    <footer>
        <?= $this->loadLayout("footer") ?>
    </footer>

    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="javascripts/board.js"></script>
    <script src="javascripts/modal.js"></script>
    <script src="javascripts/client/product_detail.js"></script>
</body>
</html>
