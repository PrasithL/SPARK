<style>
.callout.callout-danger{
    background-color: #F2DCD9 !important;
		color: #000 !important;
}
.callout.callout-success{
    background-color: #B2EDB9 !important;
		color: #747474 !important;
}

.sorting_desc, .sorting_asc {
    display: none;
}
</style>

<section class="content-header">
	<h1 >
		<i class="fa fa-list text-primary"></i>
		To-do Task
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">To-do Task</li>
	</ol>
</section><!-- /.page-header -->



<br>
<?php
	// Notification for task creation SUCCESS
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

					Task Created Successfully.
					<br />
				</div>
			</div>
<?php
		}
	}
?>


<?php
	// Notification for task edit ERROR
	if (isset($edit_result)) {
		if ($edit_result == -1) {
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

					Failed to Edit Task!
					<br />
				</div>
			</div>
<?php
		}
	}
?>

<?php
	// Notification for task edit SUCCESS
	if (isset($edit_result)) {
		if ($edit_result == 1) {
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

					Task updated successfully.
					<br />
				</div>
			</div>
<?php
		}
	}
?>


<div class="space-10"></div>

<div class="row">
	<!-- form is wrapped in this widget -->
	<div class="col-md-8 col-md-offset-2">
		<div id="form_widget" class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Create New Task</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" onclick="close_form()"><i class="fa fa-times"></i></button>
				</div>
			</div><!-- /.box-header -->
			<div class="box-body">
				<form class="form-horizontal" id="form" role="form"  method="POST" action="<?php echo base_url();?>index.php/Task_List/add_task">
					<!-- Task -->
					<div class="form-group">
						<label class="col-sm-3 col-sm-offset-1 control-label no-padding-right" for="task_name"> Task </label>

						<div class="col-sm-6">
							<input class="col-sm-10" type="text" id="task_name" name="task_name" placeholder="Enter here..." required />
							<span class="text-danger">*</span>
						</div>
					</div>

					<!-- Description -->
					<div class="form-group">
						<label class="col-sm-3 col-sm-offset-1 control-label no-padding-right" for="description"> Description </label>

						<div class="col-sm-6">
							<textarea class="col-sm-10" id="description" name="description" placeholder="Enter here..." required/></textarea>
							<span class="text-danger">*</span>
						</div>
					</div>

					<!-- Priority -->
					<div class="form-group">
						<label class="col-sm-3 col-sm-offset-1 control-label no-padding-right"> Priority </label>
            <div class="col-sm-6">
                <input name="priority" value="Low" checked="" type="radio">&nbsp; &nbsp; &nbsp;Normal<br/>
                <input name="priority" value="High" type="radio">&nbsp; &nbsp; &nbsp; High
            </div>
          </div>

					<!-- Buttons -->
					<div class="clearfix">
						<div class="col-md-offset-4 col-md-8">
							<button class="btn btn-primary btn-sm" type="submit">
								<i class="ace-icon fa fa-check bigger-110"></i>
							&nbsp;	Submit &nbsp;
							</button>

							&nbsp; &nbsp; &nbsp;
							<button class="btn btn-default btn-sm" type="reset">
								<i class="ace-icon fa fa-undo bigger-110"></i>
								 &nbsp;Reset &nbsp;
							</button>

							&nbsp; &nbsp; &nbsp;
							<button class="btn btn-default btn-sm" type="button"  onclick="close_form()">
								<i class="ace-icon fa fa-remove bigger-110"></i>
								&nbsp; Cancel &nbsp;
							</button>
						</div>
					</div>

				</form>

			</div>
		</div>
	</div>
	<div id="table_box" class="col-md-8 col-md-offset-2">
		<div class="box box-primary pull-left">
			<div class="box-body">
				<table id="table" class="table table-borderedx ">
					<thead>
						<tr>
							<th></th>
							<th></th>
							<th hidden=""></th>
							<th hidden></th>
						</tr>
					</thead>

					<tbody>
						<?php foreach ($tasks as $task) { ?>
							<tr><td width="10%"  cellpadding="100" >
								<?php if($task->status == 'Pending') { ?>
									<form  action="<?php echo base_url();?>index.php/Task_List/completed_task" method="post" style="display:inline">
									<input type="hidden" name="task_id" value=<?=$task->task_id; ?>>
									<button type="submit" class="btn btn-primary-outline btn-xs" data-rel="tooltip" title="Click to Complete task">
										<i class="fa fa-clock-o"></i> &nbsp; In Progress
									</button>
									<?php } else { ?>
										<form action="<?php echo base_url();?>index.php/Task_List/pending_task" method="post" style="display:inline">
										<input type="hidden" name="task_id" value=<?=$task->task_id; ?>>
										<button type="submit" class="btn btn-success btn-xs text-success" data-rel="tooltip" title="Click to restore status back to Pending">
											<i class="fa fa-check-circle-o"></i> &nbsp; Completed
										</button>
									<?php } ?>
								</form>
							</td><td>
				        <ul class="todo-list ui-sortable">
                  <!-- if Pending && high priority change li bg colour to red -->
									<?php if($task->status == 'Pending') {
													if ($task->priority == 'High') {?>
														<li class="<?=$task->status;?> callout callout-danger">
											<?php	}else {?>
                        <!-- if Pending && low priority -->
												<li class="<?=$task->status;?>">
										<?php	}
										}else {?>
                      <!-- if task Completed change li bg color to green -->
											<li class="<?=$task->status;?> callout callout-success">
									<?php	}	?>


				            <!-- todo text -->
				            <span class="text"><?=$task->task_name;?> -</span> <span class="small" style="color:#3C8DBC">added by <b><?=$task->addedby;?></b> </span> <span class="small" style="color:#3C8DBC"> on <?=$task->created_date;?></span><br/>
				          	&nbsp;<span class="small"><?=$task->description;?> </span>
				            <!-- General tools such as edit or delete-->
				            <div class="tools">
				              <button class="btn btn-default btn-xs" onclick="editTaskModel(<?php echo "'".$task->task_name."','".$task->task_id."','".$task->description."','".$task->priority."'"; ?>)"> <i class="fa fa-edit"></i> Edit Task</button>
				            </div>
				          </li>
				        </ul>
							</td>
							<td hidden><?=$task->priority; ?></td>
							<td hidden><?=$task->task_id; ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>


			</div>
		</div>
	</div>

</div>


<form class="form-horizontal" role="form" action="<?php echo base_url();?>index.php/Task_List/edit_task" method="POST" id="form">
		<div class="modal fade modal-default" >
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title "><i class="fa fa-pencil-square-o"></i> Edit Task</h4>
					</div>
					<div class="modal-body">
						<!-- Task name edit input -->
						<div class="form-group">
							<label class="col-md-3 col-md-offset-2 control-label no-padding-right"  for="modal_task_name">Task</label>
							<div class="col-md-5">
								<input class="form-control input-sm" name="modal_task_name" id="modal_task_name" value="" required>
							</div>
						</div>
						<!-- Description edit input -->
						<div class="form-group">
							<label class="col-md-3 col-md-offset-2 control-label no-padding-right"  for="modal_description">Description</label>
							<div class="col-md-5">
								<textarea class="form-control input-sm" name="modal_description" value="" id="modal_description" autofocus required></textarea>
							</div>
						</div>
						<div>
              <!-- Priority edit input -->
							<div class="form-group">
								<label class="col-md-3 col-md-offset-2 control-label no-padding-right"> Priority </label>
		            <div class="col-md-5">
		                <input name="modal_priority" id="High" value="High" type="radio" >&nbsp; &nbsp; &nbsp;High<br/>
		                <input name="modal_priority" id="Low" value="Low" type="radio">&nbsp; &nbsp; &nbsp; Normal
		            </div>
		          </div>


							<!-- hidden input for task ID-->
							<input hidden id="modal_task_id" name="modal_task_id" type="text" value="">
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-flat btn-default " data-dismiss="modal">Cancel</button>
						<button id="pass_btn" type="submit" class="btn btn-flat btn-primary pull-right" enabled>Edit</button>
					</div>
				</div> <!-- /.modal-content -->
			</div> <!-- /.modal-dialog -->
		</div> <!-- /.modal -->
	</form>

<script src="dist/js/pages/todo.js"></script>
<script src="<?php echo base_url(); ?>assets2/js/todo.js"></script>
<script type="text/javascript">
	var current_page = "To-do Tasks"

	$(function () {
		$('#form_widget').hide();

		$('#table').DataTable({

		"order": [[ 0, 'desc' ],[ 2, 'asc' ], [3,'desc'],],
    // ordered by status[0], priority[2] and task_id[3]
    "lengthMenu": [[4, 10, 25, 50, -1], [4, 10, 25, 50, "All"]],
    // dom: i <- to get info (page)
		"dom": '<"toolbar">fBrtlp',
		"aoColumnDefs": [
  { "bSortable": false, "aTargets": [ "_all" ] }],
    // ^remove sort icon^
		});
			$('[data-rel=tooltip]').tooltip();
			$("div.toolbar").html('<div class="btn-group pull-left"><button type="button" class="btn btn-sm btn-primary" onclick="show_form()"><i class="fa fa-plus"></i>&nbsp; &nbsp; Add Task &nbsp;</button><button id="invertSort" type="button" class="btn btn-sm btn-success" ><i class="fa fa-check"></i>&nbsp; &nbsp;Show Completed &nbsp; </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>');
    // ^Custom buttons (add task and show completed task)^
		var oTable = $('#table').dataTable();
		$('#invertSort').click(function(){
	      oTable.fnSort([  [0,'asc']] );
    // ^Show completed tasks function^
	 });

	});
	function editTaskModel(task_name,task_id,description,priority) {
		$('#modal_task_name').val(task_name);
		$('#modal_task_id').val(task_id);
		$('#modal_description').val(description);
    $('#'+priority).prop('checked', true);

    $('.modal').modal('show');
	}

	function show_form() {
		$('#table_box').fadeOut();
		$('#form_toggle').fadeOut();
		$('#form_widget').slideDown();
	}

	function close_form(){
		$('#form_widget').slideUp();
		$('#form_toggle').fadeIn();
		$('#table_box').fadeIn();
	}

</script>
