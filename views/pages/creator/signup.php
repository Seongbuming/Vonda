
<?php
// 회원가입 요청 핸들링
$is_post = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $is_post = true;
    $url = '/user';

    $account = $_POST['id'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $phone = $_POST['pnumber_1'].$_POST['pnumber_2'].$_POST['pnumber_3'];
    $email = $_POST['email'];
    $type = 'creator';
    $sendData = compact('account', 'name', 'password', 'phone', 'email', 'type');

    $request = new Http();
    $res = $request->requestEx('POST', $url, [
        'form_params' => $sendData,
    ]);

    // 회원가입 완료하면 토큰이 반환됨.
    if ($res->token) {
        header("location:./creator.php?page=signup_finish");
        exit;
    }
}
?>
<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
    <link rel="stylesheet" href="stylesheets/seller/common.css?v=3">
    <link rel="stylesheet" href="stylesheets/client/signup.css" />
</head>
<body>
    <header>
        <?=$this->loadLayout("creator/header")?>
    </header>

    <div id="contents">
        <h2 class="page_title">Join</h2>

        <h3 class="category">회원가입</h3>

        <form class="signup_form" method="POST" action="./creator.php?page=signup">
            <div class="row">
                <label for="id">아이디</label>
                <input id="id" name="id" type="text" class="text" value="<?=$is_post?$_POST['id']:''?>" required />
                <?php if ($is_post && $res->message === '동일한 사용자가 존재합니다.') { ?>
                <p class="status">X</p>
                <p class="status_message"><?=$_POST['id']?>는 이미 사용중인 아이디입니다.</p>
                <?php } ?>
            </div>
            <div class="row">
                <label for="name">이름</label>
                <input id="name" name="name" type="text" class="text" value="<?=$is_post?$_POST['name']:''?>" required />
            </div>
            <div class="row">
                <label for="password">비밀번호</label>
                <input id="password" name="password" type="password" class="password" placeholder="(8~15자리 영,숫자 조합가능)" required />
                <p class="status">X</p>
                <p class="status_message">8~20자 이내 영문자, 숫자의 조합으로 이루어져야 합니다.</p>
            </div>
            <div class="row">
                <label for="password_chk">비밀번호 확인</label>
                <input id="password_chk" name="password_chk" type="password" class="password" required />
                <p class="status">X</p>
                <p class="status_message">비밀번호가 일치하지 않습니다.</p>
            </div>
            <div class="row pnumber">
                <label for="pnumber">연락처</label>
                <input id="pnumber" name="pnumber_1" type="tel" class="tel" value="<?=$is_post?$_POST['pnumber_1']:''?>" required />
                <span>-</span>
                <input name="pnumber_2" type="tel" class="tel" value="<?=$is_post?$_POST['pnumber_2']:''?>" required />
                <span>-</span>
                <input name="pnumber_3" type="tel" class="tel" value="<?=$is_post?$_POST['pnumber_3']:''?>" required />
            </div>
            <div class="row">
                <label for="email">이메일</label>
                <input id="email" name="email" type="email" class="email" value="<?=$is_post?$_POST['email']:''?>" required />
            </div>

            <div class="terms">
                <p class="title">이용약관</p>
                <div class="result">
                    <p>제 1장 총 칙</p>
                    <p>제 1조 (목적)</p>
                    <p>이 약관은 에이플러스비회사(이하 "회사") 가 운영하는 인터넷 사이트를 통하여 제공하는 전자상거래 관련 서비스(이하 "서비스")를 이용함에 있어 회사와 이용자의 권리·의무 및 책임사항을 규정함을 목적으로 합니다.</p>
                    <p>* PC통신, 무선 등을 이용하는 전자상거래에 대해서도 그 성질에 반하지 않는 한 이 약관을 준용합니다.</p>
                    <p>제 2조 (정의)</p>
                    <p>"회사"란 에이플러스비주식회사가 재화 또는 용역(이하 "재화 등"이라 함)을 이용자에게 제공하기 위하여 컴퓨터 등 정보통신 설비를 이용하여 재화 등을 거래할 수 있도록 설정한 가상의 영업장을 말하며, 아울러 사이버 몰을 운영하는 사업자의 의미로도 사용합니다.</p>
                    <p>"이용자"란 "회사"에 접속하여 이 약관에 따라 "회사"가 제공하는 서비스를 받는 회원 및 비회원을 말합니다.</p>
                    <p>회원이라 함은 "회사"에 개인정보를 제공하여 회원 등록을 한 자로서, "회사"의 정보를 지속적으로 제공 받으며, "회사"가 제공하는 서비스를 계속적으로 이용할 수 있는 자를 말합니다.</p>
                    <p>"비회원"이라 함은 회원에 가입하지 않고 "회사"가 제공하는 서비스를 이용하는 자를 말합니다.</p>
                    <p>이외에 이 약관에서 사용하는 용어의 정의는 관계 법령 및 서비스 별 안내에서 정하는 바에 의합니다.</p>
                    <p>제 3조 (약관 등의 명시와 설명 및 개정)</p>
                    <p>"회사"는 이 약관의 내용과 상호, 영업소 소재지 주소(소비자의 불만을 처리할 수 있는 곳의 주소를 포함), 전화번호, 모사전송번호, 이메일주소, 사업자등록번호, 통신판매업신고번호, 개인정보관리책임자 등을 이용자가 쉽게 알 수 있도록 "회사"의 초기 서비스화면(전면)에 게시합니다. 다만, 약관의 내용은 이용자가 연결화면을 통하여 볼 수 있도록 할 수 있습니다.</p>
                    <p>"회사"는 약관의규제에관한법률, 전자상거래등에서의소비자보호에관한법률, 소비자기본법 등 관련법을 위배하지 않는 범위 에서 이 약관을 개정할 수 있습니다.</p>
                    <p>"회사"는 약관을 개정할 경우에는 적용일자 및 개정사유를 명시하여 현행약관과 "회사"의 초기화면이나 팝업화면에 그 적용일자 7일 이전부터 적용일자 전일까지 공지합니다. 다만, 이용자에게 불리하게 약관내용을 변경하는 경우에는 최소한 30일 이상의 사전 유예기간을 두고 공지합니다. 이 경우 "회사"는 개정전 내용과 개정후 내용을 명확하게 비교하여 이용자가 알기 쉽도록 표시합니다.</p>
                    <p>"회사"가 약관을 개정할 경우에는 그 개정약관은 그 적용일자 이후에 체결되는 계약에만 적용되고 그 이전에 이미 체결된 계약에 대해서는 개정 전의 약관조항이 그대로 적용됩니다. 다만 이미 계약을 체결한 이용자가 개정약관 조항의 적용을 받기를 원하는 뜻을 제4항에 의한 개정약관의 공지기간 내에 "회사"에 송신하여 "회사"의 동의를 받은 경우에는 개정약관 조항이 적용됩니다.</p>
                    <p>이 약관에서 정하지 아니한 내용과 이 약관의 해석에 관하여는 전자상거래등에서의소비자보호에관한법률, 약관의규제등에관한법률, 공정거래위원회가 정하는 전자상거래등에서의소비자보호지침 및 관계법령 또는 상관례에 따릅니다.</p>
                </div>
            </div>
            <input id="acceptTS" name="acceptTS" type="checkbox" class="acceptchk" required />
            <label for="acceptTS">이용약관에 동의합니다.</label>

            <div class="terms">
                <p class="title">개인정보취급방침</p>
                <div class="result">
                    <p>수집하는 개인정보 항목 및 수집방법</p>
                    <p>에이플러스비는 별도의 회원가입 절차 없이 대부분의 컨텐츠에 자유롭게 접근할 수 있습니다. 에이플러스비는 회원제 서비스를 이용하시고자 할 경우 다음의 정보를 입력해주셔야 합니다.</p>
                    <p>- 입력항목 : 희망ID, 비밀번호, 성명, 이메일주소</p>
                    <p>또한 서비스 이용과정이나 사업 처리 과정에서 아래와 같은 정보들이 생성되어 수집될 수 있습니다.</p>
                    <p>- 최근접속일, 접속 IP 정보, 쿠키, 구매로그, 이벤트로그</p>
                    <p>- 회원가입 시 회원이 원하시는 경우에 한하여 추가 정보를 선택, 제공하실 수 있도록 되어있으며, 일부 재화 또는 용역 상품에 대한 주문 및 접수 시 회원이 원하는 정확한 주문 내용 파악을 통한 원활한 주문 및 결제, 배송을 위하여 추가적인 정보를 요구하고 있습니다.</p>
                    <p>에이플러스비는 다음과 같은 방법으로 개인정보를 수집합니다.</p>
                    <p>- 홈페이지, 서면양식, 팩스, 전화, 상담 게시판, 이메일, 이벤트 응모, 배송요청 </p>
                    <p>- 협력회사로부터의 제공</p>
                    <p>- 로그 분석 프로그램을 통한 생성정보 수집</p>
                    <p>개인정보 수집에 대한 동의</p>
                    <p>- 에이플러스비는 귀하께서 에이플러스비의 개인정보취급방침 및 이용약관의 내용에 대해 「동의한다」버튼 또는 「동의하지 않는다」버튼을 클릭할 수 있는 절차를 마련하여, 「동의한다」버튼을 클릭하면 개인정보 수집에 대해 동의한 것으로 봅니다.</p>
                    <p>14세 미만 아동의 개인정보보호</p>
                    <p>에이플러스비는 법정 대리인의 동의가 필요한 만14세 미만 아동의 회원가입은 받고 있지 않습니다.</p>
                    <p>비회원의 개인정보보호</p>
                    <p>① 에이플러스비는 비회원 주문의 경우에도 배송, 대금결제, 주문내역 조회 및 구매확인, 실명여부 확인을 위하여 필요한 개인정보만을 요청하고 있으며, 이 경우 그 정보는 대금결제 및 상품의 배송에 관련된 용도 이외에는 다른 어떠한 용도로도 사용되지 않습니다.</p>
                    <p>② 에이플러스비는 비회원의 개인정보도 회원과 동등한 수준으로 보호합니다.</p>
                    <p>"회사"는 이 약관의 내용과 상호, 영업소 소재지 주소(소비자의 불만을 처리할 수 있는 곳의 주소를 포함), 전화번호, 모사전송번호, 이메일주소, 사업자등록번호, 통신판매업신고번호, 개인정보관리책임자 등을 이용자가 쉽게 알 수 있도록 "회사"의 초기 서비스화면(전면)에 게시합니다. 다만, 약관의 내용은 이용자가 연결화면을 통하여 볼 수 있도록 할 수 있습니다.</p>
                    <p>"회사"는 약관의규제에관한법률, 전자상거래등에서의소비자보호에관한법률, 소비자기본법 등 관련법을 위배하지 않는 범위 에서 이 약관을 개정할 수 있습니다.</p>
                    <p>"회사"는 약관을 개정할 경우에는 적용일자 및 개정사유를 명시하여 현행약관과 "회사"의 초기화면이나 팝업화면에 그 적용일자 7일 이전부터 적용일자 전일까지 공지합니다. 다만, 이용자에게 불리하게 약관내용을 변경하는 경우에는 최소한 30일 이상의 사전 유예기간을 두고 공지합니다. 이 경우 "회사"는 개정전 내용과 개정후 내용을 명확하게 비교하여 이용자가 알기 쉽도록 표시합니다.</p>
                    <p>"회사"가 약관을 개정할 경우에는 그 개정약관은 그 적용일자 이후에 체결되는 계약에만 적용되고 그 이전에 이미 체결된 계약에 대해서는 개정 전의 약관조항이 그대로 적용됩니다. 다만 이미 계약을 체결한 이용자가 개정약관 조항의 적용을 받기를 원하는 뜻을 제4항에 의한 개정약관의 공지기간 내에 "회사"에 송신하여 "회사"의 동의를 받은 경우에는 개정약관 조항이 적용됩니다.</p>
                    <p>이 약관에서 정하지 아니한 내용과 이 약관의 해석에 관하여는 전자상거래등에서의소비자보호에관한법률, 약관의규제등에관한법률, 공정거래위원회가 정하는 전자상거래등에서의소비자보호지침 및 관계법령 또는 상관례에 따릅니다.</p>
                </div>
            </div>
            <input id="acceptPS" name="acceptPS" type="checkbox" class="acceptchk" required />
            <label for="acceptPS">개인정보취급방침에 동의합니다.</label>

            <div class="button_container">
                <a class="goback" href=".?page=login">뒤로가기</a>
                <input class="submit" type="submit" value="가입완료" />
            </div>
        </form>
    </div>

    <footer>
        <?=$this->loadLayout("creator/footer")?>
    </footer>
    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="javascripts/client/signup.js"></script>
</body>
</html>
