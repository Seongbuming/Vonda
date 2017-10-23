$(document).ready(function() {
  var color_set = [  '#2FA5AB', '#718CB4',  '#69A17F','#CDC35D','#A8A8A8'];

  var data_creator = [];
  var creator_label = [];
  var data_sales = [];
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
  //var data_sales = [0,9,10,2,25,79,25,71,79, 71];

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
