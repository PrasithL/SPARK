<!-- @author Prasith Lakshan -->

<style media="screen">
    .total-top-hr {
        margin:0.7em 0 0.7em 0;
        border-color: gray;
    }

    .total-bottom-hr {
        margin: 0.07em 0 0.07em 0;
        border-color: gray;
    }
</style>

<section class="content-header">
	<h1 >
		<i class="fa fa-file-text-o text-primary"></i>
		Inventory Overview Report
	</h1>
</section><!-- /.page-header -->

<br>

<div class="row">
	<div class="col-sm-12" style="padding:2em; padding-top:0;">
        <div class="box box-primary" >
            <div id="printable" class="box-body" style="padding-top:1.5em; min-height:80vh">
                <!-- Report begins -->
                <div class="row">
                    <div class="col-sm-1 col-sm-offset-6 text-center">
                        <b>Available</b>
                    </div>
                    <div class="col-sm-1 text-center">
                        <b>Used</b>
                    </div>
                    <div class="col-sm-1 text-center text-success">
                        <b>Total</b>
                    </div>

                    <!-- <div class="col-sm-1 col-sm-offset-2">
                        <button type="button" class="btn btn-default btn-sm" onclick="print_div('printable')">
                            <i class="fa fa-print"></i> &nbsp;Print
                        </button>
                    </div> -->
                </div>
                <hr style="margin: 0.6em; margin-bottom: -1em;">
                <br>
                <?php
                    $i = 0;
                    $available_total = 0;
                    $used_total = 0;
                    $total_total = 0;

                    foreach ($item_types as $type) {
                        $i++;
                ?>
                        <div class="row">
                            <div class="col-sm-3 col-sm-offset-2 text-primary" style="padding-left:as3em;">
                                <b><i><?php echo $i; ?>. <?php echo $type->name; ?>s</i></b>
                            </div>
                        </div>
                <?php
                        $has_items = false;
                        foreach ($items as $item) {
                            if ($type->name == $item->type) {
                                $has_items = true;
                                $available_total += $item->available;
                                $used_total += $item->used;
                                $total_total += $item->total;
                ?>
                                <div class="row">
                                    <div class="col-sm-3 col-sm-offset-3">
                                        <?php echo $item->item_name; ?> - <?php echo $item->details; ?>
                                    </div>
                                    <!-- available -->
                                    <div class="col-sm-1 text-center">
                                        <?php echo $item->available; ?>
                                    </div>
                                    <!-- used -->
                                    <div class="col-sm-1 text-center">
                                        <?php echo $item->used; ?>
                                    </div>
                                    <!-- total -->
                                    <div class="col-sm-1 text-center text-success">
                                        <?php echo $item->total; ?>
                                    </div>
                                </div>
                <?php
                            }
                        }

                        if ( !$has_items) {
                ?>
                            <div class="row">
                                <div class="col-sm-3 col-sm-offset-3">
                                    No items are available of this type
                                </div>
                                <!-- available -->
                                <div class="col-sm-1 text-center">
                                    -
                                </div>
                                <!-- used -->
                                <div class="col-sm-1 text-center">
                                    -
                                </div>
                                <!-- total -->
                                <div class="col-sm-1 text-center text-success">
                                    -
                                </div>
                            </div>
                <?php
                        }
                    }
                ?>




                <!-- totals of each column -->
                <div class="row">
                    <div class="col-sm-1 col-sm-offset-6 text-center">
                        <hr class="total-top-hr">
                        <b><?php echo $available_total; ?></b>
                        <hr class="total-bottom-hr">
                        <hr class="total-bottom-hr">
                    </div>
                    <div class="col-sm-1 text-center">
                        <hr class="total-top-hr">
                        <b><?php echo $used_total; ?></b>
                        <hr class="total-bottom-hr">
                        <hr class="total-bottom-hr">
                    </div>
                    <div class="col-sm-1 text-center text-success">
                        <hr class="total-top-hr">
                        <b><?php echo $total_total; ?></b>
                        <hr class="total-bottom-hr">
                        <hr class="total-bottom-hr">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var current_page="Inventory Overview Report";

    // this function will replace the content of the page with the printable div and print it.
    // then restore the original html content
    function print_div(divName) {
         var printContents = document.getElementById(divName).innerHTML;
         var originalContents = document.body.innerHTML;

         document.body.innerHTML = printContents;

         window.print();

         document.body.innerHTML = originalContents;
    }
</script>
