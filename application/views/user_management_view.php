	<div class="page-header">
	<h1>
		User Management
	</h1>
</div><!-- /.page-header -->


				<form class="form-horizontal" role="form"  method="POST" action="<?php echo base_url();?>index.php/User_Management/add_user">
					<!-- Empoyee ID -->
					<div class="form-group">
						<label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="emp_id"> Employee ID </label>

						<div class="col-sm-5">
							<input type="text" id="emp_id" name="emp_id" placeholder="Enter here..." required />
							<span class="text-danger">*</span>
						</div>

					</div>

					<!-- Username -->
					<div class="form-group">
						<label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="username"> Username </label>

						<div class="col-sm-5">
							<input type="text" id="username" name="username" placeholder="Enter here..." required />
							<span class="text-danger">*</span>
						</div>
					</div>

					<!-- Password -->
					<div class="form-group">
						<label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="password"> Password </label>

						<div class="col-sm-5">
							<input type="password" id="password" name="password" placeholder="****" required/>
							<span class="text-danger">*</span>
						</div>
					</div>

					<!-- Buttons -->
					<div class="clearfix">
						<div class="col-md-offset-5 col-md-8">
							<button class="btn btn-info btn-sm" type="submit">
								<i class="ace-icon fa fa-check bigger-110"></i>
								Submit
							</button>

							&nbsp; &nbsp;
							<button class="btn btn-sm" type="reset">
								<i class="ace-icon fa fa-undo bigger-110"></i>
								Reset
							</button>
						</div>
					</div>

				</form>



<div class="space-10"></div>

<?php
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

					A record already exists with the given Employee ID
					<br />
				</div>
			</div>
<?php
		}
	}
?>

<?php
	if (isset($result)) {
		if ($result == 1) {
?>
			<div class="col-md-6 col-md-offset-3">
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">
						<i class="ace-icon fa fa-times"></i>
					</button>

					<strong>
						<i class="ace-icon fa fa-times"></i>
						Done!
					</strong>

					User creation successful.
					<br />
				</div>
			</div>
<?php
		}
	}
?>


<?php
	// Notification for password update ERROR
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

					Password update failed!
					<br />
				</div>
			</div>
<?php
		}
	}
?>

<?php
	// Notification for password update SUCCESS
	if (isset($change_pass_result)) {
		if ($change_pass_result == 1) {
?>
			<div class="col-md-6 col-md-offset-3">
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">
						<i class="ace-icon fa fa-times"></i>
					</button>

					<strong>
						<i class="ace-icon fa fa-times"></i>
						Done!
					</strong>

					Password updated successfully.
					<br />
				</div>
			</div>
<?php
		}
	}
?>


<div class="space-20"></div>

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<table id="table" class="table table-striped table-hover table-bordered ">
			<thead>
				<tr>
					<th>Employee ID</th>
					<th>username</th>
					<th>Created Date</th>
					<th>Status</th>
					<th>Actions</th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($users as $user) { ?>
					<tr class="<?php if($user->status == 'disabled') echo 'text-muted'; ?>">
						<td><?=$user->emp_id; ?></td>
						<td><?=$user->username; ?></td>
						<td><?=$user->created_date; ?></td>
						<td><?=$user->status; ?></td>
						<td>
							<button type="button" class="btn btn-link btn-sm " onclick="changePasswordModel(<?php echo "'".$user->username."','".$user->emp_id."'"; ?>)" data-rel="tooltip" title="Change Password" <?php if($user->status == 'disabled') echo 'disabled'; ?>>
								<i class="fa fa-pencil"></i>
							</button>
							<?php if($user->status == 'active') { ?>
								<form onsubmit="return confirm_disable()" action="<?php echo base_url();?>index.php/User_Management/disable_user" method="post" style="display:inline">
								<input type="hidden" name="emp_id" value=<?=$user->emp_id; ?>>
								<button type="submit" class="btn btn-link btn-sm" data-rel="tooltip" title="Disable user">
									<i class="fa fa-minus-square text-danger"></i>
								</button>
							<?php } else { ?>
								<form action="<?php echo base_url();?>index.php/User_Management/enable_user" method="post" style="display:inline">
								<input type="hidden" name="emp_id" value=<?=$user->emp_id; ?>>
								<button type="submit" class="btn btn-link btn-sm" data-rel="tooltip" title="Re-activate user">
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


<form action="<?php echo base_url();?>index.php/User_Management/change_password" method="POST" id="form">
		<div class="modal fade modal-default" >
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title "><i class="fa fa-pencil-square-o"> Change <span id="user_span"></span>'s Password</i></h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<label class="col-md-3 col-md-offset-2 control-label no-padding-right"  for="new_password_show">New Password</label>
							<div class="col-md-4 has-feedback" id="passDiv">
								<input type="password" class="form-control input-sm" name="new_password_show" id="new_password_show" placeholder="*****" autofocus required>
							</div>
							<span id="password_span" class="text-muted">*</span>

							<!-- inputs to hold the user name and the md5 converted password -->
							<input hidden id="modal_emp_id" name="modal_emp_id" type="text" value="">
							<input hidden id="new_password" name="new_password" type="text" value="">
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-flat btn-default " data-dismiss="modal">Cancel</button>
						<button id="pass_btn" type="submit" class="btn btn-flat btn-primary pull-right" enabled>Change</button>
					</div>
				</div> <!-- /.modal-content -->
			</div> <!-- /.modal-dialog -->
		</div> <!-- /.modal -->
	</form>

<script type="text/javascript">
	var current_page = "User Management"

	jQuery(function () {
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

	function changePasswordModel(user,emp_id) {
		$('#new_password_show').val(""); // the text entered in the text box doesn't clear if canceled is clicked
		$('#modal_emp_id').val(emp_id);
		$('#user_span').html(user);
		$('.modal').modal('show');
	}

	function confirm_disable() {
		return confirm("Disable user?")
	}
</script>
