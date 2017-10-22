<!doctype html>
<html lang="ko">
<?php

// 메인 배너 핸들링
$is_post = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $is_post = true;
    $url = '/admin/banner?token='.$_COOKIE['token'];

    $datas = array();


    foreach ($_FILES as $key => $file) {
      if ($file['name'] == "") {
        continue;
      }
      $datas[] = ['name' => $key, 'contents' => file_get_contents($file['tmp_name']), 'filename' => $file['name']];
    }

    foreach ($_POST as $key => $value) {
      if ($key == "creators") {
        foreach ($value as $creator) {
          array_push($datas, ['name' => 'creators[]', 'contents' => $creator]);
        }
      } else {
          array_push($datas, ['name' => $key, 'contents' => $value]);
      }
    }

    $request = new Http();
    $res = $request->requestEx('POST', $url, [
        'multipart' => $datas
    ]);

    print_r($res);
    echo "done";
    exit;

    // 회원가입 완료하면 토큰이 반환됨.
    if ($res->token) {
        header("location:./?page=signup_finish");
        exit;
    }
}
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?=$this->loadLayout("head")?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="stylesheets/admin/common.css" />
    <link rel="stylesheet" href="stylesheets/admin/mgmt_mainpage.css"/>
    <link rel="stylesheet" href="stylesheets/admin/table_product.css"/>

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
            <section id="vd-mainpage">
              <div class="container-fluid">
                <div id="banner"class="content-panel">
                  <h4 class="admin-header-gray">배너</h4>
                    <div class="banner-item-container">
                      <form class="banner_form" method="POST" action="./admin.php?page=mainpage" enctype="multipart/form-data">
                      <ul class="banner-item-group border-gray">

                        <?php
                          for ($i=1; $i <= 5; $i++) {
                            # code...
                            $t=hexdec( uniqid() );?>
                            <li class="banner-item">
                              <div class="filebox">
                                <input type="input" class="creator_name" name="creators[]" value="" placeholder="크리에이터">
                                <input class="upload-name border-gray" value="" disabled="disabled" placeholder="232*420px">
                                <label for="<?="ex_filename".$t?>">
                                  <span class="glyphicon glyphicon-search text-heavy-gray"></span>
                                </label>
                                <input type="file" name="<?='image'.$i?>" id="<?="ex_filename".$t?>" class="upload-hidden" accept="image/*">
                              </div>
                            </li>

                            <?php
                          }
                         ?>
                      </ul>
                    </form>
                      <!--
                      <div class="banner-item-group banner-item-add border-gray">
                        <div class="operator text-heavy-gray">
                          +
                        </div>
                      </div>
                      -->
                      <ul class="banner-item-group banner-item-template border-gray"
                      style="display:none;">
                      <?php
                        for ($i=0; $i < 5; $i++) {
                          # code...
                          $t=hexdec( uniqid() );?>
                          <li class="banner-item">
                            <div class="filebox">
                              <input type="input" name="name"  value="" placeholder="크리에이터">
                              <input class="upload-name border-gray" value="" disabled="disabled" placeholder="232*420px">
                              <label for="<?="ex_filename".$t?>">
                                <span class="glyphicon glyphicon-search text-heavy-gray"></span>
                              </label>
                              <input type="file" id="<?="ex_filename".$t?>" class="upload-hidden" accept="image/*">
                            </div>
                          </li>

                          <?php
                        }
                       ?>
                      </ul>
                  </div>

                  <!--
                  <div class="pager-container text-center">
                    <button type="button" class="btn-pager btn btn-default" aria-label="Next Page">
                      <span class="glyphicon glyphicon-triangle-left" aria-hidden="false"></span>
                    </button>

                    <button type="button" class="btn-pager btn btn-default" aria-label="Previous Page">
                      <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span>
                    </button>
                  </div>
                -->
                </div>

                <!-- <div id="product" class="content-panel">
                  <h4 class="admin-header-gray">상품</h4>

                  <div class="product-item-container">
                    <ul class="category-list border-gray">
                      <li class="category-item">
                        <input class="category-item-input text-heavy-gray" type="text" name="test" value="BEST SELLER" />
                        <button type="button" name="" class="btn-remove btn btn-default btn-sm"
                        style="display:none;">
                          <span class="text-heavy-gray">&times;</span>
                        </button>
                      </li>
                      <li class="category-item">
                        <input class="category-item-input text-heavy-gray" type="text" name="test" value="NEW" />
                        <button type="button" name="" class="btn-remove btn btn-default btn-sm"
                        style="display:none;">
                            <span class="text-heavy-gray">&times;</span>
                        </button>
                      </li>
                      <li class="category-item-add">
                        <div class="operator text-heavy-gray">
                          +
                        </div>
                      </li>
                      <li class="category-item category-item-template new-category-item" style="display:none">
                        <input class="category-item-input text-heavy-gray border-gray" type="text" name="test" value="" placeholder="새로운 카테고리" />
                        <button type="button" name="" class="btn-remove btn btn-default btn-sm">
                            <span class="text-heavy-gray">&times;</span>
                        </button>
                      </li>
                    </ul>
                    <ul class="new-product-list">
                      <li class="new-product-item">
                        <span class="label text-heavy-gray">상품1</span>
                        <input type="input" name="name" value="" class="text-heavy-gray" placeholder="상품명">
                        <button type="button" name="btn-search" class="btn btn-default btn-sm"
                                data-toggle="modal" data-target="#poduct-detail-modal">
                          <span class="glyphicon glyphicon-search text-heavy-gray"></span>
                        </button>
                      </li>
                      <li class="new-product-item">
                        <span class="label text-heavy-gray">상품2</span>
                        <input type="input" name="name" value="" class="text-heavy-gray" placeholder="상품명">
                        <button type="button" name="btn-search" class="btn btn-default btn-sm"
                                data-toggle="modal" data-target="#poduct-detail-modal">
                          <span class="glyphicon glyphicon-search text-heavy-gray"></span>
                        </button>
                      </li>
                      <li class="new-product-item">
                        <span class="label text-heavy-gray">상품3</span>
                        <input type="input" name="name" value="" class="text-heavy-gray" placeholder="상품명">
                        <button type="button" name="btn-search" class="btn btn-default btn-sm"
                                data-toggle="modal" data-target="#poduct-detail-modal">
                          <span class="glyphicon glyphicon-search text-heavy-gray"></span>
                        </button>
                      </li>
                      <li class="new-product-item">
                        <span class="label text-heavy-gray">상품4</span>
                        <input type="input" name="name" value="" class="text-heavy-gray" placeholder="상품명">
                        <button type="button" name="btn-search" class="btn btn-default btn-sm"
                                data-toggle="modal" data-target="#poduct-detail-modal">
                          <span class="glyphicon glyphicon-search text-heavy-gray"></span>
                        </button>
                      </li>
                      <li class="new-product-item">
                        <span class="label text-heavy-gray">상품5</span>
                        <input type="input" name="name" value="" class="text-heavy-gray" placeholder="상품명">
                        <button type="button" name="btn-search" class="btn btn-default btn-sm"
                                data-toggle="modal" data-target="#poduct-detail-modal">
                          <span class="glyphicon glyphicon-search text-heavy-gray"></span>
                        </button>
                      </li>
                    </ul>
                  </div>
                </div> -->


                <!-- Modal -->
                <div class="modal fade" id="poduct-detail-modal">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <div class="modal-header">
                        <div class="search-input-container">
                          <p class="title text-center text-heavy-gray">
                            상품 검색
                          </p>
                          <div class="search-input-container border-gray">
                            <input class="search-input" type="input" name="name" value="" placeholder="검색어를 입력해주세요.">
                            <button type="button" name="" class="btn-search btn btn-default btn-sm"
                                    data-toggle="modal" data-target="#poduct-detail-modal">
                              <span class="glyphicon glyphicon-search text-heavy-gray"></span>
                            </button>
                          </div>

                        </div>

                      </div>
                      <div class="modal-body">
                        <table class="table product-table table-hover">
                          <tbody>
                            <tr class="product-item">
                              <td >
                                <div class="thumbnail-img">
                                  <img class="product-img" src="images/products/product1.png" alt="" />
                                </div>
                              </td>
                              <td class="title">
                                <p><a>제품명</a></p>
                              </td>
                              <td class="price">2,326,000원</td>
                            </tr>
                            <tr class="product-item">
                              <td >
                                <div class="thumbnail-img">
                                  <img class="product-img" src="images/products/product2.png" alt="" />
                                </div>
                              </td>
                              <td class="title">
                                <p><a>제품명</a></p>
                              </td>
                              <td class="price">2,326,000원</td>
                            </tr>
                            <tr class="product-item">
                              <td >
                                <div class="thumbnail-img">
                                  <img class="product-img" src="images/products/product3.png" alt="" />
                                </div>
                              </td>
                              <td class="title">
                                <p><a>제품명</a></p>
                              </td>
                              <td class="price">2,326,000원</td>
                            </tr>
                            <tr class="product-item">
                              <td >
                                <div class="thumbnail-img">
                                  <img class="product-img" src="images/products/product4.png" alt="" />
                                </div>
                              </td>
                              <td class="title">
                                <p><a>제품명</a></p>
                              </td>
                              <td class="price">2,326,000원</td>
                            </tr>
                            <tr class="product-item">
                              <td >
                                <div class="thumbnail-img">
                                  <img class="product-img" src="images/products/product5.png" alt="" />
                                </div>
                              </td>
                              <td class="title">
                                <p><a>제품명</a></p>
                              </td>
                              <td class="price">2,326,000원</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="modal-footer">
                        <button type="button" name="" class="btn-ok btn btn-peach">완료</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="btn-container">
                  <!--
                  <button type="button" name="" class="btn-preview btn btn-gray">미리보기</button>
                  -->
                  <button type="button" name="" class="btn-submit btn btn-peach">등록</button>
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
    <script src="javascripts/admin/mainpage.js"></script>

</body>
</html>
