<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
	<link rel="stylesheet" href="stylesheets/seller/common.css">
    <link rel="stylesheet" href="stylesheets/client/signup.css" />
</head>

<body>
    <header>
        <?=$this->loadLayout("seller/header")?>
    </header>

    <div id="contents">
		<form class="signup_form">
			<h3 class="category">비밀번호 변경</h3>      
            <div class="row">
                <label for="password">새 비밀번호</label>
                <input id="password" name="password" type="password" class="password"   />               
            </div>
            <div class="row">
                <label for="password_chk">새 비밀번호 확인</label>
                <input id="password_chk" name="password_chk" type="password" class="password"  />                
            </div>
			<h3 class="category">내 정보 수정</h3>       
            <div class="row">
                <label for="name">이름</label>
                <input id="name" name="name" type="text" class="text" required />
            </div>
            <div class="row pnumber">
                <label for="pnumber">연락처</label>
                <input id="pnumber" name="pnumber_1" type="tel" class="tel" required />
                <span>-</span>
                <input name="pnumber_2" type="tel" class="tel" required />
                <span>-</span>
                <input name="pnumber_3" type="tel" class="tel" required />
            </div>
			<div class="row">
                <label for="email">이메일</label>
                <input id="email" name="email" type="email" class="email" required />
            </div>
            <h3 class="category">구비서류</h3> 
			<div class="row">
                <label for="businessRegist">사업자등록증</label>
                <input id="businessRegist" name="BusinessRegist" type="file" class="file" required />
            </div>
			<div class="row">
                <label for="bankBook">통장사본</label>
                <input id="bankBook" name="BankBook" type="file" class="file" required />
            </div>
			<div class="row">
                <label for="mailOrder">통신판매업신고증</label>
                <input id="mailOrder" name="MailOrder business" type="file" class="file" required />
            </div>
            

            <div class="button_container">
                <a class="goback" href=".?page=login">취소</a>
                <input class="submit" type="submit" value="확인" />
            </div>
        </form>
    </div>

    <footer>
        <?=$this->loadLayout("seller/footer")?>
    </footer>
</body>
</html>
