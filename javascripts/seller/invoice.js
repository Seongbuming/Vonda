$(document).ready(function() {

  $('.select_company').on('change', function() {
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

function saveDelivery()
{
  var err_count = 0;

  $("#table-invoice").find("tbody tr").each(function() {
    var order_no = $(this).find(".id").text();
    var company_code = $(this).find(".select_company").val();
    var post_number = $(this).find(".invoice_number input").val();

    if (company_code == 8) {
      company_code = $(this).find(".direct_company").val();
    }

    if (company_code != "" && post_number != "") {
      console.log(order_no + " / " + company_code + " / " + post_number);
      $.ajax({
        type: "POST",
        url: "http://api.siyeol.com/seller/delivery?token="+readCookie('token'),
        dataType: "json",
        async: false,
        data: {'order_no': order_no, 'company': company_code, 'number': post_number},
        success: function (res) {
          if (res.code == 200) {
              
          } else {
              err_count ++;
          }
        },
        error: function (err) {
          alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
        }
      });
    }
  });

  if (err_count > 0) {
    alert(err_count+"개의 송장등록에 오류가 발생하였습니다.");
  } else {
    alert("모든 송장 등록이 성공적으로 완료되었습니다.");
  }

  location.reload();
}