<!-- @author Prasith Lakshan_IBIT03 -->
<?php
    // setting the timezone for the Date() to use
    // if not set, an error is thrown
    date_default_timezone_set("UTC")
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SPARK HMS</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets2/img/icon.png" type="image/png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets2/css/font-awesome.min.css">
     <!-- date picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets2/plugins/datepicker/datepicker3.css">
    <!-- daterange picker -->
  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets2/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets2/plugins/datatables/dataTables.bootstrap.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets2/plugins/select2/select2.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets2/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets2/dist/css/skins/skin-blue.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
    	@font-face{
		    font-family: "NixieOne";
		    src: url('<?php echo base_url(); ?>assets2/fonts/NixieOne-Regular.otf'),
		    url('<?php echo base_url(); ?>assets2/fonts/NixieOne-Regular.otf'); /* IE */
		}

		.main-footer {
			max-height: 4em;
		}

    	#content {
				border: 0px;
				height: 78vh;
				width: 102%;
				margin: 0;
				outline: none;
				padding: 0;
				background-color: #eee;
			}

		#seperator {
				height: 10em;
				width: 100%;
				margin-top: 8em;
			}

		.ui-datepicker{
			z-index: 9999 !important;
		}

		#time {
			font-weight: lighter;
		}

		.logo-lg {
			font-family: NixieOne;
		}

		/* for table rows to make the mouse pointer change on hover */
		.clickable-row {
			cursor: pointer;
		}

		.back-button {
			position: fixed;
		}

		/* to bring the elements to the foreground, used in tables that have .clickable-row class */
		.in-front {
			z-index: 200;
		}


    </style>

    <!-- jQuery 2.1.4. included in header beacuse it should load before any other jquery function runs-->
    <script src="<?php echo base_url(); ?>assets2/plugins/jQuery/jQuery.min.js"></script>

    <script type="text/javascript">
	    window.onload = function() {
	    	//activateMenu();
			var d = new Date();
			document.getElementById('date').innerHTML =  d.toDateString();
		 	startTime();
		 	responsiveSidebar();
            check_session_init();
		};

		window.onresize = function() {
			responsiveSidebar();
		}

		// this will make the collapse the sidebar automatically if the window is narrow.
		function responsiveSidebar() {
			var width = $(window).width();
		 	if(width < 1200) {
		 		document.getElementById('body').className += " sidebar-collapse";
		 	} else {
		 		document.getElementById('body').className = "skin-blue fixed sidebar-mini";
		 	}
		}


		var AdminLTEOptions = {
			//General animation speed for JS animated elements such as box collapse/expand and
			//sidebar treeview slide up/down. This options accepts an integer as milliseconds,
			//'fast', 'normal', or 'slow'
		  	animationSpeed: 'fast'
	  };
    </script>

  </head>

  <body id="body" class="skin-blue fixed sidebar-mini" >
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="<?php echo base_url();?>index.php/Dashboard/" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
      	  <span class="logo-mini"><i class="fa fa-cubes"></i></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><i class="fa fa-cubes"></i> <b>SPARK</b> HMS</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation" style="z-index:-2;">
         <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- date view -->
              <li class="dropdown messages-menu">
              	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
              		<span id="date"> </span> |
              		<span id="time"></span>
              	</a>
              	<ul class="dropdown-menu">
              		<div id="datepicker" ></div>
              	</ul>
              </li>

              <!-- User Account Menu -->
              <li class="user user-menu">
	              <!-- Menu Toggle Button -->
	              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                <!-- The user image in the navbar-->
	                <i class="glyphicon glyphicon-user"></i>
	                <!-- hidden-xs hides the username on small devices so only the image appears. -->
	                <span class="hidden-xs">Welcome <?php echo $this->session->userdata('username'); ?></span>
	              </a>
              </li>

              <li>
              	<a href="<?php echo base_url().'index.php/dashboard/logout' ?>" >Log Out <i class="fa fa-sign-out"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li id="Dashboard">
                    <a href="<?php echo base_url();?>index.php/Dashboard/">
                        <i class="menu-icon fa fa-tachometer"></i>
                        <span class="menu-text"> Dashboard </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="" id="User Management">
                    <a href="<?php echo base_url();?>index.php/User_Management/">
                        <i class="menu-icon fa fa-users"></i>
                        <span class="menu-text"> User Management </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="" id="SPARK Explorer">
                    <a href="<?php echo base_url();?>index.php/Spark_Explorer/">
                        <i class="menu-icon fa fa-sitemap"></i>
                        <span class="menu-text"> SPARK Explorer </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="treeview " id="Data Management">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-database"></i>
                        <span class="menu-text"> Data Management </span>

                        <i class="fa fa-angle-down pull-right"></i>
                    </a>


                    <ul class="treeview-menu">
                        <li class="" id="Room Details">
                            <a href="<?php echo base_url();?>index.php/Room_Details/">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Room Details
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="" id="Computer Details">
                            <a href="<?php echo base_url();?>index.php/Computer_Details/">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Computer Details
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="" id="Software List">
                            <a href="#">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Software List
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

                <li class="treeview" id="Maintenance">
                    <a href="#" >
                        <i class="menu-icon fa fa-wrench"></i>
                        <span class="menu-text"> Maintenance </span>

                        <i class="fa fa-angle-down pull-right"></i>
                    </a>

                    <ul class="treeview-menu">
                        <li class="" id="Issues">
                            <a href="<?php echo base_url();?>index.php/Issues/">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Issues
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="" id="Maintenance History">
                            <a href="#">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Maintenance History
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="" id="Maintenance Schedule">
                            <a href="#">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Maintenance Schedule
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

                <li class="" id="Inventory">
                    <a href="<?php echo base_url();?>index.php/Inventory/">
                        <i class="menu-icon fa fa-briefcase"></i>
                        <span class="menu-text"> Inventory </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="treeview" id="Backups">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-hdd-o"></i>
                        <span class="menu-text"> Backups </span>

                        <i class="fa fa-angle-down pull-right"></i>
                    </a>

                    <ul class="treeview-menu">
                        <li class="" id="Backup History">
                            <a href="#">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Backup History
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="" id="Backup Schedule">
                            <a href="#">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Backup Schedule
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

                <li class="" id="To-do Tasks">
                    <a href="<?php echo base_url();?>index.php/Task_List/">
                        <i class="menu-icon fa fa-list"></i>
                        <span class="menu-text"> To-do Tasks </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="treeview" id="Reports">
                    <a href="#">
                        <i class="menu-icon fa fa-line-chart"></i>
                        <span class="menu-text"> Reports </span>
                        <i class="fa fa-angle-down pull-right"></i>
                    </a>

                    <ul class="treeview-menu">
                        <li class="" id="Inventory Overview Report">
                            <a href="<?php echo base_url();?>index.php/Inventory_Overview">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Inventory Overview Report
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="" id="Issues Overview Report">
                            <a href="<?php echo base_url();?>index.php/Issues_Overview">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Issues Overview Report
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
            </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
