

<section class="content-header">
	<h1 >
		<i class="fa fa-fw fa-calendar-check-o text-primary"></i>
		Software List
	</h1>
</section><!-- /.page-header -->

<!-- Add Softwares  form toggle button -->
<div class="row">
	<div id="form_toggle" class="col-md-5 col-md-offset-5">
		<button type="button" class="btn btn-primary btn-sm pull-right" onclick="show_form()">
			<i class="fa fa-plus"></i>&nbsp; Add Softwares
		</button>
	</div>
</div>



<div class="col-sm-7 col-sm-offset-3">
	<div id="form_widget" class="box box-default">
		<div class="box-header with-border">
			<h3 class="box-title">Add Softwares</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" onclick="show_button()"><i class="fa fa-times"></i></button>
			</div>
		</div><!-- /.box-header -->
		<div class="box-body">
		<?php if($softwares)  : ?>
			<form class="form-horizontal" id="form" role="form"  method="POST" action="<?php echo base_url();?>index.php/software_list/add_softwares">
				<!-- Name-->
				<div class="form-group">
					<label class="col-sm-3 col-sm-offset-1 control-label no-padding-right" for="name">Name</label>

					<div class="col-sm-5">
						<input type="text" id="name" class="form-control" name="name" placeholder="Enter here..." required />

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
				<!-- Version -->
				<div class="form-group">
					<label class="col-sm-3 col-sm-offset-1 control-label no-padding-right" for="version"> Version </label>

					<div class="col-sm-5">
						<input type="text" id="version" class="form-control"  name="version" placeholder="Enter here..." required />

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
				<?php endif; ?>
		</div>
	</div>
</div>

<br>


<?php
	// Notification for software added  SUCCESSFULLY
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

					Software added successfully.
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
						<tr><!--<th ><p align ="justify">ID</p></th>-->
							<th ><p align ="justify">Name</p></th>
							<th><p align ="justify">Description</p></th>
							<th><p align ="justify">Version</p></th>
							<th><p align ="center">Action</p></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($softwares as $software) { ?>
						<tr>
								<!--<td align ="justify"><?php echo $software->id; ?></td>-->
								<td align ="justify"><?php echo $software->name; ?></td>
								<td align ="justify"><?php echo $software->description; ?></td>
								<td align ="justify"><?php echo $software->version; ?></td>
								<td align ="center">
									<button class="btn btn-link btn-sm" data-rel="tooltip" title="Edit" onclick="software_editModel(<?php echo "'".$software->id."','".$software->name."','".$software->description."','".$software->version."'"; ?>)"><i class="fa fa-pencil"></i></button> 
									<form onsubmit="return confirm('Are you sure you want to delete this record?')" action="<?php echo base_url();?>index.php/Software_List/delete_software" method="post" style="display:inline">
										<input type="hidden" name="id" value=<?php echo $software->id; ?> >
										<button type="submit" class="btn btn-link btn-sm" data-rel="tooltip" title="Delete Record">
											<i class="fa fa-trash text-danger"></i>
										</button>
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
<

<form action="<?php echo base_url();?>index.php/Software_List/edit_software" method="POST" id="form2">
	<div class="modal fade modal-default" >
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title "><i class="fa fa-pencil-square-o"> Edit Details</i></h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<!-- current room code -->
						<input type="hidden" id="modal_id" name="id">
						<!-- Room Code -->
						<div class="form-group">
							<label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="modal_name"> Name </label>

							<div class="col-sm-5">
								<input type="text" id="modal_name" class="form-control" name="name" placeholder="Enter here..." required />
							</div>
		                    <span class="text-danger">*</span>

						</div>

						<!-- Description -->
						<div class="form-group">
							<label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="modal_description"> Description </label>

							<div class="col-sm-5">
								<input type="text" id="modal_description" class="form-control"  name="description" placeholder="Enter here..." required />

							</div>
		                    <span class="text-danger">*</span>
						</div>

						<!-- Special Devices -->
						<div class="form-group">
							<label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="modal_version"> Version </label>

							<div class="col-sm-5">
								<input type="text" id="modal_version" class="form-control"  name="version" value="n/a" required />

							</div>
		                    <span class="text-danger">*</span>
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
	var current_page = "Software List"

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
	function software_editModel(id, name,description,version) {
		$('.modal').modal('show');
		$('#modal_id').val(id);
		$('#modal_name').val(name);
		$('#modal_description').val(description);
		$('#modal_version').val(version);
	}


</script>