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

        $response = $request->request('GET', '/creator/'.$creator->id.'/goods');
        $goods = $response->datas;
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
            <img src="http://api.siyeol.com/<?=$creator->cover_image?>" class="creator_profile_bg_img" onerror="this.src='data:img/png;base64, iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mN8/R8AAtsB7JKxzdUAAAAASUVORK5CYII='">
            <img src="http://api.siyeol.com/<?=$creator->profile_image?>" id="profile_location" class="creator_profile_img">

            <p class="creator_profile_name">@<?=$creator->nickname?></p>
            <p class="creator_profile_contents"><?=$creator->introduce?></p>
        </div>
        <ul class="category_menu">
            <li class="actived"><a href=".?page=orderlist">최신순</a></li>
            <li><a href=".?page=orderlist">인기순</a></li>
        </ul>
        <div class="product_section">
            <?php
            foreach ($goods as $item) {
            ?>
                <a class="item overlay_container" href="./?page=product_detail&id=<?=$item->goods->id?>">
                    <img src="http://api.siyeol.com/<?=$item->goods->goods_image?>" alt="상품 이미지 2"/>
                    <div class="overlay">
                        <p class="product_name"><?=$item->goods->title?></p>
                        <p class="product_price"><?=number_format($item->goods->options[0]->price)?>won</p>
                    </div>
                </a>
            <?php
            }
            ?>
        </div>

        <h3 class="category">BOARD</h3>
        <table class="board">
            <tbody>
            <?php
            foreach ($boards as $board) {
            ?>
                <tr class="row_subject">
                    <td class="time"><?=substr($board->created_at, 0, 16)?></td>
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
