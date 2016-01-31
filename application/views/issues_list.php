<?php
    $viewing_closed = false;
    if (isset($view)) {
        $viewing_closed = true;
    }
    foreach ($issues as $issue) {
        // calculating the days elapsed since issues opened
        $opened_date = date_create($issue->opened_date);
        $today       = date_create(date("Y-m-d"));
        $differnce   = date_diff($opened_date, $today);
?>
    <div class="post well" id="<?=$issue->id  ?>">
        <div class="user-block">
            <?php if($viewing_closed) { ?>
                <img class="img-thumbnail " src="<?php echo base_url(); ?>assets2/img/ok.png" alt="user image">
            <?php } else {?>
                <img class="img-thumbnail " src="<?php echo base_url(); ?>assets2/img/issue.png" alt="user image">
            <?php } ?>

            <span class='username text-primary'>
                <?php if(!$viewing_closed) { ?>
                    <button class='pull-right btn-link' onclick="show_modal(<?=$issue->id  ?>)"><i class='fa fa-check' data-rel="tooltip" title="Mark this issue as resolved"></i> Close issue</button>
                <?php } ?>

                #<?=$issue->id  ?> - <?=$issue->issue  ?>
            </span>
            <span class='description'>Opened on <?=$issue->opened_date  ?> at <?=$issue->opened_time  ?> by <?=$issue->opened_by  ?> (<?=$differnce->days ?> days ago) <small class='label <?php if($viewing_closed) {echo "bg-green";} else {echo "bg-primary";} ?> <?=$issue->id  ?>'><?=$issue->status ?></small></span>

            <?php
                if ($viewing_closed) {
                    echo "<span class='description'>Closed on $issue->closed_date  at $issue->closed_time by $issue->closed_by";
                }
            ?>

        </div><!-- /.user-block -->
        <p>
            <b>Affected Computer(s)</b>
            <ul class="">
                <?php
                    foreach ($issue_history_records as $record) {
                        if ($record->issue_id == $issue->id) {
                            if ($record->status == "open") { // to change the background color of the labels according to the status
                                $string = "<li>$record->computer_code &nbsp;&nbsp;&nbsp;";
                                if(!$viewing_closed) {
                                    $string = $string."<small class='label bg-orange <?=$issue->id  ?>'>$record->status</small></li> ";
                                }
                                echo $string;
                            } else {
                                $string = "<li>$record->computer_code &nbsp;&nbsp;&nbsp;";
                                if(!$viewing_closed) {
                                    $string = $string."<small class='label bg-green <?=$issue->id  ?>'>$record->status</small></li> ";
                                }
                                echo $string;
                            }

                        }
                    }
                ?>
            </ul>

            <b>Description</b>
                <blockquote style="font-size: 1.1em;">
                    <?=$issue->description  ?>
                </blockquote>

                <?php if($viewing_closed) { ?>
                    <b>Actions Taken</b>
                        <blockquote style="font-size: 1.1em;">
                            <?=$issue->actions_taken  ?>
                        </blockquote>
                <?php } ?>

        </p>
        <br />
    </div><!-- /.post -->

<?php
    }

    if (sizeof($issues) == 0) {
        echo "<p>No open issues</p>";
    }
?>

<div class="modal fade modal-default" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title "><i class="fa fa-info-circle"> Getting ready to close the issue #<span id="modal_issue_id"></span></i></h4>
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
    var open_count = <?=sizeof($issues) ?>

    function show_modal(id) {
        $("#modal_issue_id").html(id);
        $('.modal').modal({backdrop: 'static', keyboard: false});
        issue_id = id;
    }

    function hide_modal() {
        $('.modal').modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    }


    // AJAX
	function close_issue() {
        actions_taken = $('#actions_taken').val();

		// Fire off the request to server
	    request = $.ajax({
	        url: "<?php echo base_url();?>index.php/Issues/close_issue",
	        type: "post",
	        data: "issue_id="+issue_id+"&actions_taken="+actions_taken
	    });

		// Callback handler that will be called on success
	    request.done(function (response, textStatus, jqXHR){
            $('#'+issue_id).hide();
            hide_modal();
            issue_id = 0;
            $('#open_count').html(open_count-1);
	    });
	}
</script>
