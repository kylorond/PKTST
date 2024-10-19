<?php

session_start();

include('config/koneksi.php');

if(isset($_POST['btn_registrasi'])) {
    // print_r($_POST);

    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $ulangi_password = md5($_POST['ulangi_password']);

    if($password != $ulangi_password) {
        echo "Error: Password tidak sama";
        echo "<br><br> <button type='button' class='btn btn-info' onclick='history.back();'> Kembali </button>";
        die;
    }

    // Insert tabel user
    // $sql_user = "INSERT INTO users () values ('')";
    $pass_backup = $_POST['password'];
    $sql_user = "INSERT INTO users (nama, username, password, pass_backup) values ('$nama', '$email', '$password', '$pass_backup')";
    $result_user = mysqli_query($koneksi, $sql_user);

    if($result_user){
        $data_user = mysqli_query($koneksi, "SELECT LAST_INSERT_ID()");
        while($u = mysqli_fetch_array($data_user)){
            $id_user = $u[0];
        }

        // insert table pendaftar
        $sql_pendaftar = "INSERT INTO warga (nama, users_id) values ('$nama', '$id_user')";

        $result_pendaftar = mysqli_query($koneksi, $sql_pendaftar);

        if($result_pendaftar){
            // jika berhasil
            $_SESSION['pesan_registrasi'] = "Registrasi Berhasil<br>Login Menggunakan Email dan Password anda!";

            // header('location:login.php');
            arahkan_ulang('login.php');

        } else {
            // jika query pendaftar gagal
            echo "Error insert pendaftar ". mysqli_error($koneksi);
            echo "<br><br> <button type='button' onclick='history.back();'> Kembali </button>";
            die;
        }


    } else {
        // jika query users gagal
        echo "Error insert users: ". mysqli_error($koneksi);
        echo "<br><br> <button type='button' onclick='history.back();'> Kembali </button>";
        die;
    }

} else {
    // header('location:registrasi.php');
    arahkan_ulang('registrasi.php');
}

?>