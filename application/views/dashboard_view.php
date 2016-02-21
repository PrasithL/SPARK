<!-- @author Prasith Lakshan -->
<style media="screen">
    .info-box {
        cursor: pointer;
    }

    .info-box:hover {
        /*margin-top: 0.1em;*/
    }

    .row {
        padding:2em;
        padding-top:0;
    }
</style>

<section class="content-header">
	<h1 >
		<i class="fa fa-dashboard text-primary"></i>
		Dashboard
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section><!-- /.page-header -->

<br />

<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box" id="room_box" onclick="location.href='<?php echo base_url();?>index.php/Room_Details';" >
            <span class="info-box-icon bg-aqua"><i class="fa fa-building-o"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Active Rooms</span>
                <span class="info-box-number"><?php echo $room_count; ?></span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box" id="computer_box" onclick="location.href='<?php echo base_url();?>index.php/Computer_Details';">
            <span class="info-box-icon bg-green"><i class="fa fa-laptop"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Computers</span>
                <span class="info-box-number"><?php echo $computer_count; ?></span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box" id="issues_box" onclick="location.href='<?php echo base_url();?>index.php/Issues';">
            <span class="info-box-icon bg-red"><i class="fa fa-exclamation-triangle"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Open Issues</span>
                <span class="info-box-number"><?php echo $issue_count; ?></span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box" id="inventory_box" onclick="location.href='<?php echo base_url();?>index.php/Inventory';">
            <span class="info-box-icon bg-yellow"><i class="fa fa-wrench"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Items in Inventory</span>
                <span class="info-box-number"><?php echo $inventory_count; ?></span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->

</div><!-- /.row -->

<div class="row">
    <div class="col-md-6">
        <!-- BAR CHART -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Top 10 Computers With Most Issue Records <small>including resolved issues</small></h3>
                <div class="box-tools pull-right">
                    <!-- no buttons -->
                </div>
            </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="barChart" style="height:250px"></canvas>
                    </div>
                </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>


    <div class="col-md-6">
        <!-- LINE CHART -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Issue Openings and Closings per Day <small>for past 20 days</small></h3>
                <div class="box-tools pull-right">
                    <!-- no buttons -->
                </div>
            </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="lineChart" style="height:250px"></canvas>
                    </div>
                </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="box box-primary" >
            <div class="box-header with-border">
                <h3 class="box-title">Recently Opened Issues</h3>
                <div class="box-tools pull-right">
                     <a href="<?php echo base_url();?>index.php/Issues/" class="uppercase">Open an issue</a>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body"  >
                <ul class="products-list product-list-in-box" style="min-height: 33.5vh;">
                    <?php if(sizeof($issues) < 1) { echo "There are  no issues. Evrything seems to be fine... "; } ?>
                    <?php foreach ($issues as $issue): ?>
                        <li class="item">
                            <div class="product-img">
                                <img src="<?php echo base_url(); ?>assets2/img/issue.png" style="padding: 8px;" alt="Product Image">
                            </div>
                            <div class="product-info">
                                <span class="product-title"><?php echo $issue->issue; ?></span> <span class="small"><?php echo $issue->opened_by;  ?>, <?php if($issue->opened_date == date('Y-m-d')) {echo "today";} else {echo $issue->opened_date;} ?></span>  <span class="label label-default pull-right"><?php echo $issue->severity; ?></span></span>
                                <span class="product-description">
                                    <?php echo $issue->description; ?>
                                </span>
                            </div>
                        </li><!-- /.item -->
                    <?php endforeach; ?>
                </ul>
            </div><!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="<?php echo base_url();?>index.php/Issues/#tab_2" class="uppercase">View All Open Issues</a>
            </div><!-- /.box-footer -->
        </div><!-- /.box -->
    </div>
</div>


<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url();?>/assets2/plugins/chartjs/Chart.min.js"></script>

