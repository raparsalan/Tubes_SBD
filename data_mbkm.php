<?php
include('config.php');
session_start();
$query = mysqli_query($mysqli, "SELECT nim, nama_lengkap, jenis_kelamin, semester_sekarang , nama_program, sks_ditukar, semester_ikut, tanggal_ikut, keterangan FROM mahasiswa, program, status, daftar_peserta WHERE mahasiswa.id_mhs = daftar_peserta.id_mhs and daftar_peserta.id_program = program.id_program and daftar_peserta.id_status = status.id_status;");

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
        <center><H2>Daftar Peserta MBKM</H2></center>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="bg-teal">
                    <tr>
                        <th>NIM</th>
                        <th>Nama Lengkap</th>
                        <th>Status</th>
                        <th>Nama Program</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <tr data-widget="expandable-table" aria-expanded="false">
                            <td><?=$row['nim']?></td>
                            <td><?=$row['nama_lengkap']?></td>
                            <td><?=$row['keterangan']?></td>
                            <td><?=$row['nama_program']?></td>
                        </tr>
                        <tr class="expandable-body">
                            <td colspan="4">
                                <?php
                                    if($row['semester_sekarang'] == $row['semester_ikut']){
                                        echo "<p>Jenis Kelamin ".$row['jenis_kelamin']."<br>Semester ".$row['semester_sekarang']."
                                        dan mengikuti MBKM pada semester sekarang <br>Jumlah SKS yang ditukar :".$row['sks_ditukar']."
                                        </p>";
                                    }else{?>
                                        <p>Jenis Kelamin <?=$row['jenis_kelamin']?> <br> Sekarang Semester <?=$row['semester_sekarang']?> Mengikuti MBKM pada semester <?=$row['semester_ikut']?>
                                        <br> Jumlah SKS yang ditukar : <?=$row['sks_ditukar']?> 
                                        </p>
                                    <?php }?>
                            </td>
                        </tr>
                    <?php } ?>  
                </tbody>
            </table>
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
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
</body>

</html>