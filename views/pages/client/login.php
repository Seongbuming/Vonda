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

    <div id="contents">
        <h2 class="page_title">Login</h2>

        <form class="login_form">
            <p class="find"><a href=".?page=findid">아이디</a> / <a href=".?page=findpwd">비밀번호 찾기</a></p>
            
            <input name="id" type="text" placeholder="아이디" required />
            <input name="password" type="password" placeholder="비밀번호" required />
            
            <div class="saveid_section">
                <input id="saveid" name="saveid" type="checkbox" />
                <label for="saveid">아이디 저장</label>
            </div>

            <input type="submit" value="로그인" />
            
            <a class="signin" href=".?page=signin">회원가입</a>
        </form>
    </div>

    <footer>
        <?=$this->loadLayout("footer")?>
    </footer>
</body>
</html>
