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
<?php
if (!isset($_GET['id'])) {
  header('Location:./admin.php?page=notice');
}
$type = $_GET['type'] ? $_GET['type'] : 'customer';

$request = new Http();
$response = $request->request('GET', '/board/'.$_GET['id']);

$notice = $response->data;
?>
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
                  <a class="nav-link <?=$type == 'customer' ? 'active' : ''?>"  href="admin.php?page=notice&type=customer" >CUSTOMER</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?=$type == 'seller' ? 'active' : ''?>"  href="admin.php?page=notice&type=seller">SELLER</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?=$type == 'creator' ? 'active' : ''?>"  href="admin.php?page=notice&type=creator">CREATOR</a>
                </li>
                <div class="input-container">
                  <input type="input" name="search_input" value="" placeholder="">
                  <button type="button" name="btn-search" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-search"></span>
                  </button>

                </div>
              </ul><!--/# Nav tabs -->

              <div id="notice-detail">
                  <a href="admin.php?page=notice_write" class="btn-write">
                    <img src="images/buttons/admin/plus.png" alt="plus.png" />
                  </a>
                  <h4 class="title text-heavy-gray">
                    <?=$notice->subject?>
                  </h4>
                  <p class="date">
                    <?=str_replace("-", ".", substr($notice->created_at, 0, 16))?>
                  </p>

                    <div class="contents">
                      <!-- 텍스트 에디터에 의해서 생성된 내용 -->
                      <?=$notice->content?>

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
