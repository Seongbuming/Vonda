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
    <?php
    if (isset($_GET['id'])) {
        $request = new Http();
        $response = $request->request('GET', '/creator/'.$_GET['id'].'/info');

        if ($response->code == 400) {
            // invalid creator
        }

        $creator = $response->data;

        $response = $request->request('GET', '/'.$creator->user_id.'/board');
        $boards = $response->datas->data;
    } else {
        // param error
    }
    ?>

    <div id="contents">
        <!--<div class="icons">
            <a href="."><img src="images/icons/home_sns/instagram-logo.png" alt="Instagram" /></a>
            <a href="."><img src="images/icons/home_sns/facebook-logo.png" alt="Facebook" /></a>
            <a href="."><img src="images/icons/home_sns/twitter-logo.png" alt="Twitter" /></a>
            <a href="."><img src="images/icons/home_sns/youtube-logo.png" alt="Youtube" /></a>
            <a href="."><img src="images/icons/home_sns/AfreecaTV_logo.png" alt="AfreecaTV" /></a>
        </div>-->

        <div class="creator_profile">
            <img src="images/creators/creator_background1.png" class="creator_profile_bg_img">
            <img src="images/creators/creator_profile.png" id="profile_location" class="creator_profile_img">

            <p class="creator_profile_name">@<?=$creator->nickname?></p>
            <p class="creator_profile_contents"><?=$creator->introduce?></p>
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
            <?php
            foreach ($boards as $board) {
            ?>
                <tr class="row_subject">
                    <td class="time"><?=$board->created_at?></td>
                    <td class="subject">
                        <a href=".?page=creator_profile_boarddetail&id=<?=$board->id?>&creator_id=<?=$creator->id?>"><?=$board->subject?></a>
                    </td>
                    <td class="author"><?=$creator->nickname?></td>
                </tr>
            <?php
            }
            ?>

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
