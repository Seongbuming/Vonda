<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
    <link rel="stylesheet" href="stylesheets/creator/board.css"/>
</head>

<body>
<header>
    <?=$this->loadLayout("header")?>
</header>

<div id="contents">
    <ul class="link_menu">
        <li><a href=".?page=myproduct">나의상품</a></li>
        <li class="actived"><a href=".?page=board">게시판 관리</a></li>
        <li><a href=".?page=profile">프로필 관리</a></li>
        <li><a href=".?page=calculate">정산내역</a></li>
    </ul>

    <h3 class="category">BOARD</h3>
    <table class="board">
        <tbody>

        <tr class="row_subject">
            <td class="time">2017.08.22 13:20</td>
            <td class="subject">
                <a href=".?page=board_detail">선선한 가을 날씨, 가디건 준비하세요(11)</a>
            </td>
        </tr>
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
