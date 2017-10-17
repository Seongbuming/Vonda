$(document).ready(function() {

  $('#select_company').on('change', function() {
    var inputDisabled = $(this).val() == 8 ? false : true;
      $(this).siblings('input').attr("disabled",inputDisabled);
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
