<style>
	.navbar{
		background-color: #fff;
		box-shadow: 1px 2px 3px #ddd;
	}
	.navbar-toggle{
		background:#222;
	}
</style>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- <a class="navbar-brand" href="#"><span>HELP DESK </span>SYSTEM | PT. PERTAMINA GAS DISTRIK BAYU TUTOR</a> -->
				<a class="navbar-brand" href="<?php echo base_url();?>home" style="color: #333;font-weight: 600;"><i class="fa fa-home"></i>Home</a>
				<ul class="user-menu" id="nav-dropdown">
					<li class="dropdown pull-right">
						<?php
						$jekel = strtolower($this->session->userdata('jk'));
						$temp_url = base_url();
						if($jekel == 'laki-laki'){
						echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #333;font-weight: 600; text-transform: capitalize;"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>'.$this->session->userdata('nama').' <span class="fa fa-chevron-circle-down" id="ddi"></span></a>';
						echo '<ul class="dropdown-menu" role="menu">';
						echo	'<li><a href="'.$temp_url.'profile/view"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>';
						echo	'<li><a href="'.$temp_url.'login/logout"><i class="fa fa-sign-out glyph stroked male-user"></i> Logout</a></li>';
						echo '</ul>';
						}
						else if($jekel == 'perempuan'){
						echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #333;font-weight: 600; text-transform: capitalize;"><svg class="glyph stroked male-user"><use xlink:href="#stroked-female-user"></use></svg> '.$this->session->userdata('nama').' <span class="fa fa-chevron-circle-down" id="ddi"></span></a>';
						echo '<ul class="dropdown-menu" role="menu">';
						echo	'<li><a href="'.$temp_url.'profile/view"><svg class="glyph stroked male-user"><use xlink:href="#stroked-female-user"></use></svg> Profile</a></li>';
						echo	'<li><a href="'.$temp_url.'login/logout"><i class="fa fa-sign-out glyph stroked male-user"></i> Logout</a></li>';
						echo '</ul>';
						}
						?>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
	<script type="text/javascript">
	var dropdown = document.getElementById("nav-dropdown");
	var ddi = document.getElementById("ddi");
	var i;

	dropdown.addEventListener("click", function() {
		if (i == 0) {
		ddi.classList.remove("fa-chevron-circle-down");
		ddi.classList.add("fa-chevron-circle-up");
		i=1;
		console.log(""+i);
		} else {
		ddi.classList.remove("fa-chevron-circle-up");
		ddi.classList.add("fa-chevron-circle-down");
		i=0;
		console.log(""+i);
		}
	});
	</script>