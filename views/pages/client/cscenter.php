<!doctype html>
<html>
<head>
    <?=$this->loadLayout("head")?>
    <link rel="stylesheet" href="stylesheets/board.css" />
    <link rel="stylesheet" href="stylesheets/client/cscenter.css" />
</head>

<body>
    <header>
        <?=$this->loadLayout("header")?>
    </header>

    <div id="contents">
        <h2 class="page_title">FAQ</h2>

        <div class="info_section">
            <div class="area_search">
                <input class="search input_search" type="text" title="검색 입력" />
                <button class="search submit_search" title="검색"></button>
            </div>
            <div class="container">
                <div class="info contact">
                    <div class="wrapper">
                        <p class="phone_number">010-8549-2902</p>
                        <p>wemustcreate@naver.com</p>
                    </div>
                </div>
                <div class="info hours">
                    <div class="wrapper">
                        <p>영업시간 AM 9:00 ~ PM 6:00</p>
                        <p>점심시간 PM 12:00 ~ PM 1:00</p>
                        <p>토/일/법정공휴일 휴무</p>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="category">FAQ</h3>

        <table class="board">
            <tbody>
                <tr class="row_subject">
                    <td class="time">2017.09.22 13:20</td>
                    <td class="subject">주문 취소를 하고 싶어요.</td>
                </tr>
                <tr class="row_post">
                    <td class="type">Q.</td>
                    <td class="result">주문 취소를 하고 싶어요.</td>
                </tr>
                <tr class="row_post">
                    <td class="type">A.</td>
                    <td class="result">
                        <p>.................</p>
                    </td>
                </tr>
                
                <tr class="row_subject">
                    <td class="time">2017.06.22 11:20</td>
                    <td class="subject">배송기간은 얼마나 걸리나요?</td>
                </tr>
                <tr class="row_post">
                    <td class="type">Q.</td>
                    <td class="result">배송기간은 얼마나 걸리나요?</td>
                </tr>
                <tr class="row_post">
                    <td class="type">A.</td>
                    <td class="result">
                        <p>보통 배송은 결제 후 영업일 기준으로 3~5일 소요됩니다.</p>
                        <p>단, 일시품절이나 입고지연, 제작 등으로 배송이 7일 ~ 20일 이상 걸릴 수 있으며</p>
                        <p>배송이 지연될 경우에는 출고 예정일을 핸드폰 문자로 안내드립니다.</p>
                        <p>※ </p>
                        <p>보통 당일 오후 3시까지 결제완료된 주문을 확인 후 상품을 준비하며</p>
                        <p>상품의 출고는 주문일 기준 2~3일 소요될 수 있습니다.</p>
                    </td>
                </tr>

                <tr class="row_subject">
                    <td class="time">2017.05.22 13:20</td>
                    <td class="subject">포인트제도가 있나요?</td>
                </tr>
                <tr class="row_post">
                    <td class="type">Q.</td>
                    <td class="result">포인트제도가 있나요?</td>
                </tr>
                <tr class="row_post">
                    <td class="type">A.</td>
                    <td class="result">
                        <p>.................</p>
                    </td>
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

    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="javascripts/board.js"></script>
</body>
</html>
