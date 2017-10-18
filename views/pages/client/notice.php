<!doctype html>
<html lang="ko">
<head>
    <?=$this->loadLayout("head")?>
    <link rel="stylesheet" href="stylesheets/board.css" />
</head>
<?php
$request = new Http();
$response = $request->request('GET', '/notice');

$notices = $response->datas;
?>
<body>
    <header>
        <?=$this->loadLayout("header")?>
    </header>

    <div id="contents">
        <h2 class="page_title">Notice</h2>

        <h3 class="category">공지사항</h3>

        <table class="board">
            <tbody>
                <?php
                foreach ($notices->data as $notice) {
                ?>
                    <tr class="row_subject">
                        <td class="time"><?=$notice->created_at?></td>
                        <td class="subject">
                            <a href=".?page=notice_detail&id=<?=$notice->id?>"><?=$notice->subject?></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <div class="pager">
            <button class="left">◀</button>
            <button class="right">▶</button>
        </div>
    </div>

    <footer>
        <?=$this->loadLayout("footer")?>
    </footer>
</body>
</html>
