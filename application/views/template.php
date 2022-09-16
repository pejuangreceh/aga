<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		@font-face {
			font-family: 'Poppins';
			src: url(../fonts/Poppins/Poppins-Regular.ttf);
		}

		* {
			font-family: 'Poppins';
		}
	</style>
	<!--load view header -->
	<?php
	$this->load->view($header);
	?>
	<!--/header-->
</head>

<body>

	<?php

	$this->load->view($navbar);

	?>

	<?php

	$this->load->view($sidebar);

	?>


	<!--mainbar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">


		<?php
		// cek email
		// var_dump($this->session->userdata());
		$this->load->view($body);

		?>

	</div>

	<!--/mainbar-->
	<footer class=" text-center text-lg-start">
		<!-- Copyright -->
		<div class="text-center p-3 col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="background-color: #fff; box-shadow: 1px -3px 8px -3px rgba(0,0,0,0.26);
	-webkit-box-shadow: 1px -3px 8px -3px rgba(0,0,0,0.26);
	-moz-box-shadow: 1px -3px 8px -3px rgba(0,0,0,0.26); padding: 25px 0;">
			© 2021 Copyright:
			<a class="text-dark" href="#">CV.AGA Helpdesk</a>
		</div>
		<!-- Copyright -->
	</footer>

</body>

</html>