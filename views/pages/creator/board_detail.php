<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
    <link rel="stylesheet" href="stylesheets/seller/common.css?v=3">
    <link rel="stylesheet" href="stylesheets/board.css"/>
    <link rel="stylesheet" href="stylesheets/post.css"/>
    <link rel="stylesheet" href="stylesheets/creator/board_detail.css">
</head>
<?php
error_reporting(E_ALL);

ini_set("display_errors", 1);

if (isset($_GET['id'])) {
    $request = new Http();
    $response = $request->request('GET', '/board/'.$_GET['id']);

    $board = $response->data;

    $response = $request->request('GET', '/board/'.$_GET['id'].'/comment');
    $comments = $response->data->data;
    $pager = $response->data;
} else {
    // Param Error
}
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
    <div class="profile_detail_board">
        <div class="post">
            <p class="creator_title"><?=$board->subject?><span class="author" style="float:right; padding-right: 10px;"><?=$board->nickname?></span>
            </p>
            <p class="time"><?=substr($board->created_at, 0, 16)?></p>
            <div class="creator_detail_result">
                <?=$board->content?>
            </div>
        </div>

        <div class="comment">
            <textarea cols="154" rows="5" placeholder="댓글을 입력하려면 로그인이 필요합니다."></textarea>
            <button class="comment_submit">댓글 등록</button>
        </div>

        <div id="refresh-data">
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
                              <td class="time"><?=substr($comment->created_at, 0, 16)?></td>
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
                                  <td class="author">ㄴ @<?=$board->nickname?></td>
                                  <td class="subject">
                                      <?=$comment->answer?></td>
                                  <td class="time"><?=substr($comment->updated_at, 0, 16)?></td>
                              </tr>
                              </tbody>
                          </table>
                      </div>
                      <?php
                  }
              }
              ?>
        </div>
            <div class="pager">
              <input type="hidden" name="name" class="prev-page-url" value="<?=$pager->prev_page_url?>">
              <input type="hidden" name="name" class="next-page-url" value="<?=$pager->next_page_url?>">
                <?php
                    if($pager->prev_page_url != null){
                      ?>
                      <button class="left">◀</button>
                  <?php
                }else{?>
                  <button class="left" style="display:none">◀</button>
                  <?php
                }
                ?>

                <?php
                    if($pager->next_page_url != null){
                      ?>
                      <button class="right">▶</button>
                      <?php
                    }else{?>
                      <button class="right" style="display:none">▶</button>
                      <?php
                    }
                    ?>
            </div>
    <div class="c_line"></div>
    <a class="goback" href=".?page=board">뒤로가기</a>
</div>

<footer>
    <?=$this->loadLayout("creator/footer")?>
    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="javascripts/comment.js"></script>
</footer>

</body>
</html>
