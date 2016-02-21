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
        <div class="box box-primary" >
            <div class="box-header with-border">
                <h3 class="box-title">Recently Opened Issues</h3>
                <div class="box-tools pull-right">
                     <a href="<?php echo base_url();?>index.php/Issues/" class="uppercase">Open an issue</a>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body" >
                <ul class="products-list product-list-in-box" style="min-height: 40vh;">
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

<script type="text/javascript">
    var current_page = 'Dashboard';

    $('#room_box').click(function () {
        window.location '<?php echo base_url();?>index.php/Room_Details' ?>;
    })
</script>
