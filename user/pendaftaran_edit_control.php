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
    }
}

// simpan data edit verifikasi
if(isset($_POST['btn_simpan_edit']) && $_POST['btn_simpan_edit'] == 'simpan_edit_verifikasi') {

// START FORM DATA KEPEMILIKAN TANAH
    $nama = $_POST['nama'];
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

        $ubah_nama_sertifikat = $nama . '.' . $ekstensi;
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            if($ukuran < 1044070) {
                move_uploaded_file($file_tmp, '../uploads/sertifikat/'. $ubah_nama_sertifikat);

                $sql_update_foto = "UPDATE verifikasi SET sertifikat='$ubah_nama_sertifikat' WHERE warga_id='$id_warga'";
                
                $query_update_foto = mysqli_query($koneksi, $sql_update_foto);

                if(!$query_update_foto) {
                    echo "GAGAL UPLOAD"; die;
                }
            } else {
                echo "Gambar terlalu besar"; die;
            }
        } else {
            echo " ekstensi tidak diperbolehkan"; die;
        }
    }

    $sql_update_verifikasi = "UPDATE verifikasi SET nama_desa='$nama_desa', nama_pemilik='$nama_pemilik', tanggal_regis='$tanggal_regis', alamat_tanah='$alamat_tanah', panjang='$panjang', lebar='$lebar', luas='$luas' WHERE warga_id = '$id_warga'";
                
    $query_update_verifikasi = mysqli_query($koneksi, $sql_update_verifikasi);
// END FORM DATA KEPEMILIKAN TANAH

    if($query_update_verifikasi){
    // START FORM DATA DIRI
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $pekerjaan = $_POST['pekerjaan'];
        $no_ktp = $_POST['no_ktp'];
        $alamat = $_POST['alamat'];

        $sql_update_warga = "UPDATE warga SET nama='$nama', jenis_kelamin='$jenis_kelamin', pekerjaan='$pekerjaan', no_ktp='$no_ktp', alamat='$alamat' WHERE users_id = '$id_user'";

        $query_update_warga = mysqli_query($koneksi, $sql_update_warga);
    // END FORM DATA DIRI

        if($query_update_warga){
            $sql_update_users = "UPDATE users SET nama='$nama' WHERE id = '$id_user'";
            $_SESSION['nama'] = $nama;
            $query_update_warga = mysqli_query($koneksi, $sql_update_users);

            $_SESSION['pesan_sukses'] = "Berhasil mengubah data";
        }
    }
    // header('location:pendaftaran.php');
    arahkan_ulang('pendaftaran.php');
}


?>