<!-- @author Prasith Lakshan -->

<style>
    #form_widget {
        display: none;
    }
</style>

<section class="content-header">
	<h1 >
		<i class="fa fa-users text-primary"></i>
		User Management
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">User Management</li>
	</ol>
</section><!-- /.page-header -->

<!-- User creation form toggle button -->
<div class="row">
	<div id="form_toggle" class="col-md-5 col-md-offset-5">
		<button type="button" class="btn btn-primary btn-sm pull-right" onclick="show_form()">
			<i class="fa fa-plus"></i>&nbsp; Add User
		</button>
	</div>
</div>


<!-- form is wrapped in this widget -->
<div class="col-sm-6 col-sm-offset-3">
	<div id="form_widget" class="box box-default">
		<div class="box-header with-border">
			<h3 class="box-title">Create User</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" onclick="show_button()"><i class="fa fa-times"></i></button>
			</div>
		</div><!-- /.box-header -->
		<div class="box-body">
			<form class="form-horizontal" id="form" role="form" onsubmit="md5Pass()"  method="POST" action="<?php echo base_url();?>index.php/User_Management/add_user">
				<!-- Empoyee ID -->
				<div class="form-group">
					<label class="col-sm-3 col-sm-offset-1 control-label no-padding-right" for="emp_id"> Employee ID </label>

					<div class="col-sm-5">
						<input type="text" id="emp_id" name="emp_id" placeholder="Enter here..." required />
						<span class="text-danger">*</span>
					</div>

				</div>

				<!-- Username -->
				<div class="form-group">
					<label class="col-sm-3 col-sm-offset-1 control-label no-padding-right" for="username"> Username </label>

					<div class="col-sm-5">
						<input type="text" id="username" name="username" placeholder="Enter here..." required />
						<span class="text-danger">*</span>
					</div>
				</div>

				<!-- Password -->
				<div class="form-group">
					<label class="col-sm-3 col-sm-offset-1 control-label no-padding-right" for="password"> Password </label>

					<div class="col-sm-5">
						<input type="password" id="passwordShow" name="passwordShow" placeholder="****" required/>
                        <!-- hiddent filed to store md5'd password -->
                        <input type="password" hidden name="password" id="password">
						<span class="text-danger">*</span>
					</div>
				</div>

				<!-- Buttons -->
				<div class="clearfix">
					<div class="col-md-offset-4 col-md-8">
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

					A record already exists with the given Employee ID
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
						<i class="ace-icon fa fa-check"></i>
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


<div class="space-10"></div>

<div class="row">
	<div id="table_box" class="col-md-8 col-md-offset-2">
		<div class="box box-primary">
			<div class="box-body">
				<table id="table" class="table table-striped table-hover table-borderedx ">
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
								<td><?php echo $user->emp_id; ?></td>
								<td><?php echo $user->username; ?></td>
								<td><?php echo $user->created_date; ?></td>
								<td><?php echo $user->status; ?></td>
								<td>
									<button type="button" class="btn btn-link btn-sm " onclick="changePasswordModel(<?php echo "'".$user->username."','".$user->emp_id."'"; ?>)" data-rel="tooltip" title="Change Password" <?php if($user->status == 'disabled') echo 'disabled'; ?>>
										<i class="fa fa-pencil"></i>
									</button>
									<?php if($user->status == 'active') { ?>
										<form onsubmit="return confirm_disable()" action="<?php echo base_url();?>index.php/User_Management/disable_user" method="post" style="display:inline">
										<input type="hidden" name="emp_id" value=<?php echo $user->emp_id; ?>>
										<button type="submit" class="btn btn-link btn-sm" data-rel="tooltip" title="Disable user">
											<i class="fa fa-minus-square text-danger"></i>
										</button>
									<?php } else { ?>
										<form action="<?php echo base_url();?>index.php/User_Management/enable_user" method="post" style="display:inline">
										<input type="hidden" name="emp_id" value=<?php echo $user->emp_id; ?>>
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
	</div>
</div>


<form action="<?php echo base_url();?>index.php/User_Management/change_password" method="POST" id="form" onsubmit="md5PassModal()">
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

    // for create user form
    function md5Pass() {
        pass = $('#passwordShow').val();
        $('#password').val(md5(pass)); // calling the md5() method of Myers library
                                       // md5 will be stored in a hidden input.
        return true;
    }

    // for change pass modal
    function md5PassModal() {
        pass = $('#new_password_show').val();
        $('#new_password').val(md5(pass)); // calling the md5() method of Myers library
                                       // md5 will be stored in a hidden input.
        return true;
    }

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

	function changePasswordModel(user,emp_id) {
		$('#new_password_show').val(""); // the text entered in the text box doesn't clear if canceled is clicked
		$('#modal_emp_id').val(emp_id);
		$('#user_span').html(user);
		$('.modal').modal('show');
	}

	function confirm_disable() {
		return confirm("Disable user?")
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
