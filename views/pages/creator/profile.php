<!doctype html>
<html lang="ko">
<head>
    <?= $this->loadLayout("head") ?>
    <link rel="stylesheet" href="stylesheets/creator_profile.css">
    <link rel="stylesheet" href="stylesheets/creator/profile.css">
</head>

<body>
<header>
    <?= $this->loadLayout("header") ?>
</header>

<div id="contents">
    <ul class="link_menu">
        <li><a href=".?page=myproduct">나의상품</a></li>
        <li><a href=".?page=board">게시판 관리</a></li>
        <li class="actived"><a href=".?page=profile">프로필 관리</a></li>
        <li><a href=".?page=calculate">정산내역</a></li>
    </ul>
    <div class="profile_area"></div>
    <div class="creator_profile">
        <img src="images/creators/creator_background1.png" class="creator_profile_bg_img">
        <img src="images/creators/creator_profile.png" id="profile_location" class="creator_profile_img">
        <div class="bg_size"><p>1150X450</p></div>
        <div class="creator_field">
            <input type="text" class="creator_name" value="@Yeomim"><br>
            <textarea cols="60" rows="4" class="creator_contents">코튼 소재를 베이스로 한 가볍고 부담 없이 사용하기 좋은 가방들을 선보이며 실용성과 함께 스타일리시함도
            추구하는 것이 브랜드 여밈의 모토입니다.</textarea>
        </div>
    </div>


    <div class="submit_cont">
        <button class="submit"><a href="#">완료</a></button>
    </div>
</div>

<footer>
    <?= $this->loadLayout("footer") ?>
</footer>
</body>
</html>
