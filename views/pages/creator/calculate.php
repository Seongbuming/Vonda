<!doctype html>
<html lang="ko">
<head>
    <?= $this->loadLayout("head") ?>
    <link rel="stylesheet" href="stylesheets/seller/common.css?v=3">
    <link rel="stylesheet" href="stylesheets/creator/calculate.css">
    <link rel="stylesheet" href="stylesheets/creator/board.css"/>
</head>

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
        <p>농협 110-******-203 예금주:진아영
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
            <p>7,090,100</p>
        </td>
        <td class="status">
            <p>정산대기</p>
        </td>
        </tr>
        </tbody>
    </table>
</div>

<footer>
    <?= $this->loadLayout("creator/footer") ?>
</footer>
</body>
</html>
