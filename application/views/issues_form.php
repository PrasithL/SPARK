
<?php
    $view=false;
    $url = base_url()."index.php/Issues/add_issue";

    // if viewing a computer's details do these
    if(isset($computer)) {
        $view=true;
        $computer = $computer[0]; // using the first array element of the returned result
?>
    <div class="" >
        <button type="button" class="btn btn-danger btn-sm pull-right" onclick="hide_detail_view()" style="margin-right:1em; margin-top:-.5em;">
            <i class="fa fa-times fa-lg"></i>
            Close
        </button>

        <button type="button" class="btn btn-default btn-sm pull-right" onclick="enable_inputs()" style="margin-right:1em; margin-top:-.5em;">
            <i class="fa fa-pencil fa-lg"></i>
            Edit
        </button>

        <button type="button" class="btn btn-default btn-sm pull-right" onclick="show_location_history_modal()" style="margin-right:1em; margin-top:-.5em;">
            <i class="fa fa-history fa-lg"></i>
            Location History &nbsp;&nbsp;
            <span class="label label-default"><?php echo sizeof($history); ?></span>
        </button>
    </div>
<?php
    }
?>
<!-- FORM -->
    <form class="form-horizontal" <?php if($view) echo 'id="form"'; ?> role="form"  method="POST" <?php if($view) echo "onsubmit='return false;'" ?> action="<?php echo $url; ?>">
        <!-- computer ID -->
        <div class="form-group">
            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="computer_id"> Computer(s) </label>

            <div class="col-sm-4">
                <select class="form-control select2" name="computers[]" multiple="multiple" data-placeholder="Select one or more" style="width: 100%;">
                    <?php
                        foreach ($computers as $computer) {
                    ?>
                        <option value="<?=$computer->computer_id ?>" <?php if($view && ($computer->location == $room->room_code)) { echo "selected"; }  ?> ><?=$computer->computer_id ?></option>
                    <?php
                        }
                    ?>
                </select>

            </div>
            <span class="text-danger">*</span>
        </div>

        <!-- Issue -->
        <div class="form-group">
            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="issue"> Issue </label>

            <div class="col-sm-4">
                <input type="text" class="form-control" id="issue" name="issue" placeholder="..." value="<?php if($view) echo ($computer->processor);  ?>" required />

            </div>
            <span class="text-danger">*</span>
        </div>

        <!-- Description -->
        <div class="form-group">
            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="description"> Description </label>

            <div class="col-sm-4">
                    <textarea class="form-control" id="description" name="description" placeholder="A short description of the issue"  ><?php if($view) echo ($computer->note);  ?></textarea>
            </div>
            <span class="text-danger"></span>
        </div>

        <!-- Severity -->
        <div class="form-group">
            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="severity"> Severity </label>

            <div class="col-sm-4">
                <select class="form-control" name="severity" id="severity" requiredResolved by>
                    <option hidden>select one</option>
                    <option class="" value="Low"></i> Low</option>
                    <option class="text-warning" value="Medium">Medium</option>
                    <option class="text-danger" value="High">High</option>
                </select>
            </div>
            <span class="text-danger">*</span>
        </div>

        <!-- Opened by -->
        <div class="form-group">
            <label class="col-sm-3 col-sm-offset-2 control-label no-padding-right" for="resolved_by"> Issue Opened by </label>

            <div class="col-sm-3">
                <input type="text" class="form-control" id="resolved_by" name="resolved_by" value="<?php echo $this->session->userdata('username');  ?>" readonly />
            </div>
            <span class="text-danger">*</span>
        </div>

        <!-- Buttons -->
        <div class="clearfix">
            <div class="col-md-offset-5 col-md-8">
                <button class="btn btn-primary" id="save" type="submit" <?php if($view) echo "onclick='update_details(event)'"; ?> >
                    <i class="ace-icon fa fa-check bigger-110"></i>
                    Create
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
        <div class="modal fade modal-default" >
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

    $(function() {
        $(".select2").select2();
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
        $('.modal').modal({backdrop: 'static', keyboard: false});
    }

    function hide_location_history_modal() {
        $('.modal').modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    }



</script>

<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets2/plugins/select2/select2.full.min.js"></script>
