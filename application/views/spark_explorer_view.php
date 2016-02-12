
<section class="content-header">
	<h1 >
		<i class="fa fa-sitemap text-primary"></i>
		SPARK Explorer
	</h1>
</section><!-- /.page-header -->

<br>

<div class="row">
	<div class="col-sm-12" style="padding:2em; padding-top:0;">
        <div class="box box-primary" >
            <div class="box-body" style="padding-top:1.5em; min-height:80vh">
                <div id="boxes" class="row">
                    <!-- room detail boxes loads here -->
                </div>

				<div id="details_row" class="row">
					<button type="button" class="btn btn-primary" onclick="hide_computer_details()" style="margin-left:1em;">
						<i class="fa fa-arrow-left"></i>&nbsp;
						Back to Rooms View
					</button>
					<p>

					</p>

					<div id="computer_details" class="col-md-12">
						<!-- computer details of rooms loads here -->
					</div>
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


<script type="text/javascript">
    var current_page = "SPARK Explorer";
	var room_code_x = "";

	$(function () {
		$('#details_row').hide();
		load_room_boxes();
	});

	// AJAX
	function open_room(room_code) {
		room_code_x = room_code;

		// Fire off the request to server
	    request = $.ajax({
	        url: "<?php echo base_url();?>index.php/Spark_Explorer/get_computer_in_room",
	        type: "post",
	        data: "room_code="+room_code
	    });

		// Callback handler that will be called on success
	    request.done(function (response, textStatus, jqXHR){
	        $('#computer_details').html(response);
			$("#boxes").slideUp();
			$('#details_row').fadeIn();
			//disable_inputs();
	    });
	}

	function hide_computer_details() {
		$('#details_row').fadeOut();
		$("#boxes").slideDown();
		load_room_boxes();
	}

	// this is to load the room detail boxes on page load and after updating a computers details.
	// if the location has been update, it should be reflected in the room boxes without reloading.
	// this function will reload the details in the background
	function load_room_boxes() {
		// Fire off the request to server
	    request = $.ajax({
	        url: "<?php echo base_url();?>index.php/Spark_Explorer/get_room_boxes",
	        type: "post",
	        data: ""
	    });

		// Callback handler that will be called on success
	    request.done(function (response, textStatus, jqXHR){
	        $('#boxes').html(response);
	    });
	}

	//
	// following JS codes were copied from computer_details_view.php
	//

	// AJAX
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
			$("#details_row").slideUp();
			$('#detail_viewer').fadeIn();
			disable_inputs();
	    });
	}

	function hide_detail_view() {
		//get_boxes();
		$('#detail_viewer').hide();
		$("#details_row").slideDown();
		//enable_inputs("all");
	}

	// AJAX
	function update_details() {
		check_session();
        // Let's select and cache all the fields
        var inputs = $('#form').find("input, select, button, textarea");

        // Serialize the data in the form
        var serializedData = $('#form').serialize();
		//console.log(serializedData);

		// Fire off the request to server
	    request = $.ajax({
	        url: "<?php echo base_url();?>index.php/Computer_Details/update_computer",
	        type: "post",
	        data: serializedData
	    });

		// Callback handler that will be called on success
	    request.done(function (response, textStatus, jqXHR){
	        $('#detail_viewer').html(response);
			disable_inputs();
			// these will update the data in the other views to reflect any changes made
			refresh_comps_in_room_after_update();
	    });

		return false;
	}

	function refresh_comps_in_room_after_update() {
		// Fire off the request to server
		request = $.ajax({
			url: "<?php echo base_url();?>index.php/Spark_Explorer/get_computer_in_room",
			type: "post",
			data: "room_code="+room_code_x
		});

		// Callback handler that will be called on success
		request.done(function (response, textStatus, jqXHR){
			$('#computer_details').html(response);
		});
	}

	//
	// Copied from computer_details_form.php
	//

	// to diasble all inputs when viewing a computers details
    function disable_inputs() {
        $(".clearfix").hide(); // hiding the submit/reset buttons. they are inside a div with the class .clearfix

        //  make the input fields read-only if viewing a loan application
        var inputs=document.getElementsByTagName('input');
        for(i=0;i<inputs.length;i++){
            inputs[i].readOnly=true;
        }

        // disable the select boxes
        var inputs=document.getElementsByTagName('select');
        for(i=0;i<inputs.length;i++){
            inputs[i].disabled=true;
        }

        // disable the select boxes
        var inputs=document.getElementsByTagName('textarea');
        for(i=0;i<inputs.length;i++){
            inputs[i].readOnly=true;
        }
    }

</script>
