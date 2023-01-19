<div class="row">
	<div class="col-lg-12">
		<?php if ($this->session->userdata('level') == "ADMIN") { ?>
			<h1 class="page-header">Dashboard</h1>
		<?php } else if ($this->session->userdata('level') == "USER") { ?>
			<br><br>
			<h2>Selamat Datang di CV.AGA Helpdesk!</h2>
		<?php } ?>
	</div>
</div>
<!--/.row-->
<?php if ($this->session->userdata('level') == "ADMIN") { ?>
	<div class="row">
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-blue panel-widget ">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked bag">
							<use xlink:href="#stroked-email"></use>
						</svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right" style="background: #30a5ff;">
						<div class="large" style="color: #fff; text-align: center;"><?php echo $jml_ticket; ?></div>
						<div class="text-muted" style="color: #fff; text-align: center;">Tickets</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-teal panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked male-user">
							<use xlink:href="#stroked-male-user"></use>
						</svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right" style="background: #1ebfae;">
						<div class="large" style="color: #fff; text-align: center;"><?php echo $jml_user; ?></div>
						<div class="text-muted" style="color: #fff; text-align: center;">Users</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-orange panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked male-user">
							<use xlink:href="#stroked-male-user"></use>
						</svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right" style="background: #ffb53e;">
						<div class="large" style="color: #fff; text-align: center;"><?php echo $jml_karyawan; ?></div>
						<div class="text-muted" style="color: #fff; text-align: center;">Karyawan</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-red panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked male-user">
							<use xlink:href="#stroked-male-user"></use>
						</svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right" style="background: #f9243f;">
						<div class="large" style="color: #fff; text-align: center;"><?php echo $jml_teknisi; ?></div>
						<div class="text-muted" style="color: #fff; text-align: center;">Teknisi</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/.row-->
	<div class="row">
		<div class="col-xs-6 col-md-3 col-lg-6">
			<div class="panel panel-default">
				<div class="panel-body easypiechart-panel">
					<h4><br>Solved</h4>
					<div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $jml_ticket_solved; ?>"><span class="percent"><?php echo ceil($jml_ticket_solved); ?> %</span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-6 col-md-3 col-lg-6">
			<div class="panel panel-default">
				<div class="panel-body easypiechart-panel">
					<h4>Waiting<br>Approval Internal</h4>
					<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $jml_ticket_app_int; ?>"><span class="percent"><?php echo ceil($jml_ticket_app_int); ?> %</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6 col-md-3 col-lg-6">
			<div class="panel panel-default">
				<div class="panel-body easypiechart-panel">
					<h4>On<br>Process</h4>
					<div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $jml_ticket_process; ?>"><span class="percent"><?php echo ceil($jml_ticket_process); ?> %</span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-6 col-md-3 col-lg-6">
			<div class="panel panel-default">
				<div class="panel-body easypiechart-panel">
					<h4>Waiting<br>Approval Technition</h4>
					<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $jml_ticket_app_tek; ?>"><span class="percent"><?php echo ceil($jml_ticket_app_tek); ?>%</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- NEW INFO -->
	<div class="row">
		<div class="col-xs-6 col-md-3 col-lg-6">
			<div class="panel panel-default">
				<div class="panel-body easypiechart-panel">
					<h4>Most Problem : <br><b><?php echo $nama_rusak; ?></b></h4>
					<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $jml_rusak; ?>"><span class="percent"><?php echo ceil($jml_rusak); ?> case</span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-6 col-md-3 col-lg-6">
			<div class="panel panel-default">
				<div class="panel-body easypiechart-panel">
					<h4>Office with the most case : <br><b><?php echo $nama_kantor; ?></b></h4>
					<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $jml_kantor; ?>"><span class="percent"><?php echo ceil($jml_kantor); ?> case</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/.row-->
	<div class="row">
		<div class=" col-lg-12">
			<div class="panel panel-teal panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked star">
							<use xlink:href="#stroked-star" />
						</svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large" style=" text-align: center;"><?php echo ceil($jml_feedback_positiv); ?>%</div>
						<div class="text-muted" style=" text-align: center;">Feedback Positive</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/.row-->
	<div class="row">
		<div class=" col-lg-12">
			<div class="panel panel-red panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked cancel">
							<use xlink:href="#stroked-cancel" />
						</svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large" style=" text-align: center;"><?php echo ceil($jml_feedback_negativ); ?>%</div>
						<div class="text-muted" style=" text-align: center;">Feedback Negative</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } else if ($this->session->userdata('level') == "USER") { ?>
	<div class="col-sm-8 col-lg">
		<h4>Sistem CV. AGA Helpdesk dikembangkan untuk meningkatkan
			kualitas layanan prima untuk pengguna.
			Semua permohonan mempunyai nomor tiket unik dan dapat
			dilihat status penanganan layanan tersebut. Seluruh permohonan
			layanan akan disimpan di dalam database CV. AGA Helpdesk.</h4>
	</div>
<?php } ?>


</div>
<!--/.col-->
</div>
<!--/.row-->
</div>
<!--/.main-->