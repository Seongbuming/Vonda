<!doctype html>
<html>
<head>
    <?=$this->loadLayout("head")?>
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
    </div>
    
    <footer>
        <?=$this->loadLayout("footer")?>
    </footer>
</body>
</html>
