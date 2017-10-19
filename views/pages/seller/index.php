<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
	<link rel="stylesheet" href="stylesheets/seller/common.css?v=2">
	<link rel="stylesheet" href="stylesheets/seller/board.css">
	<link rel="stylesheet" href="stylesheets/client/product_detail.css"/>
	<link rel="stylesheet" href="stylesheets/board.css"/>
	<link rel="stylesheet" href="stylesheets/modal.css"/>
	<link rel="stylesheet" href="stylesheets/client/orderlist.css" />
  <link rel="stylesheet" href="stylesheets/seller/home.css">
  <link rel="stylesheet" href="stylesheets/admin/chart.css" />
  <link rel="stylesheet" href="stylesheets/admin/table_product.css">
</head>

<body>
    <header>
        <?=$this->loadLayout("seller/header")?>
    </header>

    <div id="contents">
      <div class="btn-custom-group marginTop50" role="group" >
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
        <li style="color:black"><i class="glyphicon glyphicon-stop"></i><span class="chart-item-label">현재 크리에이터</span><span class="chart-item-value">11명</span></li>
      </ul>
		<div class="creatorCnt">나의 상품<a href="./seller.php?page=seller_myproduct_list" class="allView">전체보기</a></div>
		<table id="product-table"class="order_list productTable noneMargin pd10">
        <thead>
          <tr>
          <th colspan="2">상품명</th>
          <th>크리에이터</th>
          <th>상품가격</th>
          <th>판매수</th>
          <th>판매금액</th>
          </tr>
        </thead>
            <tbody>
                <tr>
                    <td class="seller_num">
                         <p class="num">1</p>
                    </td>
                    <td class="product">
                        <div class="product_img">
                            <img src="images/products/product1.png" alt="상품사진" />
                        </div>
                        <div class="product_info">
                            <p class="open product_detail">SINGLE-BREASTED OVERSIZED BLAZER</p>
                            <p>옵션: <span class="option">실버</span></p>
                            <p>재고 : 211 - 실버(11), 골드(200) <span class="amount">1</span></p>
                        </div>
                    </td>
					<td class="order_creator">
                        <p>4</p>
                    </td>
                    <td class="order_price">
                        <p>28,500원</p>
                    </td>
                    <td class="order_cnt">
                        <p class="status_text">96</p>
                    </td>
                    <td class="order_totalPrice">
                        <p>1,028,500원</p>
                    </td>
                </tr>
				<tr>
                     <td class="seller_num">
                         <p class="num">2</p>
                    </td>
                    <td class="product">
                        <div class="product_img">
                            <img src="images/products/product2.png" alt="상품사진" />
                        </div>
                        <div class="product_info">
                            <p class="open product_detail">로얄 크루</p>
                            <p>옵션: <span class="option">마르살라</span></p>
                            <p>수량: <span class="amount">1</span></p>
                        </div>
                    </td>
					<td class="order_creator">
                        <p>5</p>
                    </td>
                   <td class="order_price">
                        <p>23,500원</p>
                    </td>
                    <td class="order_cnt">
                        <p class="status_text">46</p>
                    </td>
                    <td class="order_totalPrice">
                        <p>328,500원</p>
                    </td>
                </tr>
            </tbody>
        </table>
		<div class="creatorCnt">크리에이터<a href="./seller.php?page=seller_creator" class="allView">전체보기</a></div>
		<table id="creator-table"class="order_list productTable noneMargin pd10">
      <thead>
          <tr>
              <th colspan="2">크리에이터</th>
					    <th>판매수</th>
              <th>판매금액</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                  <td class="seller_num">
                       <p class="num">1</p>
                  </td>
                  <td class="product">
                      <div class="product_img">
                          <img src="images/creators/creator1.png" alt="상품사진" style="height:100%;"/>
                      </div>
                      <div class="product_info">
                          <p class="open product_detail">@ANOTHER A</p>
                      </div>
                  </td>
                  <td class="order_cnt">
                      <p class="status_text">96</p>
                  </td>
                  <td class="order_totalPrice">
                      <p>1,028,500원</p>
                  </td>
                </tr>
				        <tr>
                  <td class="seller_num">
                       <p class="num">2</p>
                  </td>
                  <td class="product">
                      <div class="product_img">
                          <img src="images/creators/creator2.png" alt="상품사진" style="height:100%;"/>
                      </div>
                      <div class="product_info">
                          <p class="open product_detail">@replay</p>
                      </div>
                  </td>
                  <td class="order_cnt">
                      <p class="status_text">46</p>
                  </td>
                  <td class="order_totalPrice">
                      <p>328,500원</p>
                  </td>
                </tr>
            </tbody>
        </table>

        <div class="creatorCnt">공지사항<a href="./seller.php?page=seller_notice" class="allView">전체보기</a></div>

            <table id="notice-table" class="board productTable noneMargin pd10">
                <tbody>
                    <tr class="row_subject">
                        <td class="time">2017.08.22 13:20</td>
                        <td class="subject">
                            <a href=".?page=notice_detail">선선한 가을 날씨, 가디건 준비하세요(11)</a>
                        </td>
                    </tr>
                    <tr class="row_subject">
                        <td class="time">2017.08.21 13:20</td>
                        <td class="subject">
                            <a href=".?page=notice_detail">이제 이불 덮고 자요, 그러다 감기 걸려요 새 계절, 새 잠옷(25)</a>
                        </td>
                    </tr>
                    <tr class="row_subject">
                        <td class="time">2017.08.19 13:20</td>
                        <td class="subject">
                            <a href=".?page=notice_detail">간절기를 위한 가벼운 아우터(99)</a>
                        </td>
                    </tr>
                    <tr class="row_subject">
                        <td class="time">2017.08.18 13:20</td>
                        <td class="subject">
                            <a href=".?page=notice_detail">[ 안경展 ] 9 브랜드 최대 30% 할인(105)</a>
                        </td>
                    </tr>
                    <tr class="row_subject">
                        <td class="time">2017.08.17 13:20</td>
                        <td class="subject">
                            <a href=".?page=notice_detail">손목 위의 시간, 시계 기획전 최대 30% 할인(877)</a>
                        </td>
                    </tr>
                    <tr class="row_subject">
                        <td class="time">2017.08.22 13:20</td>
                        <td class="subject">
                            <a href=".?page=notice_detail">선선한 가을 날씨, 가디건 준비하세요(11)</a>
                        </td>
                    </tr>
                    <tr class="row_subject">
                        <td class="time">2017.08.21 13:20</td>
                        <td class="subject">
                            <a href=".?page=notice_detail">이제 이불 덮고 자요, 그러다 감기 걸려요 새 계절, 새 잠옷(25)</a>
                        </td>
                    </tr>
                    <tr class="row_subject">
                        <td class="time">2017.08.19 13:20</td>
                        <td class="subject">
                            <a href=".?page=notice_detail">간절기를 위한 가벼운 아우터(99)</a>
                        </td>
                    </tr>
                    <tr class="row_subject">
                        <td class="time">2017.08.18 13:20</td>
                        <td class="subject">
                            <a href=".?page=notice_detail">[ 안경展 ] 9 브랜드 최대 30% 할인(105)</a>
                        </td>
                    </tr>
                    <tr class="row_subject">
                        <td class="time">2017.08.17 13:20</td>
                        <td class="subject">
                            <a href=".?page=notice_detail">손목 위의 시간, 시계 기획전 최대 30% 할인(877)</a>
                        </td>
                    </tr>
                </tbody>
            </table>

    </div>

    <footer>
        <?=$this->loadLayout("seller/footer")?>
    </footer>
	   <script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="javascripts/board.js"></script>
    <script src="javascripts/modal.js"></script>
    <script src="javascripts/client/product_detail.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js"></script>
    <script src="javascripts/admin/stati_chart.js"></script>
</body>
</html>
