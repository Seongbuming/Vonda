$(document).ready(function(){
  // $(function() {
  //   $('input[name="daterange"]').daterangepicker();
  // });


$('#daterange').daterangepicker(
  {
    format: 'YYYY-MM-DD',
    startDate: '2013-01-01',
    endDate: '2013-12-31'
  },
  function(start, end, label) {
    alert('A date range was chosen: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  }
);

var todaysDate = new Date();

function convertDate(date) {
  var yyyy = date.getFullYear().toString();
  var mm = (date.getMonth()+1).toString();
  var dd  = date.getDate().toString();

  var mmChars = mm.split('');
  var ddChars = dd.split('');

  return yyyy + '-' + (mmChars[1]?mm:"0"+mmChars[0]) + '-' + (ddChars[1]?dd:"0"+ddChars[0]);
}

console.log(convertDate(todaysDate));
});
