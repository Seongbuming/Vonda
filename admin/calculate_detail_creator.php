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
                    <a class="nav-link" href="admin.php?page=calculate_seller">SELLER</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link active" href="admin.php?page=calculate_creator">CREATOR</a>
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
                      <span class="info-item username text-heavy-gray">진아영</span>
                      <span class="info-item user-id">
                        <a href="#" class="user-id-link">abc</a>
                      </span>
                      <span class="info-item final-amount">
                        2,360,000원
                      </span>
                      <span class="info-item bank text-heavy-gray">
                        농협
                      </span>
                      <span class="info-item account-number text-heavy-gray">
                        222-1111-2222-30
                      </span>
                      <span class="info-item account-holder text-heavy-gray">
                        진아영
                      </span>
                      <span class="info-item state text-heavy-gray">
                        미완료
                      </span>
                    </div>
                    </table>
                    <div class="sum_price">
                      <div class="wrapper">
                        <div class="term">
                          <p class="caption">총 매출</p>
                          <p id="general-price"class="price">900,000원</p>
                        </div>
                        <div class="operator">X</div>
                        <div class="term">
                          <p class="caption"></p>
                          <p class="price">
                            <input type="input" name="input-fee-rate" value="0.1" class="input-item">
                          </p>
                        </div>
                        <div class="operator">=</div>
                         <div class="term">
                           <p class="caption">정산금액</p>
                           <p id="result-price" class="price">882,000원</p>
                         </div>
                       </div>
                     </div>
                    <div class="product-list">
                      <h4 class="admin-header-peach">총 상품 5개</h4>
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


                    <div class="btn-container">
                      <button type="button" name="btn-delete" class="btn btn-gray btn-delete">정산취소</button>
                      <button type="button" name="btn-delete" class="btn btn-peach btn-delete">정산완료</button>
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
