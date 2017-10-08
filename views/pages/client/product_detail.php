<!doctype html>
<html lang="ko">
<head>
    <?= $this->loadLayout("head") ?>
    <link rel="stylesheet" href="stylesheets/modal.css"/>
    <link rel="stylesheet" href="stylesheets/board.css"/>
    <link rel="stylesheet" href="stylesheets/client/product_detail.css"/>
</head>

<body>
<header>
    <?= $this->loadLayout("header") ?>
</header>

<div id="contents">
    <div class="topbar"></div>
    <div class="information">
        <img src="images/detail/상품사진1.png" class="shop_img">
        <div class="right_cont">
            <p class="title">Niacinamide 10% + Zinc 1%</p><br>
            <p class="price">26,000원</p>
            <p class="post_notice">30,000 원 이상 구매시 무료배송 (배송 3,000원)</p>
            <table class="product_list">
                <tbody>
                <td class="product_amount">
                    <div class="cart_t">
                        <span class="cart_o">옵션</span>
                        <select class="option">
                            <option value="실버">실버</option>
                            <option value="골드">골드</option>
                        </select><br><br>
                        <span class="cart_n">수량</span>
                    </div>
                    <div class="wrapper">
                        <button class="add">+</button>
                        <span class="amount">1</span>
                        <button class="sub">-</button>
                    </div>
                    <br><br>
                    <span class="order_price1">배송비</span>
                    <p class="order_price2">2,500원</p>
                </td>
                </tbody>
            </table>
        </div>
        <div class="gak">
            <div class="order_button">
                <div class="button_section">
                    <div class="button basket">
                        <div class="wrapper">
                            <p>장바구니 담기</p>
                        </div>
                    </div>
                    <div class="button buy">
                        <div class="wrapper">
                            <p>바로 구매하기</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content_info">
        <img src="images/detail/상품상세.png">
    </div>

    <h3 class="category">상품후기</h3>
    <table class="board">
        <tbody>
        <tr class="row_subject">
            <td class="time">2017.08.22 13:20</td>
            <td class="subject">이거, 펴바르면 약간 화 한 느낌이 있어요 저는 눈두덩이랑 다크서클에 아주 편히 문질러 바르는데..</td>
            <td class="author">idn******</td>
        </tr>
        <tr class="row_post">
            <td class="result" colspan="3">이거, 펴바르면 약간 화한 느낌이 있어요.<br>
                <br>저는 눈두덩이랑 다크서클에 아주 편히 문질러 바르는데,<br>
                그렇다고 눈이 시릴 정도는 아니고요.<br>
                Niacinamide/alpha arbutin에 비하면 보습감도 살짝 있고 전혀 밀림 없어요.<br>
                <br>
                일주일 넘게 사용했는데 눈에 띄는 효과를 본 건 아니지만<br>
                요새 화장 거의 안하는데 왠지 좀 덜 쾡해 보이나 싶기도 하고...<br>
                그냥 왠지 호감인, 믿음이 가는 제품이에요ㅋㅋㅋ<br><br>
                가격도 저렴하니 한 병 꾸준히 비워볼랍니다 :)<br><br>
                <img src="images/detail/후기사진.png">
                <img src="images/detail/후기사진.png">
                <img src="images/detail/후기사진.png">
                <img src="images/detail/후기사진.png">
                <img src="images/detail/후기사진.png">
            </td>
        </tr>
        <tr class="row_subject">
            <td class="time">2017.08.21 13:20</td>
            <td class="subject">그다지 효과를 모르겠어요ㅎㅎ</td>
            <td class="author">ydo****</td>
        </tr>
        <tr class="row_post">
            <td class="result" colspan="3">....
            </td>
        </tr>
        <tr class="row_subject">
            <td class="time">2017.08.19 13:20</td>
            <td class="subject">백화점에서 유명하다는 아이크림들은 가격대가 너무 높고 그렇다고 패스하자니
                맘에 걸리고.. 피부과에서..
            </td>
            <td class="author">kux*******</td>
        </tr>
        <tr class="row_post">
            <td class="result" colspan="3">....
            </td>
        </tr>
        <tr class="row_subject">
            <td class="time">2017.08.18 13:20</td>
            <td class="subject">좋아요</td>
            <td class="author">hit****</td>
        </tr>
        <tr class="row_post">
            <td class="result" colspan="3">....
            </td>
        </tr>
        <tr class="row_subject">
            <td class="time">2017.08.21 13:20</td>
            <td class="subject">여름에 수분 크림 바르기도 답답하구, 아무것도 안바르긴 뭐하구해서
                어떤 화장품을 써야하나 고민하고 ...
            </td>
            <td class="author">ydo****</td>
        </tr>
        <tr class="row_post">
            <td class="result" colspan="3">....
            </td>
        </tr>
        <tr class="row_subject">
            <td class="time">2017.08.19 13:20</td>
            <td class="subject">만족합니다.</td>
            <td class="author">kux*******</td>
        </tr>
        <tr class="row_post">
            <td class="result" colspan="3">....
            </td>
        </tr>
        <tr class="row_subject">
            <td class="time">2017.08.19 13:20</td>
            <td class="subject">6월에 샀는데 지금 후기쓰네요.여러제품을 같이 구매했는데, 하나도 빠짐없이 다
                마음에 듭니다.
            </td>
            <td class="author">hit****</td>
        </tr>
        <tr class="row_post">
            <td class="result" colspan="3">....
            </td>
        </tr>
        </tbody>
    </table>
    <div class="pager">
        <button class="left">◀</button>
        <button class="right">▶</button>
    </div>

    <h3 class="category">FAQ</h3>

    <table class="board">
        <tbody>
        <tr class="row_subject">
            <td class="time">2017.09.21 13:20</td>
            <td class="subject">나이아신마이드10% 징크1% 랙틱애시드 5% 에이치에이2%카페인솔류션5%매트릭실10%</td>
            <td class="author">ydo******</td>
        </tr>
        <tr class="row_post">
            <td class="type">Q.</td>
            <td class="result" colspan="3">.............</td>
        </tr>
        <tr class="row_post">
            <td class="type">A.</td>
            <td class="result" colspan="3">
                <p>.................</p>
            </td>
        </tr>

        <tr class="row_subject">
            <td class="time">2017.09.19 13:20</td>
            <td class="subject">비타민A와 병행사용 가능한가요. 답변 부탁드립니다.</td>
            <td class="author">kux*******</td>
        </tr>
        <tr class="row_post">
            <td class="type">Q.</td>
            <td class="result" colspan="3">.............</td>
        </tr>
        <tr class="row_post">
            <td class="type">A.</td>
            <td class="result" colspan="3">
                <p>.................</p>
            </td>
        </tr>

        <tr class="row_subject">
            <td class="time">2017.09.19 13:20</td>
            <td class="subject">디오디너리제품 4개구입하고입금했어요~ 가장최근제조일자로보내주세용^^</td>
            <td class="author">hit****</td>
        </tr>
        <tr class="row_post">
            <td class="type">Q.</td>
            <td class="result" colspan="3">디오디너리제품 4개구입하고입금했어요~ 가장최근제조일자로보내주세용^^ 그리고 나이아신에신스-마그네슘
                아스코빌 포스페이트10% - 로즈힙쓰는데요 아이에센스는 어디다음쓰면되나요? 그리고 이가지랑 같이써도죠?
            </td>
        </tr>
        <tr class="row_post">
            <td class="type">A.</td>
            <td class="result" colspan="3">
                <p>네 아이에센스는 마그네슘 아스코르빌 포스페이트 전에 사용하시면 됩니다. 3가지와 같이 사용해도 됩니다.</p>
            </td>
        </tr>
        </tbody>
    </table>
    <div class="pager">
        <button class="left">◀</button>
        <button class="right">▶</button>

    </div>
    <div class="question_cont">
        <button class="question"><a href="#question_modal">문의하기</a></button>
    </div>

    <div id="question_modal" class="modal">
        <a class="close_section" href="#close" alt="닫기"></a>
        <div class="modal_body">
            <div class="modal_contents">
                <div class="question_title">
                    <img src="images/detail/상품사진1.png" class="shop_question_img">
                    <p class="shop_question_title">Niacinamide 10% + Zinc 1%</p>
                    <p class="shop_question_price">26,000원</p>
                </div>
                <textarea cols="113" rows="17" placeholder="문의를 남겨주세요. (최대 500자)"></textarea>
                <button class="question_submit">문의하기</button>
            </div>
        </div>
    </div>

</div>
<div id="top_arrow">
    <a href="#">test</a>
</div>
</div>


<footer>
    <?= $this->loadLayout("footer") ?>
    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="javascripts/client/cart.js"></script>
    <script src="javascripts/board.js"></script>
</footer>
</body>
</html>
