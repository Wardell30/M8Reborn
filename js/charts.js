function createPieChart(arrayData){
  var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
  var pieChart = new Chart(pieChartCanvas);
  var PieData = arrayData;

  var pieOptions = {
    segmentShowStroke: true,
    segmentStrokeColor: "#fff",
    segmentStrokeWidth: 2,
    percentageInnerCutout: 50,
    animationSteps: 100,
    animationEasing: "easeOutBounce",
    animateRotate: true,
    animateScale: false,
    responsive: true,
    maintainAspectRatio: true,
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
  };

  pieChart.Doughnut(PieData, pieOptions);
}

function getLineChart(dataset){
  var areaChartData = {
    labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
    datasets: dataset
  };

  var areaChartOptions = {
    showScale: true,
    scaleShowGridLines: false,
    scaleGridLineColor: "rgba(0,0,0,.05)",
    scaleGridLineWidth: 1,
    scaleShowHorizontalLines: true,
    scaleShowVerticalLines: true,
    bezierCurve: true,
    bezierCurveTension: 0.3,
    pointDot: false,
    pointDotRadius: 4,
    pointDotStrokeWidth: 1,
    pointHitDetectionRadius: 20,
    datasetStroke: true,
    datasetStrokeWidth: 2,
    datasetFill: true,
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
    maintainAspectRatio: true,
    responsive: true
  };

  var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
  var lineChart = new Chart(lineChartCanvas);
  var lineChartOptions = areaChartOptions;
  lineChartOptions.datasetFill = false;
  lineChart.Line(areaChartData, lineChartOptions);
}

function getDataForLineChart(){
  var dataset = null;

  return dataset;
}

function getDataForPieChart(value){
  var arrayData;

  if(value == 1){
    arrayData = [{
      value: 50,
      color: "#f56954",
      highlight: "#f56954",
      label: "Task 1"
    },{
      value: 50,
      color: "#4885ed",
      highlight: "#4885ed",
      label: "Task 2"
    }];
  } else {
    arrayData = [{
      value: 100,
      color: "#f56954",
      highlight: "#f56954",
      label: "No info"
    }];
  }

  return arrayData;
}

function getDataForNotesUCChart(){
  var arrayData = new Array();
  $.ajax({
       type: "POST",
       url: "getucsinfochart.php",
       data:{action:'call_this'},
       success:function(html) {
         var eachUc = html.split(";");

         var test = eachUc[0].split(",");

         if(test[0] === "No info"){
           var colorRandom = '#' + ("000000" + Math.random().toString(16).slice(2, 8).toUpperCase()).slice(-6);

           var ucObject = new Object();

           arrayData.push(ucObject);

           ucObject.value = test[1];
           ucObject.color = colorRandom;
           ucObject.highlight = colorRandom;
           ucObject.label = test[0];
         } else {
           for(var i = 0; i < eachUc.length - 1; i++){
             var ucInfo = eachUc[i].split(",");

             var colorRandom = '#' + ("000000" + Math.random().toString(16).slice(2, 8).toUpperCase()).slice(-6);

             var ucObject = new Object();

             arrayData.push(ucObject);

             ucObject.value = ucInfo[1];
             ucObject.color = colorRandom;
             ucObject.highlight = colorRandom;
             ucObject.label = ucInfo[0];
           }
         }

         createNotesUCChart(arrayData);
       }
  });
}

function createNotesUCChart(arrayData){
  var pieChartCanvas = $("#notesUC").get(0).getContext("2d");
  var pieChart = new Chart(pieChartCanvas);
  var PieData = arrayData;

  var pieOptions = {
    segmentShowStroke: true,
    segmentStrokeColor: "#fff",
    segmentStrokeWidth: 2,
    percentageInnerCutout: 50,
    animationSteps: 100,
    animationEasing: "easeOutBounce",
    animateRotate: true,
    animateScale: false,
    responsive: true,
    maintainAspectRatio: true,
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
  };

  pieChart.Doughnut(PieData, pieOptions);
}

  $( document ).ready(function() {
    var arrayData = getDataForPieChart(0);
    createPieChart(arrayData);

    getDataForNotesUCChart();

    var dataset = getDataForLineChart();

    if(dataset === null){
      dataset = [
        {
          label: "No info",
          fillColor: "rgba(255, 0, 0, 1)",
          strokeColor: "rgba(255, 0, 0, 1)",
          pointColor: "rgba(255, 0, 0, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: ["No info","No info","No info","No info","No info","No info","No info"]
        }
      ]
    }

    getLineChart(dataset);

    $( "#rightUCBtn" ).click(function() {
      var arrayData = getDataForPieChart(1);
      createPieChart(arrayData);
      document.getElementById('ProjectUCTitle').innerHTML = 'UC 2';
    });
    $( "#leftUCBtn" ).click(function() {
      var arrayData = getDataForPieChart(0);
      createPieChart(arrayData);
      document.getElementById('ProjectUCTitle').innerHTML = 'UC 1';
    });
  });
