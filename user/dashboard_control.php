<?php

$id_user = $_SESSION['id_users'];
$sql_warga = "SELECT * FROM warga where users_id = '$id_user'";
$result_warga = mysqli_query($koneksi, $sql_warga);

if(mysqli_num_rows($result_warga)){

    $data_warga = mysqli_fetch_array($result_warga);
    $id_warga = $data_warga['id'];

    $sql_verifikasi = "SELECT * FROM verifikasi where warga_id = '$id_warga'";
    $result_verifikasi = mysqli_query($koneksi, $sql_verifikasi);

    if(mysqli_num_rows($result_verifikasi)) {
        $data_verifikasi = mysqli_fetch_array($result_verifikasi);
        $status = $data_verifikasi['status'];
    } else  {
        // jika belum ada data nilai/ status maka kosong
    }
}


?>