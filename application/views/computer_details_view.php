<!-- @author Prasith Lakshan -->
<style media="screen">
	.col-sm-12 {
		/* to align the table with the header and footer added by DataTables */
		padding: 0;
	}
</style>

<div class="page-header">
	<h1>
		Computer Details
	</h1>
</div><!-- /.page-header -->

<div class="row">
	<form class="form-horizontal" id="form" role="form"  method="POST" action="<?php echo base_url();?>index.php/Computer_Details/add_computer">
		<!-- computer ID -->
		<div class="form-group">
			<label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="computer_id"> Computer ID </label>

			<div class="col-sm-5">
				<input type="text" class="" id="computer_id" name="computer_id" placeholder="CMP00" required />
				<span class="text-danger">*</span>
			</div>

		</div>

		<!-- Processor -->
		<div class="form-group">
			<label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="processor"> Processor Details </label>

			<div class="col-sm-7">
				<input type="text" class="col-sm-4 " id="processor" name="processor" placeholder="intel i3(4010) 2.0Ghz" required />
				<span class="text-danger">*</span>
			</div>
		</div>

        <!-- motherboard -->
		<div class="form-group">
			<label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="motherboard"> Motherboard Details </label>

			<div class="col-sm-7">
				<input type="text" class="col-sm-5 " id="motherboard" name="motherboard" placeholder="Asus Z97-A" required />
				<span class="text-danger">*</span>
			</div>
		</div>

        <!-- RAM -->
		<div class="form-group">
			<label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="ram"> RAM Details </label>

			<div class="col-sm-7">
				<input type="text" class="col-sm-5 " id="ram" name="ram" placeholder="Kingston 4GB 1600MHz DDR3" required />
				<span class="text-danger">*</span>
			</div>
		</div>

        <!-- Hard Drive -->
		<div class="form-group">
			<label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="hdd"> HDD Capacity </label>

			<div class="col-sm-7">
				<input type="text" class="col-sm-5 " id="hdd" name="hdd" placeholder="500GB" required />
				<span class="text-danger">*</span>
			</div>
		</div>

        <!-- Peripherals -->
		<div class="form-group">
			<label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="peripherals"> Peripherals </label>

			<div class="col-sm-7">
                <div class="checkbox">
                    <label><input type="checkbox" name="monitor" value="monitor">Monitor</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="mouse" value="mouse">Mouse</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="keyboard" value="keyboard">Keyboard</label>
                </div>
			</div>
		</div>

        <!-- Computer Status-->
		<div class="form-group">
			<label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="status"> Computer Status </label>

			<div class="col-sm-2">
                <select class="form-control" id="status" name="status">
                    <option hidden selected>Select one</option>
                    <option>Functional</option>
                    <option>Requires Repaires</option>
                    <option>Out of service</option>
                </select>
			</div>
            <span class="text-danger">*</span>
		</div>

        <!-- Notes -->
		<div class="form-group">
			<label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="note"> Notes </label>

			<div class="col-sm-7">
				<textarea class="col-sm-5 " id="note" name="note" placeholder="Add here..." ></textarea>
			</div>
		</div>

		<!-- Buttons -->
		<div class="clearfix">
			<div class="col-md-offset-5 col-md-8">
				<button class="btn btn-info btn-sm" id="submit" type="submit">
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

<div class="space-10"></div>

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

<p id="stage">

</p>

<div class="space-10"></div>

<script type="text/javascript">
	var current_page = "Computer Details";

	// $(function() {
	// 	$("#submit").click(function(event){
    //            var comp_id = $("#computer_id").val();
	// 		   var processor = $("#processor").val();
    //            $("#stage").load('<?php echo base_url();?>index.php/Computer_Details/add_computer', {"computer_id":comp_id, "processor":processor} );
    //         });
	// });
</script>
