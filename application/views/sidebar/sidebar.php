<style>
	li a {
		color: #000;
	}

	body::-webkit-scrollbar {
		background-color: #fff;
		width: 18px
	}

	body::-webkit-scrollbar-track {
		background-color: #fff
	}

	body::-webkit-scrollbar-thumb {
		background-color: #babac0;
		border-radius: 16px;
		border: 4px solid #fff
	}

	.sidebar::-webkit-scrollbar {
		background-color: #fff;
		width: 17px
	}

	.sidebar::-webkit-scrollbar-track {
		background-color: #fff
	}

	.sidebar::-webkit-scrollbar-thumb {
		background-color: #babac0;
		border-radius: 16px;
		border: 4px solid #fff
	}

	.dropdown-btn,
	.dropdown-btn2,
	.dropdown-btn3 {
		background: transparent;
		color: #222;
		border: none;
		outline: none;
		margin: 7px 0 7px 8px;
	}

	.dropdown-btn:hover,
	.dropdown-btn2:hover,
	.dropdown-btn3:hover {
		color: #30a5ff;
		/* background: #; */
	}

	.dropdown-container,
	.dropdown-container2,
	.dropdown-container3 {
		display: none;
	}

	.dropdown-container li,
	.dropdown-container2 li,
	.dropdown-container3 li {
		padding: 5px;
	}
