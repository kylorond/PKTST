<?php

// tabel pendaftar
$all_pendaftar = mysqli_query($koneksi, "SELECT warga.*, verifikasi.nama_desa,verifikasi.nama_pemilik,verifikasi.tanggal_regis,verifikasi.alamat_tanah,verifikasi.panjang,verifikasi.lebar,verifikasi.luas,verifikasi.sertifikat,verifikasi.status,verifikasi.warga_id,verifikasi.tanggal_submit,verifikasi.tanggal_verifikasi FROM warga,verifikasi WHERE warga.id = verifikasi.warga_id AND verifikasi.status = 'Pengajuan Baru' ORDER BY tanggal_submit DESC");

// cek hasil
if(!$all_pendaftar) {
    die('Query Error : '. mysqli_error($koneksi));
}

// jml pendaftar
$jml_pendaftar = mysqli_query($koneksi, "SELECT * FROM warga");

// cek hasil
if(!$jml_pendaftar) {
    die('Query Error : '. mysqli_error($koneksi));
}

// jml LOLOS
$jml_lolos = mysqli_query($koneksi, "SELECT warga.*,verifikasi.status FROM warga, verifikasi WHERE warga.id = verifikasi.warga_id AND verifikasi.status = 'Lolos Verifikasi'");

// cek hasil
if(!$jml_lolos) {
    die('Query Error : '. mysqli_error($koneksi));
}

?>