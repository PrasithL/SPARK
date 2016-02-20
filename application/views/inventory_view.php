<!-- @author Prasith Lakshan -->

<section class="content-header">
	<h1 >
		<i class="fa fa-laptop text-primary"></i>
		Inventory Management
	</h1>
</section><!-- /.page-header -->

<br>

<div class="row">
	<div class="col-sm-12" style="padding:2em; padding-top:0;">
		<!-- Custom Tabs -->
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#tab_2" data-toggle="tab" onclick="get_item_list();"> <i class="fa fa-th-large"></i> View </a></li>
				<li ><a href="#tab_1" data-toggle="tab" onclick="hide_detail_view()"> <i class="fa fa-plus-square-o"></i> Add Items</a></li>
			</ul>
			<div class="tab-content">
		  		<div class="tab-pane" id="tab_1">

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

					<!-- new inventory item creation form comes here -->
					<div class="row">
						<?php include 'inventory_form.php'; ?>
					</div>
				</div>

				<div class="tab-pane active" id="tab_2">
					<div id="box">
						<!-- inventory detail loads here -->
					</div>

					<div class="row">
						<div id="detail_viewer" class="col-md-12">
						  <!-- Computer detail page loads here and is shown via JS -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
	var current_page = "Inventory";
	var item_id; // item id is set on 'use item' button click, in use_item_modal()

	$(function () {
		$('#detail_viewer').hide();
		get_item_list();
	});

	// AJAX
	function get_item_list() {
		check_session();
		// Fire off the request to server
	    request = $.ajax({
	        url: "<?php echo base_url();?>index.php/Inventory/get_all_items",
	        type: "post",
	        data: ""
	    });

		// Callback handler that will be called on success
	    request.done(function (response, textStatus, jqXHR){
			$('#detail_viewer').hide();
	        $('#box').html(response);
			datatable_init();
			$("#box").slideDown();
	    });
	}

	// AJAX
	function open_details(item_id) {
		// Fire off the request to server
	    request = $.ajax({
	        url: "<?php echo base_url();?>index.php/Inventory/get_details_of_item",
	        type: "post",
	        data: "id="+item_id
	    });

		// Callback handler that will be called on success
	    request.done(function (response, textStatus, jqXHR){
	        $('#detail_viewer').html(response);
			$("#box").slideUp();
			$('#detail_viewer').fadeIn();
			//disable_inputs();
	    });
	}

	function hide_detail_view() {
		get_item_list();
		$('#detail_viewer').hide();
		$("#box").slideDown();
		//enable_inputs("all");
	}

	// AJAX
	function update_details() {
		check_session();
        // Let's select and cache all the fields
        var inputs = $('#form').find("input, select, button, textarea");

        // Serialize the data in the form
        var serializedData = $('#form').serialize();
		console.log(serializedData);

		// Fire off the request to server
	    request = $.ajax({
	        url: "<?php echo base_url();?>index.php/Inventory/update_item",
	        type: "post",
	        data: serializedData
	    });

		// Callback handler that will be called on success
	    request.done(function (response, textStatus, jqXHR){
	        $('#detail_viewer').html(response);
	    });

		return false;
	}

	function use_item_modal(id) {
		$('.modal').modal({backdrop: 'static', keyboard: false});
		item_id = id;
	}

	// AJAX
	function use_item() {
		computer_code = $("#computer_code").val();

		// Fire off the request to server
	    request = $.ajax({
	        url: "<?php echo base_url();?>index.php/Inventory/use_item",
	        type: "post",
	        data: "item_id="+item_id+"&computer_code="+computer_code
	    });

		// Callback handler that will be called on success
	    request.done(function (response, textStatus, jqXHR){
	        $('#box').html(response);
			datatable_init();
			item_id = "";
			hide_location_history_modal();
			//disable_inputs();
	    });
	}


    function hide_location_history_modal() {
        $('.modal').modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    }

</script>
