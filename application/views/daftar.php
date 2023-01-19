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
                    <div class="panel-heading">Daftar</div>
                </center>
                <div class="panel-body">
                    <script language="javascript" type="text/javascript">
                        $(document).ready(function() {

                            $("#id_departemen").change(function() {
                                // Put an animated GIF image insight of content

                                var data = {
                                    id_departemen: $("#id_departemen").val()
                                };
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url() . 'select/select_bagian_departemen' ?>",
                                    data: data,
                                    success: function(msg) {
                                        $('#div-order').html(msg);
                                    }
                                });
                            });

                        });
                    </script>
                    <br>

                    <form method="post" action="<?php echo base_url(); ?><?php echo $url; ?>">

                        <input type="hidden" class="form-control" name="nik" value="<?php echo $nik; ?>">

                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control" name="nama" placeholder="Nama" value="<?php echo $nama; ?>" required>
                        </div>

                        <!-- <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" name="username" placeholder="Username" value="<?php echo $nik; ?>" hidden>
                        </div> -->

                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" name="email" placeholder="Email" value="-" required>
                            <i style="font-size: 11.5px;">*Harap Gunakan Email Yang Valid</i>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" name="password" type="password" placeholder="Password" value="<?php echo $password; ?>" required>
                            <i style="font-size: 11.5px;"></i>
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <?php echo form_dropdown('id_jk', $dd_jk, $id_jk, ' id="id_jk" required class="form-control"'); ?>
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" required><?php echo $alamat; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Kantor</label>
                            <input class="form-control" name="kantor" placeholder="kantor" required>
                        </div>
                        <div class="form-group">
                            <label>Cabang</label>
                            <input class="form-control" name="cabang" placeholder="cabang">
                        </div>

                        <div class="form-group">
                            <label>Departemen</label>
                            <?php echo form_dropdown('id_bagian_departemen', $dd_bagian_departemen, $id_bagian_departemen, ' id="id_bagian_departemen" required class="form-control"'); ?>
                        </div>

                        <div id="div-order">

                            <?php if ($flag == "edit") {

                                echo form_dropdown('id_bagian_departemen', $dd_bagian_departemen, $id_bagian_departemen, 'required class="form-control"');
                            } else {
                            }
                            ?>
                        </div>

                        <div class="form-group">
                            <label>Jabatan</label>
                            <?php echo form_dropdown('id_jabatan', $dd_jabatan, $id_jabatan, 'required class="form-control"'); ?>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?php echo base_url(); ?>login/" class="btn btn-default">Punya Akun?</a>


                    </form>


                </div>
            </div>
        </div>
    </div>



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