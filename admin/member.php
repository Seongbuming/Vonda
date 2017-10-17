<!doctype html>
<html lang="ko">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?=$this->loadLayout("head")?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="stylesheets/admin/common.css" />
    <link rel="stylesheet" href="stylesheets/admin/member.css" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker3.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.min.css"/>


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
          <section id="vd-member">
            <div class="container-fluid">

              <!-- Nav tabs -->
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link active"  href="admin.php?page=member" >CUSTOMER</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="admin.php?page=member_seller" >SELLER</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link"  href="admin.php?page=member_creator" >CREATOR</a>
                </li>
                <div class="period_select">
                    <div class="input_period">
                        <input class="start" type="date" style="width:130px" />
                        <span>~</span>
                        <input class="end" type="date" style="width:130px" />
                        <button class="search btn-sm btn-peach">조회</button>
                    </div>
                </div>
                <div class="input-container">
                  <input type="input" name="search_input" value="" placeholder="">
                  <button type="button" name="btn-search" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-search"></span>
                  </button>

                </div>
              </ul><!--/# Nav tabs -->

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="customer" role="tabpanel">
                  <table class="table table-hover">
                    <thead>
                      <tr >
                        <th>#</th>
                        <th>가입일자</th>
                        <th>이름</th>
                        <th>아이디</th>
                        <th>연락처</th>
                        <th>이메일</th>
                        <th>주문건수</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- todo: for each로 data 넣기 -->
                      <tr class="table-item">
                        <th scope="row" class="id text-heavy-gray">1</th>
                        <td class="date text-heavy-gray">2017.06.22 11:20</td>
                        <td class="username">진아영</td>
                        <td class="user-id">haeyefuk</td>
                        <td class="phone">010-2134-2355</td>
                        <td class="email">jahsdfkj@naver.com</td>
                        <td class="count">0</td>
                      </tr>
                      <tr class="table-item">
                        <th scope="row" class="id text-heavy-gray">2</th>
                        <td class="date text-heavy-gray">2017.06.22 11:20</td>
                        <td class="username">진아영</td>
                        <td class="user-id">haeyefuk</td>
                        <td class="phone">010-2134-2355</td>
                        <td class="email">jahsdfkj@naver.com</td>
                        <td class="count">0</td>
                      </tr>
                      <tr class="table-item">
                        <th scope="row" class="id text-heavy-gray">3</th>
                        <td class="date text-heavy-gray">2017.06.22 11:20</td>
                        <td class="username">진아영</td>
                        <td class="user-id">haeyefuk</td>
                        <td class="phone">010-2134-2355</td>
                        <td class="email">jahsdfkj@naver.com</td>
                        <td class="count">0</td>
                      </tr>
                    </tbody>
                  </table>

                  <div class="pager-container text-center">
                    <button type="button" class="btn-pager btn btn-default" aria-label="Next Page">
                      <span class="glyphicon glyphicon-triangle-left" aria-hidden="false"></span>
                    </button>

                    <button type="button" class="btn-pager btn btn-default" aria-label="Previous Page">
                      <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span>
                    </button>
                  </div>

                </div>
              </div><!-- /#Tab panes -->

            </div>
          </section>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="javascripts/admin/sidemenu_bar.js"></script>
    <!-- <script src="javascripts/admin/datepicker.js"></script> -->
    </script>
</body>
</html>
