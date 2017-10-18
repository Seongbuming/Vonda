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

</head>
<?php
if (!isset($_COOKIE['token'])) {
    echo "err";
}
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
                      <button type="button" class="btn btn-sm btn-default">일간</button>
                      <button type="button" class="btn btn-sm btn-default">주간</button>
                      <button type="button" class="btn btn-sm btn-default">월간</button>
                    </div>
                    <div class="chart-container" style="width:645px;">
                      <canvas id="sales-chart" width="100%"></canvas>
                    </div>

                    <ul class="chart-label ">
                      <li style="color:#52CC5D"><i style="color:#52CC5D;"class="glyphicon glyphicon-stop"></i><span class="chart-item-label">총 매출</span><span class="chart-item-value">9,069,000원</span></li>
                      <li style="color:black"><i class="glyphicon glyphicon-stop"></i><span class="chart-item-label">총 주문건수</span><span class="chart-item-value">222건</span></li>
                      <li style="color:black"><i class="glyphicon glyphicon-stop"></i><span class="chart-item-label">현재 등록된 상품</span><span class="chart-item-value">9개</span></li>
                      <li style="color:black"><i class="glyphicon glyphicon-stop"></i><span class="chart-item-label">현재 크리에이터</span><span class="chart-item-value">11명</span></li>
                    </ul>
                  </div>
                </div>
                <div id="creator-rank"class="content-panel">
                  <h4 class="admin-header-gray">크리에이터 매출 순위</h4>
                  <h5 class="admin-header-gray chart-from-to-date marginTop50">2017.08.21 ~ 2017.09.30</h5>
                  <div class="chart-container marginBottom50" style="width:645px;">
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
                  </div>
                  <a class="btn-close-content" style="display:none;">
                    <h4 class="btn-inline text-peach">닫기</h4>
                  </a>
                </div>
                <div id="product-rank"class="content-panel">
                  <h4 class="admin-header-gray">상품 매출 순위</h4>
                  <h5 class="admin-header-gray chart-from-to-date marginTop50">2017.08.21 ~ 2017.09.30</h5>
                  <div class="chart-container marginBottom50" style="width:645px;">
                    <canvas id="product-chart" width="100%"></canvas>
                  </div>

                  <ul class="chart-label ">
                    <li><i class="glyphicon glyphicon-stop"></i><span class="chart-item-label">전체</span><span class="chart-item-value">9,069,000원</span></li>
                    <li><i class="glyphicon glyphicon-stop"></i><span class="chart-item-label">@ANOTHER A</span><span class="chart-item-value">9,069,000원</span></li>
                    <li><i class="glyphicon glyphicon-stop"></i><span class="chart-item-label">@reply</span><span class="chart-item-value">9,069,000원</span></li>
                    <li><i class="glyphicon glyphicon-stop"></i><span class="chart-item-label">@메종드드룸</span><span class="chart-item-value">9,069,000원</span></li>
                    <li><i class="glyphicon glyphicon-stop"></i><span class="chart-item-label">@Ditole</span><span class="chart-item-value">9,069,000원</span></li>
                    <li><i class="glyphicon glyphicon-stop"></i><span class="chart-item-label">@AMONG</span><span class="chart-item-value">9,069,000원</span></li>
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
                        <tr class="product-item">
                          <th scope="row">1</th>
                          <td >
                            <div class="thumbnail-img">
                              <img class="product-img" src="images/products/product1.png" alt="" />
                            </div>
                          </td>
                          <td class="title">
                            <p><a href="#">SINGLE-BREASTED OVERIZED BLAZER</a></p>
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
                          <td class="creator">7</td>
                          <td class="price">26,000원</td>
                          <td class="count">56</td>
                          <td class="total">2,326,000원</td>
                        </tr>
                        <tr class="product-item">
                          <th scope="row">2</th>
                          <td >
                            <div class="thumbnail-img">
                              <img class="product-img" src="images/products/product2.png" alt="" />
                            </div>
                          </td>
                          <td class="title">
                            <p><a href="#">SINGLE-BREASTED OVERIZED BLAZER</a></p>
                            <p>
                              <span class="label">옵션</span>
                              <span class="label-content">실버,골드</span>
                            </p>
                            <p>
                              <span class="label">재고 : </span>
                              <span class="label-conent">
                                211 - 실버(11), 골드(200)
                              </span>
                            </p>
                          </td>
                          <td class="creator">6</td>
                          <td class="price">26,000원</td>
                          <td class="count">56</td>
                          <td class="total">2,326,000원</td>
                        </tr>
                        <tr class="product-item">
                          <th scope="row">3</th>
                          <td >
                            <div class="thumbnail-img">
                              <img class="product-img" src="images/products/product3.png" alt="" />
                            </div>
                          </td>
                          <td class="title">
                            <p><a href="#">SINGLE-BREASTED OVERIZED BLAZER</a></p>
                            <p>
                              <span class="label">옵션</span>
                              <span class="label-content">실버,골드</span>
                            </p>
                            <p>
                              <span class="label">재고 : </span>
                              <span class="label-conent">
                                211 - 실버(11), 골드(200)
                              </span>
                            </p>
                          </td>
                          <td class="creator">7</td>
                          <td class="price">26,000원</td>
                          <td class="count">56</td>
                          <td class="total">2,326,000원</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <a class="btn-close-content" style="display:none;">
                    <h4 class="btn-inline text-peach">닫기</h4>
                  </a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js"></script>
    <script src="javascripts/admin/stati_chart.js"></script>
    </script>
</body>
</html>
