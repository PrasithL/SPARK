
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer" style="height: 3vh;">
        <!-- Default to the left -->
        <strong>&copy; 2016 </strong> IBIT-03
      </footer>

    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery Calendar -->
    <script src="<?php echo base_url(); ?>assets2/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>assets2/js/bootstrap.min.js"></script>

    <!-- script to open active elements in the sidebar -->
    <script src="<?php echo base_url(); ?>assets2/js/custom/sidebar-activate.js"></script>-]

	<!-- SlimScroll -->
	<script src="<?php echo base_url(); ?>assets2/plugins/slimScroll/jquery.slimscroll.min.js"></script>

	<!-- Joseph's Myers' md5 implementation link - http://www.myersdaily.org/joseph/javascript/md5-text.html -->
	<script src="<?php echo base_url(); ?>assets2/js/md5.js"></script>
	<!-- DataTables -->
	<script src="<?php echo base_url(); ?>assets2/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>assets2/plugins/datatables/dataTables.bootstrap.min.js"></script>
	<!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets2/dist/js/app.min.js"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->

	<script>
		// onload functions moved to header


		function startTime() {
		    var today = new Date();
		    var h = today.getHours();
		    var m = today.getMinutes();
		    var s = today.getSeconds();
		    m = checkTime(m);
		    s = checkTime(s);
		    document.getElementById('time').innerHTML = " " + h + ":" + m + ":" + s;
		    var t = setTimeout(startTime, 500);
		}

		function checkTime(i) {
		    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
		    return i;
		}

		$('.dropdown-toggle').click(function() {

			$("#datepicker").datepicker({
				todayHighlight: true,
				'setDate':new Date(),
				weekStart: 1 // 0 is sunday
			});
		});

		$('.dropdown-menu div').click(function(e) {
	        e.stopPropagation(); //This will prevent the event from bubbling up and close the dropdown when you type/click on text boxes.
	    });

        function check_session() {
    		// Fire off the request to server
    	    request = $.ajax({
    	        url: "<?php echo base_url();?>index.php/Login/session_check_ajax",
    	        type: "post",
    	        data: ""
    	    });

    		// Callback handler that will be called on success
    	    request.done(function (response, textStatus, jqXHR){
    	        if (response == 'no') {
    	        	window.location.href = "<?php echo base_url(); ?>index.php/Login";
    	        }
    	    });

    		var recheck = setTimeout(check_session, 10000);
    	}

	</script>
