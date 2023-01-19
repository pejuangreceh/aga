	<br>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<?php if ($this->session->userdata('level') == "USER" and $this->session->userdata('id_jabatan') == 5) { ?>
				<?php } else { ?>
					<div class="panel-heading"><svg class="glyph stroked male user ">
							<use xlink:href="#stroked-male-user" />
						</svg>
						<a href="<?php echo base_url(); ?>kondisi/add" style="text-decoration:none">Tambah Data Kondisi</a>
					</div>
				<?php } ?>

				<div class="panel-body">
					<table data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						<thead>
							<tr>
								<th data-field="no" data-sortable="true" width="10px"> No</th>
								<th data-field="id" data-sortable="true">Kondisi</th>
								<th data-field="ids" data-sortable="true">Waktu Respon</th>
								<?php if ($this->session->userdata('level') == "USER" and $this->session->userdata('id_jabatan') == 5) { ?>
								<?php } else { ?>
									<th>Aksi</th>
								<?php } ?>

							</tr>
						</thead>
						<tbody>
							<?php $no = 0;
							foreach ($datakondisi as $row) : $no++; ?>
								<tr>
									<td data-field="no" width="10px"><?php echo $no; ?></td>
									<td data-field="nama_kondisi"><?php echo $row->nama_kondisi; ?></td>
									<td data-field="id"><?php echo $row->waktu_respon; ?></td>
									<?php if ($this->session->userdata('level') == "USER" and $this->session->userdata('id_jabatan') == 5) { ?>
									<?php } else { ?>
										<td>
											<a class="ubah btn btn-primary btn-xs" href="<?php echo base_url(); ?>kondisi/edit/<?php echo $row->id_kondisi; ?>"><span class="glyphicon glyphicon-edit"></span></a>
											<a data-toggle="modal" title="Hapus Kontak" class="hapus btn btn-danger btn-xs" href="#modKonfirmasi" data-id="<?php echo $row->id_kondisi; ?>"><span class="glyphicon glyphicon-trash"></span></a>
										</td>
									<?php } ?>

								</tr>
							<?php endforeach; ?>
						</tbody>

					</table>
				</div>
			</div>
		</div>
	</div>
	<!--/.row-->

	<?php echo $this->session->flashdata("msg"); ?>


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