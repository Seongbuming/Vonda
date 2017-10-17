<!doctype html>
<html lang="ko">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?=$this->loadLayout("head")?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="stylesheets/admin/common.css" />
    <link rel="stylesheet" href="stylesheets/admin/table_notice.css" />
    <link rel="stylesheet" href="stylesheets/admin/calculate.css" />

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
              <section id="vd-calculate-creator">
                <!-- Nav tabs -->
                <ul class="nav">
                  <li class="nav-item">
                    <a class="nav-link" href="admin.php?page=calculate_seller">SELLER</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="admin.php?page=calculate_creator">CREATOR</a>
                  </li>
                  <div class="period_select">
                      <div class="input_period">
                          <input class="start" type="month" style="width:130px" />
                          <span>~</span>
                          <input class="end" type="month" style="width:130px" />
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

                  <div class="tab-pane active" id="creator" role="tabpanel">
                    <table class="table table-hover">
                      <thead>
                        <tr >
                          <th class="select">
                            <input id="select_all" class="select-all-by-creator" type="checkbox" name="" value="">
                            <label for="select_all"></label>
                          </th>
                          <th>이름</th>
                          <th>아이디</th>
                          <th>정산금액</th>
                          <th>은행</th>
                          <th>계좌번호</th>
                          <th>예금주</th>
                          <th>상태</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        for ($i=0; $i < 10 ; $i++) {
                          ?>
                          <tr>
                            <td class="select"> <input id="<?= "select_" . $i?>" type="checkbox" title="선택">
                              <label for="<?= "select_" . $i?>"></label>
                            </td>
                            <td class="username text-heavy-gray">진아영</td>
                            <td class="user-id">
                              <a href="admin.php?page=calculate_detail_creator" class="user-id-link">abc</a>
                            </td>
                            <td class="final-amount">
                              2,360,000원
                            </td>
                            <td class="bank text-heavy-gray">
                              농협
                            </td>
                            <td class="account-number text-heavy-gray">
                              222-1111-2222-30
                            </td>
                            <td class="account-holder text-heavy-gray">
                              진아영
                            </td>
                            <td class="state text-heavy-gray">
                              미완료
                            </td>
                          </tr>
                          <?php
                        }?>
                      </tbody>
                    </table>

                    <div class="btn-container">
                      <button type="button" name="btn-delete" class="btn btn-gray btn-delete">정산취소</button>
                      <button type="button" name="btn-delete" class="btn btn-peach btn-delete">정산완료</button>
                    </div>
                  </div>


                </div><!-- /#Tab panes -->

              </section>

            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="javascripts/admin/sidemenu_bar.js"></script>
    <script src="javascripts/select_all.js"></script>

    </script>
</body>
</html>
