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
    <link rel="stylesheet" href="stylesheets/admin/notice.css" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker3.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.min.css"/>


</head>
<?php
$type = $_GET['type'] ? $_GET['type'] : 'general';

$request = new Http();
$response = $request->request('GET', '/admin/members/'.$type.'?token='.$_COOKIE['token']);

$members = $response->datas->data;

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
          <section id="vd-member">
            <div class="container-fluid">

              <!-- Nav tabs -->
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link <?=$type=='general' ? 'active' : ''?>"  href="admin.php?page=member" >CUSTOMER</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?=$type=='seller' ? 'active' : ''?>" href="admin.php?page=member&type=seller" >SELLER</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?=$type=='creator' ? 'active' : ''?>"  href="admin.php?page=member&type=creator" >CREATOR</a>
                </li>
                <!--
                <div class="period_select">
                    <div class="input_period">
                        <input class="start" type="date" style="width:130px" />
                        <span>~</span>
                        <input class="end" type="date" style="width:130px" />
                        <button class="search btn-sm btn-peach">조회</button>
                    </div>
                </div>
              -->
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
                  <table id="sheet1" class="table table-hover">
                    <thead>
                      <tr >
                        <th class="select">
                          <input id="select_all" class="select-all-by-creator" type="checkbox" name="" value="">
                          <label for="select_all"></label>
                        </th>
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
                      <?php
                      foreach ($members as $member) {
                      ?>
                        <tr class="table-item">
                          <td class="select">
                            <input type="checkbox" id="select-<?=$member->id?>" value="<?=$member->id?>">
                            <label for="select-<?=$member->id?>"></label>
                          </td>
                          <th scope="row" class="id text-heavy-gray"><?=$member->id?></th>
                          <td class="date text-heavy-gray"><?=substr($member->created_at, 0, 16)?></td>
                          <td class="username">
                            <?php
                            if ($type == "seller" || $type == "creator") {
                              echo "<a href = './admin.php?page=member_".$type."&id=".$member->id."'>";
                            }

                            echo $member->name."</a>";
                            ?></td>
                          <td class="user-id"><?=$member->account?></td>
                          <td class="phone"><?=$member->phone?></td>
                          <td class="email"><?=$member->email?></td>
                          <td class="count"><?=$member->order_count?></td>
                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>

                  <div class="pager-container text-center">
                    <button type="button" class="btn-pager btn btn-default" aria-label="Next Page">
                      <span class="glyphicon glyphicon-triangle-left" aria-hidden="false"></span>
                    </button>

                    <button type="button" class="btn-pager btn btn-default" aria-label="Previous Page">
                      <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span>
                    </button>
                    <button type="button" name="btn-download" class="btn btn-gray btn-download" onclick="doit('xlsx');">엑셀 다운로드</button>
                    <button type="button" name="btn-delete" class="btn btn-gray btn-delete" onclick="deleteMembers()">삭제</button>
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
    <script src="javascripts/select_all.js"></script>
    <!-- SheetJS js-xlsx library -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.11.10/xlsx.full.min.js"></script>
    <script src="https://fastcdn.org/FileSaver.js/1.1.20151003/FileSaver.min.js"></script>
    <script>
      function s2ab(s) {
        if(typeof ArrayBuffer !== 'undefined') {
          var buf = new ArrayBuffer(s.length);
          var view = new Uint8Array(buf);
          for (var i=0; i!=s.length; ++i) view[i] = s.charCodeAt(i) & 0xFF;
          return buf;
        } else {
          var buf = new Array(s.length);
          for (var i=0; i!=s.length; ++i) buf[i] = s.charCodeAt(i) & 0xFF;
          return buf;
        }
      }

      function export_table_to_excel(id, type, fn) {
        var wb = XLSX.utils.table_to_book(document.getElementById(id), {sheet:"Sheet JS", raw:true});

        var wscols = [
            {wch:1},
            {wch:10},
            {wch:30},
            {wch:20},
            {wch:40},
            {wch:50},
            {wch:45},
            {wch:10}
        ];

        wb.Sheets["Sheet JS"]["!cols"] = wscols;

        var wbout = XLSX.write(wb, {bookType:type, bookSST:true, type: 'binary'});
        var fname = fn || '<?=$type?>.' + type;

        try {
          saveAs(new Blob([s2ab(wbout)],{type:"application/octet-stream"}), fname);
        } catch(e) { if(typeof console != 'undefined') console.log(e, wbout); }
        return wbout;
      }

      function doit(type, fn) { return export_table_to_excel('sheet1', type || 'xlsx', fn); }

      function deleteMembers()
      {
        if (confirm("정말로 삭제하시겠습니까?")) {
          
          $("tbody .select input[type='checkbox']:checked").each(function (){
            var member_id = $(this).val();

            $.ajax({
              type: "POST",
              async: false,
              url: "http://api.siyeol.com/admin/member/"+member_id+"?token="+readCookie('token'),
              dataType: "json",
              data: {_method: 'DELETE'},
              success: function (res) {
              },
              error: function (req,status,err) {
                console.log(req.responseText);
                alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
              }
            });
          });

          location.reload();
        }
      }
    </script>
</body>
</html>
