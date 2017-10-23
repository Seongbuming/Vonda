<!doctype html>
<html lang="ko">
<head>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <?=$this->loadLayout("head")?>
    <link rel="stylesheet" href="stylesheets/seller/common.css?v=3">
    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
    <link rel="stylesheet" href="stylesheets/creator/board_write.css"/>
</head>

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
    <input type="text" class="title" placeholder="제목을 입력해주세요." required>
    <div class="editor-container" style="width:1155px;margin:auto;">
      <div id="text-editor" class="form-item text-center"
            style="width:100%; height: 350px; border: solid 1px black;">
      </div>
    </div>

    <div class="write_cont">
        <button type="submit" class="write"><a href="#">완료</a></button>
    </div>
</div>

<footer>
    <?=$this->loadLayout("creator/footer")?>

</footer>
<script src="javascripts/admin/text_editor.js"></script>
</body>
</html>
