<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
    <link rel="stylesheet" href="stylesheets/client/home.css" />
    <link rel="stylesheet" href="libraries/jquery.bxslider.min.css" />
</head>
<?php
$request = new Http();
$response = $request->request('GET', '/goods/new');
$new_items = $response->datas;

$response = $request->request('GET', '/creators');
$creators = $response->datas;

$response = $request->request('GET', '/banner/1');
$banners = $response->datas;
?>
<body>
    <header>
        <?=$this->loadLayout("header")?>
    </header>

    <div id="contents">
        <a class="floating" href=".?page=cart">
            <p>CART</p>
            <div class="badge">
                <img class="badge_image" src="images/buttons/shopping-cart.png" alt="CART" />
                <!--<span class="badge_text">2</span>-->
            </div>
        </a>

        <ul class="bxslider">
            <li>
                <?php
                foreach ($banners as $banner) {
                ?>
                    <a class="overlay_container" href="./?page=creator_profile&id=<?=$banner->creator_id?>">
                        <img src="http://api.siyeol.com/<?=$banner->image?>" target="_blank" alt="배너 이미지 1" />
                        <div class="overlay">
                            <p>@<?=$banner->nickname?></p>
                        </div>
                    </a>
                <?php
                }
                ?>
            </li>
        </ul>

        <ul class="category_menu">
            <li class="actived"><a href=".">Best Seller</a></li>
            <li><a href=".">New</a></li>
            <li>&nbsp;</li>
        </ul>
        <div class="product_section">
            <?php
            foreach ($new_items as $item) {
            ?>
                <a class="item overlay_container" href="./?page=product_detail&id=<?=$item->id?>">
                    <img src="http://api.siyeol.com/<?=$item->goods_image?>" alt="상품 이미지" />
                    <div class="overlay">
                        <p class="product_name"><?=$item->title?></p>
                        <p class="product_price"><?=number_format($item->price)?>won</p>
                    </div>
                </a>
            <?php
            }
            ?>
        </div>

        <ul class="category_menu">
            <li class="actived"><a href=".">Creator</a></li>
            <li>&nbsp;</li>
        </ul>
        <div class="creator_section">
            <?php
            foreach ($creators as $creator) {
            ?>
                <div class="item" data-id="<?=$creator->id?>">
                    <img src="http://api.siyeol.com/<?=$creator->profile_image?>" alt="크리에이터 이미지 1" />
                    <div class="info" style="display: none">
                        <img class="creator_background" src="http://api.siyeol.com/<?=$creator->cover_image?>" alt="크리에이터 배경 이미지" onerror="this.src='data:img/png;base64, iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mN8/R8AAtsB7JKxzdUAAAAASUVORK5CYII='" />
                        <div class="creator_image">
                            <img src="http://api.siyeol.com/<?=$creator->profile_image?>" alt="크리에이터 이미지" />
                        </div>
                        <div class="creator_profile">
                            <p class="creator_name"><a href="./?page=creator_profile&id=<?=$creator->id?>">@<?=$creator->nickname?></a></p>
                            <p class="creator_message"><?=$creator->introduce?></p>
                            <div class="icons">
                                <?php
                                foreach ($creator->channels as $channel) {
                                    echo '<a href="'.$channel->link.'"><img src="images/icons/home_sns/'.$channel->channel.'-logo.png" alt="Instagram" /></a>';    
                                }
                                ?>
                            </div>
                        </div>
                    </div>
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
                    <p class="creator_name"><a href="./?page=creator_profile">@ANOTHER A</a></p>
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
    <script src="libraries/jquery.bxslider.min.js"></script>
    <script src="javascripts/client/home.js"></script>
    <script src="javascripts/creator.js"></script>
</body>
</html>
