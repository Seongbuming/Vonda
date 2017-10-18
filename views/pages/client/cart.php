<!doctype html>
<html>
<head>
    <?=$this->loadLayout("head")?>
    <link rel="stylesheet" href="stylesheets/client/cart.css" />
</head>
<?php
http://api.siyeol.com/cart?token
if (isset($_COOKIE['token'])) {
    $url = 'http://api.siyeol.com/cart?token='.$_COOKIE['token'];
    $request = new Http();
    $response = $request->request('GET', $url);

    $cart_items = $response->data;
} else {
    // Invalid User
    header("location:./?page=login");
}
?>
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
                <form class="cart_form" action="./?page=order" method="POST">
                <?php
                foreach ($cart_items as $cart_item) {
                    if (isset($cart_item->goods)) {
                ?>
                        <tr>
                            <td class="select">
                                <input type="hidden" class="goods_id" value="<?=$cart_item->goods_id?>">
                                <input id="select_<?=$cart_item->id?>" name="select_item[]" value="<?=$cart_item->id?>" type="checkbox" title="선택" />
                                <label for="select_<?=$cart_item->id?>"></label>
                            </td>
                            <td>
                                <div class="product_img">
                                    <img src="http://api.siyeol.com/<?=$cart_item->goods->goods_image?>" alt="상품사진" />
                                </div>
                                <div class="product_info">
                                    <p class="creator"><a href=".">@Yeomim</a></p>
                                    <p class="name"><a href="."><?=$cart_item->goods->title?></a></p>
                                    <?php
                                    if (sizeof($cart_item->goods->options) > 1) {
                                    ?>
                                    <select class="option goods_option_id">
                                        <?php
                                        foreach ($cart_item->goods->options as $option) {
                                            $selected = $cart_item->goods_option_id == $option->id ? " selected" : " ";

                                            echo '<option value="'.$option->id.'"'.$selected.' >'.$option->name.'</option>';
                                        }
                                        ?>
                                    </select>
                                    <?php
                                    } else {
                                        echo '<input type="hidden" class="goods_option_id" value="'.$cart_item->goods->options[0]->id.'">';
                                    }
                                    ?>
                                </div>
                            </td>
                            <td class="product_amount">
                                <div class="wrapper">
                                    <button type="button" class="add">+</button>
                                    <span class="amount"><?=$cart_item->ea?></span>
                                    <button type="button" class="sub">-</button>
                                </div>
                            </td>
                            <td class="product_shippingfee"><?=number_format($cart_item->goods->shippingCharge)."원"?></td>
                            <td class="product_price"><?=number_format($cart_item->goods->options[0]->price * $cart_item->ea)."원"?></td>
                        </tr>
                <?php
                    }
                }
                ?>
                </form>
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
            <button class="purchase_selected" onclick="selectOrder()">선택상품구매</button>
            <button class="purchase_all" onclick="allOrder()">전체상품구매</button>
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
