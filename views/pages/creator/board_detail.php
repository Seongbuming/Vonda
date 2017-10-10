<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
    <link rel="stylesheet" href="stylesheets/board.css"/>
    <link rel="stylesheet" href="stylesheets/post.css"/>
    <link rel="stylesheet" href="stylesheets/creator/board_detail.css">
</head>

<body>
<header>
    <?=$this->loadLayout("header")?>
</header>

<div id="contents">
    <ul class="link_menu">
        <li><a href=".?page=myproduct">나의상품</a></li>
        <li class="actived"><a href=".?page=board">게시판 관리</a></li>
        <li><a href=".?page=profile">프로필 관리</a></li>
        <li><a href=".?page=calculate">정산내역</a></li>
    </ul>

    <h3 class="category">BOARD</h3>
    <div class="profile_detail_board">
        <div class="post">
            <p class="creator_title">[브랜드 오픈] 상반된 개념의 믹스앤 매치로 차별화된 컬렉션을 선보이는 레이블, PUSHBUTTO<span class="author"
                                                                                                 style="float:right; padding-right: 10px;">Yeomim</span>
            </p>
            <p class="time">2017.08.22 13:20</p>
            <div class="creator_detail_result">
                주말, 집 근처 강가에서 아내 베로니카와 딸 테레사와 함께 `Chick Corea Akoustic Band`의 `Overjoyed`를 들으며,<br>
                술래잡기하듯 뛰어 노는 이들의 모습을 보며 디자이너는 꼭 신겨주고 싶은 디자인이 생겼습니다.<br>
                영국 남성 슈즈의 레트로 무드를 바탕으로 스트랩 장식과 감각적인 컷 아웃을 통해 베로니카를 위한 `로퍼 슈즈`로 재현해 보았습니다.<br>
                <br>
                우수한 등급의 가죽 소재를 사용하였으며, 소프트한 질감이 시간이 지날수록 당신의 발을 더욱더 자연스럽게 감싸 안을 것입니다.<br>
                공증된 특허기술을 사용하여 자체 개발된 은은한 향이 나는 라텍스 중창은 편안한 착화감과 동시에 당신의 발을 보다 더 건강하게 지켜줄 것이며,<br>
                슈즈의 바닥창은 천연 목 굽과 러버를 사용하였습니다.<br>
                이 슈즈와 당신이 함께 할 시간들이 행복하기를 바랍니다.<br><br>
                <img src="images/detail/게시물상세.png">
            </div>
        </div>

        <div class="comment">
            <textarea cols="156" rows="5" placeholder="댓글을 입력하려면 로그인이 필요합니다."></textarea>
            <button class="comment_submit">댓글 등록</button>
        </div>
        <div class="user_comment">
            <table class="board">
                <tbody>
                <tr class="row_subject">
                    <td class="author">Yeomim</td>
                    <td class="subject">
                        너무 기대됩니다. 언능 받아보고 싶어요!</td>
                    <td class="time">2017.09.21  13:20</td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="user_link_comment">
            <table class="board">
                <tbody>
                <tr class="row_subject">
                    <td class="author">ㄴ @Yeomim</td>
                    <td class="subject">
                        너무 기대됩니다. 언능 받아보고 싶어요!</td>
                    <td class="time">2017.09.22  13:20</td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="user_comment">
            <table class="board">
                <tbody>
                <tr class="row_subject">
                    <td class="author">haeyfuk</td>
                    <td class="subject">
                        너무 기대됩니다. 언능 받아보고 싶어요!</td>
                    <td class="time">2017.08.21  13:20</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="user_comment">
        <table class="board">
            <tbody>
            <tr class="row_subject">
                <td class="author">jay901004</td>
                <td class="subject">
                    너무 기대됩니다. 언능 받아보고 싶어요!</td>
                <td class="time">2017.07.21  13:20</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="pager">
        <button class="left">◀</button>
        <button class="right">▶</button>
    </div>
    <div class="c_line"></div>
    <a class="goback" href=".?page=creator_profile">뒤로가기</a>
</div>

<footer>
    <?=$this->loadLayout("footer")?>
</footer>
</body>
</html>
