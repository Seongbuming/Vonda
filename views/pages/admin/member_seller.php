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
    <link rel="stylesheet" href="stylesheets/admin/member_detail.css" />

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

              <!-- Nav tabs -->
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="admin.php?page=member">CUSTOMER</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="admin.php?page=member_seller">SELLER</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="admin.php?page=member_creator">CREATOR</a>
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
                <div class="tab-pane active" id="seller" role="tabpanel">
                  <div class="info">
                    <div class="info-item">
                      <span class="label">가입일자</span>
                      <span class="label-content">2017.09.22 11:20</span>
                    </div>
                    <div class="info-item">
                      <span class="label">아이디</span>
                      <span class="label-content">hayefuk</span>
                    </div>
                    <div class="info-item">
                      <span class="label">이름</span>
                      <span class="label-content">진아영</span>
                    </div>
                    <div class="info-item">
                      <span class="label">연락처</span>
                      <span class="label-content">010-1111-6474</span>
                    </div>
                    <div class="info-item">
                      <span class="label">이메일</span>
                      <span class="label-content">jay901004@naver.com</span>
                    </div>
                    <div class="info-item">
                      <span class="label">사업자등록증</span>
                      <span class="label-content">청년스토어_사업자.pdf</span>
                      <a href="#"><img class="btn-download" src="images/buttons/admin/download.png" alt="download.png" /></a>
                    </div>
                    <div class="info-item">
                      <span class="label">통장사본</span>
                      <span class="label-content">청년스토어_통장사본.pdf</span>
                      <a href="#"><img class="btn-download" src="images/buttons/admin/download.png" alt="download.png" /></a>
                    </div>
                    <div class="info-item">
                      <span class="label">통신판매업신고증</span>
                      <span class="label-content">청년스토어_통신판매.pdf</span>
                      <a href="#"><img class="btn-download" src="images/buttons/admin/download.png" alt="download.png" /></a>
                    </div>
                    <div class="btn-container text-center">
                      <button type="button" name="approve-sign-up" class="btn btn-peach">가입승인</button>
                      <button type="button" name="not-see-again" class="btn btn-gray">다시 보지않기</button>
                    </div>
                  </div>

                  <div class="product-list" style="display:none;">
                    <h4 class="number-of-product">
                      총 상품 3개
                    </h4>
                    <table class="table table-hover product-list-table">
                      <thead>
                        <tr>
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
                          <td class="creator">4</td>
                          <td class="price">26,000원</td>
                          <td class="count">56</td>
                          <td class="total">2,326,000원</td>
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
                          <td class="creator">3</td>
                          <td class="price">26,000원</td>
                          <td class="count">56</td>
                          <td class="total">2,326,000원</td>
                        </tr>
                        <tr class="product-item">
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
                          <td class="creator">2</td>
                          <td class="price">26,000원</td>
                          <td class="count">56</td>
                          <td class="total">2,326,000원</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                </div>
              </div><!-- /#Tab panes -->

            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="javascripts/admin/sidemenu_bar.js"></script>
    <script src="javascripts/admin/member_detail.js"></script>
</body>
</html>
