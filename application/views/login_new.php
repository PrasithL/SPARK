<!-- @author Prasith Lakshan_IBIT03 -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-loan | Log in</title>
     <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/img/favicon.png" type="image/png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets2/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets2/dist/css/AdminLTE.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <style>
    	.login-logo {
    		font-family: Georgia;
    	}

    	.login-page {
    		background-image: url("<?php echo base_url(); ?>/assets2/img/blurred-image-7588-7881-hd-wallpapers.jpg");
    		background-repeat: no-repeat;
    		background-position: right top;
    	}

    	.login-box {
    		margin-top: 14%;
    		box-shadow: 0px 0px 18px 1px #444;
    		border-radius: 5px;
    	}

    	.login-box-body {
    		border-radius: 5px;
    		padding-top: 10px;
    	}

    	.login-logo {
    		overflow: hidden;
    		margin-bottom: 0;
    		height:130px;
    		border-radius: 5px;
    		/*background-image: url("assets/img/eloan_logo.jpg");*/
    	}

    	img {
    		margin-left: -.7em;
    		border-radius: 5px;
    	}
    </style>

  </head>
  <body class="hold-transition login-page ">
    <div class="login-box bg-info">
      <div class="login-logo text-primary text-center">
        <!--
        <i><b>ELoan</b></i><br>
        <small class="text-muted">Loan Management System</small>
        -->

        <img alt="logo" src="assets/img/eloan_logo.jpg" width="420px">
      </div><!-- /.login-logo -->
      <div class="login-box-body">

        <p class="login-box-msg text-success">
        	<%
				String msg = (String)session.getAttribute("loginError");
				if(msg != null) {
					out.print("<span style=\"color:red\">" + msg + "</span>");
					session.removeAttribute("loginError");
				} else {
					out.print("Sign in to start your session");
				}
			%>
        </p>

        <form method="post" action='Login' onsubmit="md5Pass()">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="User Name" name="userName" autofocus required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" required name="passwordShow" id="passwordShow">
            <span class="fa fa-key form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              	<!-- hiddent filed to store md5'd password -->
             	<input type="password" hidden name="password" id="password">

            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In <i class=""></i></button>
            </div><!-- /.col -->
          </div>


        </form>



      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->



    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>/assets2/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>/assets2/js/bootstrap.min.js"></script>
    <!-- Joseph's Myers' md5 implementation link - http://www.myersdaily.org/joseph/javascript/md5-text.html -->
	<script src="<?php echo base_url(); ?>/assets2/js/md5.js"></script>

   	<script>

   		function md5Pass() {
   			pass = $('#passwordShow').val();
   			$('#password').val(md5(pass));
   			console.log(md5(pass));
   		}

   	</script>

  </body>
</html>
