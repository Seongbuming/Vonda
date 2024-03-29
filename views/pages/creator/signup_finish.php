<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
    <!-- <link rel="stylesheet" href="stylesheets/seller/common.css?ver=2"> -->
    <link rel="stylesheet" href="stylesheets/seller/common.css?v=3">
    <link rel="stylesheet" href="stylesheets/client/signup_finish.css" />
</head>

<body>
    <header>
        <?=$this->loadLayout("creator/header")?>
    </header>

    <div id="contents">
        <h2 class="page_title">Join</h2>

        <div class="message_container">
            <p>가입신청이 완료되었습니다.</p>
            <p>관리자의 <span class="pink">가입승인</span>이 완료되면 메일로 결과를 알려드립니다.</p>
            <a href="creator.php">홈</a>
        </div>
    </div>

    <footer>
        <?=$this->loadLayout("creator/footer")?>
    </footer>
</body>
</html>
