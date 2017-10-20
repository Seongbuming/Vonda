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
                    <span class="seller-id">hayefuk</span>
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
                          <p><a href="#">옵션이 있을 때 재고 표시 방법</a></p>
                          <p>
                            <span class="label">옵션 : </span>
                            <span class="label-content">실버,골드</span>
                          </p>
                          <p>
                            <span class="label">재고 : </span>
                            <span class="label-conent">
                              211 - 실버(11), 골드(200)
                            </span>
                          </p>
                        </td>
                        <td class="price">26,000원</td>
                        <td class="count">56</td>
                        <td class="total">2,326,000원</td>
                        <td class="stock">211</td>
                      </tr>
                      <tr class="product-item">
                        <td>
                          <div class="thumbnail-img">
                            <img class="product-img" src="images/products/product2.png" alt="" />
                          </div>
                        </td>
                        <td class="title">
                          <p><a href="#">옵션이 없는 경우 재고 표시 방법</a></p>
                          <p>
                            <span class="label">재고 : </span>
                            <span class="label-conent">
                              211
                            </span>
                          </p>
                        </td>
                        <td class="price">26,000원</td>
                        <td class="count">56</td>
                        <td class="total">2,326,000원</td>
                        <td class="stock">211</td>
                      </tr>
                    </tbody>
                  </table>

                  <h5 class="admin-header-gray chart-from-to-date marginTop50">2017.08.21 ~ 2017.09.30</h5>
                  <div class="chart-container" style="width:645px;">
                    <canvas id="creator-chart" width="100%"></canvas>
                  </div>

                  <ul class="chart-label ">
                    <li><i class="glyphicon glyphicon-stop"></i><span class="chart-item-label">전체</span><span class="chart-item-value">9,069,000원</span></li>
                    <li><i class="glyphicon glyphicon-stop"></i><span class="chart-item-label">@ANOTHER A</span><span class="chart-item-value">9,069,000원</span></li>
                    <li><i class="glyphicon glyphicon-stop"></i><span class="chart-item-label">@reply</span><span class="chart-item-value">9,069,000원</span></li>
                    <li><i class="glyphicon glyphicon-stop"></i><span class="chart-item-label">@메종드드룸</span><span class="chart-item-value">9,069,000원</span></li>
                    <li><i class="glyphicon glyphicon-stop"></i><span class="chart-item-label">@Ditole</span><span class="chart-item-value">9,069,000원</span></li>
                    <li><i class="glyphicon glyphicon-stop"></i><span class="chart-item-label">@AMONG</span><span class="chart-item-value">9,069,000원</span></li>
                  </ul>

                  <div class="creator-list marginTop50">
                    <h4 class="admin-header-peach">총 크리에터 <span class="num-of-creator">7</span>명</h3>
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
                      <tr class="creator-item">
                        <th scope="row">1</th>
                        <td >
                          <div class="thumbnail-img">
                            <img class="creator-img" src="images/creators/creator1.png" alt="" />
                          </div>
                        </td>
                        <td class="creator-id">
                          <p><a>@ANOTHER A</a></p>
                        </td>
                        <td class="count">56</td>
                        <td class="total">2,326,000원</td>
                      </tr>
                      <tr class="creator-item">
                        <th scope="row">2</th>
                        <td >
                          <div class="thumbnail-img">
                            <img class="creator-img" src="images/creators/creator2.png" alt="" />
                          </div>
                        </td>
                        <td class="creator-id">
                          <p><a>@ANOTHER A</a></p>
                        </td>
                        <td class="count">56</td>
                        <td class="total">2,326,000원</td>
                      </tr>
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
