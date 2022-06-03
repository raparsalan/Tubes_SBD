<?php
include('config.php');

$kategori  = $_GET['kategori'];
$kriteria   = $_GET['kriteria'];
if ($kategori == 1) {
    if ($kriteria == 0) {
        $query = mysqli_query(
            $mysqli,
            "SELECT nim, nama_lengkap, 
        jenis_kelamin, semester_sekarang , 
        nama_program, sks_ditukar, semester_ikut, 
        tanggal_ikut, keterangan 
        FROM mahasiswa, program, status, daftar_peserta 
        WHERE mahasiswa.id_mhs = daftar_peserta.id_mhs and daftar_peserta.id_program = program.id_program 
        and daftar_peserta.id_status = status.id_status 
        and mahasiswa.semester_sekarang - daftar_peserta.semester_ikut = 0;"
        );
        $count = mysqli_num_rows($query);
    } else if ($kriteria == 1) {
        $query = mysqli_query(
            $mysqli,
            "SELECT nim, nama_lengkap, 
        jenis_kelamin, semester_sekarang , 
        nama_program, sks_ditukar, semester_ikut, 
        tanggal_ikut, keterangan 
        FROM mahasiswa, program, status, daftar_peserta 
        WHERE mahasiswa.id_mhs = daftar_peserta.id_mhs and daftar_peserta.id_program = program.id_program 
        and daftar_peserta.id_status = status.id_status 
        and mahasiswa.semester_sekarang - daftar_peserta.semester_ikut = 1;"
        );
        $count = mysqli_num_rows($query);
    } else if ($kriteria == 2) {
        $query = mysqli_query(
            $mysqli,
            "SELECT nim, nama_lengkap, 
        jenis_kelamin, semester_sekarang , 
        nama_program, sks_ditukar, semester_ikut, 
        tanggal_ikut, keterangan 
        FROM mahasiswa, program, status, daftar_peserta 
        WHERE mahasiswa.id_mhs = daftar_peserta.id_mhs and daftar_peserta.id_program = program.id_program 
        and daftar_peserta.id_status = status.id_status 
        and mahasiswa.semester_sekarang - daftar_peserta.semester_ikut = 2;"
        );
        $count = mysqli_num_rows($query);
    }
} else if ($kategori == 2) {
    $query = mysqli_query(
        $mysqli,
        "SELECT nim, nama_lengkap, 
    jenis_kelamin, semester_sekarang , 
    nama_program, sks_ditukar, semester_ikut, 
    tanggal_ikut, keterangan 
    FROM mahasiswa, program, status, daftar_peserta 
    WHERE mahasiswa.id_mhs = daftar_peserta.id_mhs and daftar_peserta.id_program = program.id_program 
    and daftar_peserta.id_status = status.id_status 
    and daftar_peserta.id_status = $kriteria"
    );

    $count = mysqli_num_rows($query);
} else if ($kategori == 3) {
    $query = mysqli_query(
        $mysqli,
        "SELECT nim, nama_lengkap, 
    jenis_kelamin, semester_sekarang , 
    nama_program, sks_ditukar, semester_ikut, 
    tanggal_ikut, keterangan 
    FROM mahasiswa, program, status, daftar_peserta 
    WHERE mahasiswa.id_mhs = daftar_peserta.id_mhs and daftar_peserta.id_program = program.id_program 
    and daftar_peserta.id_status = status.id_status 
    and daftar_peserta.id_program = $kriteria"
    );

    $count = mysqli_num_rows($query);
} else if ($kategori == 4) {
    if ($kriteria == 0) {

        $query = mysqli_query(
            $mysqli,
            "SELECT nim, nama_lengkap, 
    jenis_kelamin, semester_sekarang , 
    nama_program, sks_ditukar, semester_ikut, 
    tanggal_ikut, keterangan 
    FROM mahasiswa, program, status, daftar_peserta 
    WHERE mahasiswa.id_mhs = daftar_peserta.id_mhs and daftar_peserta.id_program = program.id_program 
    and daftar_peserta.id_status = status.id_status 
    and sks_ditukar = 20"
        );

        $count = mysqli_num_rows($query);
    } else if ($kriteria == 1) {

        $query = mysqli_query(
            $mysqli,
            "SELECT nim, nama_lengkap, 
        jenis_kelamin, semester_sekarang , 
        nama_program, sks_ditukar, semester_ikut, 
        tanggal_ikut, keterangan 
        FROM mahasiswa, program, status, daftar_peserta 
        WHERE mahasiswa.id_mhs = daftar_peserta.id_mhs and daftar_peserta.id_program = program.id_program 
        and daftar_peserta.id_status = status.id_status 
        and sks_ditukar < 20"
        );

        $count = mysqli_num_rows($query);
    }
}
if ($count) { ?>
    <label for="">Jumlah Data = <?= $count ?></label>
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
    <?php
} else {
    echo "<center><h2>Data Tidak Ditemukan<h2></center>";
    echo '<center>
    <a href="data_mbkm.php" class="btn btn-primary">Reload This Page</a></center>';
} ?>

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