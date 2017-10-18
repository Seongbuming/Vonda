<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
    <link rel="stylesheet" href="stylesheets/creator/board_write.css"/>
</head>

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
    <input type="text" class="title" placeholder="제목을 입력해주세요.">
    <div class="editor">
        <!-- editor 영역
        http://libcodes.com/codes/wysiwyg-html-editor-bootstrap-based-rich-text-editor
        -->
    </div>
    <div class="write_cont">
        <button class="write"><a href="#">완료</a></button>
    </div>
</div>

<footer>
    <?=$this->loadLayout("footer")?>
</footer>
</body>
</html>
