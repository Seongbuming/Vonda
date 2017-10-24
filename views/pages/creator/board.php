<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
    <link rel="stylesheet" href="stylesheets/seller/common.css?v=3">
    <link rel="stylesheet" href="stylesheets/creator/board.css"/>
</head>
<?php
$request = new Http();

$response = $request->request('GET', '/creator/board/list?token='.$_COOKIE['token']);
$boards = $response->datas->data;

$pager = $response->datas;
?>
<body>
<header>
    <?=$this->loadLayout("creator/header")?>
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
                <td class="time"><?=substr($board->created_at, 0, 16)?></td>
                <td class="subject">
                    <a href=<?="./creator.php?page=board_detail&id=".$board->id?>>
                      <?=$board->subject." (".$board->hit.")"?>
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>


    <div class="pager">
        <?php
            if($pager->current_page =! $pager->last_page){
              ?>
          <button class="left">◀</button>
          <button class="right">▶</button>
          <?php
        }
        ?>
    </div>

    <div style="text-align:right">
      <a href="creator.php?page=boardwrite" class="write" style="padding:10px 53px;">글쓰기</a>
    </div>
</div>

<footer>
    <?=$this->loadLayout("creator/footer")?>
    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="javascripts/board.js"></script>
</footer>
</body>
</html>
