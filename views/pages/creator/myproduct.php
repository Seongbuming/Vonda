<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
    <link rel="stylesheet" href="stylesheets/seller/common.css?v=3">
    <link rel="stylesheet" href="stylesheets/creator/myproduct.css">
    <link rel="stylesheet" href="stylesheets/board.css">
    <link rel="stylesheet" href="stylesheets/modal.css">
</head>
<?php
$request = new Http();

$response = $request->request('GET', '/creator/goods?token='.$_COOKIE['token']);
$promotions = $response->datas;

$response = $request->request('GET', '/creator/1/goods');
$products = $response->datas;
?>

<body>
<header>
    <?=$this->loadLayout("creator/header")?>
</header>

<div id="contents">
    <ul class="link_menu">
        <li class="actived"><a href="./creator.php?page=myproduct">나의상품</a></li>
        <li><a href="./creator.php?page=board">게시판 관리</a></li>
        <li><a href="./creator.php?page=profile">프로필 관리</a></li>
        <li><a href="./creator.php?page=calculate">정산내역</a></li>
    </ul>
    <button type="button" name="button" class="btn-promotion-apply">신청하기</button>
    <h3 class="category">홍보 신청</h3>
    <table id="table-promotion-apply"class="order_list">
        <thead>
        <tr>
            <th>신청날짜</th>
            <th>신청상품</th>
            <th>판매자</th>
            <th>상태</th>
        </tr>
        </thead>
        <tbody>
          <?php
          foreach ($promotions as $item) {?>

            <tr>
              <td class="apply-date">
                  <?=substr($item->created_at,0,16)?>
              </td>

              <td class="product">
                  <div class="product_img">
                      <img src="<?="http://api.siyeol.com/".$item->goods->goods_image?>" alt="상품사진" />
                  </div>
                  <div class="product_info">
                      <p class="open product_detail"><?=$item->goods->title?></p>
                  </div>
              </td>
              <td class="seller">
                  <p><?=$item->goods->seller?></p>
              </td>
              <td class="state">
                  <p class="state-text"><?=$item->status?></p>
                  <p >
                    <button type="button" name="btn-cancel-apply" class="btn-cancel-apply">신청취소</button>
                  </p>
              </td>
            </tr>

            <?php
          }
           ?>

        </tbody>
    </table>

    <h3 class="category"><?="총 상품 ".sizeof($products)."개"?></h3>
    <table class="order_list">
        <thead>
        <tr>
            <th></th>
            <th>상품명</th>
            <th>판매자</th>
            <th>상품가격</th>
            <th>판매수</th>
            <th>판매금액</th>
        </tr>
        </thead>
        <tbody>
          <?php
          // 보일 게시물의 수
          foreach ($products as $product) {
          ?>
        <tr>
        <td class="" rowspan="">
            <?=$product->goods_id?>
        </td>

        <td class="product">
            <div class="product_img">
                <img src="<?="http://api.siyeol.com/".$product->goods->goods_image?>" alt="상품사진" />
            </div>
            <div class="product_info">
                <p class="open product_detail"><?=$product->goods->title?></p>
                <p><?php
                if (sizeof($product->goods->options) > 1) {
                ?>
                <p>
                  옵션 : <span class="option">
                    <?php
                    foreach ($product->goods->options as $option) {
                      if ($option != $product->goods->options[0]) {
                        echo ", ";
                      }
                      echo $option->name;
                    }
                    ?>
                  </span></p>
                  <?php
                  }
                  ?>
            </div>
        </td>
        <td class="seller">
            <p><?=$product->goods->seller?></p>
        </td>
        <td class="product_price">
            <p><?=number_format($product->goods->options[0]->price)."원"?></p>
        </td>
        <td class="num_of_sales">
            <p><?=$product->goods->order_count?></p>
        </td>
        <td class="sales_price">
            <p><?=number_format($product->goods->options[0]->price * $product->goods->order_count)."원"?></p>
        </td>
        </tr>
        <?php
        }
      ?>
        </tbody>
    </table>

    <div id="modal_promotion_apply" class="modal">
        <div class="close_section modal_close"></div>
        <div class="modal_body">
            <button class="close_button modal_close">
                <img src="images/buttons/close.png" alt="닫기" />
            </button>

            <p class="title">
              상품검색
            </p>

            <div class="area_search">
                <input class="search input_search" type="text" title="검색 입력" />
                <button class="search submit_search" title="검색"></button>
            </div>

              <table class="order_list">
                  <tbody>
                    <?php for ($i=0; $i < 8 ; $i++) {
                      ?>
                      <tr>
                        <td class="">
                          <input id="<?="select_".$i?>" class="item-checkbox" type="checkbox" title="선택">
                          <label for="<?="select_".$i?>"></label>
                        </td>
                          <td class="product">
                              <div class="product_img">
                                  <img src="images/products/product1.png" alt="상품사진" />
                              </div>
                              <div class="product_info">
                                  <p>SINGLE-BREASTED OVERSIZED BLAZER</p>
                              </div>
                          </td>
                          <td class="seller">
                            kikiki
                          </td>
                          <td class="order_price">
                              <p>28,500원</p>
                          </td>
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>
              </table>

            <button class="submit">신청하기</button>
        </div>
    </div>

    <div id="modal_apply_finish" class="modal size_msg">
        <div class="close_section modal_close"></div>
        <div class="modal_body">
            <div class="modal_contents">
                <button class="close_button modal_close">
                    <img src="images/buttons/close.png" alt="닫기" />
                </button>

                <p>신청완료 되었습니다.</p>

                <button class="submit modal_close">확인</button>
            </div>
        </div>
    </div>

    <div id="modal_apply_failed" class="modal size_msg">
        <div class="close_section modal_close"></div>
        <div class="modal_body">
            <div class="modal_contents">
                <button class="close_button modal_close">
                    <img src="images/buttons/close.png" alt="닫기" />
                </button>

                <p>홍보를 신청할 상품을 선택해주세요.</p>

                <button class="submit modal_close">확인</button>
            </div>
        </div>
    </div>

</div>

<footer>
    <?=$this->loadLayout("creator/footer")?>
    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="javascripts/modal.js"></script>
    <script src="javascripts/creator/myproduct.js"></script>

</footer>
</body>
</html>
