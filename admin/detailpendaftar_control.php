<?php

$id_warga = $_GET['id'];

$sql_warga = "SELECT * FROM warga WHERE id = '$id_warga'";
$result_warga = mysqli_query($koneksi, $sql_warga);
$data_warga = mysqli_fetch_array($result_warga);

// cek hasil
if(!$result_warga) {
    die('Query Error : '. mysqli_error($koneksi));
}

$sql_verifikasi = "SELECT * FROM verifikasi WHERE warga_id = '$id_warga'";
$result_verifikasi = mysqli_query($koneksi, $sql_verifikasi);
$data_verifikasi = mysqli_fetch_array($result_verifikasi);

// cek hasil
if(!$result_verifikasi) {
    die('Query Error : '. mysqli_error($koneksi));
}

// ubah status nilai
if(isset($_POST['simpan']) && $_POST['simpan'] == 'simpan_nilai') {

    $nilai = $_POST['nilai'];
    $tgl = date('Y-m-d');
    $sql_verifikasi = "UPDATE verifikasi SET status='$nilai',tanggal_verifikasi='$tgl' WHERE warga_id='$id_warga'";
    $query_nilai = mysqli_query($koneksi,$sql_verifikasi);

    if($query_nilai) {
        // berhasil
        $_SESSION['pesan_sukses'] = "Status Pendaftar berhasil diubah";
        // header('location:pendaftaran.php');
        arahkan_ulang('pendaftaran.php');
    } else {
        echo "Gagal Update status pendaftar"; die;
    }
}




?>