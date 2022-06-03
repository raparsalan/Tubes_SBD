<?php
require_once "config.php";

session_start();

if (!isset($_SESSION) || ($_SESSION['loggedin'] != true)) {
    header('location: login.php');
}

$id = $_SESSION['id'];
$query = mysqli_query($mysqli, "SELECT  id_daftar, tanggal_ikut, nama_program, keterangan FROM  daftar_peserta, program, status WHERE daftar_peserta.id_mhs= $id and daftar_peserta.id_program = program.id_program and daftar_peserta.id_status = status.id_status;");

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
            <div class="col">
                <div class="col-12">
                    <div class="card">
                        <?php
                        if (mysqli_num_rows($query) == 0) { ?>
                            <center>
                                <h2>Anda Belum Mengikuti Program MBKM</h2>
                                <br>
                                <h4>Silahkan Membuat Laporan Untuk Pendataan</h4> <br>

                                <a href="form_daftar.php" class='btn btn-secondary'>Klik Aku</a>
                            </center>";
                        <?php } else { ?>
                            <div class="card-header">
                                <h3 class="card-title mr-2">Program yang anda Ikuti</h3>
                                <br>
                                <a href="form_daftar.php" class='btn btn-secondary'>Laporan Program MBKM</a>
                            </div>
                            <table class="table" width="200px">
                                <thead>
                                    <tr class=text-center>
                                        <th>No</th>
                                        <th>Nama Program</th>
                                        <th>Status</th>
                                        <th>Tanggal Ikut</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no ?></td>
                                            <td><?= $row['nama_program'] ?></td>
                                            <td><?= $row['keterangan'] ?></td>
                                            <td class="text-center"><?= $row['tanggal_ikut'] ?></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateStatus<?= $row['id_daftar'] ?>">
                                                    <i class="fa fa-edit"></i> Update Status
                                                </button>
                                            </td>
                                        </tr>
                                        <form action="" method="POST">
                                            <div class="modal fade" id="updateStatus<?= $row['id_daftar'] ?>" tabindex="-1" aria-labelledby="updateStatusLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="updateStatusLabel">Lapor Perkembangan Status MBKM</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="text" name="id_daftar" id="id_daftar" value="<?= $row['id_daftar'] ?>">
                                                            <div class="form-group">
                                                                <label>Status dari MBKM anda ?</label>
                                                                <select class="form-control" name="id_status">
                                                                    <?php
                                                                    $status = mysqli_query($mysqli, "SELECT * FROM status");
                                                                    while ($data = mysqli_fetch_array($status)) { ?>
                                                                        <option value="<?= $data['id_status'] ?>"><?= $data['keterangan'] ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary" name="simpan">Simpan Status</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        
                                    <?php 
                                     if(isset($_POST['simpan'])){
                                        $id_daftar = $_POST['id_daftar'];
                                        $id_status = $_POST['id_status'];
                                        $update = mysqli_query($mysqli, "UPDATE daftar_peserta SET id_status = $id_status WHERE id_daftar = $id_daftar");
                                        if($update == TRUE){?>
                                            <script>
                                                alert("status berasil diubah");
                                                window.location= "index_program.php"
                                            </script>
                                            <?php
                                        }
                                        

                                     }
                                    $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
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