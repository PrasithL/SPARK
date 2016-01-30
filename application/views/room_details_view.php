<!-- @author Prasith Lakshan -->

<section class="content-header">
	<h1 >
		<i class="fa fa-building-o text-primary"></i>
		Room Details
	</h1>
</section><!-- /.page-header -->

<!-- User creation form toggle button -->
<div class="row">
	<div id="form_toggle" class="col-md-5 col-md-offset-5">
		<button type="button" class="btn btn-primary btn-sm pull-right" onclick="show_form()">
			<i class="fa fa-plus"></i>&nbsp; Add Room
		</button>
	</div>
</div>


<!-- form is wrapped in this widget -->
<div class="col-sm-6 col-sm-offset-3">
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

<div class="space-10"></div>

<div class="row">
	<div id="table_box" class="col-md-8 col-md-offset-2">
		<div class="box box-primary">
			<div class="box-body">
				<table id="table" class="table table-striped table-hover table-borderedx ">
					<thead>
						<tr>
							<th>Room Code</th>
							<th>Description</th>
							<th>Created Date</th>
                            <th>Created by</th>
							<th>Status</th>
							<th>Actions</th>
						</tr>
					</thead>

					<tbody>
						<?php foreach ($rooms as $room) { ?>
							<tr class="<?php if($room->status == 'disabled') echo 'text-muted'; ?>">
								<td><?=$room->room_code; ?></td>
								<td><?=$room->description; ?></td>
								<td><?=$room->created_date; ?></td>
                                <td><?=$room->created_by; ?></td>
								<td><?=$room->status; ?></td>
								<td>
									<?php if($room->status == 'active') { ?>
										<form onsubmit="return confirm_disable()" action="<?php echo base_url();?>index.php/Room_Details/disable_room" method="post" style="display:inline">
										<input type="hidden" name="room_code" value=<?=$room->room_code; ?>>
										<button type="submit" class="btn btn-link btn-sm" data-rel="tooltip" title="Disable room">
											<i class="fa fa-minus-square text-danger"></i>
										</button>
									<?php } else { ?>
										<form action="<?php echo base_url();?>index.php/Room_Details/enable_room" method="post" style="display:inline">
										<input type="hidden" name="room_code" value=<?=$room->room_code; ?>>
										<button type="submit" class="btn btn-link btn-sm" data-rel="tooltip" title="Re-activate room">
											<i class="fa fa-plus-square text-success"></i>
										</button>
									<?php } ?>

									</form>

								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	var current_page = "Room Details"

	$(function () {
		$('#form_widget').hide();

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
