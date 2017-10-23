$(document).ready(function() {

  $(".btn-submit").click(function(event) {
    //$(".banner_form").submit();
    // //폼객체를 불러와서
    var form = $(".banner_form")[0];
    //FormData parameter에 담아줌
    var formData = new FormData();
    formData.append("image1", $(".upload-hidden")[0].files[0]);
    formData.append("image2", $(".upload-hidden")[1].files[0]);
    formData.append("image3", $(".upload-hidden")[2].files[0]);
    formData.append("image4", $(".upload-hidden")[3].files[0]);
    formData.append("image5", $(".upload-hidden")[4].files[0]);

    $(".creator_name").each(function () {
      formData.append("creators[]", $(this).val());
    });

    $.ajax({
      type: "POST",
      url: "http://api.siyeol.com/admin/banner?token="+readCookie('token'),
      dataType: "json",
      processData: false,
      contentType: false,
      data: formData,
      success: function (res) {
        if (res.code != 200) {
          alert(res.message);
        } else {
          alert('성공적으로 메인 배너를 변경하였습니다.');
          location.reload();
        }
      },
      error: function (err) {
        alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
      }
    });
  });

  $(".banner-item-add").click(function(e) {
    var target = $(".banner-item-template").clone().insertBefore(".banner-item-add");
    target.show();
    target.removeClass("banner-item-template");
  });

  $(" .category-item-input").click(function(e) {
    $(this).removeClass('border-gray');
    $(this).addClass('border-peach');
    $(this).siblings('.btn-remove').show();
  });

  $(" .btn-remove").click(function(e) {
    $(this).parent().remove();
    console.log("remove");
  });

  $(".category-item-add").click(function(e) {
    var target = $(".category-item-template").clone().insertBefore(".category-item-add");
    target.show();
    target.removeClass("category-item-template");
    target.children().show();
  });

  $(document).mouseup(function(e) {
    var container = $(".category-item-input");
    if (container.has(e.target).length === 0) {
      container.removeClass('border-peach');
      container.siblings('.btn-remove').hide();
    }
  });

//동적으로 추가한 element가 먹히지 않을 때
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

});
