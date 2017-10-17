<div class="area_links">
    <ul class="menu menu_left">
        <li><a href=".">공지사항<span class="posts">(2)</span></a></li>
        <li><a href=".">고객센터</a></li>
    </ul>
    <ul class="menu menu_right">
        <?php
        if (isset($_COOKIE['token'])) {
            echo '<li><a href="./?page=login">로그아웃</a></li>';
            echo '<li><a href=".">마이페이지</a></li>';
        } else {
            echo '<li><a href=".?page=login">로그인</a></li>';
        }
        ?>
    </ul>
</div>

<div class="area_logo">
    <div class="logo_wrapper">
        <h1><a href="."><img class="logo" src="images/logo.png" alt="WeMustCreate" /></a></h1>
    </div>
    <div class="area_search">
        <input class="search input_search" type="text" title="검색 입력" />
        <button class="search submit_search" title="검색"></button>
    </div>
</div>
