<?php
    $view=false;
    $url = base_url()."index.php/Computer_Details/add_computer";

    // if viewing a computer's details do these
    if(isset($computer)) {
        $view=true;
        $computer = $computer[0]; // using the first array element of the returned result
?>
    <div class="col-md-12" >
        <button type="button" class="btn btn-danger btn-sm pull-left" onclick="hide_detail_view()" style="margin-right:1em; margin-top:-.5em;">
            <i class="fa fa-times fa-lg"></i>
            Close
        </button>

        <button type="button" class="btn btn-default btn-sm pull-left" onclick="enable_inputs()" style="margin-right:1em; margin-top:-.5em;">
            <i class="fa fa-pencil fa-lg"></i>
            Edit
        </button>

        <button type="button" class="btn btn-default btn-sm pull-left" onclick="show_location_history_modal()" style="margin-right:1em; margin-top:-.5em;">
            <i class="fa fa-history fa-lg"></i>
            Location History &nbsp;&nbsp;
            <span class="label label-default"><?php echo sizeof($history); ?></span>
        </button>

        <button type="button" class="btn btn-default btn-sm pull-left" onclick="show_issue_history('<?php echo $computer->computer_id ?>')" style="margin-right:1em; margin-top:-.5em;">
            <i class="fa fa-exclamation-circle fa-lg"></i>
            Issues &nbsp;&nbsp;
            <span class="label label-default"><?php echo $open_issue_count; ?></span>
        </button>

        <button type="button" class="btn btn-default btn-sm pull-left" onclick="show_added_parts_modal()" style="margin-right:1em; margin-top:-.5em;">
            <i class="fa fa-exclamation-circle fa-lg"></i>
            Added Parts &nbsp;&nbsp;
            <span class="label label-default"><?php echo count($added_parts); ?></span>
        </button>

    </div>
<?php
    }
?>

<br />
<p>
    &nbsp;
</p>

<!-- FORM -->
    <form class="form-horizontal" <?php if($view) echo 'id="form"'; ?> role="form"  method="POST" <?php if($view) echo "onsubmit='return false;'" ?> action="<?php echo $url; ?>">
        <!-- computer ID -->
        <div class="form-group">
            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="computer_id"> Computer ID </label>

            <div class="col-sm-4">
                <input type="text" class="form-control" id="computer_id" name="computer_id" placeholder="CMP00" value="<?php if($view) echo ($computer->computer_id);  ?>" required />
            </div>
            <span class="text-danger">*</span>
        </div>

        <!-- Location -->
        <div class="form-group">
            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="location"> Room Code </label>

            <div class="col-sm-4">
                <select class="form-control" id="location" name="location" required>
                    <option hidden >Select one</option>
                    <?php
                        foreach ($rooms as $room) {
                    ?>
                        <option value="<?php echo $room->room_code ?>" <?php if($view && ($computer->location == $room->room_code)) { echo "selected"; }  ?> ><?php echo $room->room_code ?></option>
                    <?php
                        }
                    ?>

                </select>
            </div>
            <span class="text-danger">*</span>
        </div>

        <!-- Processor -->
        <div class="form-group">
            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="processor"> Processor Details </label>

            <div class="col-sm-4">
                <input type="text" class="form-control" id="processor" name="processor" placeholder="intel i3(4010) 2.0Ghz" value="<?php if($view) echo ($computer->processor);  ?>" required />

            </div>
            <span class="text-danger">*</span>
        </div>

        <!-- Processor Serial No. -->
        <div class="form-group">
            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="processor_serial"> Processor Serial No.  </label>

            <div class="col-sm-4">
                <input type="text" class="form-control" id="processor_serial" name="processor_serial" placeholder="Leave Empty If Not Available" value="<?php if($view) echo ($computer->processor_serial);  ?>" />

            </div>
        </div>

        <!-- motherboard -->
        <div class="form-group">
            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="motherboard"> Motherboard Details </label>

            <div class="col-sm-4">
                <input type="text" class="form-control" id="motherboard" name="motherboard" placeholder="Asus Z97-A" value="<?php if($view) echo ($computer->motherboard);  ?>" required />

            </div>
            <span class="text-danger">*</span>
        </div>

        <!-- motherboard  Serial No. -->
        <div class="form-group">
            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="motherboard_serial"> Motherboard  Serial No. </label>

            <div class="col-sm-4">
                <input type="text" class="form-control" id="motherboard_serial" name="motherboard_serial" placeholder="Leave Empty If Not Available" value="<?php if($view) echo ($computer->motherboard_serial);  ?>"  />

            </div>
        </div>

        <!-- RAM -->
        <div class="form-group">
            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="ram"> RAM Details </label>

            <div class="col-sm-4">
                <input type="text" class="form-control" id="ram" name="ram" placeholder="Kingston 4GB 1600MHz DDR3" value="<?php if($view) echo ($computer->ram);  ?>" required />

            </div>
            <span class="text-danger">*</span>
        </div>

        <!-- RAM Serial No. -->
        <div class="form-group">
            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="ram_serial"> RAM Serial No.  </label>

            <div class="col-sm-4">
                <input type="text" class="form-control" id="ram_serial" name="ram_serial" placeholder="Leave Empty If Not Available" value="<?php if($view) echo ($computer->ram_serial);  ?>"  />

            </div>
        </div>

        <!-- Hard Drive -->
        <div class="form-group">
            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="hdd"> HDD Capacity </label>

            <div class="col-sm-4">
                <input type="text" class="form-control" id="hdd" name="hdd" placeholder="500GB" value="<?php if($view) echo ($computer->hdd);  ?>" required />

            </div>
            <span class="text-danger">*</span>
        </div>

        <!-- Hard Drive Serial No. -->
        <div class="form-group">
            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="hdd_serial"> HDD Serial No. </label>

            <div class="col-sm-4">
                <input type="text" class="form-control" id="hdd_serial" name="hdd_serial" placeholder="Leave Empty If Not Available" value="<?php if($view) echo ($computer->hdd_serial);  ?>"  />

            </div>
        </div>

        <!-- Peripherals -->
        <div class="form-group">
            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="peripherals"> Peripherals </label>

            <div class="col-sm-7">
                <div class="checkbox">
                    <label><input type="checkbox" name="monitor" value="1" <?php if($view) { if($computer->monitor === '1') echo "checked"; } ?> >Monitor</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="mouse" value="1" <?php if($view) { if($computer->mouse === '1') echo "checked"; }  ?> >Mouse</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="keyboard" value="1" <?php if($view) { if($computer->keyboard === '1') echo "checked"; }  ?> >Keyboard</label>
                </div>
            </div>
        </div>

        <!-- Computer Status-->
        <div class="form-group">
            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="status"> Computer Status </label>

            <div class="col-sm-4">
                <select class="form-control" id="status" name="status" required>
                    <option hidden selected>Select one</option>
                    <option <?php if($view) { if($computer->status === 'Functional') echo "selected"; }  ?> >Functional</option>
                    <option <?php if($view) { if($computer->status === 'Requires Repairs') echo "selected"; }  ?> >Requires Repairs</option>
                    <option <?php if($view) { if($computer->status === 'Out of service') echo "selected"; }  ?> >Out of service</option>
                </select>
            </div>
            <span class="text-danger">*</span>
        </div>

        <!-- Notes -->
        <div class="form-group">
            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="note"> Notes </label>

            <div class="col-sm-4">
                <textarea class="form-control" id="note" name="note" placeholder="Add here..."  ><?php if($view) echo ($computer->note);  ?></textarea>
            </div>
        </div>

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

