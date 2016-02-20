<?php
    foreach ($rooms as $room) {
?>
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-gray">
            <div class="inner">
                <h3><?php echo $room->room_code ?></h3>
                <p class="text-muted"><?php echo $room->description ?></p>

                <?php
                    $hasCount = false;
                    foreach ($computer_count as $record) {
                        if ($record->location == $room->room_code) {
                            echo "<p class=\"text-info\"><b>$record->count</b> Computers</p>";
                            $hasCount = true;
                        }
                    }

                    if (!$hasCount) {
                        echo "<p class=\"text-info\"><b>0</b> Computers</p>";
                    }
                ?>

            </div>
            <div class="icon">
                <?php $isFound = false; ?>
                <?php foreach ($computer_count_with_issues as $record): ?>

                    <?php if ($record->location == $room->room_code && $record->repair_count > 0): ?>
                        <i class="fa fa-cube text-orange"></i>
                        <?php $isFound = true; ?>
                    <?php endif; ?>
                    <?php if ($record->location == $room->room_code && $record->repair_count == 0): ?>
                        <i class="fa fa-cube text-green"></i>
                        <?php $isFound = true; ?>
                    <?php endif; ?>
                <?php endforeach; ?>

                <?php if ( !$isFound): ?>
                    <i class="fa fa-cube text-muted"></i>
                <?php endif; ?>

            </div>
            <a onclick="open_room('<?php echo $room->room_code ?>')" href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
<?php
    }
?>
