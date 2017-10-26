$(document).ready(function() {
  var color_set = [  '#2FA5AB', '#718CB4',  '#69A17F','#CDC35D','#A8A8A8'];

  var data_creator = [];
  var creator_label = [];
  // var data_sales = [];
  var data_sales_label = [];

  $(".chart-item-value").each(function (){
    if (!$(this).hasClass("total")) {
      creator_label.push($(this).parent().find(".chart-item-label").text());
      data_creator.push($(this).attr("count"));
    }
  });

  var month = 1;

  $(".month_data").each(function (){
    data_sales_label.push(month+"월");
    data_sales.push($(this).val());

    month++;
  });

  //var data_creator = [79, 71, 25, 23, 2];
  var data_product= [2,25,79,25,71];
  var data_sales = [0,9,10,2,25,79,25,71,79, 71];

  var valid_creator = document.getElementById("creator-chart");
  var valid_sales = document.getElementById("sales-chart");
  var valid_product = document.getElementById("product-chart");

  if(valid_creator !== null){

    var ctx_creator = valid_creator.getContext("2d");

    var chart_creator = new Chart(ctx_creator,
      {
        type: 'horizontalBar',
        data: {
          labels: creator_label,
        datasets: [{
            label: '판매수',
            data: data_creator,
            backgroundColor: color_set,
          }]
        },
        options: {
          scales:
          {
            //hide labels 라벨 숨기기
            yAxes: [{
               display: false
             }]
          },
          events: false,
          tooltips: {
              enabled: false
          },
          hover: {
              animationDuration: 0
          },
          animation: {
              duration: 1,
              onComplete: function () {
                  var chartInstance = this.chart, ctx = chartInstance.ctx;
                  ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                  ctx.textAlign = 'center';
                  ctx.textBaseline = 'bottom';

                  this.data.datasets.forEach(function (dataset, i) {
                      var meta = chartInstance.controller.getDatasetMeta(i);
                      meta.data.forEach(function (bar, index) {
                          var data = dataset.data[index];
                          ctx.fillStyle = color_set[index];
                          ctx.fillText(data, bar._model.x + 10, bar._model.y + 8);
                      });
                  });
              }
          }
        }
    });
  }

  if(valid_product !== null){
    var ctx_product = valid_product.getContext("2d");
    var chart_procut = new Chart(ctx_product,
      {
        type: 'horizontalBar',
        data: {
          labels: ["A", "B", "C", "D", "E"],
        datasets: [{
            label: '판매수',
            data: data_product,
            backgroundColor: color_set,
          }]
        },
        options: {
          scales:
          {
            //hide labels 라벨 숨기기
            yAxes: [{
               display: false
             }]
          },
          events: false,
          tooltips: {
              enabled: false
          },
          hover: {
              animationDuration: 0
          },
          animation: {
              duration: 1,
              onComplete: function () {
                  var chartInstance = this.chart, ctx = chartInstance.ctx;
                  ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                  ctx.textAlign = 'center';
                  ctx.textBaseline = 'bottom';

                  this.data.datasets.forEach(function (dataset, i) {
                      var meta = chartInstance.controller.getDatasetMeta(i);
                      meta.data.forEach(function (bar, index) {
                          var data = dataset.data[index];
                          ctx.fillStyle = color_set[index];
                          ctx.fillText(data, bar._model.x + 10, bar._model.y + 8);
                      });
                  });
              }
          }
        }
    });
  }


var type = '';

  $('.btn-daily').on('click',function () {
    type = "daily";
    getData("daily");
  });

  $('.btn-weekly').on('click',function () {
    type = "weekly";
    getData("weekly");
  });

  $('.btn-monthly').on('click',function () {
    type = "monthly";
    getData("monthly");
  });

  if(valid_sales !== null){
    var ctx_sales = valid_sales.getContext("2d");

    var chart_sales = new Chart(ctx_sales,
      {
        // The type of chart we want to create
      type: 'line',

      // The data for our dataset
      data: {
          labels: data_sales_label,
          datasets: [{
            "label":"판매수",
            "data":data_sales,
            "fill":false,
            "borderColor":"#52CC5D",
            "lineTension":0.1
          }]
      }
    });
  }
});

function getData(type){
  var href = window.location.href;
  var page = href.substring(href.lastIndexOf("/")+1,href.indexOf(".php"));

  $.ajax({
    type: "GET",
    url: "http://api.siyeol.com/"+page+"/statics?token="+ readCookie('token'),
    dataType: "json",
    data: {},
    success: function (res) {
      if (res.code == 200) {
        console.log(res[type]);

        // $.each( res.data.data, function (key, value) {
          // });

      }
    },
    error: function (err) {
      alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
    }

  });
}

/**
 * @param {int} The month number, 0 based
 * @param {int} The year, not zero based, required to account for leap years
 * @return {Date[]} List with date objects for each day of the month
 */
function getDaysInMonth(month, year) {
     var date = new Date(year, month, 1);
     var days = [];
     while (date.getMonth() === month) {
        days.push(date.getDate());
        date.setDate(date.getDate() + 1);
     }
     return days;
}

// function getDateStr(myDate){
// 	return (myDate.getFullYear() + '-' + (myDate.getMonth() + 1) + '-' + myDate.getDate());
// }

function getDateStr(myDate){
	return (myDate.getFullYear() + '-' + (myDate.getMonth() + 1) + '-' + myDate.getDate());
}

/* 오늘 날짜를 문자열로 반환 */
function today() {
  var d = new Date();
  return getDateStr(d);
}

/* 오늘로부터 1주일전 날짜 반환 */
function lastWeek() {
  var d = new Date();
  var dayOfMonth = d.getDate();
  d.setDate(dayOfMonth - 7);
  return getDateStr(d);
}

/* 오늘로부터 1개월전 날짜 반환 */
function lastMonth() {
  var d = new Date();
  var monthOfYear = d.getMonth();
  d.setMonth(monthOfYear - 1);
  return getDateStr(d);
}

function test(){
  var today = new Date();
  var monthOfYear = today.getMonth();

  //한달 전 날짜.
  var target = new Date();
  target.setMonth(monthOfYear - 1);

  var range = [];
  do{
  	range.push(getDateStr(target));
  }while( target.setDate(target.getDate() + 1) != today.getTime());
}
