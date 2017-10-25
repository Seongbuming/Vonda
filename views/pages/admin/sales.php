<!doctype html>
<html lang="ko">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?=$this->loadLayout("head")?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="stylesheets/admin/common.css" />
    <link rel="stylesheet" href="stylesheets/admin/table_product.css" />
    <link rel="stylesheet" href="stylesheets/admin/sales.css" />
    <link rel="stylesheet" href="stylesheets/admin/product_detail_modal.css" />

</head>

<body>

    <div id="wrapper" class="toggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <?=$this->loadLayout("sidemenu_bar")?>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
          <section id="vd-sales-list">
            <div class="container-fluid">
              <div class="nav">
                <div class="period_select">
                    <div class="input_period">
                        <input class="start" type="date" style="width:130px" />
                        <span>~</span>
                        <input class="end" type="date" style="width:130px" />
                        <button class="search btn-sm btn-peach">조회</button>
                    </div>
                </div>
                <div class="input-container">
                  <input type="input" name="search_input" value="" placeholder="">
                  <button type="button" name="btn-search" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-search"></span>
                  </button>
                </div>
              </div><!--/# Nav tabs -->

              <div class="tab-pane active" id="product-list" role="tabpanel">
                <div class="product-list">
                  <table class="table table-hover product-list-table">
                    <thead>
                      <tr>
                        <th>주문번호/주문일자</th>
                        <th></th>
                        <th>상품명</th>
                        <th>결제금액</th>
                        <th>상태</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                          $item_length = $i % 2 ? 1 : 2;
                          ?>
                          <tr class="product-item">
                            <td class="">
                              <p class="sales-date text-center">2017.09.10</p>
                              <p class="sales-number text-center">
                                <a href="#" data-toggle="modal" data-target="#order-detail-modal">2018211119</a>
                              </p>
                            </td>
                            <td>
                                <?php
                                  for ($index=1; $index <= $item_length ; $index++) {
                                    ?>
                                    <div class="thumbnail-img">
                                      <a class="product-detail-link" href="#" data-toggle="modal" data-target="#product-detail-modal">
                                        <img class="product-img" src="<?php echo "images/products/product".$index.".png"?>" alt="" />
                                      </a>
                                    </div>
                                  <?php
                                }
                                ?>
                            </td>
                            <td class="title">
                              <?php
                                for ($index=1; $index <= $item_length ; $index++) {
                                  ?>
                                  <div class="title-group">
                                    <p><a href="#"><p><a href="#">SINGLE-BREASTED OVERIZED BLAZER</a></p></a></p>
                                    <p>
                                      <span class="label">옵션 : </span>
                                      <span class="label-content">실버</span>
                                    </p>
                                    <p>
                                      <span class="label">수량 : </span>
                                      <span class="label-conent">
                                        2
                                      </span>
                                    </p>
                                  </div>
                                <?php
                              }
                              ?>

                            </td>
                            <td class="price">26,000원</td>
                            <td class="state text-center">
                                <?php
                                $state = $i % 9;
                                $str_state = "";
                                switch ($state) {
                                  case 0:
                                    $str_state = "상품준비중";
                                    break;
                                  case 1:
                                    $str_state = "배송준비중";
                                    break;
                                  case 2:
                                    $str_state = "배송중";
                                    break;
                                  case 3:
                                    $str_state = "배송완료";
                                    break;
                                  case 4:
                                    $str_state = "주문완료";
                                    break;
                                  case 5:
                                    $str_state = "주문취소요청";
                                    break;
                                  case 6:
                                    $str_state = "주문취소완료";
                                    break;
                                  case 7:
                                    $str_state = "반품요청";
                                    break;
                                  case 8:
                                    $str_state = "반품완료";
                                    break;
                                }


                                if($state < 5){

                                  echo $str_state;

                                  ?>

                                  <?php
                                }else if($state == 7){?>
                                  <button type="button" name="button" class="btn-sm btn-peach btn-request-return" data-toggle="modal" data-target="#request-return-modal">
                                    반품요청
                                  </button>
                                <?
                              }else if($state == 8){
                                ?>
                                <button type="button" name="button" class="btn-sm btn-peach btn-complete-return" data-toggle="modal" data-target="#complete-return-modal">
                                  반품완료
                                </button>
                                <?php
                              }else{
                                ?>
                                <?=$str_state?>
                                <p class="text-center">
                                  <!-- 결제 모듈로 이동, 결제 취소하기 위함 -->
                                  <button class="btn btn-sm btn-peach"type="button" name="btn-cancel-order">결제취소</button>
                                </p>
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
                  <!-- Modal -->
                  <div class="modal fade " id="order-detail-modal">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-header">
                          <h4 class="admin-header-peach">ORDER DETAILS</h4>
                        </div>

                        <div class="modal-body">
                          <table id="table-detail-table"style="width:100%" class="table order-detail-table">
                            <tr class="order-detail-item">
                              <th class="order-detail-item-label">주문번호</th>
                              <td class="order-detail-item-content">2018211119</td>
                            </tr>
                            <tr class="order-detail-item">
                              <th class="order-detail-item-label">주문일시</th>
                              <td class="order-detail-item-content">2017.08.31</td>
                            </tr>
                            <tr class="order-detail-item">
                              <th class="order-detail-item-label">주문자</th>
                              <td class="order-detail-item-content">진아영</td>
                            </tr>
                            <tr class="order-detail-item">
                              <th class="order-detail-item-label">아이디</th>
                              <td class="order-detail-item-content">dksfjl</td>
                            </tr>
                            <tr class="order-detail-item"
                            style="border-bottom: solid 1px #d8d8d8;">
                              <th class="order-detail-item-label">주문상태</th>
                              <td class="order-detail-item-content">결제완료</td>
                            </tr>

                            <tr class="order-detail-item">
                              <th class="order-detail-item-label">주문상품/<br>상태</th>
                              <td class="order-detail-item-content">
                                <ul class="order-product-list">
                                  <li class="order-product-item">
                                    <p>
                                      <span class="title">SINGLE BREASTED OVERSIZED BLAZER</span>
                                      <span class="option">옵션 : 실버</span>
                                      <span class="count">수량 : 1</span>
                                    </p>
                                    <p>
                                      <span class="shipping-status">배송중</span>
                                      <a href="#" class="shipping-company">CJ대한통운 [23891283018390]</a>
                                    </p>
                                  </li>
                                  <li class="order-product-item">
                                    <p>
                                      <span class="title">SINGLE BREASTED OVERSIZED BLAZER</span>
                                      <span class="option">옵션 : 실버</span>
                                      <span class="count">수량 : 1</span>
                                    </p>
                                    <p>
                                      <span class="shipping-status">배송중</span>
                                    </p>
                                  </li>
                                </ul>
                              </td>
                            </tr>

                            <tr class="order-detail-item">
                              <th class="order-detail-item-label">총 주문금액</th>
                              <td class="order-detail-item-content">26,000원</td>
                            </tr>
                            <tr class="order-detail-item">
                              <th class="order-detail-item-label">배송비</th>
                              <td class="order-detail-item-content">2500원</td>
                            </tr>
                            <tr class="order-detail-item">
                              <th class="order-detail-item-label">총 할인금액</th>
                              <td class="order-detail-item-content">-1,000원(쿠폰할인)</td>
                            </tr>
                            <tr class="order-detail-item">
                              <th class="order-detail-item-label">총 결제금액</th>
                              <td class="order-detail-item-content">27,500원</td>
                            </tr>
                            <tr class="order-detail-item"
                            style="border-bottom: solid 1px #d8d8d8;">
                              <th class="order-detail-item-label">결제수단</th>
                              <td class="order-detail-item-content">삼성카드 5112-3130-****-****</td>
                            </tr>

                            <tr class="order-detail-item">
                              <th class="order-detail-item-label">수령인</th>
                              <td class="order-detail-item-content">진*영</td>
                            </tr>
                            <tr class="order-detail-item">
                              <th class="order-detail-item-label">연락처</th>
                              <td class="order-detail-item-content">010-2344-****</td>
                            </tr>
                            <tr class="order-detail-item">
                              <th class="order-detail-item-label">배송지</th>
                              <td class="order-detail-item-content">
                                <p class="postcode">
                                  29123
                                </p>
                                <p class="address">
                                  인천광역시 연수구 신학동
                                </p>
                              </td>
                            </tr>
                            <tr class="order-detail-item"
                            style="border-bottom: solid 1px #d8d8d8;">
                              <th class="order-detail-item-label">배송메세지</th>
                              <td class="order-detail-item-content">-</td>
                            </tr>
                        </table>


                        </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="modal fade " id="product-detail-modal">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>

                        <div class="modal-body">

                        </div>
                        </div>
                      </div>
                    </div>

                    <div class="modal fade request-exchange-modal" id="request-return-modal">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <div class="modal-header">
                            <h4 class="admin-header-gray">반품</h4>
                          </div>
                          <div class="modal-body">
                            <div class="order-list">
                              <table class="table table-hover product-list-table">
                                <tbody>
                                  <?php
                                  for ($i=0; $i < 8; $i++) { ?>

                                    <tr class="product-item">
                                      <td>
                                        <div class="thumbnail-img">
                                          <img class="product-img" src="images/products/product1.png" alt="" />
                                        </div>
                                      </td>
                                      <td class="title">
                                            <div class="title-group">
                                              <p><a href="#"><p><a href="#">SINGLE-BREASTED OVERIZED BLAZER</a></p></a></p>
                                              <p>
                                                <span class="label">옵션 : </span>
                                                <span class="label-content">실버</span>
                                              </p>
                                              <p>
                                                <span class="label">수량 : </span>
                                                <span class="label-conent">
                                                  2
                                                </span>
                                              </p>
                                            </div>
                                      </td>
                                      <td class="price">26,000원</td>
                                    </tr>

                                    <?php
                                  }
                                   ?>
                                </tbody>
                              </table>
                            </div>
                            <div class="contents">
                              <p>

                              </p>
                            </div>
                            <!-- 결제모듈로 이동 -->
                            <button type="button" name="button" class="btn btn-peach submit">결제취소</button>
                          </div>
                          </div>
                        </div>
                      </div>

                      <div class="modal fade request-exchange-modal" id="complete-return-modal">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="modal-header">
                              <h4 class="admin-header-gray">반품</h4>
                            </div>
                            <div class="modal-body">
                              <div class="order-list">
                                <table class="table table-hover product-list-table">
                                  <tbody>
                                    <?php
                                    for ($i=0; $i < 8; $i++) { ?>

                                      <tr class="product-item">
                                        <td>
                                          <div class="thumbnail-img">
                                            <img class="product-img" src="images/products/product1.png" alt="" />
                                          </div>
                                        </td>
                                        <td class="title">
                                              <div class="title-group">
                                                <p><a href="#"><p><a href="#">SINGLE-BREASTED OVERIZED BLAZER</a></p></a></p>
                                                <p>
                                                  <span class="label">옵션 : </span>
                                                  <span class="label-content">실버</span>
                                                </p>
                                                <p>
                                                  <span class="label">수량 : </span>
                                                  <span class="label-conent">
                                                    2
                                                  </span>
                                                </p>
                                              </div>
                                        </td>
                                        <td class="price">26,000원</td>
                                      </tr>

                                      <?php
                                    }
                                     ?>
                                  </tbody>
                                </table>
                              </div>
                              <div class="contents">
                                <p>

                                </p>
                              </div>
                              <!-- 결제모듈로 이동 -->
                              <button type="button" name="button" class="btn btn-peach submit">반품완료</button>
                            </div>
                            </div>
                          </div>
                        </div>



                  <div class="pager-container text-center">
                    <button type="button" class="btn btn-default btn-pager" aria-label="Previous Page">
                      <span class="glyphicon glyphicon-triangle-left" aria-hidden="false"></span>
                    </button>

                    <button type="button" class="btn btn-default btn-pager" aria-label="Next Page">
                      <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="javascripts/admin/sidemenu_bar.js"></script>
    <script src="javascripts/admin/product_detail_modal.js"></script>
    <script src="javascripts/admin/sales.js"></script>

</body>
</html>
