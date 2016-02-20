<table id="table" class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th width="15%">Type</th>
            <th>Details</th>
            <th width="8%">Quantity</th>
            <th width="8%">Available</th>
            <th>Added By</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php
            foreach ($items as $item) {
        ?>
            <tr>
                <td><?php echo $item->id ?></td>
                <td><?php echo $item->item_name ?></td>
                <td><?php echo $item->type ?></td>
                <td><?php echo $item->details ?></td>
                <td><?php echo $item->quantity ?></td>
                <td><?php echo $item->available ?></td>
                <td>
                    <?php echo $item->created_by ?>
                    <br />
                    <?php echo $item->created_date ?>
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-default" onclick="open_details(<?php echo $item->id ?>)">
                        <i class="fa fa-pencil"></i>
                        &nbsp; Edit
                    </button>
                    &nbsp;
                    <button type="button" class="btn btn-sm btn-primary" onclick="use_item_modal('<?php echo $item->id ?>', '<?php echo $item->type ?>')" <?php if($item->available < 1) echo "disabled title='No items available'"; ?>>
                        <i class="fa fa-wrench"></i>
                        &nbsp; Use Item
                    </button>
                </td>
            </tr>
        <?php
            }
        ?>
    </tbody>
</table>

<!-- Modal shown when 'Use item' button is clicked -->
<div class="modal fade modal-default" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title "><i class="fa fa-wrench text-primary"> Use Item </i></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form class="form-horizontal" action="index.html" method="post">
                        <div class="form-group">
                            <label class="col-md-3 col-md-offset-2" for="computer_code">Use in computer</label>
                            <div class="col-md-4">
                                    <input type="text" list="computers" class="form-control col-md-3" id="computer_code" name="computer_code" >
                                    <datalist id="computers">
                                        <?php foreach ($computers as $computer): ?>
                                            <option><?php echo $computer->computer_id ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                            </div>
                        </div>
                    </form>

            </div>
            <div class="modal-footer">
                <button class="btn btn-flat btn-default " onclick="hide_location_history_modal()">Close</button>
                <button type="submit" class="btn btn-primary btn-flat" onclick="use_item(); return false;">Use Item</button>
            </div>
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->

<script type="text/javascript">
    function datatable_init() {
        $('.table').DataTable({
    		"paging": true,
    		"lengthChange": true,
    		"searching": true,
    		"ordering": true,
    		"info": true,
    		"autoWidth": false,
            "order": [[ 0, "desc" ]] // changed the default ordering of the first column to descending
		});
    }
</script>
