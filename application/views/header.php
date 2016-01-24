<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>SPARK HMS</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.css" />

		<script src="<?php echo base_url(); ?>assets/jquery.min.js"></script>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.custom.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-ie.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="<?php echo base_url(); ?>assets/js/ace-extra.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="<?php echo base_url(); ?>assets/js/html5shiv.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/respond.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<!-- #section:basics/navbar.layout -->
		<div id="navbar" class="navbar navbar-default navbar-fixed-top">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<!-- #section:basics/sidebar.mobile.toggle -->
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<!-- /section:basics/sidebar.mobile.toggle -->
				<div class="navbar-header pull-left">
					<!-- #section:basics/navbar.layout.brand -->
					<a href="#" class="navbar-brand">
						<small>
							<i class="fa fa-cubes"></i>
							<b>SPARK</b> HMS
						</small>
					</a>

					<!-- /section:basics/navbar.layout.brand -->

					<!-- #section:basics/navbar.toggle -->

					<!-- /section:basics/navbar.toggle -->
				</div>

				<!-- #section:basics/navbar.dropdown -->
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="grey">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-list"></i>
								<span class="badge badge-grey">4</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-check"></i>
									4 Tasks to complete
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Task Name</span>
													<span class="pull-right">65%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:65%" class="progress-bar"></div>
												</div>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="#">
										See tasks with details
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="purple">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important">8</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									8 Notifications
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar navbar-pink">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
														New Comments
													</span>
													<span class="pull-right badge badge-info">+12</span>
												</div>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="#">
										See all notifications
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>


						<!-- #section:basics/navbar.user_menu -->
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<span class="user-info">
									<small>Welcome,</small> <?php echo $this->session->userdata('username'); ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Change Password
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href=<?php echo base_url().'index.php/dashboard/logout' ?> >
										<i class="ace-icon fa fa-sign-out"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>

						<!-- /section:basics/navbar.user_menu -->
					</ul>
				</div>

				<!-- /section:basics/navbar.dropdown -->
			</div><!-- /.navbar-container -->
		</div>

		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			<!-- #section:basics/sidebar -->
			<div id="sidebar" class="sidebar responsive sidebar-fixed">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<!-- commented for now. if they seem useful, will be implemented in the future [prasith] -->

				<!-- <div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>

					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div> -->

				<ul class="nav nav-list">
					<li class="" id="Dashboard">
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
						<a href="<?php echo base_url();?>index.php/Dashboard/">
							<i class="menu-icon fa fa-sitemap"></i>
							<span class="menu-text"> SPARK Explorer </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="" id="Data Management">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-database"></i>
							<span class="menu-text"> Data Management </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="" id="Room Details">
								<a href="#">
									<i class="menu-icon fa fa-caret-right"></i>
									Room Details
								</a>

								<b class="arrow"></b>
							</li>

							<li class="" id="Computer Details">
								<a href="#">
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

					<li class="" id="Maintenance">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-wrench"></i>
							<span class="menu-text"> Maintenance </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="" id="Issues">
								<a href="#">
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
						<a href="#">
							<i class="menu-icon fa fa-briefcase"></i>
							<span class="menu-text"> Inventory </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="" id="Backups">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-hdd-o"></i>
							<span class="menu-text"> Backups </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
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
						<a href="#">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> To-do Tasks </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="" id="Reports">
						<a href="#">
							<i class="menu-icon fa fa-line-chart"></i>
							<span class="menu-text"> Reports </span>
						</a>

						<b class="arrow"></b>
					</li>

				</ul><!-- /.nav-list -->

				<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<!-- /section:basics/sidebar.layout.minimize -->
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>

			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<div class="page-content">
					<div class="row" style="overflow:hidden;">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->
