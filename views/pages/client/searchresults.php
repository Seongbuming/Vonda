<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
    <link rel="stylesheet" href="stylesheets/client/searchresults.css" />
</head>

<body>
    <header>
        <?=$this->loadLayout("header")?>
    </header>

    <div id="contents">
        <p class="numresults"><span class="keyword">브라운</span>에 대한 <span class="num">9</span>개의 검색결과</p>

        <h3 class="category">Product</h3>

        <div class="product_section">
            <a class="item overlay_container" href=".">
                <img src="images/products/product1.png" alt="상품 이미지 1" />
                <div class="overlay">
                    <p class="product_name">일본의 국민로퍼</p>
                    <p class="product_price">54,000won</p>
                </div>
            </a>
            <a class="item overlay_container" href=".">
                <img src="images/products/product2.png" alt="상품 이미지 2" />
                <div class="overlay">
                    <p class="product_name">일본의 국민로퍼</p>
                    <p class="product_price">54,000won</p>
                </div>
            </a>
            <a class="item overlay_container" href=".">
                <img src="images/products/product3.png" alt="상품 이미지 3" style="margin-left: 50px;" />
                <div class="overlay">
                    <p class="product_name">일본의 국민로퍼</p>
                    <p class="product_price">54,000won</p>
                </div>
            </a>
            <a class="item overlay_container" href=".">
                <img src="images/products/product4.png" alt="상품 이미지 4" />
                <div class="overlay">
                    <p class="product_name">일본의 국민로퍼</p>
                    <p class="product_price">54,000won</p>
                </div>
            </a>
            <a class="item overlay_container" href=".">
                <img src="images/products/product5.png" alt="상품 이미지 5" />
                <div class="overlay">
                    <p class="product_name">일본의 국민로퍼</p>
                    <p class="product_price">54,000won</p>
                </div>
            </a>
        </div>

        <h3 class="category">Creator</h3>
        
        <div class="creator_section">
            <div class="item">
                <img src="images/creators/creator5.png" alt="크리에이터 이미지 5" />
            </div>
            <div class="item">
                <img src="images/creators/creator6.png" alt="크리에이터 이미지 6" />
            </div>
            <div class="item">
                <img src="images/creators/creator7.png" alt="크리에이터 이미지 7" />
            </div>
            <template class="creator_detail_template">
                <img class="creator_background" src="images/creators/creator_background4.png" alt="크리에이터 배경 이미지" />
                <div class="creator_image">
                    <img src="images/creators/creator2.png" alt="크리에이터 이미지" />
                </div>
                <div class="creator_profile">
                    <p class="creator_name">@ANOTHER A</p>
                    <p class="creator_message">캐쥬얼하고 미니멀한 베이스에 ANOTHER A만의 감성을 더하여 트렌드를 반영함과 동시에 개성 있고 감각적인 룩을 선보입니다. 매 시즌 베이직함을 바탕으로 한 또 다른  디자인들로 다양한 스타일링을 제안합니다.</p>
                    <div class="icons">
                        <a href="."><img src="images/icons/home_sns/instagram-logo.png" alt="Instagram" /></a>
                        <a href="."><img src="images/icons/home_sns/facebook-logo.png" alt="Facebook" /></a>
                        <a href="."><img src="images/icons/home_sns/twitter-logo.png" alt="Twitter" /></a>
                        <a href="."><img src="images/icons/home_sns/youtube-logo.png" alt="Youtube" /></a>
                        <a href="."><img src="images/icons/home_sns/AfreecaTV_logo.png" alt="AfreecaTV" /></a>
                    </div>
                </div>
            </template>
        </div>
    </div>
    
    <footer>
        <?=$this->loadLayout("footer")?>
    </footer>
    
    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="javascripts/creator.js"></script>
</body>
</html>
