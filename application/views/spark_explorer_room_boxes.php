<?php
    foreach ($rooms as $room) {
?>
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-gray">
            <div class="inner">
                <h3><?=$room->room_code ?></h3>
                <p class="text-muted"><?=$room->description ?></p>

                <?php
                    foreach ($computer_count as $record) {
                        if ($record->location == $room->room_code) {
                            echo "<p class=\"text-info\"><b>$record->count</b> Computers</p>";
                        }
                    }
                ?>

            </div>
            <div class="icon">
                <?php foreach ($computer_count_with_issues as $record): ?>
                    <?php if ($record->location == $room->room_code && $record->repair_count > 0): ?>
                        <i class="fa fa-cube text-orange"></i>
                    <?php endif; ?>
                    <?php if ($record->location == $room->room_code && $record->repair_count == 0): ?>
                        <i class="fa fa-cube text-green"></i>
                    <?php endif; ?>
                <?php endforeach; ?>

            </div>
            <a onclick="open_room('<?=$room->room_code ?>')" href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
<?php
    }
?>
