<?php
include('config.php');

$kategori  = $_GET['kategori'];
if($kategori == 1){
        echo " 
        <option>Pilih Semester</option>
        <option value='0'>Semester Sekarang</option>
        <option value='1'>Semester Lalu</option>
        <option value='2'>Tahun Lalu</option>";
}else if($kategori == 2){
        $data = mysqli_query($mysqli, "SELECT * from status");
        echo"<option>Pilih Status</option>";
        while($row = mysqli_fetch_array($data)){
                echo "<option value='".$row['id_status']."'>".$row['keterangan']."</option>";
        }
}else if($kategori == 3){
        $data = mysqli_query($mysqli, "SELECT * from program");
        echo"<option>Pilih Program</option>";
        while($row = mysqli_fetch_array($data)){
                echo "<option value='".$row['id_program']."'>".$row['nama_program']."</option>";
        }
}else if($kategori == 4){
        echo " 
        <option>Pilih Jumlah SKS</option>
        <option value='0'>20 SKS</option>
        <option value='1'>Kurang dari 20 SKS</option>";
}

