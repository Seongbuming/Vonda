<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
    <link rel="stylesheet" href="stylesheets/creator/board.css"/>
</head>
<?php
$request = new Http();

$response = $request->request('GET', '/board?token='.$_COOKIE['token']);
$boards = $response->datas->data;
?>
<body>
<header>
    <?=$this->loadLayout("header")?>
</header>

<div id="contents">
    <ul class="link_menu">
        <li><a href="./creator.php?page=myproduct">나의상품</a></li>
        <li class="actived"><a href="./creator.php?page=board">게시판 관리</a></li>
        <li><a href="./creator.php?page=profile">프로필 관리</a></li>
        <li><a href="./creator.php?page=calculate">정산내역</a></li>
    </ul>

    <h3 class="category">BOARD</h3>
    <table class="board">
        <tbody>
        <?php
        foreach ($boards as $board) {
        ?>
            <tr class="row_subject">
                <td class="time"><?=$board->created_at?></td>
                <td class="subject">
                    <a href="./creator.php?page=board_detail&id=<?=$board->id?>"><?=$board->subject."(".$boart->hits.")"?></a>
                </td>
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
    <div class="write_cont">
        <button class="write"><a href="#">글쓰기</a></button>
    </div>
</div>

<footer>
    <?=$this->loadLayout("footer")?>
    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="javascripts/board.js"></script>
</footer>
</body>
</html>
