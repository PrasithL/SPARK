<!-- @author Prasith Lakshan -->

<section class="content-header">
	<h1 >
		<i class="fa fa-exclamation-circle text-primary"></i>
		Issues
	</h1>
</section><!-- /.page-header -->

<br>

<div class="row">
	<div class="col-sm-12" style="padding:2em; padding-top:0;">
		<!-- Custom Tabs -->
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#tab_1" data-toggle="tab" onclick=""> <i class="fa fa-plus-square-o"></i> Open Issue</a></li>
				<li><a href="#tab_2" data-toggle="tab" onclick="get_issues()"> <i class="fa fa-th-list"></i> Currently Open <small id="open_count" class="label label-default"></small></a></li>
				<li><a href="#tab_3" data-toggle="tab" onclick="get_closed_issues()"> <i class="fa fa-th-list"></i> Closed</a></li>
			</ul>
			<div class="tab-content">
		  		<div class="tab-pane active" id="tab_1">

					<div class="row">

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
						<?php include 'issues_form.php'; ?>
					</div>
				</div>

				<div class="tab-pane" id="tab_2">
					<div id="box">
                        <!-- Issue list loads here -->

					</div>
				</div>

				<div class="tab-pane" id="tab_3">
					<div id="closed">
                        <!-- Closed issue list loads here -->

					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
	var current_page = "Issues";

	$(function () {
		get_issues();
	});

	// AJAX
	function get_issues() {
		check_session();
		// Fire off the request to server
	    request = $.ajax({
	        url: "<?php echo base_url();?>index.php/Issues/get_issues",
	        type: "post",
	        data: ""
	    });

		// Callback handler that will be called on success
	    request.done(function (response, textStatus, jqXHR){
	        $('#box').html(response);
			$('#open_count').html(open_count);
	    });
	}

	// AJAX
	function get_closed_issues() {
		check_session();
		// Fire off the request to server
	    request = $.ajax({
	        url: "<?php echo base_url();?>index.php/Issues/get_closed_issues",
	        type: "post",
	        data: ""
	    });

		// Callback handler that will be called on success
	    request.done(function (response, textStatus, jqXHR){
	        $('#closed').html(response);
	    });
	}

</script>
