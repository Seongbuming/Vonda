<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
    <link rel="stylesheet" href="stylesheets/home.css" />
    <link rel="stylesheet" href="libraries/jquery.bxslider.min.css" />
</head>

<body>
    <header>
        <?=$this->loadLayout("header")?>
    </header>

    <div id="contents">
        <ul class="bxslider">
            <li>
                <img src="images/banner/banner1.png" alt="배너 이미지 1" />
                <img src="images/banner/banner2.png" alt="배너 이미지 2" />
                <img src="images/banner/banner3.png" alt="배너 이미지 3" />
                <img src="images/banner/banner4.png" alt="배너 이미지 4" />
                <img src="images/banner/banner5.png" alt="배너 이미지 5" />
            </li>
            <li>
                <img src="images/banner/banner6.png" alt="배너 이미지 6" />
                <img src="images/banner/banner7.png" alt="배너 이미지 7" />
                <img src="images/banner/banner8.png" alt="배너 이미지 8" />
                <img src="images/banner/banner9.png" alt="배너 이미지 9" />
                <img src="images/banner/banner10.png" alt="배너 이미지 10" />
            </li>
        </ul>
    </div>

    <footer>
        <?=$this->loadLayout("footer")?>
    </footer>
    
    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="libraries/jquery.bxslider.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#contents .bxslider').bxSlider({
                wrapperClass: "banner bx-wrapper",
                auto: true,
                pause: 5000,
                pager: false
            });
        });
    </script>
</body>
</html>
