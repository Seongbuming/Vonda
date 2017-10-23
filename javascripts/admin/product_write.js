$(document).ready(function() {

//동적으로 추가한 element가 먹히지 않을 때
  $(document).on('click','.option-list .option-item-input',function(){
    $(this).removeClass('border-gray');
    $(this).addClass('select');
    console.log("on");
    $(this).siblings('.btn-remove').show();
  });

  $(document).on('click','.btn-remove',function(){
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

  $('#search-seller-modal .list-item').on('click',function (e) {
    $('#search-seller-modal .list-item').removeClass('selected');
    $(this).addClass('selected');
  });

});
