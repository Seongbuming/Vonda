<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
	<link rel="stylesheet" href="stylesheets/seller/common.css">
    <link rel="stylesheet" href="stylesheets/client/findaccount.css" />
</head>

<body>
    <header>
        <?=$this->loadLayout("seller/header")?>
    </header>

    <div id="contents">

        <div class="findacc_container">
            <p class="alert">가입할 때 입력한 이메일로</p>
            <p class="alert">가입 여부를 확인해드립니다.</p>
            <input class="email" type="email" placeholder="이메일" />
            <button class="submit">확인</button>

            <p class="error message">가입된 아이디를 찾을 수 없습니다.</p>

            <div class="finded">
                <p class="message">가입된 아이디는 <span class="id">hayefuk</span>입니다.</p>
                <a class="login" href=".?page=login">로그인</a>
            </div>
        </div>
    </div>

    <footer>
        <?=$this->loadLayout("seller/footer")?>
    </footer>
</body>
</html>
