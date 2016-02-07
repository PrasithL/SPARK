<?php
    $view=false;
    $url = base_url()."index.php/Inventory/add_inventory_item";

    if(isset($flag)) {
        $view = true;
        $item = $item[0];
?>
    <div class="col-md-12" >
        <button type="button" class="btn btn-danger btn-sm pull-right" onclick="hide_detail_view()" style="margin-right:1em; margin-top:-.5em;">
            <i class="fa fa-times fa-lg"></i>
            Close
        </button>
    </div>
<?php

    }

?>

<br />
<p>
    &nbsp;
</p>

    <div class="row">

        <?php
            // Notification for record creation SUCCESS
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

                             Record updated successfully.
                            <br />
                        </div>
                    </div>
        <?php
                } else {
        ?>
                <div class="col-md-6 col-md-offset-3">
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert">
                            <i class="ace-icon fa fa-times"></i>
                        </button>

                        <strong>
                            <i class="ace-icon fa fa-exclamationc"></i>
                            Done!
                        </strong>

                         Record updated failed.
                        <br />
                    </div>
                </div>
        <?php
                }
            }
        ?>

    </div>

<!-- FORM -->
    <form class="form-horizontal" <?php if($view) echo 'id="form"'; ?> role="form"  method="POST" <?php if($view) echo "onsubmit='return false;'" ?> action="<?php echo $url; ?>">
        <!-- Item Name -->
        <div class="form-group">
            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="item_name"> Item Name </label>

            <div class="col-sm-4">
                <input type="text" class="form-control" id="item_name" name="item_name" placeholder="..." value="<?php if($view) echo ($item->item_name);  ?>" required />
            </div>
            <span class="text-danger">*</span>
        </div>

        <!-- Type -->
        <div class="form-group">
            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="type"> Type </label>

            <div class="col-sm-4">
                <select class="form-control" id="type" name="type" required>
                    <option hidden >Select one</option>
                    <?php
                        foreach ($item_types as $type) {
                    ?>
                        <option value="<?=$type->name ?>" <?php if($view && ($item->type == $type->name)) { echo "selected"; }  ?> ><?=$type->name ?> </option>
                    <?php
                        }
                    ?>

                </select>
            </div>
            <span class="text-danger">*</span>
        </div>

        <!-- Details -->
        <div class="form-group">
            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="details"> Details </label>

            <div class="col-sm-4">
                <input type="text" class="form-control" id="details" name="details" placeholder="..." value="<?php if($view) echo ($item->details);  ?>" required />

            </div>
            <span class="text-danger">*</span>
        </div>

        <!-- Quantity -->
        <div class="form-group">
            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="quantity"> Quantity </label>

            <div class="col-sm-4">
                <input type="number" min="0" class="form-control" id="quantity" name="quantity" placeholder="No of items" value="<?php if($view) echo ($item->quantity);  ?>" required />

            </div>
            <span class="text-danger">*</span>
        </div>

        <?php
            if ($view) {
        ?>
            <input type="hidden" name="id" value="<?=$item->id;  ?>">
        <?php
            }
        ?>

        <!-- Buttons -->
        <div class="clearfix">
            <div class="col-md-offset-5 col-md-8">
                <button class="btn btn-primary" id="save" type="submit" <?php if($view) echo "onclick='update_details(event)'"; ?> >
                    <i class="ace-icon fa fa-check bigger-110"></i>
                    <?php
                        if ($view) {
                            echo "Update";
                        } else {
                            echo "Save";
                        }
                    ?>
                </button>

                &nbsp; &nbsp;
                <button class="btn" id="reset" type="reset">
                    <i class="ace-icon fa fa-undo bigger-110"></i>
                    Reset
                </button>
            </div>
        </div>

    </form>

<!-- This could be useful to show item usage history -->
<?php
    if (isset($history)) {
?>
        <div class="modal fade modal-default" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title "><i class="fa fa-history text-primary"></i> <?php if($view) echo ($item->computer_id);  ?> - Location History </h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Location</th>
                                            <th>Updated By</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($history as $row) {
                                        ?>
                                            <tr>
                                                <td><?=$row->created_date ?></td>
                                                <td><?=$row->location ?></td>
                                                <td><?=$row->created_by ?></td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-flat btn-default " onclick="hide_location_history_modal()">Close</button>
                    </div>
                </div> <!-- /.modal-content -->
            </div> <!-- /.modal-dialog -->
        </div> <!-- /.modal -->

<?php
    }
?>

<script type="text/javascript">

    // AJAX
    // opening issue history view
	function show_issue_history(computer_id) {
		// Fire off the request to server
	    request = $.ajax({
	        url: "<?php echo base_url();?>index.php/Computer_Details/show_issue_history_of",
	        type: "post",
	        data: "computer_id="+computer_id
	    });

		// Callback handler that will be called on success
	    request.done(function (response, textStatus, jqXHR){
            $('#detail_viewer').html(response);
			$('#detail_viewer').fadeIn();
	    });
	}



</script>
