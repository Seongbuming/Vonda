<!doctype html>
<html lang="ko">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?=$this->loadLayout("head")?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="stylesheets/admin/common.css"/>
    <link rel="stylesheet" href="stylesheets/admin/notice_write.css"/>

    <script src="libraries/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <!-- include summernote css/js-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
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
              <div id="notice-write">
                  <div class="form-item">
                    <select class="option">
                      <option value="customer">CUSTOMER</option>
                      <option value="seller">SELLER</option>
                      <option value="creator">CREATOR</option>
                    </select>
                  </div>
                  <div class="form-item">
                    <input type="input" name="title" value="" class="title" placeholder="제목을 입력해주세요.">
                  </div>
                  <textarea id="text-editor" class="form-item text-center"
                        style="height: 350px; border: solid 1px black">
                  </textarea>
                  <div class="form-item">
                    <input id="select" type="checkbox" name="is_top" title="선택" value="y">
                    <label for="select">리스트 상단에 고정</label>
                    <button type="button" name="button" class="btn btn-peach" onclick="saveNotice()">완료</button>
                  </div>
            </div><!-- /#notice-detail -->
          </div>
      </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <script src="javascripts/admin/sidemenu_bar.js"></script>
    <script src="javascripts/admin/text_editor.js"></script>
</body>
</html>
