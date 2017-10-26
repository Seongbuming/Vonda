$(document).ready(function() {
  var color_set = [  '#2FA5AB', '#718CB4',  '#69A17F','#CDC35D','#A8A8A8'];

  var creator_label = [];
  var data_sales_label = [];

  var data_creator = [2, 0, 0, 0, 0];
  var data_product= [1,2,0,0,0];
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
          labels: ["A", "B", "C", "D", "E"],
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
             }],
            xAxes: [{
              ticks: {
              min: 0,
              // max: 6500,
              stepSize: 10
            }
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
             }],
             xAxes: [{
               ticks: {
               min: 0,
               // max: 6500,
               stepSize: 10
             }
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
    var data = getData("daily");

    //오늘부터 한달 전 날짜까지.
    var calendar = getDailyDate();

    var test_label =[];
    var test_data = [];

    $.each(calendar, function (key, value) {
        test_label.push(value);

        if(data.length){
          if(data[data.length -1].day == value){
            test_data.push(data[data.length -1].total_count);
            data.pop();
          }else{
            test_data.push(0);
          }
        }else{
          test_data.push(0);
        }
    });

    chart_sales.data.labels = test_label.reverse();
    chart_sales.data.datasets[0].data = test_data.reverse();
    chart_sales.update();
  });

  $('.btn-weekly').on('click',function () {
    type = "weekly";
    var data = getData("weekly");

    //이번주부터 , 총 8주
    var calendar = getWeeklyDate();

    var test_label =[];
    var test_data = [];

    $.each(calendar, function (key, value) {
        test_label.push(value);

        if(data.length){
          if(data[data.length -1].week == key){
            test_data.push(data[data.length -1].total_count);
            data.pop();
          }else{
            test_data.push(0);
          }
        }else{
          test_data.push(0);
        }
    });

    chart_sales.data.labels = test_label.reverse();
    chart_sales.data.datasets[0].data = test_data.reverse();
    chart_sales.update();

  });

  $('.btn-monthly').on('click',function () {
    type = "monthly";
    var data = getData("monthly");

    //이번달부터 , 1년간
    var calendar = getMonthlyDate();

    var test_label =[];
    var test_data = [];

    $.each(calendar, function (key, value) {
        test_label.push(value+"월");

        if(data.length){
          if(data[data.length -1].month == value){
            test_data.push(data[data.length -1].total_count);
            data.pop();
          }else{
            test_data.push(0);
          }
        }else{
          test_data.push(0);
        }
    });

    chart_sales.data.labels = test_label.reverse();
    chart_sales.data.datasets[0].data = test_data.reverse();
    chart_sales.update();

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

    $('.btn-daily').trigger('click');

  }
  function getData(type){
    var href = window.location.href;
    var page = href.substring(href.lastIndexOf("/")+1,href.indexOf(".php"));
    var data = 0;

    $.ajax({
      type: "GET",
      url: "http://api.siyeol.com/"+page+"/statics?token="+ readCookie('token'),
      dataType: "json",
      data: {},
      async: false,
      success: function (res, aJaxtatus) {
        if (res.code == 200) {
          var sales_total_count = 0;
          var sales_total_price = 0;

          $.each(res[type],function (key, value) {
            sales_total_count += value.total_count * 1;
            sales_total_price += value.total_price * 1;
          });

          $('#sales-total-price').text(numberWithCommas(sales_total_price)+"원");
          $('#sales-total-count').text(sales_total_count+"건");

          if(page =="admin"){
            $('#num-of-goods').text(res.goods_count+"개");
            $('#num-of-creator').text(res.creator_count+"명");
          }

          data = res[type];
        }
      },
      error: function (err) {
        alert("알수없는 오류입니다.\n관리자에게 문의하세요.");
      }
    });
    return data;
  }

  function getDateStr(myDate){
  	return (myDate.getFullYear() + '-' + (myDate.getMonth() + 1) + '-' + myDate.getDate());
  }

  function getDailyDate() {
    var today = new Date();
    var monthOfYear = today.getMonth();

    //한달 전 날짜.
    var target = new Date();
    target.setMonth(monthOfYear - 1);

    var range = [];
    do{
      range.push(today.getDate());
    }while( today.setDate(today.getDate() - 1) != target.getTime());

    //최근부터 과거순 정렬
    return range;
  }

  function getWeeklyDate() {
    var today = new Date();
    var monthOfYear = today.getMonth();

    var range = [];
    //최근으로부터 2달 전까지라서, 8주로 잡음.
    var index = 8;

    while( index -- ){
      //일주일전
      var term = index == 7 ? 0 : 7;
      today.setDate(today.getDate() - term );
    	range.push(getDateStr(today));
    }
    //최근부터 과거순 정렬
    return range;
  }

  function getMonthlyDate() {
    var today = new Date();
    var month = today.getMonth();

    var range = [];

    for(var i = 1; i<= 12; i++){
      if(++month <=12){
        range.push(month);
      }else{
        month = 1;
        range.push(month);
      }
    }
    //최근부터 과거순 정렬
    return range;
  }

});

// 돈콤마 정규식
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
