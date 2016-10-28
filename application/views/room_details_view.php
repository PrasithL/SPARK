<!-- @author Prasith Lakshan -->

<style>
    #form_widget {
        display: none;
    }
</style>

<section class="content-header">
	<h1 >
		<i class="fa fa-building-o text-primary"></i>
		Room Details
	</h1>
</section><!-- /.page-header -->

<!-- User creation form toggle button -->
<div class="row">
	<div id="form_toggle" class="col-md-5 col-md-offset-6">
		<button type="button" class="btn btn-primary btn-sm pull-right" onclick="show_form()">
			<i class="fa fa-plus"></i>&nbsp; Add Room
		</button>
	</div>
</div>


<!-- form is wrapped in this widget -->
<div class="col-sm-8 col-sm-offset-2">
	<div id="form_widget" class="box box-default">
		<div class="box-header with-border">
			<h3 class="box-title">Create Room</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" onclick="show_button()"><i class="fa fa-times"></i></button>
			</div>
		</div><!-- /.box-header -->
		<div class="box-body">
			<form class="form-horizontal" id="form" role="form"  method="POST" action="<?php echo base_url();?>index.php/Room_Details/add_room">
				<!-- Room Code -->
				<div class="form-group">
					<label class="col-sm-3 col-sm-offset-1 control-label no-padding-right" for="room_code"> Room Code </label>

					<div class="col-sm-5">
						<input type="text" id="room_code" class="form-control" name="room_code" placeholder="Enter here..." required />
					</div>
                    <span class="text-danger">*</span>

				</div>

				<!-- Description -->
				<div class="form-group">
					<label class="col-sm-3 col-sm-offset-1 control-label no-padding-right" for="description"> Description </label>

					<div class="col-sm-5">
						<input type="text" id="description" class="form-control"  name="description" placeholder="Enter here..." required />

					</div>
                    <span class="text-danger">*</span>
				</div>

				<!-- Special Devices -->
				<div class="form-group">
					<label class="col-sm-3 col-sm-offset-1 control-label no-padding-right" for="special_devices"> Special Devices </label>

					<div class="col-sm-5">
						<input type="text" id="special_devices" class="form-control"  name="special_devices" value="n/a" required />

					</div>
                    <span class="text-danger">*</span>
				</div>

				<!-- Projectors and stuff -->
				<div class="form-group">
		            <label class="col-sm-3 col-sm-offset-1 control-label no-padding-right"> Other </label>

		            <div class="col-sm-5">
		                <div class="checkbox">
		                    <label><input type="checkbox" name="projector" value="1" >Projector</label>
		                </div>
		                <div class="checkbox">
		                    <label><input type="checkbox" name="projector_screen" value="1"  >Projector Screen</label>
		                </div>
		            </div>
		        </div>

				<!-- Buttons -->
				<div class="clearfix">
					<div class="col-md-offset-4 col-md-8">
						<button class="btn btn-info btn-sm" type="submit">
							<i class="ace-icon fa fa-check bigger-110"></i>
							Create
						</button>

						&nbsp; &nbsp;
						<button class="btn btn-sm" type="reset">
							<i class="ace-icon fa fa-undo bigger-110"></i>
							Reset
						</button>
					</div>
				</div>

			</form>

		</div>
	</div>
</div>

<br>

<?php
	// Notification for user creation ERROR
	if (isset($result)) {
		if ($result == 0) {
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

					A record already exists with the given code
					<br />
				</div>
			</div>
<?php
		}
	}
?>

<?php
	// Notification for user creation SUCCESS
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

					Record creation successful.
					<br />
				</div>
			</div>
<?php
		}
	}
?>

<?php
	// Notification for record update SUCCESS
	if (isset($update_result)) {
		if ($update_result == 1) {
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

					Record update successful.
					<br />
				</div>
			</div>
<?php
		}
	}
?>

<div class="space-10"></div>

