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
                        if ($goods->shippingRule == "clause") {
                            echo number_format($goods->shippingClause)."원 이상 구매시 무료배송 (배송 ".number_format($goods->shippingCharge)."원)";
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
                <tr class="row_subject">
                    <td class="time">2017.09.21 13:20</td>
                    <td class="subject">나이아신마이드10% 징크1% 랙틱애시드 5% 에이치에이2%카페인솔류션5%매트릭실10%</td>
                    <td class="author">ydo******</td>
                </tr>
                <tr class="row_post">
                    <td class="type">Q.</td>
                    <td class="result" colspan="3">.............</td>
                </tr>
                <tr class="row_post">
                    <td class="type">A.</td>
                    <td class="result" colspan="3">
                        <p>.................</p>
                    </td>
                </tr>

                <tr class="row_subject">
                    <td class="time">2017.09.19 13:20</td>
                    <td class="subject">비타민A와 병행사용 가능한가요. 답변 부탁드립니다.</td>
                    <td class="author">kux*******</td>
                </tr>
                <tr class="row_post">
                    <td class="type">Q.</td>
                    <td class="result" colspan="3">.............</td>
                </tr>
                <tr class="row_post">
                    <td class="type">A.</td>
                    <td class="result" colspan="3">
                        <p>.................</p>
                    </td>
                </tr>

                <tr class="row_subject">
                    <td class="time">2017.09.19 13:20</td>
                    <td class="subject">디오디너리제품 4개구입하고입금했어요~ 가장최근제조일자로보내주세용^^</td>
                    <td class="author">hit****</td>
                </tr>
                <tr class="row_post">
                    <td class="type">Q.</td>
                    <td class="result" colspan="3">디오디너리제품 4개구입하고입금했어요~ 가장최근제조일자로보내주세용^^ 그리고 나이아신에신스-마그네슘
                        아스코빌 포스페이트10% - 로즈힙쓰는데요 아이에센스는 어디다음쓰면되나요? 그리고 이가지랑 같이써도죠?
                    </td>
                </tr>
                <tr class="row_post">
                    <td class="type">A.</td>
                    <td class="result" colspan="3">
                        <p>네 아이에센스는 마그네슘 아스코르빌 포스페이트 전에 사용하시면 됩니다. 3가지와 같이 사용해도 됩니다.</p>
                    </td>
                </tr>
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
