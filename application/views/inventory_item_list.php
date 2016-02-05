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
                <td><?=$item->id ?></td>
                <td><?=$item->item_name ?></td>
                <td><?=$item->type ?></td>
                <td><?=$item->details ?></td>
                <td><?=$item->quantity ?></td>
                <td><?=$item->available ?></td>
                <td>
                    <?=$item->created_by ?>
                    <br />
                    <?=$item->created_date ?>
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-default" onclick="open_details(<?=$item->id ?>)">
                        <i class="fa fa-pencil"></i>
                        &nbsp; Edit
                    </button>
                    &nbsp;
                    <button type="button" class="btn btn-sm btn-primary">
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

<script type="text/javascript">
    $(function () {
        $('.table').DataTable({
    		"paging": true,
    		"lengthChange": true,
    		"searching": true,
    		"ordering": true,
    		"info": true,
    		"autoWidth": false,
            "order": [[ 0, "desc" ]]
		});
    });
</script>
