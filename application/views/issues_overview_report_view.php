<!-- @author Prasith Lakshan -->

<section class="content-header">
	<h1 >
		<i class="fa fa-file-text-o text-primary"></i>
		Issues Overview Report
	</h1>
</section><!-- /.page-header -->

<br>

<div class="row">
	<div class="col-sm-12" style="padding:2em; padding-top:0;">
        <div class="box box-primary" >
            <div id="printable" class="box-body" style="padding-top:1.5em; min-height:80vh">
                <div class="col-md-3 col-md-offset-3 text-rsight">
                    Unresolved(Open) Issues<br>
                    Total Closed Issues<br>

                    <br>
                    <span class="text-primary">Issues Opened</span><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This Week <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This Month <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This Year <br>

                    <br>
                    <span class="text-primary">Issues Closed</span><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This Week <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This Month <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This Year <br>
                    <br>
                    <span class="text-primary">Rooms With Most Open Issues</span> <br>
						<?php
							for ($i=0; $i < 3; $i++) {
								if(isset($open_count_room[$i])) {
									echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
									echo $open_count_room[$i]->room_code."<br>";
								}
							}
						?>
                    <br>
                    <span class="text-primary">Rooms With Most Closed Issues</span> <br>
						<?php
							for ($i=0; $i < 3; $i++) {
								if(isset($closed_count_room[$i])) {
									echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
									echo $closed_count_room[$i]->room_code."<br>";
								}
							}
						?>
					<br>
                    <span class="text-primary">Computers With Most Open Issues</span> <br>
						<?php
							for ($i=0; $i < 5; $i++) {
								if(isset($open_issues_per_computer[$i])) {
									echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
									echo $open_issues_per_computer[$i]->computer_code."<br>";
								}
							}
						?>
					<br>
                    <span class="text-primary">Users</span> <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Most Opened By <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Most Closed By <br>
                </div>
                <div class="col-md-3 text-left">
                    : <?php echo $total_open; ?><br>
                    : <?php echo $total_closed; ?><br>
                    <br>
                    <br>
                    : <?php echo $week_open_count; ?><br>
                    : <?php echo $month_open_count; ?><br>
                    : <?php echo $year_open_count; ?><br>
                    <br>
                    <br>
                    : <?php echo $week_closed_count; ?><br>
                    : <?php echo $month_closed_count; ?><br>
                    : <?php echo $year_closed_count; ?><br>
                    <br>
                    <br>

                    <?php
						for ($i=0; $i < 3; $i++) {
							if(isset($open_count_room[$i])) { echo ": ".$open_count_room[$i]->count."<br>"; }
						}
					?>
                    <br>
                    <br>
					<?php
						for ($i=0; $i < 3; $i++) {
							if(isset($closed_count_room[$i])) { echo ": ".$closed_count_room[$i]->count."<br>"; }
						}
					?>
                    <br>
                    <br>
					<?php
						for ($i=0; $i < 5; $i++) {
							if(isset($open_issues_per_computer[$i])) { echo ": ".$open_issues_per_computer[$i]->count."<br>"; }
						}
					?>
                    <br>
                    <br>
                    : <?php if(isset($most_opened_by[0])) { echo $most_opened_by[0]->opened_by." - ".$most_opened_by[0]->count." ( ".number_format((float)$most_opened_by[0]->percent, 2, '.', '')."% )"."<br />"; }?>
                    : <?php if(isset($most_closed_by[0])) { echo $most_closed_by[0]->closed_by." - ".$most_closed_by[0]->count." ( ".number_format((float)$most_closed_by[0]->percent, 2, '.', '')."% )"."<br />"; }?>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var current_page="Issues Overview Report";

    // this function will replace the content of the page with the printable div and print it.
    // then restore the original html content
    function print_div(divName) {
         var printContents = document.getElementById(divName).innerHTML;
         var originalContents = document.body.innerHTML;

         document.body.innerHTML = printContents;

         window.print();

         document.body.innerHTML = originalContents;
    }
</script>
