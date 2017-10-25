<!doctype html>
<html lang="ko">
<head>
    <?= $this->loadLayout("head") ?>
    <link rel="stylesheet" href="stylesheets/seller/common.css?v=3">
    <link rel="stylesheet" href="stylesheets/creator/calculate.css">
    <link rel="stylesheet" href="stylesheets/creator/board.css"/>
    <link rel="stylesheet" href="stylesheets/modal.css" />
</head>
<?php
$request = new Http();

$response = $request->request('GET', '/creator/calculates?token='.$_COOKIE['token']);
$calculates = $response->datas->data;
$bank_account = $response->bank_account;

?>
<body>
<header>
    <?= $this->loadLayout("creator/header") ?>
</header>

<div id="contents">
    <ul class="link_menu">
        <li><a href="./creator.php?page=myproduct">나의상품</a></li>
        <li><a href="./creator.php?page=board">게시판 관리</a></li>
        <li><a href="./creator.php?page=profile">프로필 관리</a></li>
        <li class="actived"><a href="./creator.php?page=calculate">정산내역</a></li>
    </ul>
    <div class="calculate_notice">
        <p>* 매월 5일, 전월분이 입력하신 계좌로 일괄 정산됩니다.<br>공휴일일 경우 전일에 정산처리됩니다.</p>
        <p class="account_info_title">계좌정보</p>
        <p>
          <span style="padding-right:5px;"><?=$bank_account->bank?></span>
          <span style="padding-right:10px;"><?php
            $account = $bank_account->account;
            echo substr($account,0,3) . '****' . substr($account,8);?>
          </span>
          <span style="padding-right:5px;">예금주 : <?=$bank_account->account_owner?></span>
          <a href="#" class="btn-edit"><img src="images/buttons/edit.png" alt="" /></a>
        </p>
    </div>
    <h3 class="category">정산내역</h3>
    <table class="order_list">
        <thead>
        <tr>
            <th></th>
            <th>정산일자</th>
            <th>정산계좌</th>
            <th>정산금액</th>
            <th>상태</th>
        </tr>
        </thead>
        <tbody>
          <?php
          foreach ($calculates as $item) { ?>
            <tr>
              <td class="num">
                  6차
              </td>
              <td class="date">
                  2017.08.22
              </td>
              <td class="account">
                  농협 110-******-203 예금주:진아영
              </td>
              <td class="price">
                  <p><?=$item->calcuate_price?></p>
              </td>
              <td class="status">
                  <p><?=$item->status?></p>
              </td>
            </tr>
          <?php
          }
           ?>

        </tbody>
    </table>

    <div id="modal_edit" class="modal size_msg">
        <div class="close_section modal_close"></div>
        <div class="modal_body">
            <button class="close_button modal_close">
                <img src="images/buttons/close.png" alt="닫기" />
            </button>

            <div class="modal_contents">
              <form class="account-edit-form" method="POST">
                <div class="form-item">
                  <select class="bank" required id="bank" name="bank">
                      <option value="" disabled selected>은행</option>
                      <option value="NH농협">NH농협</option>
                      <option value="KB국민">KB국민</option>
                      <option value="신한">신한</option>
                      <option value="우리">우리</option>
                      <option value="하나">하나</option>
                      <option value="IBK기업">IBK기업</option>
                      <option value="외환">외환</option>
                      <option value="SC제일">SC제일</option>
                      <option value="씨티">씨티</option>
                      <option value="KDB산업">KDB산업</option>
                      <option value="새마을">새마을</option>
                      <option value="대구">대구</option>
                      <option value="광주">광주</option>
                      <option value="우체국">우체국</option>
                      <option value="신협">신협</option>
                      <option value="전북">전북</option>
                      <option value="경남">경남</option>
                      <option value="부산">부산</option>
                      <option value="수협">수협</option>
                      <option value="제주">제주</option>
                      <option value="저축은행">저축은행</option>
                      <option value="산림조합">산림조합</option>
                      <option value="케이뱅크">케이뱅크</option>
                      <option value="카카오뱅크">카카오뱅크</option>



                  </select>
                </div>

                <div class="form-item">
                    <input id="account-number" type="number" name="account" value="" placeholder="계좌번호" required>
                </div>

                <div class="form-item">
                    <input id="account-holder" type="text" name="name" value="" placeholder="예금주" required>
                </div>

                <div class="form-item">
                  <button type="button" class="submit" style="font-size:100%;">확인</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>

<footer>
    <?= $this->loadLayout("creator/footer") ?>
</footer>

 <script src="libraries/jquery-3.2.1.min.js"></script>
 <script src="javascripts/modal.js"></script>
 <script src="javascripts/creator/calculate.js"></script>

</body>
</html>
