<!-- @author Prasith Lakshan -->

<section class="content-header">
	<h1 >
		<i class="fa fa-laptop text-primary"></i>
		Computer Details
	</h1>
</section><!-- /.page-header -->

<br>

<div class="row">
	<div class="col-sm-12" style="padding:2em; padding-top:0;">
		<!-- Custom Tabs -->
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#tab_1" data-toggle="tab"> <i class="fa fa-plus-square-o"></i> Add</a></li>
				<li><a href="#tab_2" data-toggle="tab"> <i class="fa fa-th-large"></i> View All</a></li>
			</ul>
			<div class="tab-content">
		  		<div class="tab-pane active" id="tab_1">

					<div class="row">
						<?php
							// Notification for record  EXISTS
							if (isset($result)) {
								if ($result == 0) {
						?>
									<div class="col-md-6 col-md-offset-3">
										<div class="alert alert-warning">
											<button type="button" class="close" data-dismiss="alert">
												<i class="ace-icon fa fa-times"></i>
											</button>

											<strong>
												<i class="ace-icon fa fa-times"></i>
												Error!
											</strong>

											A record already exists with the given Computer ID
											<br />
										</div>
									</div>
						<?php
								}
							}
						?>

						<?php
							// Notification for record creation SUCCESS
							if (isset($result)) {
								if ($result == 1) {
						?>
									<div class="col-md-6 col-md-offset-3">
										<div class="alert alert-success">
											<button type="button" class="close" data-dismiss="alert">
												<i class="ace-icon fa fa-times"></i>
											</button>

											<strong>
												<i class="ace-icon fa fa-check"></i>
												Done!
											</strong>

											 Record added successfully.
											<br />
										</div>
									</div>
						<?php
								}
							}
						?>

						<?php
							// Notification for record creation ERROR
							if (isset($change_pass_result)) {
								if ($change_pass_result == -1) {
						?>
									<div class="col-md-6 col-md-offset-3">
										<div class="alert alert-danger">
											<button type="button" class="close" data-dismiss="alert">
												<i class="ace-icon fa fa-times"></i>
											</button>

											<strong>
												<i class="ace-icon fa fa-times"></i>
												Error!
											</strong>

											Record creation failed!
											<br />
										</div>
									</div>
						<?php
								}
							}
						?>

  					</div>

					<!-- new computer creation form comes here -->
					<div class="row">
						<?php include 'computer_details_form.php'; ?>
					</div>
				</div>

				<div class="tab-pane" id="tab_2">
					<div id="boxes" class="row">
						<?php
							foreach ($computers as $computer) {
						?>
							<div class="col-lg-3 col-xs-6">
								<!-- small box -->
								<div class="small-box bg-gray">
									<div class="inner">
										<h3><?=$computer->computer_id ?></h3>
										<p class="text-muted"><?=$computer->location ?></p>
										<p class="text-muted"><?=$computer->processor." | ".$computer->motherboard." | ".$computer->ram." | ".$computer->hdd ?></p>
									</div>
									<div class="icon">
										<?php switch ($computer->status) {
											case 'Functional':
												echo '<i class="fa fa-laptop text-green"></i>';
												break;
											case 'Requires Repairs':
												echo '<i class="fa fa-laptop text-orange"></i>';
												break;
											case 'Out of service':
												echo '<i class="fa fa-laptop text-muted"></i>';
												break;
										} ?>
									</div>
									<a onclick="open_details('<?=$computer->computer_id ?>')" href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							  	</div>
							</div><!-- ./col -->
						<?php
							}
						?>
					</div>

					<div id="detail_viewer" class="row">
						<?php //include 'computer_details_form.php'; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
	var current_page = "Computer Details";

	$(function () {
		$('#detail_viewer').hide();
	});

	function open_details(computer_id) {
		// Fire off the request to server
	    request = $.ajax({
	        url: "<?php echo base_url();?>index.php/Computer_Details/show_details_of_one_computer",
	        type: "post",
	        data: "computer_id="+computer_id
	    });

		// Callback handler that will be called on success
	    request.done(function (response, textStatus, jqXHR){
	        $('#detail_viewer').html(response);
			$("#boxes").slideUp();
			$('#detail_viewer').fadeIn();
	    });
	}

	function hide_detail_view() {
		$('#detail_viewer').fadeOut();
		$("#boxes").slideDown();
	}
</script>
