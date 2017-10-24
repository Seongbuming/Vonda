<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
    <link rel="stylesheet" href="stylesheets/seller/common.css?v=3">
    <link rel="stylesheet" href="stylesheets/creator/home.css">
    <link rel="stylesheet" href="stylesheets/board.css">
    <link rel="stylesheet" href="stylesheets/admin/chart.css" />
    <link rel="stylesheet" href="stylesheets/seller/common.css?v=3">
</head>
<?php
  $request = new Http();

  $response = $request->request('GET', '/creator/board/list?token='.$_COOKIE['token']);
  $boards = $response->datas->data;
?>
<body>
<header>
    <?=$this->loadLayout("creator/header")?>
</header>

<div id="contents">
    <ul class="link_menu marginBottom50">
        <li><a href="./creator.php?page=myproduct">나의상품</a></li>
        <li><a href="./creator.php?page=board">게시판 관리</a></li>
        <li><a href="./creator.php?page=profile">프로필 관리</a></li>
        <li><a href="./creator.php?page=calculate">정산내역</a></li>
    </ul>

    <div class="btn-custom-group" role="group" >
      <button type="button" class="btn btn-sm btn-default">일간</button>
      <button type="button" class="btn btn-sm btn-default">주간</button>
      <button type="button" class="btn btn-sm btn-default">월간</button>
    </div>
    <div class="chart-container" style="width:900px;">
      <canvas id="sales-chart" width="100%"></canvas>
    </div>

    <ul class="chart-label ">
      <li style="color:#52CC5D"><i style="color:#52CC5D;"class="glyphicon glyphicon-stop"></i><span class="chart-item-label">총 매출</span><span class="chart-item-value">9,069,000원</span></li>
      <li style="color:black"><i class="glyphicon glyphicon-stop"></i><span class="chart-item-label">총 주문건수</span><span class="chart-item-value">222건</span></li>
      <li style="color:black"><i class="glyphicon glyphicon-stop"></i><span class="chart-item-label">현재 등록된 상품</span><span class="chart-item-value">9개</span></li>
    </ul>

    <h3 class="category">나의상품&nbsp;<a href="./creator.php?page=myproduct" class="all">전체보기 &gt;</a></h3>
    <table class="order_list">
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
            <td class="" rowspan="2">
                1
            </td>

            <td class="product">
                <div class="product_img">
                    <img src="images/products/product3.png" alt="상품사진" />
                </div>
                <div class="product_info">
                    <p class="open product_detail">SINGLE-BREASTED OVERSIZED BLAZER</p>
                    <p>옵션: <span class="option">실버</span></p>
                </div>
            </td>
            <td class="seller">
                <p>kikiki</p>
            </td>
            <td class="product_price">
                <p>26,000원</p>
            </td>
            <td class="num_of_sales">
                <p>56</p>
            </td>
            <td class="sales_price">
                <p>2,326,000원</p>
            </td>
        </tr>
        </tbody>
    </table>

    <h3 class="category">공지사항&nbsp;<a href="./creator.php?page=board" class="all">전체보기 &gt;</a></h3>
    <table class="board">
        <tbody>

          <?php
          // 보일 게시물의 수
          $i = 5;
          foreach ($boards as $board) {
            if(--$i < 0)
              break;
          ?>
              <tr class="row_subject">
                  <td class="time"><?=substr($board->created_at, 0, 16)?></td>
                  <td class="subject">
                      <a href=<?="./creator.php?page=board_detail&id=".$board->id?>>
                        <?=$board->subject." (".$board->hit.")"?>
                      </a>
                  </td>
              </tr>
          <?php
          }
          ?>
        </tbody>
    </table>

</div>

<footer>
    <?=$this->loadLayout("creator/footer")?>
</footer>

 <script src="libraries/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js"></script>
<script src="javascripts/admin/stati_chart.js"></script>
</body>
</html>
