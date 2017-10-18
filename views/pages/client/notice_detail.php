<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
    <link rel="stylesheet" href="stylesheets/post.css" />
</head>
<?php
    if (isset($_GET['id'])) {
        $request = new Http();

        $response = $request->request('GET', '/board/'.$_GET['id']);

        if ($response->code == 400) {
            // invalid creator
        }

        $board = $response->data;
    } else {
        // param error
    }
    ?>
<body>
    <header>
        <?=$this->loadLayout("header")?>
    </header>

    <div id="contents">
        <h2 class="page_title">Notice</h2>

        <div class="post">
            <p class="title"><?=$board->subject?></p>
            <p class="time"><?=$board->created_at?></p>
            <div class="result">
                <?=$board->content?>
            </div>
            <a class="goback" href=".?page=notice">뒤로가기</a>
        </div>
    </div>

    <footer>
        <?=$this->loadLayout("footer")?>
    </footer>
</body>
</html>
