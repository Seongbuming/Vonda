$(document).ready(function() {
  var color_set = [  '#2FA5AB', '#718CB4',  '#69A17F','#CDC35D','#A8A8A8'];
  var ctx = document.getElementById("myChart");
  var myChart = new Chart(ctx, {
      type: 'horizontalBar',
      data: {
        labels: ["A", "B", "C", "D", "E"],
      datasets: [{
          label: '판매수',
          data: [79, 71, 25, 23, 2],
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
                          console.log(bar._model.x);
                      });
                  });
              }
          }
      }
  });

});
