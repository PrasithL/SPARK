<style>
    .open {
        border-color: red;
        border-width: 0.2em;
    }
</style>

<button type="button" class="btn btn-primary btn-sm" onclick="open_details('<?php echo $computer_id ?>')">
    <i class="fa fa-arrow-left"></i> Back to Details View
</button>
<div class="text-center">
    <h3 style="margin-top:0;">Issues History of <u><?php echo $computer_id ?></u></h3>
</div>

<p></p>

<?php
    // This file is a customized copy of 'issues_list.php'
    $viewing_closed = false;
    if (isset($view)) {
        $viewing_closed = true;
    }

    if (sizeof($issues) == 0) {
        echo "<p>No open issues</p>";
    } else {
        foreach ($issues as $issue) {
            // calculating the days elapsed since issues opened
            $opened_date = date_create($issue->opened_date);
            $today       = date_create(date("Y-m-d"));
            $differnce   = date_diff($opened_date, $today);
    ?>
        <div class="post well <?php echo $issue->status; ?>" id="<?php echo $issue->id  ?>">
            <div class="user-block">
                <?php if($issue->status == 'resolved') { ?>
                    <img class="img-thumbnail " src="<?php echo base_url(); ?>assets2/img/ok.png" alt="user image">
                <?php } else {?>
                    <img class="img-thumbnail " src="<?php echo base_url(); ?>assets2/img/issue.png" alt="user image">
                <?php } ?>

                <span class='username text-primary'>
                    <?php if($issue->status == "open") { ?>
                        <button class='pull-right btn-link' onclick="show_modal('<?php echo $issue->id  ?>', '<?php echo $computer_id ?>')"><i class='fa fa-check' data-toggle="tooltip" title="Mark this issue as resolved for all affected computers"></i> Close issue</button>
                    <?php } ?>

                    #<?php echo $issue->id  ?> - <?php echo $issue->issue  ?>
                </span>
                <span class='description'>Opened on <?php echo $issue->opened_date  ?> at <?php echo $issue->opened_time  ?> by <?php echo $issue->opened_by  ?> (<?php echo $differnce->days ?> days ago) <small class='label <?php if($viewing_closed) {echo "bg-green";} else {echo "bg-primary";} ?> <?php echo $issue->id  ?>'><?php echo $issue->status ?></small>
                    <?php
                        switch ($issue->severity) {
                            case 'Low':
                                echo "<small class='label bg-purple'>$issue->severity</small>";
                                break;

                            case 'Medium':
                                echo "<small class='label bg-maroon'>$issue->severity</small>";
                                break;

                            case 'High':
                                echo "<small class='label bg-red'>$issue->severity</small>";
                                break;

                            default:
                                # code...
                                break;
                        }
                    ?>
                </span>
                <?php
                    if ($issue->status == "resolved") {
                        echo "<span class='description'>Closed on $issue->closed_date  at $issue->closed_time by $issue->closed_by";
                    }
                ?>

            </div><!-- /.user-block -->
            <p>
                <b>Affected Computer(s)</b>
                <blockquote style="font-size: 1em;">
                <ul class="">
                    <?php
                        foreach ($issue_history_records as $record) {
                            if ($record->issue_id == $issue->id) {
                                if ($record->status == "open") { // to change the background color of the labels according to the status
                                    $string = "<li>$record->computer_code &nbsp;&nbsp;&nbsp;";
                                    $string = $string."<small class='label bg-orange <?php echo $issue->id  ?>'>$record->status</small> <button type=\"button\" onclick=\"close_issue_for_computer('$record->computer_code', '$issue->id' )\" class=\"btn btn-link btn-xs \"><i class=\"fa fa-check text-green\"></i> <span class=\"text-green\">Mark as resolved</span></button></li> ";

                                    echo $string;
                                } else {
                                    $string = "<li>$record->computer_code &nbsp;&nbsp;&nbsp;";
                                    $string = $string."<small class='label bg-green $issue->id '>$record->status</small></li> ";

                                    echo $string;
                                }

                            }
                        }
                    ?>
                </ul>
                </blockquote>

                <b>Description</b>
                    <blockquote style="font-size: 1.1em;">
                        <?php echo $issue->description  ?>
                    </blockquote>

                <b>Actions Taken</b>
                    <blockquote style="font-size: 1.1em;">
                        <?php echo $issue->actions_taken  ?>
                    </blockquote>

            </p>
            <br />
        </div><!-- /.post -->

    <?php
        }
    }

?>

<div class="modal fade modal-default" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title "><i class="fa fa-info-circle"> Getting ready to close the issue <span id="modal_issue_id" class="text-primary"></span><span id="modal_computer_id"></span></i></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <p>Please provide a summary of the actions taken to resolve this issue.</p>
                        <textarea id="actions_taken" class="form-control" rows="4" cols="60"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-flat btn-default " onclick="hide_modal()">Cancel</button>
                <button id="pass_btn" onclick="close_issue()" class="btn btn-flat btn-primary pull-right" >Close Issue</button>
            </div>
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->

<script type="text/javascript">
    var issue_id = 0;
    var computer_id = 0;
    var closure_mode = "all"; // 'all' for all comouters(on 'close issue' button click)
                              // 'single' for a one computer

    function show_modal(id, comp_id) {
        $("#modal_issue_id").html("#"+id);
        $('.modal').modal({backdrop: 'static', keyboard: false});
        issue_id = id;
        computer_id = comp_id;
    }

    function hide_modal() {
        $('.modal').modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
        $("#modal_computer_id").html("");
    }

    function close_issue_for_computer(comp_id, issue_id) {
        closure_mode = 'single';
        computer_id = comp_id;
        $("#modal_computer_id").html(" of <span class='text-primary'>"+comp_id+"</span>");
        $('#actions_taken').val("Actions for "+comp_id+" - ");
        show_modal(issue_id, comp_id);
    }

    // AJAX
	function close_issue() {
        actions_taken = $('#actions_taken').val();

		// Fire off the request to server
        if (closure_mode == "all") {
            request = $.ajax({
    	        url: "<?php echo base_url();?>index.php/Issues/close_issue",
    	        type: "post",
    	        data: "issue_id="+issue_id+"&actions_taken="+actions_taken
    	    });
        } else {
            request = $.ajax({
    	        url: "<?php echo base_url();?>index.php/Issues/close_issue_for_computer",
    	        type: "post",
    	        data: "issue_id="+issue_id+"&computer_code="+computer_id+"&actions_taken="+actions_taken
    	    });
        }
        console.log(computer_id);

		// Callback handler that will be called on success
	    request.done(function (response, textStatus, jqXHR){
            hide_modal();
            issue_id = 0;
            show_issue_history(computer_id);

	    });
	}
</script>
