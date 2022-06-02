<?php
require_once "config.php";

session_start();

if (!isset($_SESSION) || ($_SESSION['loggedin'] != true)) {
    header('location: login.php');
}

$id = $_SESSION['id'];
$query = mysqli_query($mysqli, "SELECT * FROM mahasiswa WHERE mahasiswa.id_mhs = $id");
$data = mysqli_fetch_array($query);
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
            <li class="nav-item">
                <h3>Computer Science</h3>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index_program.php" class="nav-link">List Program Anda</a>
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
    <section class="mt-5">
        <div class="row">
            <div class="col card card-widget widget-user-2 ml-3 mr-2">
                <div class="widget-user-header bg-primary">
                    <div class="widget-user-image">
                        <i class="fa-solid fa-user fa-4x"></i>
                    </div>
                    <h3 class="widget-user-username"><?= $data['nama_lengkap'] ?></h3>
                    <h5 class="widget-user-desc">Mahasiswa Aktif</h5>
                </div>
                <div class="card-footer p-0">
                    <ul class="nav flex-column  h5">
                        <li class="nav-item ml-3 pt-2 pb-2">
                            NIM : <?= $data['nim'] ?>
                        </li>
                        <li class="nav-item ml-3 pt-2 pb-2">
                            Jenis Kelamin : <?= $data['jenis_kelamin'] ?>
                        </li>
                        <li class="nav-item ml-3 pt-2 pb-2">
                            Semester <?= $data['semester_sekarang'] ?>
                        </li>
                        <li class="nav-item ml-3 pt-2 pb-2">
                            IPK <?= number_format($data['ipk'], 2) ?>
                        </li>
                        <li class="nav-item ml-3 pt-2 pb-2">
                            Total SKS <?= $data['total_sks'] ?>
                        </li>
                    </ul>
                </div>
            </div>  
            <div class="col">
                <h2>Selamat Datang !</h2>
                <h3>Website Pendataan peserta MBKM</h3>
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

</body>

</html>