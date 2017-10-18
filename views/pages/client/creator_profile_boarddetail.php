<!doctype html>
<html lang="ko">
<head>
    <?= $this->loadLayout("head") ?>
    <link rel="stylesheet" href="stylesheets/board.css"/>
    <link rel="stylesheet" href="stylesheets/post.css"/>
    <link rel="stylesheet" href="stylesheets/client/creator_profile.css">
</head>

<body>
    <header>
        <?= $this->loadLayout("header") ?>
    </header>
    <?php
    if (isset($_GET['id'])) {
        $request = new Http();
        $response = $request->request('GET', '/creator/'.$_GET['creator_id'].'/info');

        if ($response->code == 400) {
            // invalid creator
        }

        $creator = $response->data;

        $response = $request->request('GET', '/board/'.$_GET['id']);

        if ($response->code == 400) {
            // invalid creator
        }

        $board = $response->data;

        $response = $request->request('GET', '/board/'.$_GET['id'].'/comment');
        $comments = $response->data;
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

        <h3 class="category">BOARD</h3>
        <div class="profile_detail_board">
            <div class="post">
                <p class="creator_title"><?=$board->subject?><span class="author" style="float:right; padding-right: 10px;"><?=$creator->nickname?></span>
                </p>
                <p class="time"><?=$board->created_at?></p>
                <div class="creator_detail_result">
                    <?=$board->content?>
                </div>
            </div>

            <div class="comment">
                <textarea cols="156" rows="5" placeholder="댓글을 입력하려면 로그인이 필요합니다."></textarea>
                <button class="comment_submit">댓글 등록</button>
            </div>
            <?php
            foreach ($comments as $comment) {
            ?>
                <div class="user_comment">
                    <table class="board">
                        <tbody>
                        <tr class="row_subject">
                            <td class="author"><?=$comment->user->account?></td>
                            <td class="subject">
                            <?=$comment->comment?></td>
                            <td class="time"><?=$comment->created_at?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            <?php
                if ($comment->answer != NULL) {
                    ?>
                    <div class="user_link_comment">
                        <table class="board">
                            <tbody>
                            <tr class="row_subject">
                                <td class="author">ㄴ @<?=$creator->nickname?></td>
                                <td class="subject">
                                    <?=$comment->answer?></td>
                                <td class="time"><?=$comment->updated_at?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php
                }
            }
            ?>

        <div class="pager">
            <button class="left">◀</button>
            <button class="right">▶</button>
        </div>
        <div class="c_line"></div>
        <a class="goback" href=".?page=creator_profile">뒤로가기</a>
    </div>


    <footer>
        <?= $this->loadLayout("footer") ?>
    </footer>
    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="javascripts/creator.js"></script>
</body>
</html>