<script type="text/javascript">
    var current_page = 'Dashboard';

    //
    //  CONFIGURING THE LINE CHART
    //

    var areaChartData = {
          labels: [<?php
              $date = date("Y-m-d",strtotime("today -20days"));
              $date_print = date("m-d",strtotime("today -20days"));
              echo "'$date_print'";
              for ($i=0; $i < 20; $i++) {

                  $date = date_add(date_create($date), date_interval_create_from_date_string("1 days"));
                  $date_print = $date->format("m-d");
                  //if ($i%2 != 0) {
                    echo ", '$date_print'";
                //} else {
                    //echo ", ''";
                //}

                $date = $date->format("Y-m-d"); // date_create requires a string, not an object
              }
          ?>],

          datasets: [
            {
              label: "Closed",
              fillColor: "rgba(210, 214, 222, 1)",
              strokeColor: "rgba(210, 214, 222, 1)",
              pointColor: "rgba(210, 214, 222, 1)",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: [<?php
                    $date = date("Y-m-d",strtotime("today -21days"));
                    for ($j=0; $j < 21; $j++) {
                        $hasCount = false;
                        $date = date_add(date_create($date), date_interval_create_from_date_string("1 days"));
                        $date = $date->format("Y-m-d");
                        foreach ($closed_count_by_date as $record) {
                            if ($record->closed_date == $date) {
                                echo "'$record->count' ";
                                $hasCount = true;
                            }
                        }

                        if (!$hasCount) {
                            echo "'0' ";
                        }

                        if ($j < 21) {
                            echo ", ";
                        }
                    }
              ?>]
          },
          {
            label: "Opened",
            fillColor: "rgba(60,141,188,0.9)",
            strokeColor: "rgba(60,141,188,0.8)",
            pointColor: "#3b8bba",
            pointStrokeColor: "rgba(60,141,188,1)",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(60,141,188,1)",
            data: [<?php
                  $date = date("Y-m-d",strtotime("today -21days"));
                  for ($i=0; $i < 21; $i++) {
                      $hasCount = false;
                      $date = date_add(date_create($date), date_interval_create_from_date_string("1 days"));
                      $date = $date->format("Y-m-d");
                      foreach ($opened_count_by_date as $record) {
                          if ($record->opened_date == $date) {
                              echo "'$record->count' ";
                              $hasCount = true;
                          }
                      }

                      if (!$hasCount) {
                          echo "'0' ";
                      }

                      if ($i != 20) {
                          echo ", ";
                      }
                  }
            ?>]
          }
          ]
        };

    var areaChartOptions = {
          multiTooltipTemplate: "<%= datasetLabel %> - <%= value %>",
          //Boolean - If we should show the scale at all
          showScale: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: false,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - Whether the line is curved between points
          bezierCurve: false,
          //Number - Tension of the bezier curve between points
          bezierCurveTension: 0.3,
          //Boolean - Whether to show a dot for each point
          pointDot: true,
          //Number - Radius of each point dot in pixels
          pointDotRadius: 4,
          //Number - Pixel width of point dot stroke
          pointDotStrokeWidth: 1,
          //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
          pointHitDetectionRadius: 20,
          //Boolean - Whether to show a stroke for datasets
          datasetStroke: true,
          //Number - Pixel width of dataset stroke
          datasetStrokeWidth: 2,
          //Boolean - Whether to fill the dataset with a color
          datasetFill: true,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: true,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true
        };

        //-------------
        //- LINE CHART -
        //--------------
        var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
        var lineChart = new Chart(lineChartCanvas);
        var lineChartOptions = areaChartOptions;
        lineChartOptions.datasetFill = false;
        lineChart.Line(areaChartData, lineChartOptions);



        //-------------
        //- BAR CHART -
        //-------------
        var barChartData = {
          labels: [<?php
                    $k = 0;
                    foreach ($comps_with_most_issues as $computer){
                        if ($k != 0) {
                            echo ", ";
                        }
                        echo "'$computer->computer_code'";
                        $k++;
                    }
                  ?>],
          datasets: [
            {
              label: "Issues",
              fillColor: "rgba(60,141,188,0.9)",
              strokeColor: "rgba(60,141,188,0.8)",
              pointColor: "#3b8bba",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: [<?php
                    $k = 0;
                    foreach ($comps_with_most_issues as $computer){
                        if ($k != 0) {
                            echo ", ";
                        }
                        echo "'$computer->count'";
                        $k++;
                  }
                    ?>]
            }
          ]
        };

        var barChartCanvas = $("#barChart").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas);
        // barChartData.datasets[1].fillColor = "#00a65a";
        // barChartData.datasets[1].strokeColor = "#00a65a";
        // barChartData.datasets[1].pointColor = "#00a65a";
        var barChartOptions = {
          //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
          scaleBeginAtZero: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: true,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - If there is a stroke on each bar
          barShowStroke: true,
          //Number - Pixel width of the bar stroke
          barStrokeWidth: 2,
          //Number - Spacing between each of the X value sets
          barValueSpacing: 5,
          //Number - Spacing between data sets within X values
          barDatasetSpacing: 1,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          //Boolean - whether to make the chart responsive
          responsive: true,
          maintainAspectRatio: true
        };

        barChartOptions.datasetFill = false;
        barChart.Bar(barChartData, barChartOptions);



</script>
