<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
    <link rel="stylesheet" href="stylesheets/creator/home.css">
    <link rel="stylesheet" href="stylesheets/board.css">
</head>

<body>
<header>
    <?=$this->loadLayout("header")?>
</header>

<div id="contents">
    <ul class="link_menu">
        <li><a href="./creator.php?page=myproduct">나의상품</a></li>
        <li><a href="./creator.php?page=board">게시판 관리</a></li>
        <li><a href="./creator.php?page=profile">프로필 관리</a></li>
        <li><a href="./creator.php?page=calculate">정산내역</a></li>
    </ul>

    <div class="chart">
        <!-- home.css chart 클래스 height 쥐어줌 -->
    </div>

    <h3 class="category">나의상품&nbsp;<a href="#" class="all">전체보기 &gt;</a></h3>
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

    <h3 class="category">공지사항&nbsp;<a href="#" class="all">전체보기 &gt;</a></h3>
    <table class="board">
        <tbody>

        <tr class="row_subject">
            <td class="time">2017.08.22 13:20</td>
            <td class="subject">
                <a href=".?page=board_detail">선선한 가을 날씨, 가디건 준비하세요(11)</a>
            </td>
        </tr>
        </tbody>
    </table>

</div>

<footer>
    <?=$this->loadLayout("footer")?>
</footer>
</body>
</html>
