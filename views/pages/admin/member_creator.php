<!doctype html>
<html lang="ko">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?=$this->loadLayout("head")?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="stylesheets/admin/common.css" />
    <link rel="stylesheet" href="stylesheets/admin/table_product.css" media="screen" title="no title">
    <link rel="stylesheet" href="stylesheets/admin/member_detail.css" />

</head>
<?php
if (!isset($_GET['id'])) {
  header('Location:./admin.php?page=member');
}

$request = new Http();
$response = $request->request('GET', '/admin/member/'.$_GET['id'].'/info?token='.$_COOKIE['token']);

$member = $response->data;
$goods = $response->data->static->data;
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

              <!-- Nav tabs -->
              <ul class="nav" >
                <li class="nav-item">
                  <a class="nav-link"  href="admin.php?page=member" >CUSTOMER</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link "  href="admin.php?page=member&type=seller" >SELLER</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="admin.php?page=member&type=creator" >CREATOR</a>
                </li>
              </ul><!--/# Nav tabs -->

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="creator" role="tabpanel">
                  <div class="info">
                    <div class="info-item">
                      <span class="label">가입일자</span>
                      <span class="label-content"><?=substr($member->created_at, 0, 16)?></span>
                    </div>
                    <div class="info-item">
                      <span class="label">아이디</span>
                      <span class="label-content"><?=$member->account?></span>
                      <!-- <a href="#" class="text-peach btn-profile">프로필 보기</a> -->
                    </div>
                    <div class="info-item">
                      <span class="label">이름</span>
                      <span class="label-content"><?=$member->name?></span>
                    </div>
                    <div class="info-item">
                      <span class="label">연락처</span>
                      <span class="label-content"><?=$member->phone?></span>
                    </div>
                    <div class="info-item">
                      <span class="label">이메일</span>
                      <span class="label-content"><?=$member->email?></span>
                    </div>
                    <div class="btn-container text-center" style="<?=$member->status == '0' ? 'display:block;' : 'display:none;'?>">
                      <button type="button" name="approve-sign-up" class="btn btn-peach" data-user_id="<?=$member->id?>">가입승인</button>
                      <button type="button" name="not-see-again" class="btn btn-gray" data-user_id="<?=$member->id?>">다시 보지않기</button>
                    </div>
                  </div>

                  <div class="product-list" style="<?=$member->status == '0' || $member->status == '2' ? 'display:none;' : 'display:block;'?>">
                    <h4 class="number-of-product">
                      총 상품 <?=sizeof($goods)?>개
                    </h4>
                    <table class="table table-hover product-list-table">
                      <thead>
                        <tr>
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
                            <td>
                              <div class="thumbnail-img">
                                <img class="product-img" src="http://api.siyeol.com/<?=$item->goods_image?>" alt="" />
                              </div>
                            </td>
                            <td class="title">
                              <p><a href="#"><?=$item->title?></a></p>
                            </td>
                            <td class="seller"><?=$item->seller_account?></td>
                            <td class="price"><?=number_format($item->total_price / $item->total_ea)?>원</td>
                            <td class="count"><?=number_format($item->total_ea)?></td>
                            <td class="total"><?=number_format($item->total_price)?>원</td>
                          </tr>
                        <?php 
                        }
                        ?>
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
