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
    <link rel="stylesheet" href="stylesheets/admin/notice.css" />

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
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link active" href="admin.php?page=notice_customer">CUSTOMER</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="admin.php?page=notice_seller">SELLER</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="admin.php?page=notice_creator">CREATOR</a>
                </li>
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
                  <a href="admin.php?page=notice_write" class="btn-customer-write btn-write">
                    <img src="images/buttons/admin/plus.png" alt="plus.png" />
                  </a>
                  <table class="table table-hover">
                    <thead>
                      <tr >
                        <th class="select">
                          <input id="select_all" type="checkbox" name="byCostomer" value="">
                          <label for="select_all"></label>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="select">
                          <input type="checkbox" name="select-1" value="">
                          <label for="select-1"></label>
                        </td>
                        <td class="date">2017.06.22 11:20</td>
                        <td>
                          <a href="admin.php?page=notice_detail" class="title">공지사항 최상단 고정 게시물</a>
                          <span class="hits">(11)</span>
                          <div class="fixed-pin"></div>
                        </td>
                      </tr>
                      <tr>
                        <td class="select">
                          <input type="checkbox" name="select-1" value="">
                          <label for="select-1"></label>
                        </td>
                        <td class="date">2017.06.22 11:20</td>
                        <td>
                          <a href="admin.php?page=notice_detail" class="title">공지사항 최상단 고정 게시물2</a>
                          <span class="hits">(11)</span>
                          <div class="fixed-pin"></div>
                        </td>
                      </tr>
                      <?php
                      for ($i=0; $i < 10 ; $i++) {
                        ?>
                        <tr>
                          <td class="select"> <input id="<?= "select_" . $i?>" type="checkbox" title="선택">
                            <label for="<?= "select_" . $i?>"></label>
                          </td>
                          <td class="date">2017.06.22 11:20</td>
                          <td>
                            <a href="admin.php?page=notice_detail"class="title">신선한 가을 날씨, 가디건 준비하세요</a>
                            <span class="hits">(11)</span>
                          </td>
                        </tr>
                        <?php
                      }?>
                    </tbody>
                  </table>

                  <div class="btn-container text-center pager-container">
                    <button type="button" class="btn btn-default btn-pager" aria-label="Previous Page">
                      <span class="glyphicon glyphicon-triangle-left" aria-hidden="false"></span>
                    </button>

                    <button type="button" class="btn btn-default btn-pager" aria-label="Next Page">
                      <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span>
                    </button>

                    <button type="button" name="btn-delete" class="btn btn-gray btn-delete">삭제</button>
                  </div>

                </div>
              </div><!-- /#Tab panes -->

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
</body>
</html>