</style>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

	<ul class="nav menu">

		<?php if ($this->session->userdata('level') == "ADMIN") { ?>
			<li class="active"><a href="<?php echo base_url(); ?>ticket/add"><svg class="glyph stroked open folder">
						<use xlink:href="#stroked-open-folder" />
					</svg> New Ticket</a></li>
			<li><a href="<?php echo base_url(); ?>list_ticket/ticket_list"><svg class="glyph stroked notepad ">
						<use xlink:href="#stroked-notepad" />
					</svg> List Ticket</a></li>
			<!-- <li><a href="<?php echo base_url(); ?>list_ticket/klasifikasi"><svg class="glyph stroked notepad ">
						<use xlink:href="#stroked-notepad" />
					</svg> Klasifikasi</a></li> -->
			<li><a href="<?php echo base_url(); ?>approval/approval_list"><svg class="glyph stroked email">
						<use xlink:href="#stroked-email" />
					</svg>
					<use xlink:href="#stroked-male-user"></use></svg> Aprroval Ticket
				</a></li>
			<li><a href="<?php echo base_url(); ?>myticket/myticket_list"><svg class="glyph stroked open letter">
						<use xlink:href="#stroked-open-letter" />
					</svg> My Ticket</a></li>
			<!-- <li><a href="<?php echo base_url(); ?>myassignment/myassignment_list"><svg class="glyph stroked clipboard with paper">
						<use xlink:href="#stroked-clipboard-with-paper" />
					</svg>Assigment Ticket</a></li> -->
			<li>
				<button class="dropdown-btn"><i class="fa fa-chevron-down glyph stroked calendar" id="ddi"></i> User</button>
				<ul class="dropdown-container" style="list-style:none;">
					<li><a href="<?php echo base_url(); ?>karyawan/karyawan_list"><svg class="glyph stroked calendar">
								<use xlink:href="#stroked-male-user"></use>
							</svg> Karyawan</a></li>
					<li><a href="<?php echo base_url(); ?>user/user_list"><svg class="glyph stroked calendar">
								<use xlink:href="#stroked-male-user"></use>
							</svg> User</a></li>
					<li><a href="<?php echo base_url(); ?>teknisi/teknisi_list"><svg class="glyph stroked calendar">
								<use xlink:href="#stroked-male-user"></use>
							</svg> Teknisi</a></li>
					<li><a href="<?php echo base_url(); ?>dashboard_teknisi/teknisi_view"><svg class="glyph stroked calendar">
								<use xlink:href="#stroked-male-user"></use>
							</svg> Report Teknisi</a></li>
				</ul>
			</li>
			<li>
				<button class="dropdown-btn2"><i class="fa fa-chevron-down glyph stroked calendar" id="ddi2"></i> Departemen</button>
				<ul class="dropdown-container2" style="list-style:none;">
					<li><a href="<?php echo base_url(); ?>jabatan/jabatan_list"><svg class="glyph stroked calendar">
								<use xlink:href="#stroked-pen-tip"></use>
							</svg> Jabatan</a></li>
					<li><a href="<?php echo base_url(); ?>departemen/departemen_list"><svg class="glyph stroked calendar">
								<use xlink:href="#stroked-app-window"></use>
							</svg> Departemen</a></li>
					<li><a href="<?php echo base_url(); ?>bagian_departemen/bagian_departemen_list"><svg class="glyph stroked line-graph">
								<use xlink:href="#stroked-app-window"></use>
							</svg> Bagian Departemen</a></li>
				</ul>
			</li>
			<button class="dropdown-btn3"><i class="fa fa-chevron-down glyph stroked calendar" id="ddi3"></i> Kategori</button>
			<ul class="dropdown-container3" style="list-style:none;">
				<li><a href="<?php echo base_url(); ?>kategori/kategori_list"><svg class="glyph stroked calendar">
							<use xlink:href="#stroked-app-window"></use>
						</svg> Kategori</a></li>
				<li><a href="<?php echo base_url(); ?>sub_kategori/sub_kategori_list"><svg class="glyph stroked line-graph">
							<use xlink:href="#stroked-app-window"></use>
						</svg> Sub Kategori</a></li>
			</ul>
			</li>
			<li><a href="<?php echo base_url(); ?>kondisi/kondisi_list"><svg class="glyph stroked calendar">
						<use xlink:href="#stroked-hourglass"></use>
					</svg> Kondisi</a></li>
			<li><a href="<?php echo base_url(); ?>informasi/informasi_list"><svg class="glyph stroked sound on">
						<use xlink:href="#stroked-sound-on" />
					</svg> Informasi</a></li>

			<li><a href="<?php echo base_url(); ?>informasi_view"><svg class="glyph stroked sound on">
						<use xlink:href="#stroked-sound-on" />
					</svg> News</a></li>

		<?php
		} else if ($this->session->userdata('level') == "TEKNISI") { ?>
			<li><a href="<?php echo base_url(); ?>myassignment/myassignment_list"><svg class="glyph stroked clipboard with paper">
						<use xlink:href="#stroked-clipboard-with-paper" />
					</svg> My Assigment Ticket</a></li>
			<li><a href="<?php echo base_url(); ?>informasi_view"><svg class="glyph stroked sound on">
						<use xlink:href="#stroked-sound-on" />
					</svg> News</a></li>

			<!-- TAMBAHAN ROLE KEPALA DIVISI -->
		<?php } else if ($this->session->userdata('level') == "USER" and $this->session->userdata('id_jabatan') == 5) { ?>

			<li><a href="<?php echo base_url(); ?>list_ticket/ticket_list"><svg class="glyph stroked notepad ">
						<use xlink:href="#stroked-notepad" />
					</svg> List Ticket</a></li>
			<li>
				<button class="dropdown-btn"><i class="fa fa-chevron-down glyph stroked calendar" id="ddi"></i> User</button>
				<ul class="dropdown-container" style="list-style:none;">
					<li><a href="<?php echo base_url(); ?>karyawan/karyawan_list"><svg class="glyph stroked calendar">
								<use xlink:href="#stroked-male-user"></use>
							</svg> Karyawan</a></li>
					<li><a href="<?php echo base_url(); ?>user/user_list"><svg class="glyph stroked calendar">
								<use xlink:href="#stroked-male-user"></use>
							</svg> User</a></li>
					<li><a href="<?php echo base_url(); ?>teknisi/teknisi_list"><svg class="glyph stroked calendar">
								<use xlink:href="#stroked-male-user"></use>
							</svg> Teknisi</a></li>
					<li><a href="<?php echo base_url(); ?>dashboard_teknisi/teknisi_view"><svg class="glyph stroked calendar">
								<use xlink:href="#stroked-male-user"></use>
							</svg> Report Teknisi</a></li>
				</ul>
			</li>
			<li>
				<button class="dropdown-btn2"><i class="fa fa-chevron-down glyph stroked calendar" id="ddi2"></i> Departemen</button>
				<ul class="dropdown-container2" style="list-style:none;">
					<li><a href="<?php echo base_url(); ?>jabatan/jabatan_list"><svg class="glyph stroked calendar">
								<use xlink:href="#stroked-pen-tip"></use>
							</svg> Jabatan</a></li>
					<li><a href="<?php echo base_url(); ?>departemen/departemen_list"><svg class="glyph stroked calendar">
								<use xlink:href="#stroked-app-window"></use>
							</svg> Departemen</a></li>
					<li><a href="<?php echo base_url(); ?>bagian_departemen/bagian_departemen_list"><svg class="glyph stroked line-graph">
								<use xlink:href="#stroked-app-window"></use>
							</svg> Bagian Departemen</a></li>
				</ul>
			</li>
			<button class="dropdown-btn3"><i class="fa fa-chevron-down glyph stroked calendar" id="ddi3"></i> Kategori</button>
			<ul class="dropdown-container3" style="list-style:none;">
				<li><a href="<?php echo base_url(); ?>kategori/kategori_list"><svg class="glyph stroked calendar">
							<use xlink:href="#stroked-app-window"></use>
						</svg> Kategori</a></li>
				<li><a href="<?php echo base_url(); ?>sub_kategori/sub_kategori_list"><svg class="glyph stroked line-graph">
							<use xlink:href="#stroked-app-window"></use>
						</svg> Sub Kategori</a></li>
			</ul>
			</li>
			<li><a href="<?php echo base_url(); ?>kondisi/kondisi_list"><svg class="glyph stroked calendar">
						<use xlink:href="#stroked-hourglass"></use>
					</svg> Kondisi</a></li>
			<li><a href="<?php echo base_url(); ?>informasi/informasi_list"><svg class="glyph stroked sound on">
						<use xlink:href="#stroked-sound-on" />
					</svg> Informasi</a></li>

			<li><a href="<?php echo base_url(); ?>informasi_view"><svg class="glyph stroked sound on">
						<use xlink:href="#stroked-sound-on" />
					</svg> News</a></li>

		<?php } else if ($this->session->userdata('level') == "USER") { ?>
			<li class="active"><a href="<?php echo base_url(); ?>ticket/add"><svg class="glyph stroked open folder">
						<use xlink:href="#stroked-open-folder" />
					</svg> New Ticket</a></li>
			<li><a href="<?php echo base_url(); ?>myticket/myticket_list"><svg class="glyph stroked open letter">
						<use xlink:href="#stroked-open-letter" />
					</svg> My Ticket</a></li>
			<li><a href="<?php echo base_url(); ?>informasi_view"><svg class="glyph stroked sound on">
						<use xlink:href="#stroked-sound-on" />
					</svg> News</a></li>
			<!-- <li><a href="<?php echo base_url(); ?>qna_view"><i class="fa fa-question-circle glyph stroked male-user"></i> Question & Answer</a></li> -->

		<?php } else if ($this->session->userdata('level') == "USER" and $this->session->userdata('id_jabatan') == 2) { ?>
			<li class="active"><a href="<?php echo base_url(); ?>home"><svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> Dashboard</a></li>
			<li><a href="<?php echo base_url(); ?>approval/approval_list"><svg class="glyph stroked email">
						<use xlink:href="#stroked-email" />
					</svg>
					<use xlink:href="#stroked-male-user"></use></svg> Aprroval Ticket
				</a></li>
			<li><a href="<?php echo base_url(); ?>informasi_view"><svg class="glyph stroked sound on">
						<use xlink:href="#stroked-sound-on" />
					</svg> News</a></li>
			<li><a href="<?php echo base_url(); ?>dashboard_teknisi/teknisi_view"><svg class="glyph stroked calendar">
						<use xlink:href="#stroked-male-user"></use>
					</svg> Report Teknisi</a></li>

		<?php } ?>
	</ul>

