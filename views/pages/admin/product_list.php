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
    <link rel="stylesheet" href="stylesheets/admin/product_list.css" />
    <link rel="stylesheet" href="stylesheets/admin/product_detail_modal.css" />

</head>
<?php
$request = new http();

if (isset($_GET['keyword'])) {
  $response = $request->request('GET', '/admin/goods?keyword='.$_GET['keyword'].'&token='.$_COOKIE['token']);
} else {
  $response = $request->request('GET', '/admin/goods?token='.$_COOKIE['token']);
}

$goods = $response->datas->data;
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
          <section id="vd-product-list">
            <div class="container-fluid">
              <div class="nav" style="height:30px;">
                
                <div class="input-container">
                  <form action="/admin.php" method="GET">
                    <input type="hidden" name="page" value="product_list"/>
                    <input type="input" name="keyword" value="<?=$_GET['keyword']?>" placeholder="">
                    <button type="submit" class="btn btn-default btn-sm">
                      <span class="glyphicon glyphicon-search"></span>
                    </button>
                  </form>
                </div>
              </div><!--/# Nav tabs -->

              <div class="tab-pane active" id="product-list" role="tabpanel">
                  <a href="admin.php?page=product_write" class="btn-customer-write btn-write">
                    <img src="images/buttons/admin/plus.png" alt="plus.png" />
                  </a>
                <div class="product-list">
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
                      foreach ($goods as $item) {
                      ?>
                          <tr class="product-item">
                            <th scope="row"><?=$item->id?></th>
                            <td>
                              <div class="thumbnail-img">
                                <a class="product-detail-link" href="#" data-toggle="modal" data-target="#product-detail-modal">
                                  <img class="product-img" src="http://api.siyeol.com/<?=$item->goods_image?>" alt="" />
                                </a>
                              </div>
                            </td>
                            <td class="title">
                              <p><a href="<?="admin.php?page=product_stat&id=".$item->id?>"><?=$item->title?></a></p>
                              <?php
                              if (sizeof($item->options) > 1) {
                              ?>
                              <p>
                                <span class="label">옵션 : </span>
                                <span class="label-content">
                                  <?php
                                  foreach ($item->options as $option) {
                                    if ($option != $item->options[0]) {
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
                                    if (sizeof($item->options) == 1) {
                                      echo $item->options[0]->stock_ea;
                                    } else {
                                      $stock = "";
                                      $total_ea = 0;
                                      foreach ($item->options as $option) {
                                        if ($option != $item->options[0]) {
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
                            <td class="seller"><?=$item->seller_account?></td>
                            <td class="price"><?=number_format($item->options[0]->price)."원"?></td>
                            <td class="count"><?=number_format($item->order_count)?></td>
                            <td class="total"><?=number_format($item->order_price)."원"?></td>
                          </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>

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
</body>
</html>
