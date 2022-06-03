<?php
require_once "config.php";

session_start();

if (!isset($_SESSION) || ($_SESSION['loggedin'] != true)) {
    header('location: login.php');
}
$id_mhs = $_POST['id_mhs'];
$id_program = $_POST['id_program'];
$sks = $_POST['sks_ditukar'];
$semester = $_POST['semester_ikut'];
$keterangan = $_POST['id_status'];
$tanggal = $_POST['tanggal'];
$ambilsks = mysqli_query($mysqli, "SELECT total_sks, semester_sekarang FROM mahasiswa WHERE mahasiswa.id_mhs = $id_mhs");
$data = mysqli_fetch_array($ambilsks);
$sekarang = $data['semester_sekarang'];
$total = $data['total_sks'];
if ($total + $sks  <= 152 && $sekarang == $semester) {

    if ($query = mysqli_query($mysqli, "INSERT INTO daftar_peserta VALUES (' ', '$id_mhs', '$id_program', '$sks', '$keterangan',
                        '$tanggal', '$semester')")) {
        echo "<script>
                            alert('Laporan Berhasil Masuk');
                            window.location = 'index_program.php';
                            </script>";
    }
}else{
    echo "<script>
    alert('Jumlah SKS anda tidak boleh lebih dari 152');
    window.location = 'index_program.php';
    </script>";
}