</div>
<!--/.sidebar-->
<script type="text/javascript">
	var dropdown = document.getElementsByClassName("dropdown-btn");
	var ddi = document.getElementById("ddi");
	var i;

	for (i = 0; i < dropdown.length; i++) {
		dropdown[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var dropdownContent = this.nextElementSibling;
			if (dropdownContent.style.display === "block") {
				dropdownContent.style.display = "none";
				ddi.classList.remove("fa-chevron-up");
				ddi.classList.add("fa-chevron-down");
			} else {
				dropdownContent.style.display = "block";
				ddi.classList.remove("fa-chevron-down");
				ddi.classList.add("fa-chevron-up");
			}
		});
	}
	var dropdown2 = document.getElementsByClassName("dropdown-btn2");
	var ddi2 = document.getElementById("ddi2");
	var j;

	for (j = 0; j < dropdown2.length; j++) {
		dropdown2[j].addEventListener("click", function() {
			this.classList.toggle("active");
			var dropdownContent = this.nextElementSibling;
			if (dropdownContent.style.display === "block") {
				dropdownContent.style.display = "none";
				ddi2.classList.remove("fa-chevron-up");
				ddi2.classList.add("fa-chevron-down");
			} else {
				dropdownContent.style.display = "block";
				ddi2.classList.remove("fa-chevron-down");
				ddi2.classList.add("fa-chevron-up");
			}
		});
	}
	var dropdown3 = document.getElementsByClassName("dropdown-btn3");
	var ddi3 = document.getElementById("ddi3");
	var k;

	for (k = 0; k < dropdown3.length; k++) {
		dropdown3[k].addEventListener("click", function() {
			this.classList.toggle("active");
			var dropdownContent = this.nextElementSibling;
			if (dropdownContent.style.display === "block") {
				dropdownContent.style.display = "none";
				ddi3.classList.remove("fa-chevron-up");
				ddi3.classList.add("fa-chevron-down");
			} else {
				dropdownContent.style.display = "block";
				ddi3.classList.remove("fa-chevron-down");
				ddi3.classList.add("fa-chevron-up");
			}
		});
	}
</script>