<!-- location history modal -->
<?php
    if (isset($history)) {
?>
        <div id="location_modal" class="modal fade modal-default" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title "><i class="fa fa-history text-primary"></i> <?php if($view) echo ($computer->computer_id);  ?> - Location History </h4>
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
                                                <td><?php echo $row->created_date ?></td>
                                                <td><?php echo $row->location ?></td>
                                                <td><?php echo $row->created_by ?></td>
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

<!-- Added parts modal -->
<div id="parts_modal" class="modal fade modal-default" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title "><i class="fa fa-wrench text-primary"></i> <?php if($view) echo ($computer->computer_id);  ?> - Added Parts </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                            if ($added_parts != null) {
                        ?>
                            <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                        <th>Item ID</th>
                                        <th>Item Name</th>
                                        <th>Type</th>
                                        <th>Added By</th>
                                        <th>Added Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($added_parts as $row) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row->id ?></td>
                                            <td><?php echo $row->item_name ?></td>
                                            <td><?php echo $row->type ?></td>
                                            <td><?php echo $row->created_by ?></td>
                                            <td><?php echo $row->created_date ?> <?php echo $row->created_time ?></td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        <?php
                            } else {
                                echo "No parts has been added to this computer";
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-flat btn-default " onclick="hide_location_history_modal()">Close</button>
            </div>
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->



<script type="text/javascript">

    $(function() {
        // none
    });

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

    // enable inputs to update the details
    // pass the argument 'all', enable_inputs("all")  to enable them all or just call it
    // with empty arguments to enable all except computer_id
    function enable_inputs(flag) {
        $(".clearfix").show(); // showing the submit/reset buttons

        //  make the input fields read-only if viewing a loan application
        var inputs=document.getElementsByTagName('input');
        for(i=0;i<inputs.length;i++){
            if(inputs[i].id=="computer_id" && flag != "all") continue;
            inputs[i].readOnly=false;
        }

        // disable the select boxes
        var inputs=document.getElementsByTagName('select');
        for(i=0;i<inputs.length;i++){
            inputs[i].disabled=false;
        }

        // disable the select boxes
        var inputs=document.getElementsByTagName('textarea');
        for(i=0;i<inputs.length;i++){
            inputs[i].readOnly=false;
        }
    }

    // show the location history modal
    function show_location_history_modal() {
        $('#location_modal').modal({backdrop: 'static', keyboard: false});
    }

    function hide_location_history_modal() {
        $('.modal').modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    }

    // show the added parts modal
    function show_added_parts_modal() {
        $('#parts_modal').modal({backdrop: 'static', keyboard: false});
    }

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
