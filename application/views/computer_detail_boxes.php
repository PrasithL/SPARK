<div id="boxes" class="row">
        <?php
            foreach ($computers as $computer) {
        ?>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-gray">
                    <div class="inner">
                        <h3><?=$computer->computer_id ?></h3>
                        <p class="text-muted"><?=$computer->location ?></p>
                        <p class="text-muted"><?=$computer->processor." | ".$computer->motherboard." <br> ".$computer->ram." | ".$computer->hdd ?></p>
                    </div>
                    <div class="icon">
                        <?php switch ($computer->status) {
                            case 'Functional':
                                echo '<i class="fa fa-laptop text-green"></i>';
                                break;
                            case 'Requires Repairs':
                                echo '<i class="fa fa-laptop text-orange"></i>';
                                break;
                            case 'Out of service':
                                echo '<i class="fa fa-laptop text-muted"></i>';
                                break;
                        } ?>
                    </div>
                    <a onclick="open_details('<?=$computer->computer_id ?>')" href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
        <?php
            }
        ?>
</div>
