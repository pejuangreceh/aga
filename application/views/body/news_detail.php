		<div class="row">
			<div class="col-lg-12">
				<a style="color: blue;" href="<?= base_url('informasi_view') ?>">
					<h1 style="color: blue;" class="page-header">Informasi</h1>
				</a>
			</div>
		</div>
		<!--/.row-->





		<div class="row">

			<div class="col-xs-12 col-md-12">


				<div class="panel panel-default chat">
					<div class="panel-heading" id="accordion"><svg class="glyph stroked two-messages">
							<use xlink:href="#stroked-two-messages"></use>
						</svg> <?= $datainformasi->subject; ?></div>

					<div class="panel-body">
						<ul>
							<li class="left clearfix">
								<span class="chat-img pull-left">
								</span>
								<div class="chat-body clearfix">

									<p>
										<?= $datainformasi->pesan; ?>
									</p>

								</div>
							</li>


						</ul>
					</div>


				</div>



			</div>
			<!--/.row-->



		</div>
		<!--/.col-->
		</div>
		<!--/.row-->
		</div>
		<!--/.main-->