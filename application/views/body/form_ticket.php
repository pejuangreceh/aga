<script language="javascript" type="text/javascript">
	$(document).ready(function() {

		$("#id_kategori").change(function() {
			// Put an animated GIF image insight of content

			var data = {
				id_kategori: $("#id_kategori").val()
			};
			$.ajax({
				type: "POST",
				url: "<?php echo base_url() . 'select/select_sub_kategori' ?>",
				data: data,
				success: function(msg) {
					$('#div-order').html(msg);
				}
			});
		});

	});
</script>
<br>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading"><svg class="glyph stroked male user ">
					<use xlink:href="#stroked-male-user" />
				</svg>
				<a href="#" style="text-decoration:none; font-color:white">Ticket</a>
			</div>
			<div class="panel-body">

				<div class="col-md-12">
					<form onsubmit="return validateCheckbox();" method="post" action="<?php echo base_url(); ?><?php echo $url; ?>">

						<input type="hidden" class="form-control" name="id_ticket" value="<?php echo $id_ticket; ?>">
						<input type="hidden" class="form-control" name="id_user" value="<?php echo $id_user; ?>">

						<div class="panel panel-danger">
							<div class="panel-heading">
								Pelapor Masalah
							</div>
							<div class="panel-body">

								<div class="col-md-6">

									<div class="form-group">
										<label>NIK</label>
										<input class="form-control" name="nama" placeholder="Nama" value="<?php echo $id_user; ?>" disabled>
									</div>

									<div class="form-group">
										<label>Departemen</label>
										<input class="form-control" name="departemen" placeholder="Departemen" value="<?php echo $departemen; ?>" disabled>
									</div>

								</div>

								<div class="col-md-6">

									<div class="form-group">
										<label>Nama</label>
										<input class="form-control" name="nama" placeholder="Departemen" value="<?php echo $nama; ?>" disabled>
									</div>

									<div class="form-group">
										<label>Bagian Departemen</label>
										<input class="form-control" name="departemen" placeholder="Departemen" value="<?php echo $bagian_departemen; ?>" disabled>
									</div>

								</div>

							</div>
						</div>

						<div class="panel panel-danger">
							<div class="panel-heading">
								Deskripsi Masalah
							</div>
							<div class="panel-body">

								<div class="col-md-6">

									<div class="form-group">
										<label>Kategori Masalah</label>
										<?php echo form_dropdown('id_kategori', $dd_kategori, $id_kategori, ' id="id_kategori" required class="form-control"'); ?>
									</div>

									<div id="div-order">

										<?php if ($flag == "edit") {

											echo form_dropdown('id_sub_kategori', $dd_sub_kategori, $id_sub_kategori, 'required class="form-control"');
										} else {
										}
										?>

									</div>

									<div class="form-group">
										<label>Ugently / Kondisi</label>
										<?php echo form_dropdown('id_kondisi', $dd_kondisi, $id_kondisi, ' id="id_kondisi" required class="form-control"'); ?>
									</div>



								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Subject Masalah</label>
										<input class="form-control" name="problem_summary" placeholder="problem_summary" value="<?php echo $problem_summary; ?>" required>
									</div>

									<div class="form-group">
										<label>Pilih Gejala</label>
										<!-- perulangan gejala -->
										<div class="row">
											<div class="col-md-6">
												<?php
												$i = 0;
												foreach ($datagejala as $g) {
												?>
													<div class="checkbox">
														<label>
															<input type="checkbox" name="gejala[]" value="<?php echo $g->id; ?>" onclick="disableCheckbox();">
															<?php echo $g->deskripsi; ?>
														</label>
													</div>

												<?php
													if ($i == 6) {
														echo '</div><div class="col-md-6">';
													}
													$i++;
												} ?>
											</div>
										</div>
										<!-- end perulangan gejala -->
									</div>
								</div>
							</div>



						</div>
				</div>






				<button type="submit" class="btn btn-primary">Simpan</button>
				<button type="reset" class="btn btn-default">Batal</button>
			</div>

			</form>


		</div>
	</div>
</div>
</div>
<!-- Tambahkan script ini di bagian head atau sebelum penutup tag body -->
<script>
	// Fungsi untuk melakukan validasi checkbox
	function validateCheckbox() {
		var checkboxes = document.getElementsByName('gejala[]');
		var minChecked = 6; // Jumlah minimal checkbox yang harus dipilih
		var maxChecked = 6; // Jumlah maksimal checkbox yang dapat dipilih

		var checkedCount = 0;
		for (var i = 0; i < checkboxes.length; i++) {
			if (checkboxes[i].checked) {
				checkedCount++;
			}
		}

		// Validasi jumlah minimal checkbox yang dipilih
		if (checkedCount < minChecked) {
			alert('Minimal harus memilih ' + minChecked + ' gejala.');
			return false;
		}

		// Validasi jumlah maksimal checkbox yang dipilih
		if (checkedCount > maxChecked) {
			alert('Maksimal hanya boleh memilih ' + maxChecked + ' gejala.');
			return false;
		}

		return true; // Checkbox sudah valid
	}

	// Fungsi untuk menonaktifkan checkbox ketika sudah dipilih 6
	function disableCheckbox() {
		var checkboxes = document.getElementsByName('gejala[]');
		var maxChecked = 6; // Jumlah maksimal checkbox yang dapat dipilih

		var checkedCount = 0;
		for (var i = 0; i < checkboxes.length; i++) {
			if (checkboxes[i].checked) {
				checkedCount++;
			}
		}

		// Nonaktifkan checkbox ketika sudah dipilih 6
		if (checkedCount >= maxChecked) {
			for (var i = 0; i < checkboxes.length; i++) {
				if (!checkboxes[i].checked) {
					checkboxes[i].disabled = true;
				}
			}
		} else {
			for (var i = 0; i < checkboxes.length; i++) {
				if (!checkboxes[i].checked) {
					checkboxes[i].disabled = false;
				}
			}
		}

	}
</script>


<!--/.row-->