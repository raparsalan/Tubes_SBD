<?php
include('config.php');
session_start();
$query = mysqli_query($mysqli, "SELECT nim, nama_lengkap, jenis_kelamin, semester_sekarang , nama_program, sks_ditukar, semester_ikut, tanggal_ikut, keterangan FROM mahasiswa, program, status, daftar_peserta WHERE mahasiswa.id_mhs = daftar_peserta.id_mhs and daftar_peserta.id_program = program.id_program and daftar_peserta.id_status = status.id_status;");
$jumlah = mysqli_query($mysqli, "SELECT COUNT(id_daftar) AS jumlah FROM daftar_peserta");
$jumlah_semua = mysqli_fetch_array($jumlah);
$jumlah = mysqli_query($mysqli, "SELECT COUNT(id_daftar) AS jumlah FROM daftar_peserta WHERE sks_ditukar < 20 AND id_status = 2");
$berjalanA = mysqli_fetch_array($jumlah);
$jumlah = mysqli_query($mysqli, "SELECT COUNT(id_daftar) AS jumlah FROM daftar_peserta WHERE sks_ditukar = 20 AND id_status = 2");
$berjalanB = mysqli_fetch_array($jumlah);
$jumlah = mysqli_query($mysqli, "SELECT COUNT(id_daftar) AS jumlah FROM daftar_peserta WHERE sks_ditukar < 20 AND id_status = 3");
$selesaiA = mysqli_fetch_array($jumlah);
$jumlah = mysqli_query($mysqli, "SELECT COUNT(id_daftar) AS jumlah FROM daftar_peserta WHERE sks_ditukar = 20 AND id_status = 3");
$selesaiB = mysqli_fetch_array($jumlah);
$jumlah = mysqli_query($mysqli, "SELECT COUNT(id_daftar) AS jumlah FROM daftar_peserta WHERE id_status = 4");
$gagal = mysqli_fetch_array($jumlah);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/13338d9b84.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

