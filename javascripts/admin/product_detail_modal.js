$(document).ready(function() {
  $('.product-detail-link').on("click",function () {
    var target = $(this).children("img").attr("src");
    console.log(target);

    $("#product-detail-modal .modal-body").html('<img style="width:100%" src="'+ target +'" alt="" />');
  });

  $('.btn-search').click(function(){
    // 크리에이터 검색
    var keyword = $(".creator_name").val();

    $.ajax({
      type: "GET",
      url: "http://api.siyeol.com/creator/search?query="+keyword,
      dataType: "json",
      success: function (res) {
        if (res.code != 200) {
          alert(res.message);
        } else {
          // 목록 비우기
          $("#creator-list").html('');

          $.each(res.datas, function(index, creator) {
            $("#creator-list").append("<li class='list-item' data-id='"+creator.id+"'><a href='#'>"+creator.nickname+"</a></li>");
          });

          $('#search-creator-modal .list-item').on('click',function (e) {
            $('#search-creator-modal .list-item').removeClass('selected');
            $(this).addClass('selected');
          });
        }
      },
      error: function (err) {
        console.log(err);
        alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
        return false;
      }
    });
  });
});

function addCreator()
{
	var creator_id = $('#search-creator-modal .list-item.selected').data('id');
	var creator_name = $('#search-creator-modal .list-item.selected').text();

	if (creator_id == undefined) {
		alert('크리에이터를 선택하세요.');
	} else {
		// AJAX
		$.ajax({
	      type: "POST",
	      url: "http://api.siyeol.com//admin/goods/"+getParam('id')+"/creator/"+creator_id+"?token="+readCookie('token'),
	      dataType: "json",
	      success: function (res) {
	        console.log(res);
	        if (res.code != 200) {
	          alert(res.message);
	        } else {
	          alert('크리에이터 등록이 완료되었습니다.');
	          location.reload();
	        }
	        return false;
	      },
	      error: function (err) {
	        console.log(err);
	        alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
	        return false;
	      }
	    });
		$("#search-creator-modal").removeClass('show');
	}
}

function saveCalculate()
{
	var creator_percentage = parseFloat($(".price input").val());

	$.ajax({
      type: "POST",
      url: "http://api.siyeol.com//admin/goods/"+getParam('id')+"/calculate?token="+readCookie('token'),
      dataType: "json",
      data: {'creator_percentage':creator_percentage},
      success: function (res) {
        console.log(res);
        if (res.code != 200) {
          alert(res.message);
        } else {
          alert('크리에이터 정산 정보 업데이트가 완료되었습니다.');
          location.reload();
        }
        return false;
      },
      error: function (err) {
        console.log(err);
        alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
        return false;
      }
    });
}