<!doctype html>
<html lang="ko">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?=$this->loadLayout("head")?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="stylesheets/admin/common.css" />
    <link rel="stylesheet" href="stylesheets/admin/chart.css" />
    <link rel="stylesheet" href="stylesheets/admin/table_product.css" />
    <link rel="stylesheet" href="stylesheets/admin/product_stati.css" media="screen" title="no title">

</head>
<?php
$request = new http();

$response = $request->request('GET', '/admin/goods/'.$_GET['id'].'/info?token='.$_COOKIE['token']);
$goods = $response->datas;


$response = $request->request('GET', '/admin/goods/'.$_GET['id'].'/promote?token='.$_COOKIE['token']);

$creators = $response->datas;
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

              <div class="tab-pane active" id="product-stati" role="tabpanel">
                  <a href="admin.php?page=product_write" class="btn-product-write btn-write">
                    <img src="images/buttons/admin/plus.png" alt="plus.png" />
                  </a>
                  <h4 class="page-title">
                    <span class="label">셀러</span>
                    <span class="seller-id"><?=$goods->seller_account?></span>
                  </h4>
                <div class="product-stati">
                  <table class="table product-stati-table">
                    <thead>
                      <tr>
                        <th></th>
                        <th>상품명</th>
                        <th>상품가격</th>
                        <th>판매수</th>
                        <th>판매금액</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="product-item">
                        <td>
                          <div class="thumbnail-img">
                            <img class="product-img" src="images/products/product1.png" alt="" />
                          </div>
                        </td>
                        <td class="title">
                          <p><a href="#"><?=$goods->title?></a></p>
                          <?php
                          if (sizeof($goods->options) > 1) {
                          ?>
                              <p>
                                <span class="label">옵션 : </span>
                                <span class="label-content">
                                  <?php
                                  foreach ($goods->options as $option) {
                                    if ($option != $goods->options[0]) {
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
                                if (sizeof($goods->options) == 1) {
                                  echo $goods->options[0]->stock_ea;
                                } else {
                                  $stock = "";
                                  $total_ea = 0;
                                  foreach ($goods->options as $option) {
                                    if ($option != $goods->options[0]) {
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
                        <td class="price"><?=number_format($goods->options[0]->price)?>원</td>
                        <td class="count"><?=number_format($goods->order_count)?></td>
                        <td class="total"><?=number_format($goods->order_price)?>원</td>
                        <td class="stock"><?=number_format($goods->total_ea)?></td>
                      </tr>
                    </tbody>
                  </table>

                  <h5 class="admin-header-gray chart-from-to-date marginTop50">2017.08.21 ~ 2017.09.30</h5>
                  <div class="chart-container" style="width:645px;">
                    <canvas id="creator-chart" width="100%"></canvas>
                  </div>

                  <ul class="chart-label ">
                    <?php
                    $total_price = 0;
                    foreach ($creators as $creator) {
                      $total_price += $creator->total_price;
                    }

                    echo '<li><i class="glyphicon glyphicon-stop"></i><span class="chart-item-label">전체</span><span class="chart-item-value" count="'.$goods->order_count.'">'.number_format($total_price).'원</span></li>';

                    // echo '<li><i class="glyphicon glyphicon-stop"></i><span class="chart-item-label">일반</span><span class="chart-item-value">'.number_format($goods->order_price - $total_price).'원</span></li>';

                    foreach ($creators as $creator) {
                    ?>
                      <li><i class="glyphicon glyphicon-stop"></i><span class="chart-item-label">@<?=$creator->nickname?></span><span class="chart-item-value" count="<?=$creator->order_count?>"><?=number_format($creator->total_price)?>원</span></li>
                    <?php
                    }
                    ?>
                  </ul>

                  <div class="creator-list marginTop50">
                    <h4 class="admin-header-peach">총 크리에터 <span class="num-of-creator"><?=sizeof($creators)?></span>명</h3>
                  </div>
                  <table class="table product-creator-table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th></th>
                        <th>크리에이터</th>
                        <th>판매수</th>
                        <th>판매금액</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($creators as $creator) {
                      ?>
                        <tr class="creator-item">
                          <th scope="row"><?=$creator->id?></th>
                          <td >
                            <div class="thumbnail-img">
                              <img class="creator-img" src="http://api.siyeol.com/<?=$creator->profile_image?>" alt="" />
                            </div>
                          </td>
                          <td class="creator-id">
                            <p><a>@<?=$creator->nickname?></a></p>
                          </td>
                          <td class="count"><?=$creator->order_count?></td>
                          <td class="total"><?=number_format($creator->total_price)?>원</td>
                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>

                  <div id="layer-popup">
                    <ul class="menu-list">
                      <a href="#" class="menu-item"><li>회원정보</li></a>
                      <a href="#" class="menu-item"><li>프로필</li></a>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="javascripts/admin/sidemenu_bar.js"></script>
    <script src="javascripts/admin/layer_popup.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js"></script>
    <script src="javascripts/admin/stati_chart.js"></script>
</body>
</html>