<body>
    <nav class="navbar navbar-expand navbar-primary navbar-dark">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item d-none d-sm-inline-block">
                <a href="indexadmin.php" class="nav-link">Admin Menu</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item mt-1 ml-2">
                <?php include_once "v_loggedInAcc.php"; ?>
            </li>
        </ul>
    </nav>
    <section class="mt-3 ml-5">
        <center>
            <H2>Daftar Peserta MBKM</H2>
        </center>
        <div class="card-body">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalRekap">
                Rekap Data Keseluruhan
            </button>
            <div class="modal fade" id="modalRekap" tabindex="-1" aria-labelledby="modalRekapLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalRekapLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            
                        </div>
                        <div class="modal-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <td>Kategori</td>
                                    <td>Jumlah</td>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Jumlah mahasiswa mendaftar</td>
                                        <td><?= $jumlah_semua['jumlah'] ?> Orang</td>
                                    </tr>
                                    <tr>
                                        <td>Sedang berjalan dan tidak 20 sks</td>
                                        <td><?= $berjalanA['jumlah'] == 0 ? 'Tidak Ada' : $berjalanA['jumlah'] . ' Orang'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Sedang berjalan 20 SKS</td>
                                        <td><?= $berjalanB['jumlah'] == 0 ? 'Tidak Ada' : $berjalanB['jumlah'] . 'Orang'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Sudah selesai dan berjumlah kurang dari 20</td>
                                        <td><?= $selesaiA['jumlah'] == 0 ? 'Tidak Ada' : $selesaiA['jumlah'] . ' Orang'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Sudah selesai dan bernilai 20 SKS</td>
                                        <td><?= $selesaiB['jumlah'] == 0 ? 'Tidak Ada' : $selesaiB['jumlah'] . ' Orang'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Mengundurkan diri / gagal</td>
                                        <td><?= $gagal['jumlah'] == 0 ? 'Tidak Ada' : $gagal['jumlah'] . ' Orang'; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <a href="data_mbkm.php" class="btn btn-info" style="width:78px;">Refresh</a>    
        </div>
        <div class="card-body ">
            <form action="">
                <div class="row">
                    <label for="kategori">Filter Data</label>
                    <select name="kategori" style="width: 200px" class="form-control ml-2 mb-3 mr-2" id="kategori" onchange="tampil_data_kriteria()" autocomplete="off">
                        <option>Pilih Kategori</option>
                        <option value="1">Semester</option>
                        <option value="2">Status</option>
                        <option value="3">Program</option>
                        <option value="4">Konversi SKS</option>
                    </select>
                    <select id="kriteria" style="width: 400px" name="kriteria" class="form-control" autocomplete="off">
                        <option> </option>
                    </select>
                </div>
            </form>

            <div class="row containerData">
                <div class="panel panel-primary filterable">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <button class="btn btn-default btn-filter mb-2"><i class="fa fa-regular fa-filter"></i> Filter</button>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr class="filters bg-teal">
                                <th><input type="text" class="form-control" placeholder="NIM" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Nama Lengkap" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Status" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Program" disabled></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <tr data-widget="expandable-table" aria-expanded="false" style="background-color: #e9ecef;">
                                    <td><?= $row['nim'] ?></td>
                                    <td><?= $row['nama_lengkap'] ?></td>
                                    <td><?= $row['keterangan'] ?></td>
                                    <td><?= $row['nama_program'] ?></td>
                                </tr>
                                <tr class="expandable-body">
                                    <td colspan="4">
                                        <?php
                                        if ($row['semester_sekarang'] == $row['semester_ikut']) {
                                            echo "<p>Jenis Kelamin " . $row['jenis_kelamin'] . "<br>Semester " . $row['semester_sekarang'] . "
                                        dan mengikuti MBKM pada semester sekarang <br>Jumlah SKS yang ditukar :" . $row['sks_ditukar'] . "
                                        </p>";
                                        } else { ?>
                                            <p>Jenis Kelamin <?= $row['jenis_kelamin'] ?> <br> Sekarang Semester <?= $row['semester_sekarang'] ?> Mengikuti MBKM pada semester <?= $row['semester_ikut'] ?>
                                                <br> Jumlah SKS yang ditukar : <?= $row['sks_ditukar'] ?>
                                            </p>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </section>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <script type="text/javascript">
        function tampil_data_kriteria() {
            var kategori = $("#kategori").val();
            $.ajax({
                url: "proses_filter.php",
                data: "kategori=" + kategori,
                success: function(html) {
                    $('#kriteria').html(html);
                }
            });
        }
        $(document).ready(function() {
            $("#kriteria").on("change", function() {
                var kriteria = $(this).val();
                var kategori = $("#kategori").val();
                $.ajax({
                    url: "fetch.php",
                    data: {
                        "kriteria": kriteria,
                        "kategori": kategori
                    },
                    success: function(html) {
                        $(".containerData").html(html);
                    }
                })
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $('.filterable .btn-filter').click(function() {
                var $panel = $(this).parents('.filterable'),
                    $filters = $panel.find('.filters input'),
                    $tbody = $panel.find('.table tbody');
                if ($filters.prop('disabled') == true) {
                    $filters.prop('disabled', false);
                    $filters.first().focus();
                } else {
                    $filters.val('').prop('disabled', true);
                    $tbody.find('.no-result').remove();
                    $tbody.find('tr').show();
                }
            });

            $('.filterable .filters input').keyup(function(e) {
                /* Ignore tab key */
                var code = e.keyCode || e.which;
                if (code == '9') return;
                /* Useful DOM data and selectors */
                var $input = $(this),
                    inputContent = $input.val().toLowerCase(),
                    $panel = $input.parents('.filterable'),
                    column = $panel.find('.filters th').index($input.parents('th')),
                    $table = $panel.find('.table'),
                    $rows = $table.find('tbody tr');
                /* Dirtiest filter function ever ;) */
                var $filteredRows = $rows.filter(function() {
                    var value = $(this).find('td').eq(column).text().toLowerCase();
                    return value.indexOf(inputContent) === -1;
                });
                /* Clean previous no-result if exist */
                $table.find('tbody .no-result').remove();
                /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
                $rows.show();
                $filteredRows.hide();
                /* Prepend no-result row if all rows are filtered */
                if ($filteredRows.length === $rows.length) {
                    $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="' + $table.find('.filters th').length + '">No result found</td></tr>'));
                }
            });
        });
    </script>
</body>

</html>