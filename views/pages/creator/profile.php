<!doctype html>
<html lang="ko">
<head>
    <?= $this->loadLayout("head") ?>
    <link rel="stylesheet" href="stylesheets/seller/common.css?v=3">
    <link rel="stylesheet" href="stylesheets/creator/profile2.css">
</head>
<?php
$request = new Http();
$response = $request->request('GET', '/creator/info?token='.$_COOKIE['token']);

$creator = $response->data;
?>
<body>
<header>
    <?= $this->loadLayout("creator/header") ?>
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
        <img src="http://api.siyeol.com/<?=$creator->cover_image?>" class="creator_profile_bg_img">
        <div class="creator_profile_img_container">
          <img src="http://api.siyeol.com/<?=$creator->profile_image?>" id="profile_location" class="creator_profile_img">

          <div class="filebox-profile">
            <label for="creator-profile-upload">
              <img src="images/icons/camera_white.png" alt="" />
            </label>
            <input type="file" id="creator-profile-upload" class="upload-hidden" accept="image/*">
          </div>
        </div>

      <div class="bg_size">
        <div class="filebox" style="padding: 6px 5px;">
          <label for="creator-bg-upload">
            <img src="images/icons/camera_white.png" alt="" />
          </label>
          <input type="file" id="creator-bg-upload" class="upload-hidden" accept="image/*">
          <label for="creator-bg-upload">1150X450</label>
        </div>
      </div>

      <div class="creator_field">


        <input type="text" class="creator_name" value="@<?=$creator->nickname?>"><br>
        <textarea cols="60" rows="4" class="creator_contents"><?=$creator->introduce?></textarea>
        <ul class="creator_sns">
            <?php
              $sns_str = array("Instagram","Facebook","Twitter","Youtube","Afreeca","Twitch","Kakao","NaverBlog");
              for ($i=0; $i < 8 ; $i++) {
                $is_matched = false;
                ?>
                <li class="sns-item">
                <?php
                foreach ($creator->channels as $item) {
                  $is_matched = strtoupper($item->channel) == strtoupper($sns_str[$i]) ? true : false;

                  if($is_matched){

                    if($item->isVisible == '1'){
                      ?>

                      <input id="<?="select_".$i?>" class="item-checkbox" type="checkbox" title="선택" checked>
                      <label for="<?="select_".$i?>"></label>
                      <img src="<?= "images/icons/creator_profile/". $sns_str[$i] .".png" ?>" alt="<?= $sns_str[$i]?>" />
                      <label for="<?= "input_". $sns_str[$i] ?>" class="input-label" style="color:black;"> <?=$sns_str[$i] ?></label>
                      <input id="<?= "input_". $sns_str[$i] ?>" class="item-url" type="text" name="name" value="<?=$item->link?>" disabled="false" placeholder="url을 입력해주세요.">

                    <?php
                    }else{
                      ?>
                    <input id="<?="select_".$i?>" class="item-checkbox" type="checkbox" title="선택">
                    <label for="<?="select_".$i?>"></label>
                    <img src="<?= "images/icons/creator_profile/". $sns_str[$i] ."30.png" ?>" alt="<?= $sns_str[$i]?>" />
                    <label for="<?= "input_". $sns_str[$i] ?>" class="input-label"> <?=$sns_str[$i] ?></label>
                    <input id="<?= "input_". $sns_str[$i] ?>" class="item-url" type="text" name="name" value="<?=$item->link?>" disabled="true" placeholder="url을 입력해주세요.">
                    <?php
                    }
                    break;
                  }
                }

                if($is_matched){
                  continue;
                }
                ?>
                <input id="<?="select_".$i?>" class="item-checkbox" type="checkbox" title="선택">
                <label for="<?="select_".$i?>"></label>
                <img src="<?= "images/icons/creator_profile/". $sns_str[$i] ."30.png" ?>" alt="<?= $sns_str[$i]?>" />
                <label for="<?= "input_". $sns_str[$i] ?>" class="input-label"> <?=$sns_str[$i] ?></label>
                <input id="<?= "input_". $sns_str[$i] ?>" class="item-url" type="text" name="name" value="" disabled="true" placeholder="url을 입력해주세요.">

                </li>
            <?php
              }
            ?>



          </ul>
      </div>
    </div>


    <div class="submit_cont">
        <button type="button"class="submit"><a href="#">제출</a></button>
    </div>
</div>

<footer>
    <?= $this->loadLayout("creator/footer") ?>
    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="javascripts/creator/profile.js"></script>
</footer>
</body>
</html>
