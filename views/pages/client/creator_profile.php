<!doctype html>
<html lang="ko">
<head>
    <?= $this->loadLayout("head") ?>
    <link rel="stylesheet" href="stylesheets/board.css"/>
    <link rel="stylesheet" href="stylesheets/client/creator_profile.css">
</head>

<body>
<header>
    <?= $this->loadLayout("header") ?>
</header>
<!--
<div class="icons">
                        <a href="."><img src="images/icons/home_sns/instagram-logo.png" alt="Instagram" /></a>
                        <a href="."><img src="images/icons/home_sns/facebook-logo.png" alt="Facebook" /></a>
                        <a href="."><img src="images/icons/home_sns/twitter-logo.png" alt="Twitter" /></a>
                        <a href="."><img src="images/icons/home_sns/youtube-logo.png" alt="Youtube" /></a>
                        <a href="."><img src="images/icons/home_sns/AfreecaTV_logo.png" alt="AfreecaTV" /></a>
                    </div>
                    -->
<div id="contents">
    <div class="creator_profile">
        <img src="images/creators/creator_background1.png" class="creator_profile_bg_img">
        <img src="images/creators/creator_profile.png" id="profile_location" class="creator_profile_img">

        <p class="creator_profile_name">@Yeomim</p>
        <p class="creator_profile_contents">코튼 소재를 베이스로 한 가볍고 부담 없이 사용하기<br>좋은 가방들을 선보이며 실용성과 함께 스타일리시함도<br>
            추구하는 것이 브랜드 여밈의 모토입니다.</p>
    </div>
    <ul class="category_menu">
        <li class="actived"><a href=".?page=orderlist">최신순</a></li>
        <li><a href=".?page=cancellist">인기순</a></li>
    </ul>
    <div class="product_section">
        <a class="item overlay_container" href=".">
            <img src="images/products/product2.png" alt="상품 이미지 2"/>
            <div class="overlay">
                <p class="product_name">일본의 국민로퍼</p>
                <p class="product_price">54,000won</p>
            </div>
        </a>
        <a class="item overlay_container" href=".">
            <img src="images/products/product2.png" alt="상품 이미지 2"/>
            <div class="overlay">
                <p class="product_name">일본의 국민로퍼</p>
                <p class="product_price">54,000won</p>
            </div>
        </a>
        <a class="item overlay_container" href=".">
            <img src="images/products/product2.png" alt="상품 이미지 2"/>
            <div class="overlay">
                <p class="product_name">일본의 국민로퍼</p>
                <p class="product_price">54,000won</p>
            </div>
        </a>
        <a class="item overlay_container" href=".">
            <img src="images/products/product2.png" alt="상품 이미지 2"/>
            <div class="overlay">
                <p class="product_name">일본의 국민로퍼</p>
                <p class="product_price">54,000won</p>
            </div>
        </a>
        <a class="item overlay_container" href=".">
            <img src="images/products/product2.png" alt="상품 이미지 2"/>
            <div class="overlay">
                <p class="product_name">일본의 국민로퍼</p>
                <p class="product_price">54,000won</p>
            </div>
        </a>
        <a class="item overlay_container" href=".">
            <img src="images/products/product2.png" alt="상품 이미지 2"/>
            <div class="overlay">
                <p class="product_name">일본의 국민로퍼</p>
                <p class="product_price">54,000won</p>
            </div>
        </a>
    </div>

    <h3 class="category">BOARD</h3>
    <table class="board">
        <tbody>

        <tr class="row_subject">
            <td class="time">2017.08.22 13:20</td>
            <td class="subject">
                <a href=".?page=creator_profile_boarddetail">선선한 가을 날씨, 가디건 준비하세요(11)</a>
            </td>
            <td class="author">Yeomim</td>
        </tr>

        </tbody>
    </table>

    <div class="pager">
        <button class="left">◀</button>
        <button class="right">▶</button>
    </div>

</div>


<footer>
    <?= $this->loadLayout("footer") ?>
</footer>
</body>
</html>
