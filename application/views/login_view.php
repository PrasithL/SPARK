<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>SPARK - Login</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets2/img/icon.png" type="image/png">
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets2/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets2/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets2/css/ace/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets2/css/ace/ace.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/ace-part2.css" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets2/css/ace/ace-rtl.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/ace-ie.css" />
		<![endif]-->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="<?php echo base_url(); ?>/assets2/js/html5shiv.js"></script>
		<script src="<?php echo base_url(); ?>/assets2/js/respond.js"></script>
		<![endif]-->

		<style type="text/css">
			.login-box {
				margin-top: 5vh;
			}

			#title {
				margin-top: 8vh;
			}
		</style>
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div id="title" class="center">
								<!-- <h1>
									<i class="ace-icon fa fa-cubes gray"></i>
									<span class="red">SPARK</span>
									<span class="white" id="id-text2"></span>
								</h1> -->
                                <img src="<?php echo base_url();?>/assets2/img/logo.png" alt="SPARK LOGO" style="height: 8em;"/>
								<h4 class="blue" id="id-company-text" style="margin-top:-0.3em; margin-bottom:-1em;">Hardware Management System</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-key green"></i>
												Please Enter Your Information
											</h4>

											<div class="space-6"></div>

											<form method="POST" action="<?php echo base_url();?>index.php/Login/validate_login" onsubmit="md5Pass()">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="username" placeholder="Username" required autofocus/>
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" id="passwordShow" name="passwordShow" placeholder="Password" required/>
                                                            <!-- hiddent filed to store md5'd password -->
             	                                            <input type="password" hidden name="password" id="password">
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<!-- check how to remeber login state -->
														<!-- <label class="inline">
															<input type="checkbox" class="ace" />
															<span class="lbl"> Remember Me</span>
														</label> -->

														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>
													</div>

													<div class="space-4"></div>
													<div class="center text-danger"><?php if( !is_null($msg)) echo $msg; ?></div>
												</fieldset>
											</form>

										</div><!-- /.widget-main -->

									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

							</div><!-- /.position-relative -->

						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url(); ?>/assets2/plugins/jQuery/jQuery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='<?php echo base_url(); ?>/assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url(); ?>/assets2/js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>

        <!-- Joseph's Myers' md5 implementation link - http://www.myersdaily.org/joseph/javascript/md5-text.html -->
	    <script src="<?php echo base_url(); ?>/assets2/js/md5.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
            function md5Pass() {
                pass = $('#passwordShow').val();
                $('#password').val(md5(pass)); // calling the md5() method of Myers library
                                               // md5 will be stored in a hidden input.
            }

			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});

			//changing background to use white theme
			$(function() {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
			});
		</script>
	</body>
</html>
