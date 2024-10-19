<?php

$id_user = $_SESSION['id_users'];
$sql_user = "SELECT * FROM users where id = '$id_user'";
$result_user = mysqli_query($koneksi, $sql_user);

if(mysqli_num_rows($result_user)){

    $data_user = mysqli_fetch_array($result_user);

    if(isset($_POST['btn_simpan']) && $_POST['btn_simpan'] == 'simpan_profil') {
        
        $id_user = $data_user['id'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = ($_POST['password'] == '') ? $data_user['pass_backup'] : $_POST['password'];
        $passwordmd5 = ($_POST['password'] == '') ? $data_user['password'] : md5($_POST['password']);

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

                    $sql_update_foto_user = "UPDATE users set foto = '$ubah_nama' where id='$id_user'";
                    $query_update_foto_user = mysqli_query($koneksi, $sql_update_foto_user);

                    $sql_update_foto_warga = "UPDATE warga set foto = '$ubah_nama' where users_id='$id_user'";
                    $query_update_foto_warga = mysqli_query($koneksi, $sql_update_foto_warga);

                    if($query_update_foto_user && $query_update_foto_warga) {
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
        
        $sql_update_user = "UPDATE users set nama='$nama', username='$email', password='$passwordmd5', pass_backup='$password' where id='$id_user'";
        $query_update_user = mysqli_query($koneksi, $sql_update_user);

        if($query_update_user) {
            $sql_update_warga = "UPDATE warga set nama='$nama' where users_id='$id_user'";
            $query_update_warga = mysqli_query($koneksi, $sql_update_warga);

            if($query_update_warga){
                // berhasil
                $_SESSION['nama'] = $nama;
                $_SESSION['pesan_sukses'] = "Edit Profil Sukses!";
                
                // header('location:dashboard.php');
                arahkan_ulang('dashboard.php');
            }
        } else {
            echo "gagal update data profil"; die;
        }

    }

}
