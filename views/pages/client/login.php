<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
    <link rel="stylesheet" href="stylesheets/client/login.css" />
</head>

<body>
    <header>
        <?=$this->loadLayout("header")?>
    </header>
    <?php
    // 로그아웃
    if (isset($_COOKIE['token'])) {
        setcookie('token', NULL);
        header('Location: ./');
    }
    ?>
    <div id="contents">
        <h2 class="page_title">Login</h2>

        <form class="login_form" action="#" method="POST">
            <p class="find"><a href=".?page=findid">아이디</a> / <a href=".?page=findpwd">비밀번호 찾기</a></p>
            
            <input name="id" type="text" placeholder="아이디" required />
            <input name="password" type="password" placeholder="비밀번호" required />
            
            <div class="saveid_section">
                <input id="saveid" name="saveid" type="checkbox" checked />
                <label for="saveid">아이디 저장</label>
            </div>

            <input type="submit" value="로그인" />
            
            <a class="signup" href=".?page=signup">회원가입</a>
        </form>
    </div>

    <footer>
        <?=$this->loadLayout("footer")?>
    </footer>
    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="javascripts/client/login.js"></script>
</body>
</html>
