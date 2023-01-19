	<?php
	function classification($pengerjaan, $jk, $tipe, $feedback)
	{
		if (($pengerjaan <= 7) && ($jk == 'PEREMPUAN') && ($tipe == 'SOFTWARE') && ($feedback == 1)) {
			$hasil = 'diperbaiki';
		} else if (($pengerjaan > 7) && ($jk == 'PEREMPUAN') && ($tipe == 'HARDWARE') && ($feedback == 0 || $feedback == NULL)) {
			$hasil = 'diganti';
		} else if (($pengerjaan <= 7) && ($jk == 'LAKI-LAKI') && ($tipe == 'HARDWARE') && ($feedback == 0 || $feedback == NULL)) {
			$hasil = 'diganti';
		} else if (($pengerjaan > 7) && ($jk == 'LAKI-LAKI') && ($tipe == 'SOFTWARE') && ($feedback == 1)) {
			$hasil = 'diperbaiki';
		} else if (($pengerjaan <= 7) && ($jk == 'PEREMPUAN') && ($tipe == 'HARDWARE') && ($feedback == 1)) {
			$hasil = 'diperbaiki';
		} else if (($pengerjaan > 7) && ($jk == 'PEREMPUAN') && ($tipe == 'SOFTWARE') && ($feedback == 0 || $feedback == NULL)) {
			$hasil = 'diganti';
		} else if (($pengerjaan > 7) && ($jk == 'LAKI-LAKI') && ($tipe == 'HARDWARE') && ($feedback == 0 || $feedback == NULL)) {
			$hasil = 'diganti';
		} else if (($pengerjaan > 7) && ($jk == 'PEREMPUAN') && ($tipe == 'HARDWARE') && ($feedback == 1)) {
			$hasil = 'diperbaiki';
		} else if (($pengerjaan > 7) && ($jk == 'LAKI-LAKI') && ($tipe == 'HARDWARE') && ($feedback == 1)) {
			$hasil = 'diperbaiki';
		} else if (($pengerjaan > 7) && ($jk == 'LAKI-LAKI') && ($tipe == 'SOFTWARE') && ($feedback == 0 || $feedback == NULL)) {
			$hasil = 'diganti';
		} else if (($pengerjaan > 7) && ($jk == 'PEREMPUAN') && ($tipe == 'SOFTWARE') && ($feedback == 1)) {
			$hasil = 'diperbaiki';
		} else if (($pengerjaan <= 7) && ($jk == 'PEREMPUAN') && ($tipe == 'SOFTWARE') && ($feedback == 0 || $feedback == NULL)) {
			$hasil = 'diperbaiki';
		} else if (($pengerjaan <= 7) && ($jk == 'PEREMPUAN') && ($tipe == 'HARDWARE') && ($feedback == 0 || $feedback == NULL)) {
			$hasil = 'diperbaiki';
		} else if (($pengerjaan <= 7) && ($jk == 'LAKI-LAKI') && ($tipe == 'HARDWARE') && ($feedback == 0 || $feedback == NULL)) {
			$hasil = 'diganti';
		} else if (($pengerjaan <= 7) && ($jk == 'LAKI-LAKI') && ($tipe == 'HARDWARE') && ($feedback == 1)) {
			$hasil = 'diperbaiki';
		} else if (($pengerjaan <= 7) && ($jk == 'LAKI-LAKI') && ($tipe == 'SOFTWARE') && ($feedback == 1)) {
			$hasil = 'diperbaiki';
		}
		return $hasil;
	}
	?>

	<br>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<?php if ($this->session->userdata('level') == "USER" and $this->session->userdata('id_jabatan') == 5) { ?>
				<?php } else { ?>
					<div class="panel-heading"><svg class="glyph stroked male user ">
							<use xlink:href="#stroked-male-user" />
						</svg>
						<a href="<?php echo base_url(); ?>ticket/add" style="text-decoration:none">Klasifikasi </a>
					</div>
				<?php } ?>

				<div class="panel-body">
					<table data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						<thead>
							<tr>
								<th data-field="no" data-sortable="true" width="10px"> No</th>
								<th data-field="idd3" data-sortable="true">Id Ticket</th>
								<th data-field="iddds" data-sortable="true">Reported</th>
								<th data-field="idjk" data-sortable="true">Jenis Kelamin</th>
								<th data-field="iddd" data-sortable="true">Hari </th>
								<th data-field="idddd" data-sortable="true">Nama Kategori</th>
								<th data-field="r" data-sortable="true">Feedback</th>
								<th data-field="k" data-sortable="true">Klasifikasi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 0;
							$diperbaiki = 0;
							$diganti = 0;
							// variabel pengerjaan
							$p_lebih_diganti = 0;
							$p_lebih_diperbaiki = 0;
							$p_kurang_diganti = 0;
							$p_kurang_diperbaiki = 0;
							// variabel jenis kelamin
							$jk_laki_laki_diganti = 0;
							$jk_laki_laki_diperbaiki = 0;
							$jk_perempuan_diganti = 0;
							$jk_perempuan_diperbaiki = 0;
							// variabel tipe kerusakan
							$t_software_diganti = 0;
							$t_software_diperbaiki = 0;
							$t_hardware_diganti = 0;
							$t_hardware_diperbaiki = 0;
							// variabel feedback
							$f_puas_diganti = 0;
							$f_puas_diperbaiki = 0;
							$f_tidak_diganti = 0;
							$f_tidak_diperbaiki = 0;
							// variabel diperbaiki
							$u_kurang_diperbaiki = 0;
							$u_laki_laki_diperbaiki = 0;
							$u_hardware_diperbaiki = 0;
							$u_tidak_diperbaiki = 0;
							// variabel diganti
							$u_kurang_diganti = 0;
							$u_laki_laki_diganti = 0;
							$u_hardware_diganti = 0;
							$u_tidak_diganti = 0;


							foreach ($datalist_ticket as $row) : $no++;
								$mulai = new DateTime($row->tanggal);
								$selesai = new DateTime($row->tanggal_solved);
								// selisih hari
								$hari =	date_diff($mulai, $selesai)->days;
								// pencarian data probabilitas pengerjaan
								if (($hari <= 7) && (classification($hari, $row->jk, $row->nama_kategori, $row->feedback) == 'diganti')) {
									$diganti += 1;
									$p_lebih_diganti += 1;
								} else if (($hari <= 7) && (classification($hari, $row->jk, $row->nama_kategori, $row->feedback) == 'diperbaiki')) {
									$diperbaiki += 1;
									$p_lebih_diperbaiki += 1;
								} else if (($hari > 7) && (classification($hari, $row->jk, $row->nama_kategori, $row->feedback) == 'diganti')) {
									$diganti += 1;
									$p_kurang_diganti += 1;
								} else if (($hari > 7) && (classification($hari, $row->jk, $row->nama_kategori, $row->feedback) == 'diperbaiki')) {
									$diperbaiki += 1;
									$p_kurang_diperbaiki += 1;
								}
								// pencarian data probabilitas jenis kelamin
								if (($row->jk == 'PEREMPUAN') && (classification($hari, $row->jk, $row->nama_kategori, $row->feedback) == 'diganti')) {
									$jk_perempuan_diganti += 1;
								} else if (($row->jk == 'PEREMPUAN') && (classification($hari, $row->jk, $row->nama_kategori, $row->feedback) == 'diperbaiki')) {
									$jk_perempuan_diperbaiki += 1;
								} else if (($row->jk == 'LAKI-LAKI') && (classification($hari, $row->jk, $row->nama_kategori, $row->feedback) == 'diganti')) {
									$jk_laki_laki_diganti += 1;
								} else if (($row->jk == 'LAKI-LAKI') && (classification($hari, $row->jk, $row->nama_kategori, $row->feedback) == 'diperbaiki')) {
									$jk_laki_laki_diperbaiki += 1;
								}
								// pencarian data probabilitas tipe kerusakan
								if (($row->nama_kategori == 'SOFTWARE') && (classification($hari, $row->jk, $row->nama_kategori, $row->feedback) == 'diganti')) {
									$t_software_diganti += 1;
								} else if (($row->nama_kategori == 'SOFTWARE') && (classification($hari, $row->jk, $row->nama_kategori, $row->feedback) == 'diperbaiki')) {
									$t_software_diperbaiki += 1;
								} else if (($row->nama_kategori == 'HARDWARE') && (classification($hari, $row->jk, $row->nama_kategori, $row->feedback) == 'diganti')) {
									$t_hardware_diganti += 1;
								} else if (($row->nama_kategori == 'HARDWARE') && (classification($hari, $row->jk, $row->nama_kategori, $row->feedback) == 'diperbaiki')) {
									$t_hardware_diperbaiki += 1;
								}
								// pencarian data probabilitas feedback
								if (($row->feedback == 1) && (classification($hari, $row->jk, $row->nama_kategori, $row->feedback) == 'diganti')) {
									$f_puas_diganti += 1;
								} else if (($row->feedback == 1) && (classification($hari, $row->jk, $row->nama_kategori, $row->feedback) == 'diperbaiki')) {
									$f_puas_diperbaiki += 1;
								} else if (($row->feedback == 0 || $row->feedback == NULL) && (classification($hari, $row->jk, $row->nama_kategori, $row->feedback) == 'diganti')) {
									$f_tidak_diganti += 1;
								} else if (($row->feedback == 0 || $row->feedback == NULL) && (classification($hari, $row->jk, $row->nama_kategori, $row->feedback) == 'diperbaiki')) {
									$f_tidak_diperbaiki += 1;
								}

							?>
								<tr>
									<td data-field="no" width="10px"><?php echo $no; ?></td>
									<td data-field="id">

										<?php if ($row->status == 2) { ?>
											<a href="<?php echo base_url(); ?>list_ticket/pilih_teknisi/<?php echo $row->id_ticket; ?>"><?php echo $row->id_ticket; ?></a>
										<?php } else { ?>
											<a href="<?php echo base_url(); ?>list_ticket/view_progress_teknisi/<?php echo $row->id_ticket; ?>"><?php echo $row->id_ticket; ?></a>
										<?php } ?>

									</td>
									<td data-field="iddsd"><?php echo $row->nama; ?></td>
									<td data-field="idjk"><?php echo $row->jk; ?></td>
									<td data-field="id"><?php echo $hari; ?></td>
									<td data-field="id"><?php echo $row->nama_kategori; ?></td>
									<td data-field="r"><?php echo ($row->feedback == 1) ? 'memuaskan' : 'tidak memuaskan'; ?>
									<td data-field="k"><?php echo classification($hari, $row->jk, $row->nama_kategori, $row->feedback); ?>
									</td>

								</tr>
							<?php endforeach; ?>
						</tbody>
						<?php
						// echo 'P : diganti = ' . number_format((float)$diganti / $no, 2, '.', '');
						// echo 'P : diperbaiki = ' . number_format((float)$diperbaiki / $no, 2, '.', '');
						$diganti_rata = $diganti / ($diganti + $diperbaiki);
						$diperbaiki_rata = $diperbaiki / ($diganti + $diperbaiki);

						$u_kurang_diganti =  $p_kurang_diganti / ($p_kurang_diganti + $p_kurang_diperbaiki);
						$u_kurang_diperbaiki =  $p_kurang_diperbaiki / ($p_kurang_diganti + $p_kurang_diperbaiki);
						$u_laki_laki_diganti = $jk_laki_laki_diganti / ($jk_laki_laki_diganti + $jk_laki_laki_diperbaiki);
						$u_laki_laki_diperbaiki = $jk_laki_laki_diperbaiki / ($jk_laki_laki_diganti + $jk_laki_laki_diperbaiki);
						$u_hardware_diganti = $t_hardware_diganti / ($t_hardware_diganti + $t_hardware_diperbaiki);
						$u_hardware_diperbaiki = $t_hardware_diperbaiki / ($t_hardware_diganti + $t_hardware_diperbaiki);
						$u_tidak_diganti =  $f_tidak_diganti / ($f_tidak_diganti + $f_tidak_diperbaiki);
						$u_tidak_diperbaiki = $f_tidak_diperbaiki / ($f_tidak_diganti + $f_tidak_diperbaiki);

						$hasil_diperbaiki = $u_kurang_diperbaiki * $u_laki_laki_diperbaiki * $u_hardware_diperbaiki * $u_tidak_diperbaiki;
						$hasil_diganti = $u_kurang_diganti * $u_laki_laki_diganti * $u_hardware_diganti * $u_tidak_diganti;
						// pengerjaan
						// echo 'P : diganti = ' . $diganti . ' / ' . ($diganti + $diperbaiki) . ' = ' . $diganti_rata . '<br>';
						// echo 'P : diperbaiki = ' . $diperbaiki . ' / ' . ($diganti + $diperbaiki) . ' = ' . $diperbaiki_rata . '<br>';
						// // pengerjaan
						// echo '< 1 minggu | ganti = ' . $p_kurang_diganti . ' / ' . $p_kurang_diganti + $p_kurang_diperbaiki . ' = ' . $u_kurang_diganti . '<br>';
						// echo '< 1 minggu | baik = ' . $p_kurang_diperbaiki . ' / ' . $p_kurang_diganti + $p_kurang_diperbaiki . ' = ' . $u_kurang_diperbaiki . '<br>';
						// echo '>= minggu | ganti = ' . $p_lebih_diganti . ' / ' . $p_lebih_diganti + $p_lebih_diperbaiki . ' = ' . $p_lebih_diganti / ($p_lebih_diganti + $p_lebih_diperbaiki) . '<br>';
						// echo '>= minggu | baik = ' . $p_lebih_diperbaiki . ' / ' . $p_lebih_diganti + $p_lebih_diperbaiki . ' = ' . $p_lebih_diperbaiki / ($p_lebih_diganti + $p_lebih_diperbaiki) . '<br>';
						// // jenis kelamin
						// echo 'laki laki | ganti = ' . $jk_laki_laki_diganti . ' / ' . $jk_laki_laki_diganti + $jk_laki_laki_diperbaiki  . ' = ' . $u_laki_laki_diganti . '<br>';
						// echo 'laki laki | baik = ' . $jk_laki_laki_diperbaiki . ' / ' . $jk_laki_laki_diganti + $jk_laki_laki_diperbaiki  . ' = ' . $u_laki_laki_diperbaiki  . '<br>';
						// echo 'perempuan | ganti = ' . $jk_perempuan_diganti . ' / ' . $jk_perempuan_diganti + $jk_perempuan_diperbaiki  . ' = ' . $jk_perempuan_diganti / ($jk_perempuan_diganti + $jk_perempuan_diperbaiki) . '<br>';
						// echo 'perempuan | baik = ' . $jk_perempuan_diperbaiki . ' / ' . $jk_perempuan_diganti + $jk_perempuan_diperbaiki  . ' = ' . $jk_perempuan_diperbaiki / ($jk_perempuan_diganti + $jk_perempuan_diperbaiki) . '<br>';
						// // jenis kelamin
						// echo 'software | ganti = ' . $t_software_diganti . ' / ' . $t_software_diganti + $t_software_diperbaiki  . ' = ' . $t_software_diganti / ($t_software_diganti + $t_software_diperbaiki) . '<br>';
						// echo 'software | baik = ' . $t_software_diperbaiki . ' / ' . $t_software_diganti + $t_software_diperbaiki  . ' = ' . $t_software_diperbaiki / ($t_software_diganti + $t_software_diperbaiki) . '<br>';
						// echo 'hardware | ganti = ' . $t_hardware_diganti . ' / ' . $t_hardware_diganti + $t_hardware_diperbaiki  . ' = ' . $u_hardware_diganti . '<br>';
						// echo 'hardware | baik = ' . $t_hardware_diperbaiki . ' / ' . $t_hardware_diganti + $t_hardware_diperbaiki  . ' = ' . $u_hardware_diperbaiki . '<br>';
						// // feedback
						// echo 'puas | ganti = ' . $f_puas_diganti . ' / ' . $f_puas_diganti + $f_puas_diperbaiki  . ' = ' . $f_puas_diganti / ($f_puas_diganti + $f_puas_diperbaiki) . '<br>';
						// echo 'puas | baik = ' . $f_puas_diperbaiki . ' / ' . $f_puas_diganti + $f_puas_diperbaiki  . ' = ' . $f_puas_diperbaiki / ($f_puas_diganti + $f_puas_diperbaiki) . '<br>';
						// echo 'tidak | ganti = ' . $f_tidak_diganti . ' / ' . $f_tidak_diganti + $f_tidak_diperbaiki  . ' = ' . $u_tidak_diganti . '<br>';
						// echo 'tidak | baik = ' . $f_tidak_diperbaiki . ' / ' . $f_tidak_diganti + $f_tidak_diperbaiki  . ' = ' . $u_tidak_diperbaiki . '<br>';
						// perhitungan variabel data uji diperbaiki
						echo '<br> PERHITUNGAN LABEL DIPERBAIKI (' . $diperbaiki_rata . ')<br>';
						echo 'PENGERJAAN (< 1 minggu) = ' . $u_kurang_diperbaiki . '<br>';
						echo 'JENIS KELAMIN (laki laki) = ' . $u_laki_laki_diperbaiki . '<br>';
						echo 'TIPE KERUSAKAN (hardware) = ' . $u_hardware_diperbaiki . '<br>';
						echo 'FEEDBACK (tidak memuaskan) = ' . $u_tidak_diperbaiki . '<br>';
						echo 'Nilai DIPERBAIKI = ' . $diperbaiki_rata . ' x ' . $u_kurang_diperbaiki . ' x ' . $u_laki_laki_diperbaiki . ' x ' . $u_hardware_diperbaiki . ' x ' . $u_tidak_diperbaiki . ' = ' . $hasil_diperbaiki;
						// perhitungan variabel data uji diganti
						echo '<br><br> PERHITUNGAN LABEL diganti (' . $diganti_rata . ')<br>';
						echo 'PENGERJAAN (< 1 minggu) = ' . $u_kurang_diganti . '<br>';
						echo 'JENIS KELAMIN (laki laki) = ' . $u_laki_laki_diganti . '<br>';
						echo 'TIPE KERUSAKAN (hardware) = ' . $u_hardware_diganti . '<br>';
						echo 'FEEDBACK (tidak memuaskan) = ' . $u_tidak_diganti . '<br>';
						echo 'Nilai diganti = ' . $diganti_rata . ' x ' . $u_kurang_diganti . ' x ' . $u_laki_laki_diganti . ' x ' . $u_hardware_diganti . ' x ' . $u_tidak_diganti . ' = ' . $hasil_diganti;
						?>
						<br><br>
						<h4>
							Berdasarkan perhitungan label yang paling tinggi adalah <?= ($hasil_diganti >  $hasil_diperbaiki) ? '<b>Diganti</b> dengan nilai ' . $hasil_diganti : '<b>DiPerbaiki</b> dengan nilai ' . $hasil_diperbaiki ?>
						</h4>
						<h4>
							Sehingga hasil klasifikasi untuk data uji adalah <?= ($hasil_diganti >  $hasil_diperbaiki) ? '<b>Diganti</b>' : '<b>DiPerbaiki</b>' ?>
						</h4>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!--/.row-->





	<script>
		$(function() {
			$('#hover, #striped, #condensed').click(function() {
				var classes = 'table';

				if ($('#hover').prop('checked')) {
					classes += ' table-hover';
				}
				if ($('#condensed').prop('checked')) {
					classes += ' table-condensed';
				}
				$('#table-style').bootstrapTable('destroy')
					.bootstrapTable({
						classes: classes,
						striped: $('#striped').prop('checked')
					});
			});
		});

		function rowStyle(row, index) {
			var classes = ['active', 'success', 'info', 'warning', 'danger'];

			if (index % 2 === 0 && index / 2 < classes.length) {
				return {
					classes: classes[index / 2]
				};
			}
			return {};
		}
	</script>


	<?php $this->load->view('konfirmasi'); ?>

	<script type="text/javascript">
		$(document).ready(function() {

			$(".hapus").click(function() {
				var id = $(this).data('id');

				$(".modal-body #mod").text(id);

			});

		});
	</script>







	</div>
	</div>
	</div>
	</div>
	<!--/.row-->