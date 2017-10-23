$(document).ready(function() {

  $(".goods_form").on('submit', function (event) {
    event.preventDefault();
    var form = $(".banner_form")[0];
    //FormData parameter에 담아줌
    var formData = new FormData();
    var options = new Array();

    formData.append("goods_image", $("#ex_filename")[0].files[0]);

    $('.goods_form input[type=input]').each(function (){
      if ($(this).attr("name") != undefined && $(this).val() != "") {
        if ($(this).attr("name") == "product-stock" && $(this).css("display") == "none") {
          //continue;
        } else {
          formData.append($(this).attr("name"), $(this).val());
        }
      }
    });

    $('.goods_form input[type=text]').each(function (){
      if ($(this).attr("name") != undefined && $(this).val() != "") {
        console.log($(this).attr("name")+" : "+$(this).val());
        formData.append($(this).attr("name"), $(this).val());
      }
    });

    formData.append("content", "test");
    formData.append("shippingRule", "charge");

    $.ajax({
      type: "POST",
      url: "http://api.siyeol.com/admin/goods?token="+readCookie('token'),
      dataType: "json",
      processData: false,
      contentType: false,
      data: formData,
      success: function (res) {
        console.log(res);
        if (res.code != 200) {
          alert(res.message);
        } else {
          alert('상품 등록 완료');
          //location.reload();
        }
        return false;
      },
      error: function (err) {
        console.log(err);
        alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
        return false;
      }
    });

  });

//동적으로 추가한 element가 먹히지 않을 때
  $(document).on('click','.option-list .option-item-input',function(){
    $(this).removeClass('border-gray');
    $(this).addClass('select');
    console.log("on");
    $(this).siblings('.btn-remove').show();
  });

  $(document).on('click','.btn-remove',function(){
    if ($(this).parent().parent().find("li.option-item").length == 2) {
      $(".product-stock").css("display", "block");
    }

    $(this).parent().remove();
    console.log("remove");
  });

  $(document).on('click','.option-list .option-item-add',function(){
    var target = $(".option-list .option-item-template").clone().insertBefore(".option-list .option-item-add");
    target.show();
    target.removeClass("option-item-template");
    target.children().show();
  });

  $(document).on('click','.option-value-list .option-item-add',function(){
    var target = $(".option-value-list .option-item-template").clone().insertBefore(".option-value-list .option-item-add");
    target.show();
    target.removeClass("option-item-template");
    target.children().show();

    if ($(this).parent().find("li.option-item").length > 1) {
      $(".product-stock").css("display", "none");
    }
  });
  
  $(document).on('change','.filebox .upload-hidden',function(){

    var filename ='';
    if (window.FileReader) { // modern browser
      filename = $(this)[0].files[0].name;
    } else {
      // old IE
      filename = $(this).val().split('/').pop().split('\\').pop(); // 파일명만 추출
    }
    // 추출한 파일명 삽입
    $(this).siblings('.upload-name').val(filename);
  });

  $(document).mouseup(function (e) {
    var container = $(".option-item-input");
    if(container.has(e.target).length === 0){
      container.removeClass('select');
    }
  });

});
