<!doctype html>
<html lang="ko">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?=$this->loadLayout("head")?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="stylesheets/admin/common.css"/>
    <link rel="stylesheet" href="stylesheets/admin/notice_detail.css"/>

</head>

<body>

    <div id="wrapper" class="toggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <?=$this->loadLayout("sidemenu_bar")?>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">

              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#customer" role="tab">CUSTOMER</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link  " data-toggle="tab" href="#seller" role="tab">SELLER</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#creator" role="tab">CREATOR</a>
                </li>
                <div class="input-container">
                  <input type="input" name="search_input" value="" placeholder="">
                  <button type="button" name="btn-search" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-search"></span>
                  </button>

                </div>
              </ul><!--/# Nav tabs -->

              <div id="notice-detail">
                  <a href="#" class="btn-customer-write btn-write">
                    <img src="images/buttons/admin/plus.png" alt="plus.png" />
                  </a>
                  <h4 class="title text-heavy-gray">
                    [브랜드 오픈]상반된 개념의 믹스앤 매치로 차별화된 컬렉션을 선보이는 레이블, PUSHBUTTO
                  </h4>
                  <p class="date">
                    2017.08.22 13:20
                  </p>

                    <div class="contents">
                      <!-- 텍스트 에디터에 의해서 생성된 내용 -->
                      <div class="cnt-news-wrap ga-view" id="newsView" itemprop="articleBody">
                				<div class="summary">
                          '전자 소그룹 컨트롤타워' 역할<span name="inspace_pos">&nbsp;</span><br style="">
                          부사장급 이하 조기 인사 검토
                        </div>
                				삼성전자가 삼성디스플레이 삼성SDI 삼성전기 삼성SDS 등 전자 계열사의 전략 및 인사 업무를 총괄하는 방안을 추진한다.
                        그룹 컨트롤타워인 미래전략실이 지난 3월 해체되면서 계열사 간 사업 조정이나 고위 임원 인사 등 핵심 업무가 차질을 빚고 있다는 판단에서다.
                        지난해 ‘최순실 국정농단’ 사태로 흐트러진 조직을 쇄신하기 위한 조기 임원 인사도 검토하고 있는 것으로 알려졌다.

                        <span name="inspace_pos">&nbsp;</span><br style=""><br style="">

                				삼성 계열사의 한 고위 관계자는 11일 “삼성전자가 자회사들의 사업 조정 및 구조조정,
                        임원 인사 등 전략과 인사 업무를 총괄하는 여러 방안을 검토하고 있다”고 말했다.
                        삼성전자는 삼성디스플레이(84.8%) 삼성SDI(19.6%) 삼성전기(23.7%) 등 전자 계열사의 최대 주주다.
                        지난 3월 해체된 미래전략실 같은 별도 조직을 구성하는 대신 삼성전자가 주요 자회사를 통합 관리하는 지배구조를 유력하게 검토하고 있다.
                        이사회 중심의 선진 기업 지배구조를 확립하겠다는 이재용 삼성전자 부회장의 뜻도 반영된 것으로 알려졌다.
                        삼성그룹이 삼성전자 삼성생명 삼성물산 등 주요 계열사를 축으로 한 소그룹 중심으로 재편될 것이라는 관측이 나온다.

                    </div>
                  </div>

                </div><!-- /#notice-detail -->
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="javascripts/admin/sidemenu_bar.js"></script>
</body>
</html>
