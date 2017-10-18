<!doctype html>
<html lang="ko">
<head>
    <?= $this->loadLayout("head") ?>
    <link rel="stylesheet" href="stylesheets/creator/profile2.css">
</head>
<?php
$request = new Http();
$response = $request->request('GET', '/creator/info?token='.$_COOKIE['token']);

$creator = $response->data;
?>
<body>
<header>
    <?= $this->loadLayout("header") ?>
</header>

<div id="contents">
    <ul class="link_menu">
        <li><a href="./creator.php?page=myproduct">나의상품</a></li>
        <li><a href="./creator.php?page=board">게시판 관리</a></li>
        <li class="actived"><a href="./creator.php?page=profile">프로필 관리</a></li>
        <li><a href="./creator.php?page=calculate">정산내역</a></li>
    </ul>
    <div class="profile_area"></div>
    <div class="creator_profile">
        <img src="images/creators/creator_background1.png" class="creator_profile_bg_img">
        <img src="images/creators/creator_profile.png" id="profile_location" class="creator_profile_img">
        <!-- 
        <img src="http://api.siyeol.com/<?=$creator->cover_image?>" class="creator_profile_bg_img">
        <img src="http://api.siyeol.com/<?=$creator->background_image?>" id="profile_location" class="
        -->
      <div class="bg_size"><p>1150X450</p></div>
        <div class="creator_field">
            <input type="text" class="creator_name" value="@<?=$creator->nickname?>"><br>
            <textarea cols="60" rows="4" class="creator_contents"><?=$creator->introduce?></textarea>
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
