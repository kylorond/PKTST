<?php

// tabel pendaftar
$all_warga = mysqli_query($koneksi, "SELECT warga.*, verifikasi.nama_desa,verifikasi.nama_pemilik,verifikasi.tanggal_regis,verifikasi.alamat_tanah,verifikasi.panjang,verifikasi.lebar,verifikasi.luas,verifikasi.sertifikat,verifikasi.status,verifikasi.warga_id,verifikasi.tanggal_submit,verifikasi.tanggal_verifikasi FROM warga, verifikasi WHERE warga.id = verifikasi.warga_id AND status<>'Pendaftar Baru' ORDER BY tanggal_submit DESC");

// cek hasil
if(!$all_warga) {
    die('Query Error : '. mysqli_error($koneksi));
}

if(isset($_GET['action']) && $_GET['action'] == "hapus") {
    $id_warga = $_GET['id'];
    $query_warga = mysqli_query($koneksi, "SELECT * FROM warga where id = '$id_warga'");

    if(mysqli_num_rows($query_warga)){

        $data_warga = mysqli_fetch_array($query_warga);
        $id_user = $data_warga['users_id'];

        // hapus nilai
        $sql_hapus_nilai = mysqli_query($koneksi," DELETE FROM verifikasi where warga_id = '$id_warga'");

        // hapus foto pendaftar
        if(file_exists('../uploads/'. $data_warga['foto'])){
            unlink('../uploads/'. $data_warga['foto']);
        }
        $sql_hapus_pendaftar = mysqli_query($koneksi," DELETE FROM warga where id = '$id_warga'");

        // hapus user
        $sql_hapus_user = mysqli_query($koneksi," DELETE FROM users where id = '$id_user'");

        if(!$sql_hapus_nilai || !$sql_hapus_pendaftar || !$sql_hapus_user) {
            die('Query Error: '. mysqli_error($koneksi));
        }

        // simpan session
        $_SESSION['pesan_sukses'] = "Berhasil menghapus data";
        // header('location:pendaftaran.php');
        arahkan_ulang('pendaftaran.php');

    } else {
        die('Data pendaftar tidak ditemukan!');
    }
}


?>