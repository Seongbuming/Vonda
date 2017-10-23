<!doctype html>
<html lang="ko">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?=$this->loadLayout("head")?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="stylesheets/admin/common.css"/>
    <link rel="stylesheet" href="stylesheets/admin/product_write.css"/>

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
              <div id="product-write">
                <form class="" action="index.html" method="post">
                  <div class="form-group">
                    <label class="label form-item">상품명</label>
                    <input type="input" name="product-name" value=""
                            class="form-item input-product-name">
                  </div>
                  <div class="form-group">
                    <label class="label form-item">셀러</label>
                    <input type="input" name="product-seller" value=""
                            class="form-item">
                    <button type="button" name="btn-seller-search" class="btn btn-default btn-sm"
                    data-toggle="modal" data-target="#search-seller-modal">
                      <span class="glyphicon glyphicon-search text-heavy-gray"></span>
                    </button>
                  </div>
                  <div class="form-group">
                    <label class="label form-item">가격</label>
                    <input type="input" name="product-price" value=""
                            class="form-item text-right">
                  </div>
                  <div class="form-group">
                    <label class="label form-item">배송비</label>
                    <input type="input" name="product-shipping-fee" value=""
                            class="form-item text-right">
                  </div>
                  <div class="form-group">
                    <label class="label form-item">재고</label>
                    <input type="input" name="product-stock" value="211"
                            class="form-item text-right">
                  </div>
                  <div class="form-group">
                    <label class="label form-item">옵션명</label>
                    <ul class="option-list border-gray">
                      <li class="option-item">
                        <input class="option-item-input text-heavy-gray select" type="text" name="test" value="컬러" />
                        <button type="button" name="" class="btn-remove btn btn-default btn-sm">
                          <span class="text-heavy-gray">&times;</span>
                        </button>
                      </li>
                      <li class="option-item">
                        <input class="option-item-input text-heavy-gray" type="text" name="test" value="사이즈" />
                        <button type="button" name="" class="btn-remove btn btn-default btn-sm">
                            <span class="text-heavy-gray">&times;</span>
                        </button>
                      </li>
                      <li class="option-item-add">
                        <div class="operator text-heavy-gray">
                          +
                        </div>
                      </li>
                      <li class="option-item option-item-template new-option-item" style="display:none">
                        <input class="option-item-input text-heavy-gray border-gray" type="text" name="test" value="" placeholder="새로운 옵션명" />
                        <button type="button" name="" class="btn-remove btn btn-default btn-sm">
                            <span class="text-heavy-gray">&times;</span>
                        </button>
                      </li>
                    </ul>
                    <label class="label form-item label-option-value-list text-right">옵션값</label>
                    <ul class="option-value-list border-gray">
                      <li class="option-item">
                        <input class="option-item-input text-heavy-gray" type="text" name="test" value="아이보리" />
                        <input class="option-item-input text-heavy-gray" type="text" name="test" value="11" placeholder="재고" />
                        <button type="button" name="" class="btn-remove btn btn-default btn-sm">
                          <span class="text-heavy-gray">&times;</span>
                        </button>
                      </li>
                      <li class="option-item">
                        <input class="option-item-input text-heavy-gray" type="text" name="test" value="블랙" />
                        <input class="option-item-input text-heavy-gray" type="text" name="test" value="200" placeholder="재고" />
                        <button type="button" name="" class="btn-remove btn btn-default btn-sm">
                            <span class="text-heavy-gray">&times;</span>
                        </button>
                      </li>
                      <li class="option-item-add">
                        <div class="operator text-heavy-gray">
                          +
                        </div>
                      </li>
                      <li class="option-item option-item-template new-option-item" style="display:none">
                        <input class="option-item-input text-heavy-gray border-gray" type="text" name="test" value="" placeholder="새로운 옵션값" />
                        <input class="option-item-input text-heavy-gray border-gray" type="text" name="test" value="" placeholder="재고량" />
                        <button type="button" name="" class="btn-remove btn btn-default btn-sm">
                            <span class="text-heavy-gray">&times;</span>
                        </button>
                      </li>
                    </ul>
                  </div>
                  <div class="form-group">
                    <label class="label form-item">대표사진</label>
                    <!-- <input type="input" name="product-img" value=""
                            class="form-item upload-product-img"
                            placeholder="520*530px">
                    <button type="button" name="btn-img-search" class="btn btn-default btn-sm">
                      <span class="glyphicon glyphicon-search text-heavy-gray"></span>
                    </button> -->

                    <div class="filebox">
                      <input class="upload-name border-gray" value="" disabled="disabled" placeholder="520*530px">
                      <label for="ex_filename">
                        <span class="glyphicon glyphicon-search text-heavy-gray"></span>
                      </label>
                      <input type="file" id="ex_filename" class="upload-hidden" accept="image/*">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="label form-item">상품 간단 설명</label>
                    <input type="input" name="product-brief-description" value=""
                            class="form-item input-product-brief-description">
                  </div>
                  <div class="form-gruop">
                    <label class="label form-item">상품 상세 설명</label>
                    <div id="text-editor" class="form-item text-center">
                      내용을 입력해주세요.
                    </div>
                  </div>

                  <div class="btn-container text-center">
                    <button type="button" name="btn-preview" class="btn btn-gray">미리보기</button>
                    <button type="button" name="btn-submit" class="btn btn-peach">등록</button>
                  </div>
                </form>
            </div><!-- /#product-write -->
            <div class="modal fade " id="search-seller-modal">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <button type="button" class="close btn-close text-right" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <div class="modal-header">
                    <h4 class="text-heavy-gray">셀러 검색</h4>
                  </div>
                  <div class="modal-body">
                    <div class="input-container">
                      <input type="input" name="search_input" value="" placeholder="">
                      <button type="button" name="btn-search" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-search"></span>
                      </button>
                    </div>

                    <ul id="seller-list" class="search-seller-list">
                      <?php
                          for ($i=0; $i < 2 ; $i++) { ?>
                            <li class="list-item"><a href="#">clone</a></li>
                            <li class="list-item"><a href="#">true</a></li>
                            <li class="list-item"><a href="#">boolean</a></li>
                            <li class="list-item"><a href="#">jeju</a></li>
                            <li class="list-item"><a href="#">incheon</a></li>
                            <li class="list-item"><a href="#">busan</a></li>
                            <li class="list-item"><a href="#">daegu</a></li>
                            <li class="list-item"><a href="#">seoul</a></li>
                            <?php
                          }
                      ?>

                    </ul>
                    <div class="btn-container text-center">
                      <button type="button" name="button" class="button btn-peach btn-submit">완료</button>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
          </div>
      </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script src="javascripts/admin/sidemenu_bar.js"></script>
    <script src="javascripts/admin/product_write.js"></script>
    <script src="javascripts/admin/text_editor.js"></script>
</body>
</html>
