<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
    <link rel="stylesheet" href="stylesheets/board.css" />
</head>

<body>
    <header>
        <?=$this->loadLayout("header")?>
    </header>

    <div id="contents">
        <h2 class="page_title">Notice</h2>

        <h3 class="category">공지사항</h3>

        <table class="board">
            <tbody>
                <tr class="row_subject">
                    <td class="time">2017.08.22 13:20</td>
                    <td class="subject">선선한 가을 날씨, 가디건 준비하세요(11)</td>
                </tr>
                <tr class="row_subject">
                    <td class="time">2017.08.21 13:20</td>
                    <td class="subject">이제 이불 덮고 자요, 그러다 감기 걸려요 새 계절, 새 잠옷(25)</td>
                </tr>
                <tr class="row_subject">
                    <td class="time">2017.08.19 13:20</td>
                    <td class="subject">간절기를 위한 가벼운 아우터(99)</td>
                </tr>
                <tr class="row_subject">
                    <td class="time">2017.08.18 13:20</td>
                    <td class="subject">[ 안경展 ] 9 브랜드 최대 30% 할인(105)</td>
                </tr>
                <tr class="row_subject">
                    <td class="time">2017.08.17 13:20</td>
                    <td class="subject">손목 위의 시간, 시계 기획전 최대 30% 할인(877)</td>
                </tr>
                <tr class="row_subject">
                    <td class="time">2017.08.22 13:20</td>
                    <td class="subject">선선한 가을 날씨, 가디건 준비하세요(11)</td>
                </tr>
                <tr class="row_subject">
                    <td class="time">2017.08.21 13:20</td>
                    <td class="subject">이제 이불 덮고 자요, 그러다 감기 걸려요 새 계절, 새 잠옷(25)</td>
                </tr>
                <tr class="row_subject">
                    <td class="time">2017.08.19 13:20</td>
                    <td class="subject">간절기를 위한 가벼운 아우터(99)</td>
                </tr>
                <tr class="row_subject">
                    <td class="time">2017.08.18 13:20</td>
                    <td class="subject">[ 안경展 ] 9 브랜드 최대 30% 할인(105)</td>
                </tr>
                <tr class="row_subject">
                    <td class="time">2017.08.17 13:20</td>
                    <td class="subject">손목 위의 시간, 시계 기획전 최대 30% 할인(877)</td>
                </tr>
            </tbody>
        </table>

        <div class="board_pager">
            <button class="left">◀</button>
            <button class="right">▶</button>
        </div>
    </div>

    <footer>
        <?=$this->loadLayout("footer")?>
    </footer>
</body>
</html>
