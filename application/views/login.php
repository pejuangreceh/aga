<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forms</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/datepicker3.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">

	<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>

	<div class="row">
		<center>
			<div>
				<h1 style="font-size: 80px;
				background: -webkit-linear-gradient(
				90deg, #09009f, #00ff95 80%);
    			-webkit-background-clip: text;
    			-webkit-text-fill-color: transparent;"><i class="fa fa-user-o"></i></h1>
			</div>
		</center>
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<center>
					<div class="panel-heading">Login</div>
				</center>
				<div class="panel-body">
					<form action="<?php echo base_url(); ?>login/login_akses" method="post">

						<div class="form-group">
							<input class="form-control" placeholder="Email or Username" name="username" type="text" required>
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Password" name="password" type="password" required>
						</div>
						<center>
							<button type="submit" class="btn btn-primary">Login</button>
						</center>
						<div class="form-group">
							<center>
								Belum punya akun? <a href="<?php echo base_url('login/daftar'); ?>">Register</a>
							</center>
						</div>
					</form>
				</div>
			</div>

			<?php echo $this->session->flashdata("msg"); ?>
		</div><!-- /.col-->
	</div><!-- /.row -->



	<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/chart.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/chart-data.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/easypiechart.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/easypiechart-data.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
	<script>
		! function($) {
			$(document).on("click", "ul.nav li.parent > a > span.icon", function() {
				$(this).find('em:first').toggleClass("glyphicon-minus");
			});
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function() {
			if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function() {
			if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>
</body>

</html>