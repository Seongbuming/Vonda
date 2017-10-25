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
    <link rel="stylesheet" href="stylesheets/admin/calculate_detail.css" />

</head>
<?php
if (!isset($_GET['id'])) {
  header('Location:./admin.php?page=calculate&type=creator');
}

$request = new Http();
$response = $request->request('GET', 'http://api.siyeol.com/admin/calculate/'.$_GET['id'].'?token='.$_COOKIE['token']);
$calculate = $response->data;
$bank = $response->bank;
$user = $response->user;
?>
<body>

    <div id="wrapper" class="toggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <?=$this->loadLayout("sidemenu_bar")?>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
              <section id="vd-calculate-detail-creator">
                <!-- Nav tabs -->
                <ul class="nav">
                  <li class="nav-item">
                    <a class="nav-link" href="admin.php?page=calculate&type=seller">SELLER</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link active" href="admin.php?page=calculate&type=creator">CREATOR</a>
                  </li>
                  <div class="input-container">
                    <input type="input" name="search_input" value="" placeholder="">
                    <button type="button" name="btn-search" class="btn btn-default btn-sm">
                      <span class="glyphicon glyphicon-search"></span>
                    </button>
                  </div>
                </ul><!--/# Nav tabs -->

                <!-- Tab panes -->
                <div class="tab-content">

                  <div class="tab-pane active" id="creator" role="tabpanel">
                    <div class="info-container">
                      <span class="info-item username text-heavy-gray"><?=$user->name?></span>
                      <span class="info-item user-id">
                        <a href="#" class="user-id-link"><?=$user->account?></a>
                      </span>
                      <span class="info-item final-amount">
                        <?=number_format($calculate->calculate_price)?>원
                      </span>
                      <span class="info-item bank text-heavy-gray">
                        <?=$bank->bank?>
                      </span>
                      <span class="info-item account-number text-heavy-gray">
                        <?=$bank->account?>
                      </span>
                      <span class="info-item account-holder text-heavy-gray">
                        <?=$bank->account_owner?>
                      </span>
                      <span class="info-item state text-heavy-gray">
                        <?=$calculate->status == "0" ? "미완료" : "완료"?>
                      </span>
                    </div>
                    </table>
                    <div class="sum_price">
                      <div class="wrapper">
                        <div class="term">
                          <p class="caption">총 매출</p>
                          <p id="general-price"class="price"><?=number_format($calculate->total_price)?>원</p>
                        </div>
                        <div class="operator">X</div>
                        <div class="term">
                          <p class="caption"></p>
                          <p class="price">
                            <input type="input" name="input-fee-rate" value="<?= $calculate->calculate_price / $calculate->total_price ?>" class="input-item">
                          </p>
                        </div>
                        <div class="operator">=</div>
                         <div class="term">
                           <p class="caption">정산금액</p>
                           <p id="result-price" class="price"><?=number_format($calculate->calculate_price)?>원</p>
                         </div>
                       </div>
                     </div>
                    <div class="product-list">
                      <h4 class="admin-header-peach">총 상품 <?=number_format(sizeof($calculate->calculate_goods))?>개</h4>
                      <table class="table table-hover product-list-table">
                        <thead>
                          <tr>
                            <th>#</th>
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
                          foreach ($calculate->calculate_goods as $index => $goods) {
                            // print_r($goods);
                            // exit;
                          ?>
                            <tr class="product-item">
                              <th scope="row"><?=$index+1?></th>
                              <td >
                                <div class="thumbnail-img">
                                  <img class="product-img" src="http://api.siyeol.com/<?=$goods->goods->goods_image?>" alt="" />
                                </div>
                              </td>
                              <td class="title">
                                <p><a href="#"><?=$goods->goods->title?></a></p>
                                <?php
                                if (sizeof($goods->goods->options) > 1) {
                                ?>
                                <p>
                                  <span class="label">옵션 : </span>
                                  <span class="label-content">
                                    <?php
                                    foreach ($goods->goods->options as $option) {
                                      if ($option != $goods->goods->options[0]) {
                                        echo ", ";
                                      }
                                      echo $option->name;
                                    }
                                    ?>
                                  </span>
                                </p>
                                <?php
                                }
                                ?>
                                <p>
                                  <span class="label">재고 : </span>
                                  <span class="label-conent">
                                    <?php
                                      if (sizeof($goods->goods->options) == 1) {
                                        echo $goods->goods->options[0]->stock_ea;
                                      } else {
                                        $stock = "";
                                        $total_ea = 0;
                                        foreach ($goods->goods->options as $option) {
                                          if ($option != $goods->goods->options[0]) {
                                            $stock .= ", ";
                                          }
                                          $stock .= $option->name."(".$option->stock_ea.")";

                                          $total_ea += $option->stock_ea;
                                        }

                                        echo $total_ea." - ".$stock;
                                      }
                                    ?>
                                  </span>
                                </p>
                              </td>
                              <td class="creator"><?=$goods->goods->seller_account?></td>
                              <td class="price"><?=number_format($goods->goods->options[0]->price)?>원</td>
                              <td class="count"><?=number_format($goods->total_ea)?></td>
                              <td class="total"><?=number_format($goods->total_price)?>원</td>
                            </tr>
                          <?php
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>


                    <div class="btn-container">
                      <button type="button" name="btn-delete" class="btn btn-gray btn-delete" onclick="cancel()">정산취소</button>
                      <button type="button" name="btn-delete" class="btn btn-peach btn-delete" onclick="complete()">정산완료</button>
                    </div>
                  </div>


                </div><!-- /#Tab panes -->

              </section>

            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="javascripts/admin/sidemenu_bar.js"></script>
    <script src="javascripts/admin/calculate.js"></script>
</body>
</html>
