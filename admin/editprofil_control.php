<?php

$id_user = $_SESSION['id_users'];
$sql_user = "SELECT * FROM users where id = '$id_user'";
$result_user = mysqli_query($koneksi, $sql_user);

if(mysqli_num_rows($result_user)){

    $data_user = mysqli_fetch_array($result_user);

    if(isset($_POST['btn_simpan']) && $_POST['btn_simpan'] == 'simpan_profil') {
        
        $id_pendaftar = $data_user['id'];
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = ($_POST['password'] == '') ? $data_user['password'] : md5($_POST['password']);

        // GAMBAR
        if($_FILES['gambar']['name'] != '') {

            $ekstensi_diperbolehkan = array('png','jpg');
            $nama_gambar = $_FILES['gambar']['name'];
            $x = explode('.', $nama_gambar);
            $ekstensi = strtolower(end($x));
            $ukuran	= $_FILES['gambar']['size'];
            $file_tmp = $_FILES['gambar']['tmp_name'];

            $ubah_nama = $nama . '.' . $ekstensi;

            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                if($ukuran < 3044070) {
                    move_uploaded_file($file_tmp, '../uploads/'. $ubah_nama);

                    $sql_update_profil = "UPDATE users set foto = '$ubah_nama' where id='$id_pendaftar'";
                    $query_update = mysqli_query($koneksi, $sql_update_profil);
                    if($query_update) {
                        $_SESSION['foto'] = $ubah_nama;
                    } else {
                        echo "GAGAL UPLOAD"; die;
                    }

                } else {
                    echo "Gambar terlalu besar"; die;
                }
            } else {
                echo " ekstensi tidak diperbolehkan"; die;
            }
        }

        $sql_update_profil = "UPDATE users set nama='$nama', username='$username', password='$password' where id='$id_pendaftar'";

        $query_update_profil = mysqli_query($koneksi, $sql_update_profil);

        if($query_update_profil) {
            // berhasil
            $_SESSION['nama'] = $nama;
            $_SESSION['pesan_sukses'] = "Edit Profil Sukses!";
            
            // header('location:dashboard.php');
            arahkan_ulang('dashboard.php');
        } else {
            echo "gagal update data profil"; die;
        }

    }

}
