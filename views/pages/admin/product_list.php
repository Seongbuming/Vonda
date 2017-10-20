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
          <section id="vd-product-list">
            <div class="container-fluid">
              <div class="nav nav-tabs">
                <div class="btn-container">
                  <button type="button" class="btn btn-default btn-sm">
                    <span>2017-06-16</span>
                    <img src="images/buttons/admin/calendar.png" alt="calendar.png" />
                    <!-- <span class="glyphicon glyphicon-calendar"></span> -->
                  </button>

                  <button type="button" class="btn btn-default btn-sm">
                    <span>2017-06-16</span>
                    <img src="images/buttons/admin/calendar.png" alt="calendar.png" />
                  </button>
                  <button type="button" name="search" class="btn btn-sm btn-peach">조회</button>
                </div>
                <div class="input-container">
                  <input type="input" name="search_input" value="" placeholder="">
                  <button type="button" name="btn-search" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-search"></span>
                  </button>
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
                      <tr class="product-item">
                        <th scope="row">1</th>
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
                        <td class="seller">kikiki</td>
                        <td class="price">26,000원</td>
                        <td class="count">56</td>
                        <td class="total">2,326,000원</td>
                      </tr>
                      <tr class="product-item">
                        <th scope="row">2</th>
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
                        <td class="seller">kikiki</td>
                        <td class="price">26,000원</td>
                        <td class="count">56</td>
                        <td class="total">2,326,000원</td>
                      </tr>
                      <tr class="product-item">
                        <th scope="row">3</th>
                        <td>
                          <div class="thumbnail-img">
                            <img class="product-img" src="images/products/product3.png" alt="" />
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
                        <td class="seller">kikiki</td>
                        <td class="price">26,000원</td>
                        <td class="count">56</td>
                        <td class="total">2,326,000원</td>
                      </tr>
                    </tbody>
                  </table>
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
</body>
</html>
