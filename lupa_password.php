<?php
include('config/koneksi.php');

if(isset($_POST['lupa_password'])){
  $email = $_POST['email'];
  $sql = "SELECT pass_backup FROM users WHERE username='$email'";
  $res = mysqli_query($koneksi, $sql);
  $row = mysqli_fetch_assoc($res);

  if($row != NULL){
    $pass = $row['pass_backup'];
    $result = kirim_email($email, $pass);
  }else{
    $result = array("gagal"=>"Email tidak ditemukan");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sistem Informasi Pendataan Anggota PPI SE KALTENG">
  <meta name="author" content="e-development.tech">

  <title>Lupa Password</title>

  <!-- gambar title -->
  <link rel="icon" type="image/png" href="assets/img/logoppi.png">

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

  <style>
    .logo-login {
      max-height: 160px;
      margin-bottom: 20px;
    }
    input,
    button {
      padding: 10px 20px !important;
      font-size: 1rem !important;
    }
  </style>

</head>

<body class="bg-gradient-primary">
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-md-7">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-md-12">
                <div class="p-5">
                  <div class="text-center mb-5">
                    <h1 class="h4 text-gray-900"><b>Lupa Password</b></h1>
                  </div>

                  <?php
                  if(isset($result)){
                    if(isset($result['sukses'])){
                  ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h5><?= $result['sukses'] ?></h5>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <?php
                    }else{
                  ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h5><?= $result['gagal'] ?></h5>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <?php 
                    }
                  }
                  ?>
                  <div>
                  <form class="user" action="lupa_password.php" method="POST">
                    <div class="form-group">
                      <input type="text" name="email" class="form-control form-control-user" placeholder="Masukkan Email Anda" required>
                    </div>
                    <button type="submit" name="lupa_password" class="btn btn-primary btn-user btn-block">
                      Reset Password
                    </button>
                  </form>
                  </div>
                  <hr>
                  <div class="text-center">
                    <div>
                      <a class="small" href="registrasi.php">Buat Akun Baru</a>
                    </div>
                    <div>
                      <a class="small" href="login.php">Sudah Punya Akun? Login!</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>