<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
	<link rel="stylesheet" href="stylesheets/seller/common.css">
    <link rel="stylesheet" href="stylesheets/client/login.css" />
</head>

<body>
    <header>
        <?=$this->loadLayout("seller/header")?>
    </header>

    <div id="contents">

        <form class="login_form">
            <p class="find"><a href=".?page=findid">아이디</a> / <a href=".?page=findpwd">비밀번호 찾기</a></p>
            
            <input name="id" type="text" placeholder="아이디" required />
            <input name="password" type="password" placeholder="비밀번호" required />
            
            <div class="saveid_section">
                <input id="autoLogin" name="autoLogin" type="checkbox" checked />
                <label for="autoLogin">자동로그인</label>
            </div>

            <input type="submit" value="로그인" />
            
            <a class="signup" href=".?page=seller_regist">회원가입</a>
        </form>
    </div>

    <footer>
        <?=$this->loadLayout("seller/footer")?>
    </footer>
</body>
</html>
