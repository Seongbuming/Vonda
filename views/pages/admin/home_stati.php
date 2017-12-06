<!doctype html>
<html lang="ko">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?=$this->loadLayout("head")?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="stylesheets/admin/common.css" />
    <link rel="stylesheet" href="stylesheets/admin/stati.css"/>
    <link rel="stylesheet" href="stylesheets/admin/chart.css" />
    <link rel="stylesheet" href="stylesheets/admin/table_product.css" />
    <link rel="stylesheet" href="stylesheets/admin/layer_popup.css" />
    <link rel="stylesheet" href="stylesheets/admin/product_detail_modal.css" />

</head>
<?php
$request = new Http();
$response = $request->request('GET', '/admin/creator/rank?token='.$_COOKIE['token']);
$creator_statics = $response->datas;

$response = $request->request('GET', '/admin/goods/rank?token='.$_COOKIE['token']);
$goods_statics = $response->datas;
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
            <section id="vd-stati">

              <div class="container-fluid">
                <div id="total-sales"class="content-panel">
                  <h4 class="admin-header-gray">전체 매출</h4>
                  <div class="graph-container">
                    <div class="btn-group" role="group" >
                      <button type="button" class="btn btn-sm btn-default btn-daily">일간</button>
                      <button type="button" class="btn btn-sm btn-default btn-weekly">주간</button>
                      <button type="button" class="btn btn-sm btn-default btn-monthly">월간</button>
                    </div>
                    <div class="chart-container" style="width:645px;">
                      <canvas id="sales-chart" width="100%"></canvas>
                    </div>

                    <ul class="chart-label ">
                      <li style="color:#52CC5D"><i style="color:#52CC5D;"class="glyphicon glyphicon-stop"></i><span class="chart-item-label">총 매출</span>
                        <span id="sales-total-price"class="chart-item-value"></span></li>
                      <li style="color:black"><span class="chart-item-label none-icon">총 주문건수</span>
                        <span id="sales-total-count"class="chart-item-value"></span></li>
                      <li style="color:black"><span class="chart-item-label none-icon">현재 등록된 상품</span>
                        <span id="num-of-goods"class="chart-item-value"></span></li>
                      <li style="color:black">
                        <span class="chart-item-label none-icon">현재 크리에이터</span>
                        <span id="num-of-creator"class="chart-item-value"></span></li>
                    </ul>
                  </div>
                </div>

                <div id="creator-rank" class="content-panel">
                  <h4 class="admin-header-gray">크리에이터 매출 순위</h4>
                  <h5 class="admin-header-gray chart-from-to-date marginTop50"><?= date("Y.m.d", strtotime("-1 month", time()))."~".date("Y.m.d")?></h5>
                  <div class="chart-container marginBottom50" style="width:645px;">
                    <canvas id="creator-chart" width="100%"></canvas>
                  </div>

                  <ul class="chart-label ">
                    <li><i class="glyphicon glyphicon-stop"></i><span class="chart-item-label">전체</span><span class="chart-item-value total">
                    <?php
                    $total_price = 0;
                    foreach ($creator_statics as $creator_static) {
                      $total_price += $creator_static->total_price;
                    }

                    echo number_format($total_price);
                    ?>원</span></li>
                    <?php
                    foreach ($creator_statics as $creator) {
                      echo '<li><i class="glyphicon glyphicon-stop"></i><span class="chart-item-label">@'.$creator->nickname.'</span><span class="chart-item-value">'.number_format($creator->total_price).'원</span></li>';
                    }
                    ?>
                  </ul>
                  <a class="btn-open-content">
                    <h4 class="btn-inline text-peach">열기</h4>
                  </a>
                  <div class="creator-list" style="display:none;">
                    <table class="table table-hover product-creator-table">
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
                        foreach ($creator_statics as $creator_static) {
                          $creator = $creator_static->creator;
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
                            <td class="count"><?=number_format($creator->goods_count)?></td>
                            <td class="total"><?=number_format($creator_static->total_price)?>원</td>
                          </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>

                    <div id="layer-popup">
                      <ul class="menu-list">
                        <a href="#" class="menu-item member-info" target="_blank"><li>회원정보</li></a>
                        <a href="#" class="menu-item profile" target="_blank"><li>프로필</li>
                        </a>
                      </ul>
                    </div>
                  </div>
                  <a class="btn-close-content" style="display:none;">
                    <h4 class="btn-inline text-peach">닫기</h4>
                  </a>
                </div>

                <div id="product-rank"class="content-panel">
                  <h4 class="admin-header-gray">상품 매출 순위</h4>
                  <h5 class="admin-header-gray chart-from-to-date marginTop50"><?= date("Y.m.d", strtotime("-1 month", time()))."~".date("Y.m.d")?></h5>
                  <div class="chart-container marginBottom50" style="width:600px;">
                    <canvas id="product-chart" width="100%"></canvas>
                  </div>

                  <ul class="chart-label " style="width:280px">
                    <li><i class="glyphicon glyphicon-stop"></i><span class="chart-item-label">전체</span><span class="chart-item-value">
                      <?php
                      $total = 0;
                      foreach ($goods_statics as $goods_static) {
                        $total += $goods_static->total_price;
                      }
                      echo number_format($total);
                      ?>
                      원
                    </span></li>
                    <?php
                    foreach ($goods_statics as $goods_static) {
                      echo '<li><i class="glyphicon glyphicon-stop"></i><span class="chart-item-label" style="font-size:15px">'.$goods_static->goods->title.'</span><span class="chart-item-value">'.number_format($goods_static->total_price).'원</span></li>';
                    }
                    ?>
                  </ul>
                  <a class="btn-open-content">
                    <h4 class="btn-inline text-peach">열기</h4>
                  </a>
                  <div class="product-list" style="display:none;">
                    <table class="table table-hover product-list-table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th></th>
                          <th>상품명</th>
                          <th>크리에이터</th>
                          <th>상품가격</th>
                          <th>판매수</th>
                          <th>판매금액</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach ($goods_statics as $goods_static) {
                          $goods = $goods_static->goods;
                        ?>
                          <tr class="product-item">
                            <th scope="row"><?=$goods->id?></th>
                            <td >
                              <div class="thumbnail-img">
                                <a class="product-detail-link" href="#" data-toggle="modal" data-target="#product-detail-modal">
                                  <img class="product-img" src="http://api.siyeol.com/<?=$goods->goods_image?>" alt="" />
                                </a>
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
                                      echo ",";
                                    }
                                    echo $option->name;
                                  }
                                  ?>
                                  </span>
                                </p>
                                <p>
                                  <span class="label">재고 : </span>
                                  <span class="label-conent">
                                    <?php
                                    $options = "";
                                    $total = 0;

                                    foreach ($goods->options as $option) {
                                      if ($option != $goods->options[0]) {
                                        $options .= ", ";
                                      }
                                      $options .= $option->name."(".$option->stock_ea.")";

                                      $total += $option->stock_ea;
                                    }

                                    echo $total." - ".$options;
                                    ?>
                                  </span>
                                </p>
                              <?php
                              } else {
                              ?>
                                <p>
                                  <span class="label">재고 : </span>
                                  <span class="label-conent">
                                    <?=$goods->options[0]->stock_ea?>
                                  </span>
                                </p>
                              <?php
                              }
                              ?>

                            </td>
                            <td class="creator"><?=number_format($goods->creator_count)?></td>
                            <td class="price"><?=number_format($goods->options[0]->price)?>원</td>
                            <td class="count"><?=number_format($goods->order_count)?></td>
                            <td class="total"><?=number_format($goods_static->total_price)?>원</td>
                          </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>


                  </div>
                  <a class="btn-close-content" style="display:none;">
                    <h4 class="btn-inline text-peach">닫기</h4>
                  </a>
                  </div>

                  <!-- Modal -->
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


                  </div>


                </div>

              </div>
            </section>
        </div><!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="javascripts/admin/sidemenu_bar.js"></script>
    <script src="javascripts/admin/layer_hide_show.js"></script>
    <script src="javascripts/admin/layer_popup.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js"></script>
    <script src="javascripts/admin/stati_chart.js"></script>
    <script src="javascripts/admin/product_detail_modal.js">

    </script>
    </script>
</body>
</html>
