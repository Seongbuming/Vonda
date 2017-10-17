<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
    <link rel="stylesheet" href="stylesheets/client/searchresults.css" />
</head>
<?php

if (isset($_GET['keyword'])) {
    $request = new Http();
    $response = $request->request('GET', 'http://api.siyeol.com/search?query='.$_GET['keyword']);
    $goods_result = $response->datas;

    $response = $request->request('GET', 'http://api.siyeol.com/creator/search?query='.$_GET['keyword']);
    $creator_result = $response->datas;
}

?>
<body>
    <header>
        <?=$this->loadLayout("header")?>
    </header>

    <div id="contents">
        <p class="numresults"><span class="keyword"><?=$_GET['keyword']?></span>에 대한 <span class="num"><?=sizeof($goods_result) + sizeof($creator_result)?></span>개의 검색결과</p>

        <h3 class="category">Product</h3>

        <div class="product_section">
            <?php
            foreach ($goods_result as $goods) {
            ?>
                <a class="item overlay_container" href="./?page=product_detail&id=<?=$goods->id?>">
                    <img src="http://api.siyeol.com/<?=$goods->goods_image?>" alt="상품 이미지 1" />
                    <div class="overlay">
                        <p class="product_name"><?=$goods->title?></p>
                        <p class="product_price"><?=number_format($goods->options[0]->price)?>won</p>
                    </div>
                </a>
            <?php
            }
            ?>
        </div>

        <h3 class="category">Creator</h3>
        
        <div class="creator_section">
            <?php
            foreach ($creator_result as $creator) {
            ?>
                <div class="item">
                    <img src="http://api.siyeol.com/<?=$creator->profile_image?>" alt="크리에이터 이미지" />
                    <!-- Hidden -->
                    <div class="info" style="display: none;">
                        <img class="creator_background" src="http://api.siyeol.com/<?=$creator->cover_image?>" alt="크리에이터 배경 이미지" />
                        <div class="creator_image">
                            <img src="http://api.siyeol.com/<?=$creator->profile_image?>" alt="크리에이터 이미지" />
                        </div>
                        <div class="creator_profile">
                            <p class="creator_name">@<?=$creator->nickname?></p>
                            <p class="creator_message"><?=$creator->introduce?></p>
                            <div class="icons">
                                <?php
                                foreach ($creator->channels as $channel) {
                                    if ($channel->isVisible == "1") {
                                        echo '<a href="'.$channel->link.'"><img src="images/icons/home_sns/'.$channel->channel.'-logo.png" alt="Instagram" /></a>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- Hidden End -->
                </div>
            <?php
            }
            ?>
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
