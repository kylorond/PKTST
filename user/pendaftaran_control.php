<?php

$id_user = $_SESSION['id_users'];
$sql_warga = "SELECT * FROM warga where users_id = '$id_user'";
$result_warga = mysqli_query($koneksi, $sql_warga);

if(mysqli_num_rows($result_warga)){

    $data_warga = mysqli_fetch_assoc($result_warga);
    $id_warga = $data_warga['id'];

    $sql_verifikasi = "SELECT * FROM verifikasi where warga_id = '$id_warga'";
    $result_verifikasi = mysqli_query($koneksi, $sql_verifikasi);

    if(mysqli_num_rows($result_verifikasi)) {
        $data_verifikasi = mysqli_fetch_assoc($result_verifikasi);
        $status = $data_verifikasi['status'];
    } else  {
        // jika belum ada data nilai/ status maka kosong
    }

    // simpan data verifikasi
    if(isset($_POST['btn_simpan']) && $_POST['btn_simpan'] == 'simpan_verifikasi') {

    // START FORM DATA KEPEMILIKAN TANAH
        $nama_desa = $_POST['nama_desa'];
        $nama_pemilik = $_POST['nama_pemilik'];
        $tanggal_regis = $_POST['tanggal_regis'];
        $alamat_tanah = $_POST['alamat_tanah'];
        $panjang = $_POST['panjang'];
        $lebar = $_POST['lebar'];
        $luas = $_POST['luas'];
        
        // SERTIFIKAT
        if($_FILES['sertifikat']['name'] != '') {
            $ekstensi_diperbolehkan = array('png','jpg');
            $nama_gambar = $_FILES['sertifikat']['name'];
            $x = explode('.', $nama_gambar);
            $ekstensi = strtolower(end($x));
            $ukuran = $_FILES['sertifikat']['size'];
            $file_tmp = $_FILES['sertifikat']['tmp_name'];

            $ubah_nama_sertifikat = $data_anggota['nama'] . '.' . $ekstensi;
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                if($ukuran < 1044070) {
                    move_uploaded_file($file_tmp, '../uploads/sertifikat/'. $ubah_nama_sertifikat);

                    $sql_insert_verifikasi = "INSERT INTO verifikasi (nama_desa, nama_pemilik, tanggal_regis, alamat_tanah, panjang, lebar, luas, sertifikat, status, warga_id) VALUES ('$nama_desa', '$nama_pemilik', '$tanggal_regis', '$alamat_tanah', '$panjang', '$lebar', '$luas', '$ubah_nama_sertifikat', 'Pendaftar Baru', '$id_warga')";
                    
                    $query_insert_verifikasi = mysqli_query($koneksi, $sql_insert_verifikasi);

                    if(!$query_insert_verifikasi) {
                        echo "GAGAL UPLOAD"; die;
                    }
                } else {
                    echo "Gambar terlalu besar"; die;
                }
            } else {
                echo " ekstensi tidak diperbolehkan"; die;
            }
        }
    // END FORM DATA PASIBRAKA

    // START FORM DATA DIRI
        $nama = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $pekerjaan = $_POST['pekerjaan'];
        $no_ktp = $_POST['no_ktp'];
        $alamat = $_POST['alamat'];

        $sql_update_warga = "UPDATE warga SET nama='$nama', jenis_kelamin='$jenis_kelamin', pekerjaan='$pekerjaan', no_ktp='$no_ktp', alamat='$alamat' WHERE users_id = '$id_user'";

        $query_update_warga = mysqli_query($koneksi, $sql_update_warga);
    // END FORM DATA DIRI

        if($query_insert_verifikasi && $query_update_warga){
            $_SESSION['pesan_sukses'] = "Berhasil menyimpan data";
            // header('location:pendaftaran.php');
            arahkan_ulang('pendaftaran.php');
        }
    }

    // kirim data verifikasi
    if(isset($_POST['btn_kirim']) && $_POST['btn_kirim'] == 'kirim_verifikasi') {
        $sql_update_verifikasi = "UPDATE verifikasi SET status='Pengajuan Baru' WHERE warga_id='$id_warga'";
        
        $query_update_verifikasi = mysqli_query($koneksi, $sql_update_verifikasi);

        if($query_update_verifikasi){
            // header('location:pendaftaran.php');
            arahkan_ulang('dashboard.php');
        }
    }

}


?>