<div class="row">
	<div id="table_box" class="col-md-10 col-md-offset-1">
		<div class="box box-primary">
			<div class="box-body">
				<table id="table" class="table table-striped table-hover table-bordered ">
					<thead>
						<tr>
							<th>Room Code</th>
							<th>Description</th>
							<th width='20%'>Special Devices</th>
							<th>Other</th>
                            <th>Created by</th>
							<th>Status</th>
							<th>Actions</th>
						</tr>
					</thead>

					<tbody>
						<?php foreach ($rooms as $room) { ?>
							<tr class="<?php if($room->status == 'disabled') echo 'text-muted'; ?>">
								<td><?php echo $room->room_code; ?></td>
								<td><?php echo $room->description; ?></td>
								<td><?php echo $room->special_devices; ?></td>
								<td>
									<?php if($room->projector == '1') {echo "<i class='fa fa-check text-green'></i>";} else {echo "<i class='fa fa-times text-orange'></i>";} ?> Projector
									<br />
									<?php if($room->projector_screen == '1') {echo "<i class='fa fa-check text-green'></i>";} else {echo "<i class='fa fa-times text-orange'></i>";} ?> Proj. Screen
								</td>
								<td>
									<?php echo $room->created_by; ?>
									<br />
									<?php echo $room->created_date; ?>
								</td>
								<td><?php echo $room->status; ?></td>
								<td>
									<?php if($room->status == 'active') { ?>
										<form onsubmit="return confirm_disable()" action="<?php echo base_url();?>index.php/Room_Details/disable_room" method="post" style="display:inline">
										<input type="hidden" name="room_code" value=<?php echo $room->room_code; ?>>
										<button type="submit" class="btn btn-link btn-sm" data-rel="tooltip" title="Disable room">
											<i class="fa fa-minus-square text-danger"></i>
										</button>
									<?php } else { ?>
										<form action="<?php echo base_url();?>index.php/Room_Details/enable_room" method="post" style="display:inline">
										<input type="hidden" name="room_code" value=<?php echo $room->room_code; ?>>
										<button type="submit" class="btn btn-link btn-sm" data-rel="tooltip" title="Re-activate room">
											<i class="fa fa-plus-square text-success"></i>
										</button>
									<?php } ?>

									</form>

									<?php $details = "'".$room->room_code."', '".$room->description."', '".$room->special_devices."', '".$room->projector."', '".$room->projector_screen."'"; ?>

									<button type="button" onclick="open_edit_modal(<?php echo $details; ?>)" class="btn btn-link btn-sm" data-rel="tooltip" title="Edit Details">
										<i class="fa fa-pencil"></i>
									</button>

								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>


<form action="<?php echo base_url();?>index.php/Room_Details/update_room_details" method="POST" id="form">
	<div class="modal fade modal-default" >
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title "><i class="fa fa-pencil-square-o"> Edit Details</i></h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<!-- current room code -->
						<input type="hidden" id="current_room_code" name="current_room_code">
						<!-- Room Code -->
						<div class="form-group">
							<label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="room_code_modal"> Room Code </label>

							<div class="col-sm-5">
								<input type="text" id="room_code_modal" class="form-control" name="room_code" placeholder="Enter here..." required />
							</div>
		                    <span class="text-danger">*</span>

						</div>

						<!-- Description -->
						<div class="form-group">
							<label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="description_modal"> Description </label>

							<div class="col-sm-5">
								<input type="text" id="description_modal" class="form-control"  name="description" placeholder="Enter here..." required />

							</div>
		                    <span class="text-danger">*</span>
						</div>

						<!-- Special Devices -->
						<div class="form-group">
							<label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="special_devices_modal"> Special Devices </label>

							<div class="col-sm-5">
								<input type="text" id="special_devices_modal" class="form-control"  name="special_devices" value="n/a" required />

							</div>
		                    <span class="text-danger">*</span>
						</div>

						<!-- Projectors and stuff -->
						<div class="form-group">
				            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right"> Other </label>

				            <div class="col-sm-5">
				                <div class="checkbox">
				                    <label><input type="checkbox" id="projector_modal" name="projector" value="1" >Projector</label>
				                </div>
				                <div class="checkbox">
				                    <label><input type="checkbox" id="projector_screen_modal" name="projector_screen" value="1"  >Projector Screen</label>
				                </div>
				            </div>
				        </div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-flat btn-default " data-dismiss="modal">Cancel</button>
					<button id="pass_btn" type="submit" class="btn btn-flat btn-primary pull-right" enabled>Update</button>
				</div>
			</div> <!-- /.modal-content -->
		</div> <!-- /.modal-dialog -->
	</div> <!-- /.modal -->
</form>


<script type="text/javascript">
	var current_page = "Room Details"

	$(function () {

		$('#table').DataTable({
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": true
		});

		$('[data-rel=tooltip]').tooltip();
	});

	function open_edit_modal(room_code, description, special_devices, projector, projector_screen) {
		$('#room_code_modal').val(room_code);
		$('#current_room_code').val(room_code);
		$('#description_modal').val(description);
		$('#special_devices_modal').val(special_devices);
		if (projector == "1") {
			$('#projector_modal').prop('checked', true);
		}

		if (projector_screen == "1") {
			$('#projector_screen_modal').prop('checked', true);
		}

		$('.modal').modal('show');
	}

	// this function is to clear the inputs on each modal close
	$('.modal').on('hide.bs.modal', function () {
		console.log("sjkdh");
		$('#room_code_modal').val("");
		$('#description_modal').val("");
		$('#special_devices_modal').val("");
		$('#projector_modal').prop('checked', false);
		$('#projector_screen_modal').attr('checked', false);
	});

	function confirm_disable() {
		return confirm("Disable room?")
	}

	function show_form() {
		$('#table_box').hide();
		$('#form_toggle').hide();
		$('#form_widget').slideDown();
	}

	function show_button() {
		$('#form_widget').slideUp();
		$('#form_toggle').fadeIn();
		$('#table_box').fadeIn();
	}
</script>
