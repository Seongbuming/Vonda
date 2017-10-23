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
<?php
if (!isset($_GET['id'])) {
  header('Location:./admin.php?page=member');
}

$request = new Http();
$response = $request->request('GET', '/admin/member/'.$_GET['id'].'/info?token='.$_COOKIE['token']);
$member = $response->data;

$response = $request->request('GET', '/admin/seller/'.$_GET['id'].'/goods?token='.$_COOKIE['token']);
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
            <div class="container-fluid">

              <!-- Nav tabs -->
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link"  href="admin.php?page=member" >CUSTOMER</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active"  href="admin.php?page=member&type=seller" >SELLER</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="admin.php?page=member&type=creator" >CREATOR</a>
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
                      <span class="label-content"><?=substr($member->created_at, 0, 16)?></span>
                    </div>
                    <div class="info-item">
                      <span class="label">아이디</span>
                      <span class="label-content"><?=$member->account?></span>
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
                    <div class="info-item">
                      <span class="label">사업자등록증</span>
                      <span class="label-content">청년스토어_사업자.pdf</span>
                      <a href="http://api.siyeol.com/<?=$member->seller->business_certification?>" target="_blank"><img class="btn-download" src="images/buttons/admin/download.png" alt="download.png" /></a>
                    </div>
                    <div class="info-item">
                      <span class="label">통장사본</span>
                      <span class="label-content">청년스토어_통장사본.pdf</span>
                      <a href="http://api.siyeol.com/<?=$member->seller->account_copy?>" target="_blank"><img class="btn-download" src="images/buttons/admin/download.png" alt="download.png" /></a>
                    </div>
                    <div class="info-item">
                      <span class="label">통신판매업신고증</span>
                      <span class="label-content">청년스토어_통신판매.pdf</span>
                      <a href="http://api.siyeol.com/<?=$member->seller->sell_certification?>" target="_blank"><img class="btn-download" src="images/buttons/admin/download.png" alt="download.png" /></a>
                    </div>
                    <?php
                    if ($member->status == "0"){
                    ?>
                    <div class="btn-container text-center">
                      <button type="button" name="approve-sign-up" class="btn btn-peach" data-user_id="<?=$member->id?>">가입승인</button>
                      <button type="button" name="not-see-again" class="btn btn-gray" data-user_id="<?=$member->id?>">다시 보지않기</button>
                    </div>
                    <?php
                    }
                    ?>
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
                          <th>크리에이터</th>
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
                            <td class="creator"><?=number_format($item->creator_count)?></td>
                            <td class="price"><?=number_format($item->options[0]->price)?>원</td>
                            <td class="count"><?=number_format($item->order_count)?></td>
                            <td class="total"><?=number_format($item->order_price)?>원</td>
                          </tr>
                        <?php
                        }
                        ?>
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
