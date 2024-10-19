<?php 

session_start();

include('config/koneksi.php');

if(isset($_POST['btn_login'])) {
    // jika sudah ditekan
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql_user = "SELECT * FROM users where username = '$username' and password = '$password'";
    $result_user = mysqli_query($koneksi, $sql_user);

    if(mysqli_num_rows($result_user) > 0) {
        // jika data tersedia, simpan data user kedalam session
        while($data_user = mysqli_fetch_array($result_user)){
            $_SESSION['status'] = 'login';
            $_SESSION['id_users'] = $data_user['id'];
            $_SESSION['nama'] = $data_user['nama'];
            $_SESSION['level'] = $data_user['level'];
            $_SESSION['foto'] = $data_user['foto'];

            if($data_user['level'] == 'admin') {
                // header('location:admin/dashboard.php');
                arahkan_ulang('admin/dashboard.php');
            } else if($data_user['level'] == 'user') {
                // header('location:user/dashboard.php');
                arahkan_ulang('user/dashboard.php');
            }

        }
    } else {
        $_SESSION['login_error'] = "Username atau Password anda Salah!";
        // header('location:login.php');
        arahkan_ulang('login.php');
    }

} else {
    // header('location:login.php');
    arahkan_ulang('login.php');
}

?>