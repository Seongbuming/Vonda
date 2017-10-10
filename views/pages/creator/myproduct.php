<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
    <link rel="stylesheet" href="stylesheets/creator/myproduct.css">
    <link rel="stylesheet" href="stylesheets/board.css">
</head>

<body>
<header>
    <?=$this->loadLayout("header")?>
</header>

<div id="contents">
    <ul class="link_menu">
        <li class="actived"><a href=".?page=myproduct">나의상품</a></li>
        <li><a href=".?page=board">게시판 관리</a></li>
        <li><a href=".?page=profile">프로필 관리</a></li>
        <li><a href=".?page=calculate">정산내역</a></li>
    </ul>

    <div class="chart">
        <!-- home.css chart 클래스 height 쥐어줌 -->
    </div>

    <h3 class="category">총 상품 9개</h3>
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
</div>

<footer>
    <?=$this->loadLayout("footer")?>
</footer>
</body>
</html>
