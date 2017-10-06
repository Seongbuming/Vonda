<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
    <link rel="stylesheet" href="stylesheets/modal.css" />
    <link rel="stylesheet" href="stylesheets/client/modaltest.css" />
</head>

<body>
    <header>
        <?=$this->loadLayout("header")?>
    </header>

    <div id="contents">
        <p><a href="#modalA">모달 열기</a></p>

        <div id="modalA" class="modal">
            <a class="close_section" href="#close" alt="닫기"></a>
            <div class="modal_body">
            </div>
        </div>
    </div>

    <footer>
        <?=$this->loadLayout("footer")?>
    </footer>
</body>
</html>
